## Under Construction
Please wait while we are finishing our work

## Aturan
- Jangan upload .env
- Jangan upload vendor folder

## Documentations
- Readme formatting docs from [Github](https://help.github.com/en/articles/basic-writing-and-formatting-syntax)
- Laravel documentation from [Laravel](https://laravel.com/docs/5.8)
- Bootstrap 4 documentation from [Bootstrap](https://getbootstrap.com/docs/4.1/getting-started/introduction)
- Form documentation from [LaravelCollective](https://github.com/LaravelCollective/docs/blob/5.6/html.md)
- Datatable documentation from [Datatable](https://datatables.net/examples/index)
- Leaflet documentation from [Leaflet](https://leafletjs.com/reference-1.5.0.html)

## Tambahan Deo 19/07 - 17:33
- Tambahkan type ke database, jalankan
> php artisan migrate

## Tambahan ZKGZ 19/07 16:10
- Added Documentation section to readme
- Added dependency `doctrine/dbal`, run `composer install`
- Dropped restaurants and earthnbuildings table
- Added taxpayers table, run `php artisan migrate`
- Fixed Taxpayer Model
- Major bug fix


## Tambahan Deo 19/07 14:51
- Delete PBB
- Sesuaikan beberapa nama

## Tambahan Deo 19/07 14:32
- Satukan semua pajak menjadi **Taxpayer**

Catatan :
- Ubah nama database menjadi 'taxpayers'

## Tambahan ZKGZ 19/07 04:30
- Map now automatically centers based on object's latitude and latitude
- Code indent cleaning
- Put leaflet map scripts to inc folder
- Minor bug fix

## Tambahan ZKGZ 18/07 18:50
- Fixed Footer thingy
- Added map marker .png to assets
- Minor bug fix

## Tambahan Deo 18/07 - 17:18
- Ubah asc/desc dari kyslik ke [DataTables](https://datatables.net/)
- Sesuaikan scrip dan link css dari footer ke header.

## Tambahan Deo 18/07 - 16:44
- Tambahkan asc dan desc ke menu index. Tambahkan ke composer.json

```
{
    "require": {
        "kyslik/column-sortable": "5.8.*"
    }
}
```

kemudian :
> composer update

## Tambahan Deo 18/07 - 15:02
- Redirect ke halamana detail item setelah edit disimpan.

## Tambahan Deo 18/07 - 11:52
- Tambahkan WYSWYG di menu informasi

## Tambahan Baraq 18/07 - 11:03
- Tampah dan modif popup content di index 
- tambah "popupContent += '<br><a href="{{ route('pbb.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add new PBB here</a>';"

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
