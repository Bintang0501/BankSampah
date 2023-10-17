Panduan Aplikasi
1. Buka repository yang telah dikirimkan
2. Kemudian, buka CMD dan buat folder baru
3. Jika sudah, masuk ke folder tersebut, kemudian ketikkan "git clone https://github.com/Bintang0501/BankSampah.git"
4. Tunggu sampai selesai
5. Apabila sudah selesai, silahkan ketikkan cd BankSampah
6. Jika sudah di folder BankSampah, ketikkan composer install
7. Tunggu, kemudian rename file .env.example menjadi .env
8. Kembali ke cmd, kemudian ketikkan php artisan key:generate
9. Jika sudah, buat database baru di phpmyadmin atau yang lainnya, example : db_bank_sampah
10. Lalu, kembali ke file .env , ganti line 14 dengan nama database yang telah dibuat.
    Note : "Sesuaikan username dan password XAMPP nya untuk line 15 dan 16"
11. Jika sudah, kembali ke CMD, lalu ketikkan php artisan migrate:fresh --seed
12. Jika sudah semua, ketikkan php artisan serve pada CMD.
13. Aplikasi sudah berhasil dijalankan.


-----------------
NOTE : AKUN LOGIN :
Admin : 
* Email : admin@gmail.com
* Password : administrator
-----------------