# TÌM HIỀU VỀ UNIT-TEST(PHP-UNIT) và COMPOSER

## 1. Composer

### Cài đặt Composer.

* truy cập vào đường link : **[download]** *https://getcomposer.org/download/*

* Tiếp theo đó nhấn "Composer-Setup.exe" theo hình bên dưới
![alt text](image-1.png)

* Tiếp theo đó máy tính sẽ tải về tệp composer. Kích hoạt tệp đó thêm vào **variable environment** (biến môi trường).

* Tiếp theo Composer bắt chọn phiên bản php để dùng. Chọn phiên bản php mà đã setup từ trước ví dụ PHP-8.2.

* Sau đó Composer yêu cầu một số extension ở php.ini phải được bật ví dụ : 
* extension = curl
* extension = fileinfo
* extension = mbstring
* extension = openssl
* ![alt text](image-2.png)
* config dir nếu vẫn không nhận 
![alt text](image-3.png)

* Kiếm tra : ![alt text](image-4.png)

### Các thành phần của Composer :

* Thành phần : ![alt text](image-5.png)

 1. **Composer.json**
    * Khai báo các thư viện được sử dụng 
    * Phiên bản của các thư viện đó.
    * Cấu hình autoload 
    * Ví dụ : ![alt text](image-6.png)
    *  Giải thích : trong phần **autoload** phần **psr-4** là một chuẩn trong php giúp ánh xạ thư mục. ví dụ ở đây là **App\\** là namespace : sẽ được ánh xạ tương ứng với thư mục **"server"** trong thư mục thật.
 2. **Composer.lock**
    * Ghi lại chính xác phiên bản của từng thư viện tại thời điểm chạy lệnh 
    * Đảm bảo khi người khác sử dụng có thể hoạt động đúng(Tránh lỗi phiên bản do thư viện gây ra).
 3. **/vendor**
    * Chưa các thư viện được tải về
    * Không đưa nên git
    * Không sửa code