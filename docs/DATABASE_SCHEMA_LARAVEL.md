# 🌿 Dokumentasi & Skema Database: Grand Vanilla ID

> Sistem CMS & Company Profile B2B Export untuk komoditas vanili Indonesia, diadaptasi dan disederhanakan (*clean, secure & lean*) dari arsitektur **`brava-cms`**.

---

## 📑 Daftar Isi

1. [Ringkasan Arsitektur & Fitur Utama](#1-ringkasan-arsitektur--fitur-utama)
2. [Fitur Keamanan: Secret Admin Route (.env)](#2-fitur-keamanan-secret-admin-route-env)
3. [Manajemen User & Role (Admin & Staff)](#3-manajemen-user--role-admin--staff)
4. [Tabel `users` (Admin & User Management)](#4-tabel-users)
5. [Tabel `products` (Katalog Produk & Spesifikasi B2B)](#5-tabel-products)
6. [Tabel `galleries` (Galeri Dokumentasi Panen & Curing)](#6-tabel-galleries)
7. [Tabel `inquiries` (B2B Export Leads & Form Kontak)](#7-tabel-inquiries)
8. [Tabel Pendukung (Settings, Page SEO, Blogs, Media, Activity Logs)](#8-tabel-pendukung)
9. [Struktur Routing Public & Admin](#9-struktur-routing-public--admin)
10. [Panduan Instalasi & Menjalankan Project](#10-panduan-instalasi--menjalankan-project)

---

## 1. Ringkasan Arsitektur & Fitur Utama

Sesuai kebutuhan bisnis **Grand Vanilla (B2B Vanilla Exporter)**:

- ✂️ **`hs_code` & `origin` dieliminasi dari kolom terpisah**: Informasi asal panen (*Origin*) dimasukkan secara dinamis di dalam JSON **`characteristics`** (contoh: `Origin: Bali & Papua`).
- ✂️ **`excerpt` dieliminasi**: Langsung menggunakan **`description`** untuk konten produk.
- ✂️ **`is_featured` dieliminasi**: Di homepage, 3 produk unggulan diambil otomatis berdasarkan urutan **`sort_order` ASC** (`Product::active()->take(3)->get()`).
- 🖼️ **Manajemen Foto Produk**:
  - **Cover Photo**: Kolom `photo` (dipilih dari Media Picker).
  - **Detail Photos (Maksimal 4)**: Menggunakan relasi **Polymorphic `$product->media()`** ke tabel `media` dengan indikator *loading spinner* animasi saat upload AJAX.
- 🔒 **Secret Admin Route**: URL login panel admin disembunyikan dan dapat dikonfigurasi bebas via `.env`.
- 👥 **User Management**: Super Admin dapat mengelola akun admin/staff, reset password, dan membatasi hak akses.

---

## 2. Fitur Keamanan: Secret Admin Route (.env)

Route panel admin tidak menggunakan URL standar `/admin` untuk mencegah brute force dan scanning bot. URL admin dikonfigurasi melalui file `.env`:

```env
# Secret Admin Route Path (contoh: gv-panel, secure-admin, panel-ekspor, dsb.)
ADMIN_PATH=gv-panel
```

* **Mekanisme**:
  * `config/app.php` membaca `'admin_path' => env('ADMIN_PATH', 'admin')`.
  * `routes/admin.php` mengelompokkan seluruh route admin di bawah prefix tersebut.
  * Jika pihak luar mencoba mengakses `/admin` atau URL sembarangan, server akan mengembalikan **404 Not Found** (bukan redirect login), sehingga URL panel admin tidak terdeteksi.

---

## 3. Manajemen User & Role (Admin & Staff)

Sistem otentikasi mendukung 3 level akses berbasis PHP 8.2 Backed Enum (`App\Enums\UserRole`):

1. **`super_admin`**: Akses tak terbatas (Recycle Bin, Activity Logs, User Management, Global Settings).
2. **`admin`**: Mengelola operasional harian (Produk Vanilla, Galeri Foto, B2B Inquiries, Artikel Blog).
3. **`staff`**: Akses terbatas untuk input artikel dan upload media.

### Fitur User Management:
* List user dengan badge role dan indikator akun aktif/nonaktif.
* Form pendaftaran user baru (`name`, `email`, `role`, `password`, `is_active`).
* Edit user & penggantian role.
* Reset password instan oleh Super Admin.
* **Proteksi Akun**: Akun Super Admin yang sedang aktif tidak dapat menghapus atau menonaktifkan dirinya sendiri, dan akun Super Admin utama tidak dapat terhapus jika merupakan satu-satunya akun Super Admin.

---

## 4. Tabel `users`

| Kolom | Tipe Data | Nullable | Default | Keterangan |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `bigIncrements` | ❌ | - | Primary Key |
| `name` | `string(255)` | ❌ | - | Nama lengkap user / administrator |
| `email` | `string(255)` | ❌ | - | Email unik untuk login |
| `role` | `string(20)` | ❌ | `'admin'` | Enum role: `super_admin`, `admin`, `staff` |
| `is_active` | `boolean` | ❌ | `true` | Status izin login |
| `avatar` | `string(255)` | ✅ | `NULL` | Foto profil admin |
| `password` | `string(255)` | ❌ | - | Hashed password |
| `email_verified_at` | `timestamp` | ✅ | `NULL` | Tanggal verifikasi email |
| `remember_token` | `string(100)` | ✅ | `NULL` | Remember token session |
| `created_at` / `updated_at` | `timestamp` | ✅ | `NULL` | Timestamps |

---

## 5. Tabel `products`

Tabel khusus katalog komoditas vanili dan data spesifikasi laboratorium.

| Kolom | Tipe Data | Nullable | Default | Keterangan & Format Data |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `bigIncrements` | ❌ | - | Primary Key |
| `name` | `string(255)` | ❌ | - | Nama Produk (*Planifolia Gourmet Vanilla Beans*) |
| `slug` | `string(255)` | ❌ | - | URL Slug unik (*planifolia-gourmet-vanilla-beans*) |
| `photo` | `string(255)` | ✅ | `NULL` | Cover Photo utama (dari Media Picker) |
| `description` | `longText` | ✅ | `NULL` | Deskripsi lengkap profil aroma & kualitas produk |
| `varieties` | `json` | ✅ | `NULL` | Array variasi grade: `["Gourmet Grade A", "Extraction Grade", "Bulk Cuts"]` |
| `characteristics` | `json` | ✅ | `NULL` | Key-value spesifikasi lab & origin: `[{"label": "Origin", "value": "Bali & Papua"}, {"label": "Vanillin", "value": "1.8% - 2.4%"}, {"label": "Moisture", "value": "28% - 33%"}, {"label": "Length", "value": "16 - 22 cm"}]` |
| `applications` | `json` | ✅ | `NULL` | Rekomendasi penggunaan: `[{"title": "Gourmet Bakery", "description": "Ideal for high-end pastries and gelato."}, {"title": "Pure Extraction", "description": "High vanillin yield for organic extract."}]` |
| `is_active` | `boolean` | ❌ | `true` | Status publikasi produk di website |
| `sort_order` | `integer` | ❌ | `0` | Urutan tampil katalog (urutan 1-3 tampil di Homepage) |
| `meta_title` | `string(255)` | ✅ | `NULL` | Custom SEO Meta Title Google |
| `meta_description`| `text` | ✅ | `NULL` | Custom SEO Meta Description |
| `og_image` | `string(255)` | ✅ | `NULL` | Gambar share sosial media |
| `created_at` / `updated_at` | `timestamp` | ✅ | `NULL` | Timestamps |
| `deleted_at` | `timestamp` | ✅ | `NULL` | Soft Deletes |

---

## 6. Tabel `galleries`

Dokumentasi visual perkebunan agroforestry, penjemuran matahari, curing tradisional, sortasi, dan packaging ekspor.

| Kolom | Tipe Data | Nullable | Default | Keterangan |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `bigIncrements` | ❌ | - | Primary Key |
| `title` | `string(255)` | ❌ | - | Judul Foto (*Traditional Sun Curing*) |
| `category` | `string(100)` | ✅ | `NULL` | Filter tahap proses: `Plantation`, `Harvesting`, `Curing & Drying`, `Grading & Quality`, `Packaging & Export` |
| `image_path` | `string(255)` | ❌ | - | Path file gambar di storage |
| `alt_text` | `string(255)` | ✅ | `NULL` | Alt text untuk SEO Image |
| `caption` | `text` | ✅ | `NULL` | Penjelasan aktivitas proses |
| `sort_order` | `integer` | ❌ | `0` | Urutan tampil foto |
| `is_active` | `boolean` | ❌ | `true` | Status aktif |
| `created_at` / `updated_at` | `timestamp` | ✅ | `NULL` | Timestamps |
| `deleted_at` | `timestamp` | ✅ | `NULL` | Soft Deletes |

---

## 7. Tabel `inquiries`

Menampung pesan penawaran, permintaan sampel, dan negosiasi ekspor dari calon buyer internasional via form kontak.

| Kolom | Tipe Data | Nullable | Default | Keterangan |
| :--- | :--- | :---: | :---: | :--- |
| `id` | `bigIncrements` | ❌ | - | Primary Key |
| `name` | `string(255)` | ❌ | - | Nama perwakilan buyer / pengimpor |
| `email` | `string(255)` | ❌ | - | Email bisnis buyer |
| `company` | `string(255)` | ✅ | `NULL` | Nama perusahaan pengimpor |
| `phone` | `string(50)` | ✅ | `NULL` | No. Telepon / WhatsApp buyer |
| `country` | `string(100)` | ✅ | `NULL` | Negara tujuan ekspor |
| `subject` | `string(255)` | ❌ | - | Topik (*Wholesale Bulk Inquiry, Sample Request, FOB/CIF Quote, etc.*) |
| `product_id` | `foreignId` | ✅ | `NULL` | Relasi ke `products.id` (nullable) |
| `message` | `text` | ❌ | - | Detail kebutuhan (volume kg/MT, destination port, spec) |
| `status` | `string(50)` | ❌ | `'new'` | Siklus status: `new`, `contacted`, `in_negotiation`, `closed`, `spam` |
| `ip_address` | `string(45)` | ✅ | `NULL` | IP Pengirim |
| `user_agent` | `text` | ✅ | `NULL` | User Agent / Browser |
| `created_at` / `updated_at` | `timestamp` | ✅ | `NULL` | Timestamps |

---

## 8. Tabel Pendukung

1. **`settings`**: Pengaturan global identitas perusahaan, alamat kantor pusat/pelabuhan ekspor, nomor WhatsApp, email ekspor, dan social media.
2. **`page_seos`**: Metadata SEO per halaman statis (`home`, `about`, `products`, `gallery`, `blog`, `contact`).
3. **`media`**: Sistem Media Picker polymorphic (menampung foto cover dan foto detail produk hingga 4 gambar).
4. **`blogs` & `categories`**: Publikasi artikel edukasi, tren pasar ekspor, dan panduan kualitas vanili.
5. **`activity_logs`**: Catatan audit log aktivitas admin saat menambah, mengubah, atau menghapus data sensitif.

---

## 9. Struktur Routing

### A. Public Routes (Company Profile Frontend)
* `GET  /` &rarr; Homepage (Hero, Value Props, Top 3 Products, Gallery Preview, CTA)
* `GET  /about` &rarr; Tentang Grand Vanilla (Filosofi Agroforestry & 4 Tahapan Protokol Kualitas)
* `GET  /products` &rarr; Katalog Produk Vanilla
* `GET  /products/{slug}` &rarr; Detail Spesifikasi Produk Lab, Grade, Aplikasi, & Galeri Foto
* `GET  /gallery` &rarr; Galeri Dokumentasi Foto (Filter Kategori Proses)
* `GET  /blog` &rarr; Daftar Artikel & Market Insights
* `GET  /blog/{slug}` &rarr; Single Artikel Blog
* `GET  /contact` &rarr; Halaman Form Inquiry Ekspor
* `POST /contact` &rarr; Submit Pesan/Inquiry (Dilengkapi Honeypot Anti-Spam)

### B. Admin Routes (`/{ADMIN_PATH}`)
* `GET  /{ADMIN_PATH}` &rarr; Dashboard Analytics & Statistik
* `RESOURCE /{ADMIN_PATH}/products` &rarr; CRUD Produk & Relasi Media Detail
* `RESOURCE /{ADMIN_PATH}/gallery` &rarr; CRUD Galeri Foto
* `GET|PUT|DELETE /{ADMIN_PATH}/inquiries` &rarr; Monitoring Leads Buyer & Update Status
* `RESOURCE /{ADMIN_PATH}/users` &rarr; User Management (Super Admin)
* `GET|PUT /{ADMIN_PATH}/users/{user}/password` &rarr; Reset Password User
* `RESOURCE /{ADMIN_PATH}/blogs` & `categories` &rarr; Manajemen Artikel
* `RESOURCE /{ADMIN_PATH}/media` &rarr; Media Manager & AJAX Upload
* `GET|PUT /{ADMIN_PATH}/page-seo` &rarr; Manajemen SEO Metadata
* `GET|PUT /{ADMIN_PATH}/settings` &rarr; Konfigurasi Profil Perusahaan
* `RESOURCE /{ADMIN_PATH}/trash` &rarr; Recycle Bin (Super Admin)
* `GET  /{ADMIN_PATH}/activity-logs` &rarr; Audit Trail Log (Super Admin)

---

## 10. Panduan Instalasi & Menjalankan Project

1. **Konfigurasi Environment**:
   Salin `.env.example` menjadi `.env` dan atur konfigurasi:
   ```env
   APP_NAME="Grand Vanilla ID"
   DB_DATABASE=grand_vanilla_id
   ADMIN_PATH=gv-panel
   ```

2. **Jalankan Migration & Seeder**:
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Akun default hasil seeder:*
   * **Super Admin**: `superadmin@grandvanilla.id` (password: `password`)
   * **Admin**: `admin@grandvanilla.id` (password: `password`)

3. **Build Frontend Assets**:
   ```bash
   npm run build
   ```

4. **Jalankan Test Suite**:
   ```bash
   php artisan test
   ```
