#  Architecture & Core Technologies

Tài liệu này giải thích chi tiết về kiến trúc Frontend của dự án, tập trung vào hai trụ cột chính: **npm** (Quản lý gói) và **Webpack** (Đóng gói mã nguồn).

---
## 1. npm (Node Package Manager) - Hệ Thống Quản Lý

**npm** đóng vai trò là "chuỗi cung ứng" cho dự án, giúp quản lý các thư viện bên ngoài và quy trình vận hành.

###  Kiến trúc thành phần
Hệ sinh thái npm trong dự án bao gồm 3 phần chính:

| Thành phần | Vai trò & Chức năng |
| :--- | :--- |
| **The Registry** | "Nhà kho" trên đám mây chứa hàng triệu thư viện (React, Webpack, Babel...). |
| **CLI (Terminal)** | Công cụ dòng lệnh cài đặt trên máy, giúp giao tiếp với Registry (VD: `npm install`, `npm run build`). |
| **Project Meta-data** | File `package.json` và `package-lock.json`. Đây là bản thiết kế ghi lại danh sách "nguyên liệu" cần thiết để dự án hoạt động. |

###  Công dụng cốt lõi
1.  **Dependency Management (Quản lý phụ thuộc):** Tự động tải và giải quyết xung đột phiên bản giữa các thư viện.
2.  **Version Locking:** Đảm bảo tính nhất quán của môi trường phát triển trên mọi máy tính thông qua `package-lock.json`.
3.  **Script Runner:** Đơn giản hóa các lệnh phức tạp thành các short-command dễ nhớ (VD: `npm run dev` thay vì phải gõ lệnh Webpack dài).

---

## 2. Bundling (Webpack) - Bộ Máy Xử Lý Mã Nguồn

**Webpack** là trái tim của quy trình Build. Nó đóng vai trò là "nhà máy chế biến", chuyển đổi mã nguồn development thành sản phẩm production tối ưu.

##  Công dụng thực tế của Bundling (Why Bundle?)

### 1. Tối ưu hóa hiệu năng tải trang (Performance Optimization)
* **Giảm số lượng HTTP Requests:** Thay vì trình duyệt phải gửi hàng trăm yêu cầu để tải từng file `.js`, `.css` nhỏ lẻ, Bundler gộp chúng lại thành 1-2 file duy nhất (Bundle).
* **Nén dung lượng (Minification):** Tự động loại bỏ các khoảng trắng, dấu xuống dòng, chú thích (comments) và đổi tên biến dài thành ngắn (a, b, c...) để file nhẹ nhất có thể.
* **Caching thông minh:** Sử dụng cơ chế `[contenthash]`. Khi nội dung file thay đổi, tên file sẽ đổi -> Trình duyệt tự động tải bản mới. Nếu không đổi, trình duyệt dùng bản lưu trong cache -> Web tải siêu tốc.

### 2. Tương thích đa trình duyệt (Cross-Browser Compatibility)
* **Transpiling (Dịch mã):** Thông qua **Babel**, Bundler cho phép lập trình viên viết code Javascript hiện đại (ES6+, Arrow Functions, Async/Await) nhưng vẫn chạy mượt mà trên các trình duyệt cũ (như Internet Explorer, Safari đời cũ) bằng cách dịch về ES5.
* **Polyfilling:** Tự động bổ sung các hàm mà trình duyệt cũ còn thiếu.

### 3. Loại bỏ mã thừa (Tree Shaking)
* Tưởng tượng bạn import một thư viện toán học nặng 1MB nhưng chỉ dùng duy nhất hàm `cộng`.
* **Tree Shaking** là thuật toán thông minh của Webpack giúp "rung cây" để rụng đi những phần code chết (Dead Code) không được sử dụng, đảm bảo file cuối cùng không chứa rác.

### 4. Quản lý Module & Scope (Module Management)
* **Tránh xung đột biến toàn cục:** Trong JS thuần cũ, nếu 2 file cùng đặt tên biến là `user`, web sẽ bị lỗi. Bundler đóng gói từng file vào các phạm vi (scope) riêng biệt, đảm bảo an toàn tuyệt đối.
* **Tổ chức code khoa học:** Cho phép chia nhỏ dự án thành hàng trăm module nhỏ dễ bảo trì, nhưng khi chạy thì vẫn là một khối thống nhất.

### 5. Xử lý tài nguyên tĩnh (Asset Management)
* Không chỉ JS, Webpack coi mọi thứ (CSS, Hình ảnh, Font chữ) là các **Module**.
* Nó có thể tự động nén ảnh, chuyển ảnh nhỏ thành dạng base64 (nằm trực tiếp trong code JS) để giảm tải cho Server.

---


#  Project Configuration & Dependencies

Tài liệu này giải thích chi tiết về cấu hình quản lý gói (`package.json`), bao gồm các lệnh thực thi (Scripts) và vai trò của từng thư viện được sử dụng trong dự án.

## 1. NPM Scripts (Lệnh thực thi)

Dự án sử dụng `cross-env` để đảm bảo các lệnh chạy ổn định trên mọi hệ điều hành (Windows/MacOS/Linux).

| Lệnh (Command) | Cú pháp | Công dụng & Ý nghĩa |
| :--- | :--- | :--- |
| **`npm run dev`** | `webpack serve` | **Chế độ Phát triển (Development Mode):**<br><ul><li>Khởi động Server ảo tại `localhost:3000`.</li><li>Kích hoạt tính năng **Hot Module Replacement (HMR)**: Tự động cập nhật giao diện khi sửa code mà không cần reload trang.</li><li>Sử dụng Source Map để dễ dàng debug lỗi.</li></ul> |
| **`npm run build`** | `webpack` | **Chế độ Đóng gói (Production Mode):**<br><ul><li>Kích hoạt tối ưu hóa hiệu năng (Minification, Tree Shaking).</li><li>Tách CSS và JS ra các file riêng biệt.</li><li>Thêm mã hash vào tên file để tối ưu Cache trình duyệt.</li><li>Xuất kết quả cuối cùng ra thư mục `/dist`.</li></ul> |
| **`npm run watch`** | `webpack --watch` | **Chế độ Theo dõi (Watch Mode):**<br><ul><li>Tự động build lại code mỗi khi lưu file, nhưng **không** khởi tạo server ảo.</li><li>Thường dùng khi muốn kiểm tra file output mà không cần chạy server.</li></ul> |

---

## 2. DevDependencies (Thư viện phát triển)

Các thư viện này chỉ phục vụ quá trình Build và Development, không đi kèm trong sản phẩm cuối cùng.

###  Webpack Core (Bộ lõi)
* **`webpack`**: Engine chính chịu trách nhiệm đóng gói toàn bộ mã nguồn.
* **`webpack-cli`**: Công cụ dòng lệnh giúp chạy các lệnh webpack từ terminal.
* **`webpack-dev-server`**: Tạo server cục bộ để phục vụ quá trình development (dùng cho lệnh `npm run dev`).

###  Transpilers & Compatibility (Trình dịch mã)
Giúp code Javascript hiện đại chạy được trên mọi trình duyệt.
* **`@babel/core`**: Trình biên dịch lõi của Babel.
* **`@babel/preset-env`**: Bộ quy tắc thông minh giúp tự động dịch ES6+ về ES5 dựa trên trình duyệt mục tiêu.
* **`babel-loader`**: Cầu nối giúp Webpack giao tiếp với Babel để xử lý các file `.js`.

###  Styling Processors (Xử lý giao diện)
* **`css-loader`**: Cho phép Webpack hiểu và import file CSS vào trong Javascript (`import './style.css'`).
* **`style-loader`**: (Dùng trong Dev) Nhúng CSS trực tiếp vào thẻ `<style>` trong HTML để load nhanh.
* **`mini-css-extract-plugin`**: (Dùng trong Build) Tách CSS ra thành file `.css` riêng biệt để tải song song với JS.
* **`css-minimizer-webpack-plugin`**: Nén file CSS (xóa khoảng trắng, gộp rule) để giảm dung lượng file.

### Utilities & Plugins (Công cụ tiện ích)
* **`html-webpack-plugin`**: Tự động tạo file `index.html` trong thư mục `dist` và tự động chèn thẻ `<script>`, `<link>` trỏ tới file bundle mới nhất.
* **`dotenv-webpack`**: Cho phép đọc các biến môi trường từ file `.env` (như API Endpoint, Key bảo mật) và tiêm vào code dự án.
* **`cross-env`**: Giúp thiết lập biến môi trường (như `NODE_ENV=production`) một cách an toàn, tránh lỗi cú pháp khi chạy trên Windows (PowerShell/CMD).

---

### Cấu hình

1. **Cấu hình thư mục**

---
![alt text](image.png)

2. **Cấu hình file package.json**

--- 
![alt text](image-1.png)