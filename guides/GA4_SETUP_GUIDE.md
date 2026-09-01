# 📊 Panduan Setup Google Analytics 4 (GA4) — Grand Vanilla ID

Dokumen ini berisi panduan langkah-demi-langkah (*step-by-step*) untuk mengaktifkan integrasi **Google Analytics 4 (GA4)** pada website **Grand Vanilla ID** (`grandvanilla.id`) guna memantau lalu lintas buyer internasional dan interaksi leads wholesale ekspor secara **100% gratis**.

---

## 🎯 Mengapa GA4 Penting untuk Grand Vanilla ID?

1. **Pelacakan Buyer Internasional**: Mengetahui negara asal calon buyer (Amerika Serikat, Jerman, Belanda, Jepang, Australia, dll).
2. **Pelacakan Leads Inquiry**: Memantau berapa banyak buyer yang mengklik tombol **WhatsApp Inquiry (+62 812-2697-4731)** atau mengirim form quotation.
3. **Katalog & Produk Terpopuler**: Mengetahui varietas vanili mana yang paling banyak dilihat (*Planifolia Gourmet Grade A*, *Tahitensis Floral*, atau *Extraction Grade B*).

---

## 🛠️ Langkah 1: Membuat Properti GA4 di Google Analytics

1. Buka [Google Analytics Console](https://analytics.google.com/) dan login dengan akun Google resmi Grand Vanilla (`grandvanilla@gmail.com`).
2. Klik tombol **Admin** (ikon roda gigi di pojok kiri bawah).
3. Klik **+ Create Account** (atau pilih akun yang sudah ada):
   - **Account name**: `Grand Vanilla Indonesia`
4. Di bagian **Property setup**:
   - **Property name**: `Grand Vanilla ID - Production`
   - **Reporting time zone**: `Indonesia (Jakarta Time GMT+7)`
   - **Currency**: `US Dollar ($)` (atau `Indonesian Rupiah (Rp)`)
5. Pada bagian **Business details**:
   - **Industry category**: `Food & Beverage` / `Agriculture & Export`
   - **Business size**: `Small` / `Medium`
6. Pilih tujuan bisnis: **Generate leads** & **Examine user behavior**, lalu klik **Create**.

---

## 🌐 Langkah 2: Membuat Data Stream Website

1. Pilih platform: **Web**.
2. Masukkan URL dan nama stream:
   - **Website URL**: `https://grandvanilla.id`
   - **Stream name**: `Grand Vanilla Website`
3. Pastikan fitur **Enhanced measurement** aktif (otomatis mengukur scroll, outbound clicks, form interactions).
4. Klik **Create stream**.
5. Salin **Measurement ID** Anda (formatnya: `G-XXXXXXXXXX`).

---

## 🔌 Langkah 3: Memasang Tag GA4 pada Custom Theme

Ada 2 cara mudah memasang Measurement ID di WordPress:

### Cara A: Melalui functions.php / header.php
Tambahkan snippet tag gtag.js resmi di `header.php` sebelum penutup `</head>`:

```php
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>
```

### Cara B: Menggunakan Plugin Resmi Google Site Kit
1. Di WP-Admin, buka **Plugins** &rarr; **Add New**.
2. Cari dan pasang **Site Kit by Google**.
3. Hubungkan ke akun Google Analytics Grand Vanilla dengan beberapa klik.

---

## 🎯 Langkah 4: Custom Event Tracking untuk B2B Lead Conversion

Website Grand Vanilla ID telah dilengkapi atribut data untuk event tracking:

| Event Name | Deskripsi Pemicu | Target Konversi |
| :--- | :--- | :--- |
| `click_whatsapp_export` | Buyer mengklik tombol chat WhatsApp | Direct Wholesale Inquiry |
| `submit_contact_form` | Buyer mengirim formulir Get in Touch | Quotation Request |
| `view_product_specs` | Buyer membuka detail spesifikasi lab | High Intent Prospect |
