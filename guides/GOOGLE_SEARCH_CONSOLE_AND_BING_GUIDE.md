# 🔍 Panduan Google Search Console & Bing Webmaster Tools — Grand Vanilla ID

Panduan lengkap untuk mendaftarkan dan memverifikasi website **Grand Vanilla ID** (`https://grandvanilla.id`) pada mesin pencari internasional (**Google Search & Bing**), serta mengirimkan peta situs (*sitemap*) agar seluruh katalog produk vanili cepat terindeks oleh buyer luar negeri.

---

## 🎯 Target Pengindeksan & Kata Kunci Utama
1. `Indonesian Vanilla Beans Exporter`
2. `Vanilla Planifolia Gourmet Grade A Supplier`
3. `Indonesian Tahitensis Vanilla Pods Wholesale`
4. `Bulk Vanilla Extract & Powder Indonesia`
5. `Grand Vanilla Indonesia Jember`

---

## 🚀 1. Setup Google Search Console

1. Buka [Google Search Console](https://search.google.com/search-console).
2. Login dengan email resmi `grandvanilla@gmail.com`.
3. Pilih metode penambahan properti: **Domain** &rarr; masukkan `grandvanilla.id`.
4. Salin record verifikasi **TXT** yang diberikan oleh Google.
5. Masuk ke cPanel / DNS Manager domain Anda, buat DNS Record:
   - **Type**: `TXT`
   - **Name**: `@` (atau `grandvanilla.id`)
   - **Value**: `google-site-verification=XXXXXXXXXXXXXXXXXXXX`
6. Klik **Verify** di Google Search Console.
7. Di menu sebelah kiri, buka **Sitemaps** &rarr; masukkan URL sitemap WordPress:
   - `wp-sitemap.xml` (atau `sitemap_index.xml` jika menggunakan plugin SEO)
8. Klik **Submit**.

---

## 🌐 2. Setup Bing Webmaster Tools

1. Buka [Bing Webmaster Tools](https://www.bing.com/webmasters).
2. Login dengan akun Microsoft / Google.
3. Gunakan opsi **Import from Google Search Console** (metode termudah dan tercepat).
4. Bing akan otomatis mengimpor verifikasi domain dan URL sitemap dari Google Search Console tanpa perlu konfigurasi DNS ulang.
