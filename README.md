# LaundryCare - Web Framework Project

## Anggota Kelompok:
- Aisy Fillah Zuhdi : 2410120004
- Siti Nurohmah Azzhara : 2410120001

## Deskripsi
Proyek aplikasi web LaundryCare berbasis Laravel dengan Blade Template Engine dan Bootstrap 5.

## Setup Database

1. Buat database dengan nama `wf20261_laundrycare` (MySQL/MariaDB):

   ```sql
   CREATE DATABASE wf20261_laundrycare CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

2. Salin `.env.example` menjadi `.env`, lalu atur bagian database:

   ```
   DB_CONNECTION=mariadb
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=wf20261_laundrycare
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. Jalankan:

   ```
   composer install
   npm install
   php artisan key:generate
   php artisan migrate
   ```

4. Jalankan aplikasi dengan dua terminal: `php artisan serve` dan `npm run dev`.

Akun admin dibuat manual dengan mengubah kolom `role` menjadi `admin` lewat `php artisan tinker`.