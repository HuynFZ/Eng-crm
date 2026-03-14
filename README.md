# Eng-CRM: English Center Management System
> **Hackathon Project - 15/03/2026**


---

## 🛠 Tech Stack
- **Backend:** Laravel 12 (PHP 8.5)
- **Frontend:** Vue 3 + Vite
- **Database:** MySQL 8.4
- **Container:** Docker & Docker Compose

## CÀI ĐẶT PHẦN MỀM
- [X] [Docker và Docker Desktop](https://www.docker.com/)
- [X] [Git](https://git-scm.com/)
- [X] [PhpStorm](https://www.jetbrains.com/phpstorm/)
- [X] [PHP](https://www.php.net/)
- [X] [Composer](https://getcomposer.org/)
- [X] [NVM (Node Version Manager)](https://github.com/nvm-sh/nvm)

### Hướng dẫn cài đặt PHP

1. **Tải PHP phiên bản phù hợp**
    - Truy cập [https://windows.php.net/download/](https://windows.php.net/download/)
    - Tải phiên bản **PHP 8.5.0 VS17 x64 Non Thread Safe** - Zip file

2. **Giải nén và di chuyển**
    - Giải nén file zip vừa tải
    - Đổi tên thành `php-8.5.0`
    - Di chuyển thư mục PHP vào ổ C: `C:\php-8.5.0`

3. **Cấu hình biến môi trường**
    - Mở **View advance system setting** → **Environment Variables...**
    - Chọn Path trên khung User variables và nhấn **Edit...**
    - Click **New**
    - Thêm `C:\php-8.5.0`
    - Click **OK** để lưu

4. **Kiểm tra cài đặt PHP**
   ```cmd
   php -v
   ```

### Hướng dẫn cài đặt Composer

1. **Tải Composer**
    - Truy cập [https://getcomposer.org/download/](https://getcomposer.org/download/)
    - Tải **Composer-Setup.exe**

2. **Chạy trình cài đặt**
    - Chạy file **Composer-Setup.exe**
    - Chọn đúng đường dẫn PHP (`C:\php-8.5.0\php.exe`)
    - Hoàn tất cài đặt

3. **Kiểm tra cài đặt Composer**
   ```cmd
   composer -V
   ```

### Hướng dẫn cài đặt NVM và Node.js 22

1. **Tải NVM cho Windows**
    - Truy cập [https://github.com/coreybutler/nvm-windows/releases](https://github.com/coreybutler/nvm-windows/releases)
    - Tải file **nvm-setup.exe** từ phiên bản mới nhất

2. **Cài đặt NVM**
    - Chạy file **nvm-setup.exe**
    - Làm theo hướng dẫn để hoàn tất cài đặt
    - Khởi động lại Terminal/Command Prompt

3. **Kiểm tra cài đặt NVM**
    - Xóa các bản Node.js cũ:
        + Vào Control Panel -> Uninstall a program.
        + Tìm Node.js và chọn Uninstall.
        + Xóa các thư mục còn sót lại (nếu có) tại: C:\Program Files\Nodejs và C:\User\tên user\%AppData%\Local hoặc Roaming\npm hoặc npm-cache.
   ```cmd
   nvm version
   ```

4. **Cài đặt Node.js phiên bản 24**
   ```cmd
   nvm install 24
   ```

5.1 **Sử dụng Node.js phiên bản 24** (có ghi bản node nào sau khi cày về, ví dụ: nvm use 24.14.0)
   ```cmd
   nvm use 24.14.0
   ```
5.2 **Kiểm tra các phiên bản Node đã cài**
    cmd
    nvm list (dấu * sẽ hiện ngay bản node đang sử dụng)
6. **Kiểm tra phiên bản Node.js**
   ```cmd
   node -v
   npm -v
   ```

> **Lưu ý:** Nếu gặp lỗi phân quyền, hãy chạy Terminal/Command Prompt với quyền Administrator.

---

## 📥 Hướng dẫn cài đặt ban đầu (Dành cho Member)

Sau khi `git clone` project về thì làm theo đúng thứ tự các bước sau để tránh lỗi môi trường:

### 1. Khởi động Docker
Tại thư mục gốc dự án, mở Terminal (PowerShell/CMD) và chạy:
```cmd
docker compose up -d
```
### 2. Thiết lập Backend (Laravel)
Di chuyển vào thư mục backend:
```cmd
cd backend
composer install --ignore-platform-reqs
cp .env.example .env
```
#### Cấu hình file .env:
Mở file .env vừa tạo, tìm đến phần Database và sửa lại chính xác như sau (nhớ xóa dấu # ở đầu dòng):
```cmd
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=english_crm
DB_USERNAME=root
DB_PASSWORD=root
```
Sau đó chạy các lệnh kích hoạt:
```cmd
php artisan key:generate
php artisan migrate
php artisan serve
```
Kiểm tra tại: http://127.0.0.1:8000
### 3. Thiết lập Frontend (Vue 3)
Tại thư mục backend, di chuyển sang thư mục frontend:
```cmd
cd ../frontend
npm install --legacy-peer-deps
npm run dev
```
Kiểm tra tại: http://localhost:5173

---

## Cập nhật thư viện sau khi `git clone` về máy:
```cmd
npm install
```