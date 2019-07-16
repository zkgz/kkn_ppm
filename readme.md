## Aturan
- Jangan upload .env

## Tambahan Deo 15/07 - 22:40
Tambahan login dan register. Untuk menggunakan, cukup dengan menjalankan :

> php artisan make:auth

Maka semua akan dibuatkan secara otomatis oleh Laravel.

## Tambahan Deo 15/07 - 22:45
Fitur lupa password, dengan menggunakan [mailtrap.io](https://mailtrap.io/.),
daftar akun, lalu masuk di **Demo Inbox**

Lalu edit .env di bagian email berdasarkan data di mailtrap.io,

```
SMTP
Host: smtp.mailtrap.io
Port: 25 or 465 or 587 or 2525
Username: 95c0f88498f520
Password: 5bd38a71c3586a
Auth: PLAIN, LOGIN and CRAM-MD5
TLS: Optional (STARTTLS on all ports)
```

Menjadi :

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=2445212462a6b8
MAIL_PASSWORD=3db82773467523
MAIL_ENCRYPTION=null
```

## Tambahan Deo 15/07 - 23:13
Memindahkan semua view restoran kedalam satu folder

## Update Deo 16/07 12:00
Tambahkan detail per-items, tambahkan lokasi map.

## Update Deo 16/07 - 14:58
Menambahkan pagination,
perubahan menjadi :
````
$restaurant = Restaurant::paginate(25);
````