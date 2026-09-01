# 💰 Panduan Google AdSense / Monetisasi — Grand Vanilla ID

Dokumen ini berisi panduan untuk menyiapkan dan menempatkan kode integrasi Google AdSense pada website **Grand Vanilla ID** (`https://grandvanilla.id`) jika manajemen berencana menampilkan iklan editorial pada artikel blog edukasi industri vanili (`/articles/`).

---

## 📌 Ketentuan & Kelayakan Website B2B
- Website utama Grand Vanilla ID berfokus pada **B2B Lead Generation & Export Wholesale**.
- Iklan hanya direkomendasikan ditempatkan pada halaman artikel edukasi publik (`/articles/` dan single post), bukan pada halaman katalog produk atau form inquiry transaksi.

---

## 🛠️ Langkah Integrasi di Custom Theme

1. Masuk ke [Google AdSense](https://adsense.google.com/) dan daftarkan domain `https://grandvanilla.id`.
2. Dapatkan Publisher ID Anda (contoh: `ca-pub-XXXXXXXXXXXXXXXX`).
3. Sisipkan tag verifikasi AdSense pada `header.php` di dalam `<head>`:

```php
<!-- Google AdSense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-XXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
```

4. Simpan perubahan dan tunggu proses review kelayakan dari Google (biasanya 24–48 jam).
