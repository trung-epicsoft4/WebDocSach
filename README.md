Cách config project:

- Bước 1: clone project về máy
- Bước 2: cd vào thư mục BTL
- Bước 3: chạy lệnh: composer install
- Bước 4: Mở project trong visual studio code, nhân đôi file .env.emxample và sửa thành .env
- Bước 5: chạy lệnh: php artisan key:generate
- Bước 6: chạy lệnh: php artisan migrate và php artisan db:seed
- Bước 7: chạy lệnh: npm install
- Bước 8: chạy lệnh: npm run build
- Bước 9: chạy lệnh: php artisan serve
-> Mở bằng link được hiện trên màn hình sau khi chạy lệnh php artisan serve

// Tạo bảng: php artisan make:migrate TenBang;
// Tạo model: php artisan make:model TenMode;
// Tạo Controller theo kiểu resource: php artisan make:controller TenController --resource
