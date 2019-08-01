<h1 align="center">
    KKN PPM Pemetaan Spasial Potensi Pendapatan Daerah Kota Parepare
</h1>

## Installation
- Run `composer install`
- Rename `.envexample` to `.env` and configure it
- Run `php artisan migrate`

## Documentations
- Readme formatting docs from [Github](https://help.github.com/en/articles/basic-writing-and-formatting-syntax)
- Laravel documentation from [Laravel](https://laravel.com/docs/5.8)
- Bootstrap 4 documentation from [Bootstrap](https://getbootstrap.com/docs/4.1/getting-started/introduction)
- Form documentation from [LaravelCollective](https://github.com/LaravelCollective/docs/blob/5.6/html.md)
- Datatable documentation from [Datatable](https://datatables.net/examples/index)
- Leaflet documentation from [Leaflet](https://leafletjs.com/reference-1.5.0.html)
- Chart.js documentation from [Chart.js](https://www.chartjs.org/docs/latest/)
- Numeral.js documentation from [Numeral.js](https://http://numeraljs.com/)
- jquery Mask documentation from [jQuery Mask Plugin](https://github.com/igorescobar/jQuery-Mask-Plugin)

<h1 align="center">
    Changelog
</h1>

## Tambahan ZKGZ 02/08 - 06:42
- Fixed potensi pajak per bulan not showing correct amount in hover info

## Tambahan ZKGZ 28/07 - 08:30
- Clearing migrations - please delete your tables
- Changed information form to be optional/nullable

## Tambahan ZKGZ 28/07 - 4:15
- Removed under construction section from readme
- Added installation section to readme
- Added .envexample

## Tambahan ZKGZ 27/07 - 18:35
- Added Charts to stats page

## Tambahan Deo 27/07 - 12:13
- Perubahan tulisan.
- Ganti ke font awal
- Ganti Judul

## Tambahan ZKGZ 27/07 - 08:25
- Fixed issue #15 and #16

## Tambahan ZKGZ 27/07 - 07:15
- Updated chart for region hover info

## Tambahan ZKGZ 26/07 - 21:20
- Added chart update to hover info

## Tambahan ZKGZ 26/07 - 17:20
- Added import view

## Tambahan ZKGZ 26/07 - 15:30
- Added potensi pajak per bulan to hover info

## Tambahan ZKGZ 26/07 - 15:12
- Refixed issue #9

## Tambahan ZKGZ 26/07 - 15:08
- Updated `.gitignore`
- Fixed geojson typo for some region
- Automatically fill region form if you are creating taxpayers from the welcome view

## Tambahan Deo 26/06 - 15:01
- Fix add images in create.blade.php
- Add footer text

## Tambahan Deo 26/07 - 14:46
- Fix some bugs (gestureHandling)
- Change form size (create/edit)
- Change "Tambahkan Restoran Baru" to "New Taxpayer"

## Tambahan ZKGZ 26/07 - 10:30
- Added more marker color for each type

## Tambahan ZKGZ 26/07 - 10:12
- Changed marker color for each type

## Tambahan ZKGZ 26/07 - 10:00
- Added hover info of markers to welcome view (WIP)
- Added more hover info of layers to welcome view (WIP)

## Tambahan ZKGZ 26/07 - 08:30
- Added hover info of layers to welcome view (WIP)
- Changed import order

## Tambahan ZKGZ 26/07 - 06:15
- Added import feature (`/taxpayer/import`)
- Fixed taxpayer index view only showing maximum of 25 rows
- Taxpayer index view now shows region instead of address

## Tambahan ZKGZ 25/07 - 22:00
- Changed unlabeled map type
- Moved `<style>` elements from welcome view to footer
- Added dependency `maatwebsite/excel` (run `composer install`)

## Tambahan ZKGZ 25/07 - 21:15
- Added `chart.js` CDN
- Added `chart.js` documentation to Documentations section
- Added simple graph to welcome view

## Tambahan ZKGZ 25/07 - 19:40
- Added layer group for each type of marker
- Changed legend's color hue
- Added toggle for markers

## Tambahan Deo 15/07 - 17:34
- Add minZoom
- Change welcome view

## Tambahan ZKGZ 25/07 - 08:00
- Refactor leaflet directories
- Minor bug fix

## Tambahan ZKGZ 25/07 - 02:00
- Added shadow map marker
- Added custom icons

## Tambahan ZKGZ 24/07 - 16:30
- Changed map type to non-labeled map
- Added Legend to map
- Added Hover effects to map

## Tambahan ZKGZ 24/07 - 15:30
- Fixed issue #9

## Update Deo 24/07 - 12:48
- Update maps from `https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png` ke `https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png`

## Tambahan ZKGZ 24/07 - 06:00
- Rescaled min-height of `<main>`
- Fixed Create view bug
- Changed Welcome view route to HomeController
- Map regions will now automatically change color based on their own pajak_per_bulan

## Tambahan Deo 23/07 - 20:33
- Fix footer bug.
- Fix TaxpayerControlle@stat bug when no data in database.

## Tambahan ZKGZ 23/07 - 14:20
- Changed `strict` value from `config/database.php` to `true`
- Added stats page
- Set default value for longitude and latitude form in create view

## Tambahan Deo 22/07 - 11:51
- Add Gesture Controller to welcome.blade.php

## Tambahan ZKGZ 22/07 - 11:00
- Changed region (kelurahan) form to dropdown list
- Added region to taxpayer details (show) view

## Tambahan ZKGZ 22/07 - 10:15
- Fixed issue #11
- Added default value for pajak_per_bulan and potensi_pajak_per_bulan columns
- Minor bug fix

## Tambahan ZKGZ 22/07 - 09:10
- Removed Aturan section in Readme
- Changed photo column to be nullable (run `php artisan migrate`)


## Tambahan Deo 21/07 - 18:34
- Add semua js dan css ke folder public
- Ubah link js dan css menjadi link local
- Rapikan beberapa koding

## Tambahan ZKGZ 20/07 - 01:10
- Removed GET elements from taxpayer routes
- Minor bug fix

## Tambahan Deo 19/07 - 17:33
- Tambahkan type ke database, jalankan :
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
