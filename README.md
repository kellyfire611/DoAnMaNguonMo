# DoAnMaNguonMo
Đồ án Mã nguồn mở Thầy Nghị

# Cách chạy source
## Cần có các chương trình sau:
- PHP 7+
- Composer (https://getcomposer.org/Composer-Setup.exe)
- IDE có thể xài bất kỳ. Gợi ý: Visual Studio Code (https://code.visualstudio.com/)
- Git for windows (https://git-scm.com/download/win)

## Clone source về
- Chạy câu lệnh sau để get source mới nhất từ GitHub về:
```
git clone https://github.com/kellyfire611/DoAnMaNguonMo.git
```

## Restore database
Chạy file script `db/` để tạo database

## Cấu hình
- Hiệu chỉnh file `.env` với các thông số kết nối DB máy của mỗi người. Hiện tại là MySql, sẽ tìm cách chỉnh về MongoDB sau ;)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=doanmanguonmo
DB_USERNAME=root
DB_PASSWORD=root
```

## Chạy web
Chạy câu lệnh sau:
```
php artisan serve
```
Mở web với đường dẫn http://localhost:8000/

## Tài khoản Admin
Tài khoản truy cập mặc định là: `admin@manguonmo.com/123456`
