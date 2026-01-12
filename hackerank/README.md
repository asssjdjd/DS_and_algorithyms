# Frontend Client - Algorithm Lab

## 1. Tổng quan (Overview)
Phần Frontend của dự án là giao diện người dùng (UI) được xây dựng bằng **HTML5, CSS3 và Vanilla JavaScript (ES6 Modules)**. Nhiệm vụ chính của nó là tương tác với người dùng, xác thực dữ liệu đầu vào (Client-side Validation) một cách chặt chẽ trước khi gửi đến Server, và hiển thị kết quả trực quan.

## 2. Kiến trúc (Architecture)
Hệ thống Frontend không sử dụng Framework (như React/Vue) mà áp dụng kiến trúc **Modular JavaScript** để đảm bảo code trong sáng và dễ bảo trì.

### Các thành phần chính:
1.  **View Layer:** `index.html` và `style.css`. Chịu trách nhiệm về cấu trúc DOM và giao diện.
2.  **Controller / Facade Layer:** `FacadeAlgorithyms.js`. Đây là trung tâm điều phối, kết nối giữa View và các Service xử lý logic.
3.  **Service Layer:** Chứa các file giao tiếp API (`fetch`) gửi/nhận dữ liệu từ Backend.
    * Đại diện: `service/get/GetAlgorithyms.js`, `service/post/PostInputData.js`.
4.  **Validation Layer:** Hệ thống kiểm tra dữ liệu đầu vào đa hình (Polymorphic Validation).
    * Đại diện: `service/ValidateInputData.js` và các file `impl/*.js`.



### 3.1. Module Pattern (ES6)
* **Vị trí:** Toàn bộ thư mục `service/`.
* **Mục đích:** Đóng gói code, tránh ô nhiễm biến toàn cục (Global Scope Pollution).
* **Giải thích:** Các file sử dụng `export async function` để chỉ công khai những hàm cần thiết. Ví dụ: `PostInputData.js` chỉ export hàm `postInputData`, các biến nội bộ khác được giữ kín.

### 3.2. Strategy Pattern (Simplified)
* **Vị trí:** `service/ValidateInputData.js` (Hàm `validateDetail`).
* **Mục đích:** Chọn thuật toán validate phù hợp ngay tại thời điểm chạy (Runtime).
* **Giải thích:** Dựa vào `algorithm_id` người dùng chọn, hàm `validateDetail` sẽ chuyển hướng xử lý sang các file validate cụ thể (ví dụ: `validateBigSorting` hoặc `validateQuickSort1`). Điều này giúp tách biệt logic kiểm tra của từng thuật toán.

## 4. Luồng xử lý dữ liệu (Data Flow)

**Bước 1: Khởi tạo (Initialization)**
* Khi tải trang, `FacadeAlgorithyms.js` gọi `loadAlgorithmMenu` từ API.
* Dữ liệu trả về được dùng để render các thẻ `<option>` trong Select Box.

**Bước 2: Người dùng chọn thuật toán (Selection)**
* Sự kiện `change` trên Select Box kích hoạt `postIntroduce`.
* Frontend lấy thông tin hướng dẫn (Introduction) và hiển thị vào khung `guide-box`.

**Bước 3: Người dùng bấm "RUN TEST" (Execution)**
1.  **Lấy input:** Facade lấy chuỗi raw từ `textarea`.
2.  ** (Pre-validation):** `validate(raw)` kiểm tra lỗi chung (ký tự lạ, format dòng).
3.  **Validate chi tiết:** `validateDetail` gọi hàm validate riêng (ví dụ: `validateInsertionSort2`) để kiểm tra logic nghiệp vụ (ví dụ: số lượng phần tử phải khớp với khai báo dòng 1).
4.  **Gửi Request:** Nếu dữ liệu hợp lệ, gọi `postInputData` gửi payload sang Server.
5.  **Hiển thị:** Nhận JSON phản hồi, tách `data` (kết quả) và `explaint` (giải thích) để render ra màn hình console giả lập.

## 5. Cấu trúc thư mục (Folder Structure)

```text
web/frontend/
├── index.html               # Giao diện chính
├── style.css                # Style giao diện (Dark theme)
└── service/                 # Logic xử lý chính
    ├── AlgorithmEnums.js    # Định nghĩa hằng số (Tên thuật toán)
    ├── FacadeAlgorithyms.js # Controller chính điều phối UI và Logic
    ├── ValidateInputData.js # Bộ định tuyến validate
    ├── get/                 # Các API GET (Lấy menu)
    ├── post/                # Các API POST (Gửi input, Lấy intro)
    └── impl/                # Các hàm validate chi tiết cho từng thuật toán
        ├── ValidateBigSorting.js
        ├── ValidateQuickSort1.js
        └── ...