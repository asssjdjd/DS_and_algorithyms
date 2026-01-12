# Backend Core - Algorithm Lab Server

## 1. Tổng quan (Overview)
Backend này là một hệ thống API viết bằng PHP thuần (Vanilla PHP), phục vụ việc xử lý logic cho các thuật toán (Sắp xếp, Tìm kiếm, Đệ quy, Tham lam). Hệ thống nhận input từ Frontend, xử lý qua các tầng Middleware và Core Algorithm, sau đó trả về kết quả kèm lời giải thích từng bước.

## 2. Kiến trúc Hệ thống (Architecture)
Dự án áp dụng **Layered Architecture** (Kiến trúc phân lớp) kết hợp với **Separation of Concerns** (Tách biệt các mối quan tâm). Luồng dữ liệu không đi trực tiếp vào thuật toán mà qua các bước chuẩn hóa nghiêm ngặt.

### Các tầng chính (Layers):
1.  **Entry Point Layer:** Tiếp nhận request HTTP, định tuyến (Routing) cơ bản.
    * Đại diện: `service/post/PostInputData.php`, `service/get/GetAlgorithyms.php`.
2.  **Factory Layer:** Quyết định xem class nào sẽ chịu trách nhiệm xử lý dựa trên `id` thuật toán.
    * Đại diện: `HandleInputAlgorithmFactory.php`.
3.  **Service Layer:** Điều phối luồng xử lý cụ thể cho từng thuật toán (Gọi request middleware -> gọi core -> gọi response middleware).
    * Đại diện: Các class trong `service/get/impl/process_algorithym/`.
4.  **Middleware Layer:**
    * **Request Middleware:** Chuyển đổi dữ liệu thô (String/JSON) thành cấu trúc dữ liệu PHP (Array, Int) để thuật toán có thể hiểu.
    * **Response Middleware:** Chuyển đổi kết quả thuật toán và sinh ra văn bản giải thích (Explanation text) để trả về client.
5.  **Domain / Core Layer:** Chứa logic thuật toán thuần túy (Pure Logic), không phụ thuộc vào framework hay request.
    * Đại diện: Thư mục `algorithyms/core/`.

## 3. Design Patterns Sử dụng

### 3.1. Factory Method Pattern
* **Vị trí:** `service/get/factory/HandleInputAlgorithmFactory.php`.
* **Mục đích:** Khởi tạo đối tượng xử lý thuật toán (như `HandleQuickSort1`, `HandleBigSorting`) dựa trên tham số `algorithym_id` gửi lên từ client.
* **Lợi ích:** Giúp code ở Controller (`PostInputData.php`) gọn gàng, không cần chứa hàng loạt câu lệnh `if/else` hoặc `switch/case` để khởi tạo class. Dễ dàng mở rộng thêm thuật toán mới mà không sửa logic cũ.

### 3.2. Strategy Pattern 
* **Vị trí:** Interface `HandleInputAlgorithmDataInterface`.
* **Mục đích:** Định nghĩa một "hợp đồng" chung cho tất cả các lớp xử lý thuật toán (`handleInputDataAlgorithm($data)`).
* **Lợi ích:** Hệ thống đảm bảo mọi class xử lý thuật toán đều có cùng một phương thức kích hoạt, giúp Factory có thể trả về bất kỳ class nào mà không lo lỗi type.

### 3.3.Middleware Pattern (Simplified)
* **Vị trí:** Các hàm trong thư mục `middleware/request` và `middleware/response`.
* **Mục đích:** Tách việc tiền xử lý (Pre-processing) và hậu xử lý (Post-processing) ra khỏi logic chính của thuật toán.
* **Lợi ích:** Nếu muốn thay đổi cách parse input từ dấu cách sang dấu phẩy, chỉ cần sửa file Request Middleware mà không đụng vào Core thuật toán.

## 4. Luồng xử lý dữ liệu chi tiết (Data Flow)

Ví dụ với thuật toán **QuickSort1**:

1.  **Receive Request:**
    * Client gửi POST đến `service/post/PostInputData.php` với payload: `{ "algorithym_id": "quick_sort1", "data": ... }`.
2.  **Factory Resolution:**
    * `PostInputData.php` gọi `HandleInputAlgorithmFactory::create('quick_sort1')`.
    * Factory trả về instance của class `HandleQuickSort1`.
3.  **Execution (Service Layer):**
    * Hàm `handleInputDataAlgorithm($data)` của `HandleQuickSort1` được kích hoạt.
4.  **Step 1: Request Processing:**
    * Gọi `handleQuickSort1DataRequest($data)` từ Middleware.
    * Input chuỗi `"4 5 3"` được `explode` thành mảng `[4, 5, 3]`.
5.  **Step 2: Core Algorithm:**
    * Gọi hàm `quickSort1($arr)` từ Core.
    * Logic sắp xếp chạy và trả về mảng đã sắp xếp `[3, 4, 5]`.
6.  **Step 3: Response Processing:**
    * Gọi `handleInputQuickSort1Response($sorted)` từ Middleware.
    * Hàm này đóng gói mảng kết quả và chèn thêm văn bản giải thích (Text Explanation) về Pivot và Partition.
7.  **Return Response:**
    * Service trả về Array kết quả cuối cùng.
    * `PostInputData.php` encode thành JSON và `echo` về Client.

## 5. Cấu trúc thư mục (Folder Structure)

```text
web/server/
├── algorithyms/         # Core Logic (Logic thuần tuý)
│   └── core/            # Chứa các file thuật toán (Sort, Search, Greedy...)
├── middleware/          # Xử lý trung gian
│   ├── request/         # Chuẩn hóa dữ liệu đầu vào (Input -> PHP Array)
│   └── response/        # Chuẩn hóa dữ liệu đầu ra (PHP Array + Explain Text)
├── service/             # Tầng dịch vụ
│   ├── get/
│   │   ├── factory/     # Các Factory class để khởi tạo đối tượng
│   │   ├── impl/        # Implementation của các interface (Logic điều phối)
│   │   └── interface/   # Các Interface định nghĩa method chung
│   └── post/            # Các file nhận Request (Entry Point API)
└── utils/               # Các hàm tiện ích, Enum