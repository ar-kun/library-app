## Prasyarat
Sebelum memulai instalasi, pastikan komputer Anda telah memenuhi prasyarat berikut:

- PHP >= 8.1
- Composer
- MySql

## Langkah-langkah Instalasi

1. **Clone Repositori**

   ```bash
   git clone https://github.com/ar-kun/library-app.git
   ```

2. **Pindah ke Direktori Proyek**

   ```bash
   cd library-app
   ```

3. **Instal Dependensi**

   ```bash
   composer install
   ```

4. **Salin Berkas Konfigurasi**

   ```bash
   cp .env.example .env
   ```

   Sesuaikan informasi konfigurasi database di dalam berkas `.env`.

5. **Buat Key Aplikasi**

   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database**

   ```bash
   php artisan migrate
   ```

7. **Buat Seeder Data Awal**
   ```
   php artisan db:seed
   ```

8. **Jalankan Server Lokal**

    ```bash
    php artisan serve
    ```

Proyek akan diakses pada `http://localhost:8000` / `http://127.0.0.1:8000` secara default.
