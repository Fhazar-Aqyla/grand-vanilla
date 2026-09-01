# 🚀 Deploy Grand Vanilla ID — WordPress Production Runbook

Runbook lengkap untuk men-deploy **Grand Vanilla ID (WordPress Custom Theme)** ke server produksi (**cPanel Shared Hosting / Hostinger / VPS**).

- **Domain Utama**: `https://grandvanilla.id` (atau `https://www.grandvanilla.id`)
- **Admin Panel**: `https://grandvanilla.id/wp-admin/`
- **Database**: MySQL / MariaDB (`grand_vanilla_wp`)
- **Web Server**: Apache / LiteSpeed / Nginx dengan PHP 8.0+

---

## 📑 Daftar Isi

1. [Prasyarat Sebelum Deploy](#1-prasyarat-sebelum-deploy)
2. [Setup Database & User di Hosting](#2-setup-database--user-di-hosting)
3. [Upload Berkas Proyek](#3-upload-berkas-proyek)
4. [Konfigurasi `wp-config.php` Produksi](#4-konfigurasi-wp-configphp-produksi)
5. [Pengaturan `.htaccess` & Pretty Permalinks](#5-pengaturan-htaccess--pretty-permalinks)
6. [Instalasi SSL / HTTPS](#6-instalasi-ssl--https)
7. [Checklist Pasca Deploy](#7-checklist-pasca-deploy)

---

## 1. Prasyarat Sebelum Deploy

Pastikan hal-hal berikut sudah siap:
- [ ] Domain `grandvanilla.id` sudah mengarah ke IP hosting / nameserver (DNS Propagation selesai).
- [ ] PHP Version di MultiPHP Manager diset ke **PHP 8.2** atau **PHP 8.3**.
- [ ] Ekstensi PHP aktif: `mysqli`, `curl`, `gd`, `mbstring`, `xml`, `zip`, `fileinfo`.
- [ ] Backup berkas lokal dan database export `grand_vanilla_wp.sql`.

---

## 2. Setup Database & User di Hosting

1. Masuk ke **cPanel** &rarr; **MySQL Database Wizard**.
2. Buat database baru (misal: `u12345_grandvanilla`).
3. Buat database user baru dengan password yang kuat dan aman.
4. Berikan hak akses **ALL PRIVILEGES** ke user tersebut.
5. Masuk ke **phpMyAdmin** di hosting, pilih database baru, lalu klik tab **Import** dan upload file `grand_vanilla_wp.sql` yang telah diexport dari database lokal Laragon.
6. Pada tabel `wp_options`, pastikan baris `siteurl` dan `home` bernilai `https://grandvanilla.id`.

---

## 3. Upload Berkas Proyek

1. Arsipkan berkas proyek WordPress lokal ke dalam file zip (tanpa folder `_archive_laravel` jika tidak diperlukan di server publik).
2. Di **cPanel File Manager**, buka direktori root domain (`public_html`).
3. Upload file zip dan lakukan **Extract**.
4. Pastikan folder `wp-admin`, `wp-includes`, `wp-content`, dan file `index.php`, `wp-load.php`, `wp-config.php` berada tepat di root `public_html`.

---

## 4. Konfigurasi `wp-config.php` Produksi

Edit file `wp-config.php` di hosting dan sesuaikan dengan kredensial hosting:

```php
// ** Database settings untuk Server Produksi ** //
define( 'DB_NAME', 'u12345_grandvanilla' );
define( 'DB_USER', 'u12345_gvuser' );
define( 'DB_PASSWORD', 'PASSWORD_PRODUKSI_YANG_KUAT' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// Nonaktifkan debug mode di produksi
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

// Security & Filesystem
define( 'DISALLOW_FILE_EDIT', true );
define( 'FS_METHOD', 'direct' );
```

---

## 5. Pengaturan `.htaccess` & Pretty Permalinks

Pastikan file `.htaccess` di root `public_html` berisi konfigurasi rewrite WordPress standar:

```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
```

---

## 6. Instalasi SSL / HTTPS

1. Di cPanel, buka menu **SSL/TLS Status** atau **Let's Encrypt SSL**.
2. Klik **Run AutoSSL** untuk domain `grandvanilla.id` dan `www.grandvanilla.id`.
3. Pastikan gembok hijau HTTPS aktif saat membuka `https://grandvanilla.id`.

---

## 7. Checklist Pasca Deploy

- [ ] Homepage dapat dibuka dengan sempurna di `https://grandvanilla.id`.
- [ ] Seluruh 34 aset gambar foto vanili muncul dengan tajam tanpa broken image.
- [ ] Login ke `https://grandvanilla.id/wp-admin/` berfungsi normal.
- [ ] Tombol WhatsApp (`+62 812-2697-4731`) berfungsi dan membuka chat dengan prefill teks inquiry.
- [ ] Formulir kontak B2B dapat mengirim pesan.
- [ ] Halaman About Us, Products, Detail Products, Gallery, dan Blog dapat diakses dengan respons 200 OK.
