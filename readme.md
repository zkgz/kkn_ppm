## Aturan
- Jangan upload .env
- Jangan upload vendor folder

## Tambahan Deo 18/07 - 16:44
- Tambahkan asc dan desc ke menu index

## Tambahan Deo 18/07 - 15:02
- Redirect ke halamana detail item setelah edit disimpan.

## Tambahan Deo 18/07 - 11:52
- Tambahkan WYSWYG di menu informasi

## Tambahan Deo 18/07 - 11:23
- Merubah tampilan edit menjadi seperti tampilan create
- Menambahkan maps di menu edit
- Menambahkan edit koordinat dari maps

## Tambahan Deo 18/07 - 11:06
- Tambahkan menu back to home

## Tambahan ZKGZ
- fixed issue #5

## Tambahan ZKGZ 18/07 - 05:30
- fixed issue #6

## Tambahan ZKGZ 18/07 - 04:15
- fixed issue #4

## Tambahan ZKGZ 18/07 - 02:00
- fixed issue #7
- Added 'View Details' in outlet pin

## Tambahan Deo 17/07 - 19:00
- Ubah tampilan create
- Tambahkan marker
- Tambahkan clik to add marker di maps utama
- Tambahkan maps di menu create
- Lokasi lat, long bisa langsung diubah lewat maps di menu create

## Tambahan Deo 17/07 - 14:22
Ubah form edit menggunakan LaravelCollective

## Tambahan ZKGZ 17/07 - 14:08
- Changed all submit button to Form::button()

## Tambahan Deo 17/07 - 13:52
Ubah kembali tombol, dari

```
<button type="submit" class="btn btn-primary">Simpan</button>
```

ke 

```
{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
```

## Tambahan Deo 17/07 - 13:02
Perubahan lokasi tombol **Edit**, **Delete** dan **Back to index** di detail.
Dari horizontal menjadi urutan vertikal.

## Tambahan Deo 17/07 - 12:47
Ubah bentuk tombol submit create, dari 

```
Form::submit('simpan');
```

menjadi :

```
<button type="submit" class="btn btn-primary">Simpan</button>
```

## Tambahan Deo 17/07 - 12:00
- Tambahkan maps setiap items

## Tambahan ZKGZ 17/07 - 08:58
- Major Bug Fixes
- Added dependency LaravelCollective to composer.json
- Replaced old hardcoded routes with resource routes
- Renamed view files so that they match with resource routes
- Changed 'add()' function from controllers to 'create()'
- Changed 'delete()' function from controllers to 'destroy()'
- Redirected text links to resource routes
- Replaced old form with form helper from LaravelCollective
- Added action table head in pbb index view
- Fixed typos

## Tambahan Baraq PBB 16/07 - 21:25
Mohon bantuannya masih newbie
Tambahan fitur pbb. Ada error pada route mohon bimbingannya senpai

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
