# 📖 Kamus Pengaturan & Konfigurasi — Grand Vanilla ID

Dokumen ini mendokumentasikan seluruh parameter pengaturan, kontak bisnis, dan opsi konfigurasi pada website **Grand Vanilla ID**.

---

## 🌿 1. Data Kontak Bisnis & Ekspor

| Kunci / Variabel | Nilai Standar | Keterangan & Lokasi Penggunaan |
| :--- | :--- | :--- |
| `COMPANY_NAME` | `Grand Vanilla Indonesia` | Nama resmi perusahaan di header, footer, & schema |
| `LOCATION_ADDRESS` | `Sumbersari 2 Street, Jember, East Java, Indonesia` | Alamat kantor pusat & fasilitas pengolahan di Jember |
| `EXPORT_HUBS` | `Jakarta (CGK) & Bali (DPS), Indonesia` | Hub kargo udara & laut untuk pengiriman internasional |
| `WHATSAPP_PRIMARY` | `+62 812-2697-4731` / `081226974731` | Nomor WhatsApp resmi admin ekspor (Faris Muafa) |
| `EMAIL_PRIMARY` | `grandvanilla@gmail.com` / `export@grandvanilla.id` | Email resmi penerimaan RFQ (Request For Quotation) |
| `INSTAGRAM_URL` | `https://instagram.com` | Profil media sosial resmi pada footer & halaman kontak |

---

## 🎨 2. Standar Palet Warna (Design System Tokens)

| Token CSS | Kode Warna Hex | Fungsi pada UI |
| :--- | :--- | :--- |
| `--color-dark-khaki` | `#363E19` | Tombol CTA utama, badge aktif, aksen brand |
| `--color-pitch-black` | `#0A0804` | Teks judul utama H1-H6, topbar, dan footer |
| `--color-parchment` | `#FBF7F4` | Background dasar halaman |
| `--color-warm-sand` | `#F3ECE6` | Background kartu, container seksi alternatif |
| `--color-border-light` | `#E7E6E6` | Garis pembatas kartu dan header |

---

## 🎛️ 3. Pengaturan WordPress Customizer (`Appearance -> Customize`)

Pengaturan ini dapat disunting langsung oleh admin melalui menu **Appearance &rarr; Customize &rarr; Grand Vanilla Settings**:

| Key Setting | Tipe | Nilai Default | Pengaruh pada Frontend |
| :--- | :--- | :--- | :--- |
| `gv_hero_title` | Text | `Premium Indonesian vanilla, sourced for the global market.` | Judul utama Hero Homepage |
| `gv_hero_subtitle` | Textarea | `We deliver premium Indonesian vanilla with consistent quality, reliable supply, and tailored solutions for global B2B buyers.` | Subjudul deskripsi Hero Homepage |
| `gv_whatsapp` | Text | `+62 812-2697-4731` | Nomor WhatsApp pada direct link header/footer dan handler kirim form kontak (`data-wa`) |
| `gv_email` | Email | `grandvanilla@gmail.com` | Email resmi pada footer dan halaman kontak |
| `gv_address` | Text | `Sumbersari 2 Street, Jember, East Java, Indonesia` | Alamat kantor/fasilitas pengolahan di footer & kontak |
| `gv_instagram` | URL | `https://instagram.com` | Tautan ikon Instagram di footer dan halaman kontak |

---

## ⚙️ 4. Modul Kustom & Custom Post Types (CPT)

- **`vanilla_product`**: Manajemen katalog produk vanili dengan field spesifikasi lab (*Grade*, *Vanillin %*, *Moisture %*, *Length*, *Origin*).
- **`vanilla_gallery`**: Manajemen dokumentasi visual panen dan curing vanili.
- **`post`**: Artikel wawasan pasar, berita panen, dan panduan industri vanili untuk SEO (filter kategori tersinkron otomatis dari taksonomi `category`).
