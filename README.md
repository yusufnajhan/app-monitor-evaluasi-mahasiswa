# APP MONITORING DAN EVALUASI MAHASISWA

Aplikasi untuk monitoring dan evaluasi akademik mahasiswa oleh dosen wali.

**SEDANG DALAM PENGEMBANGAN**

# SETUP SISTEM AWAL

### SETUP LARAVEL

1. Clone project ini ke direktori Anda
2. Pastikan telah meng-install Laravel secara global
3. Pindah ke folder project menggunakan

    ```
    cd <proyek-Anda>
    ```

4. Install composer dengan kode berikut

    ```
    composer install
    ```

5. Salin file `.env.example` dan ubah dengan nama `.env`. Gunakan kode ini agar lebih mudah

    ```
    cp .env.example .env
    ```

6. Buka file `.env` dan sesuaikan konfigurasi database Anda, seperti mengubah nama database pada `DB_DATABASE`, username pada `DB_USERNAME`, dan password pada `DB_PASSWORD`.

7. Jalankan perintah ini di terminal

    ```
    php artisan key:generate
    ```

8. Jalankan perintah ini di terminal

    ```
    php artisan migrate:fresh --seed
    ```

### SETUP TAILWIND

1. Jalankan perintah ini di terminal
    ```
    npm install
    ```

### MENJALANKAN APLIKASI

1. Nyalakan Apache dan MySQL pada XAMPP

2. Buka 2 terminal di direktori project

3. Jalankan perintah ini di terminal pertama, **JANGAN TUTUP TERMINAL**

    ```
    php artisan serve
    ```

4. Jalankan perintah ini di terminal kedua, **JANGAN TUTUP TERMINAL**

    ```
    npm run dev
    ```

5. Buka tautan yang dibuat setelah menjalankan `php artisan serve`
