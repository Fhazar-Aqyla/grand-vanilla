# 🔌 Dokumentasi REST API — Grand Vanilla ID

Website **Grand Vanilla ID** menyediakan akses data terstruktur melalui **WordPress REST API** untuk integrasi eksternal (aplikasi mobile, katalog buyer, atau sistem inventaris).

---

## 🌐 Endpoints Publik

### 1. Katalog Produk Vanili
- **Endpoint**: `GET /wp-json/wp/v2/vanilla_product`
- **Parameter**: `?per_page=10&page=1`
- **Response**: Daftar produk vanili lengkap dengan judul, deskripsi, spesifikasi lab, dan URL gambar.

### 2. Galeri Panen & Curing
- **Endpoint**: `GET /wp-json/wp/v2/vanilla_gallery`
- **Response**: Data foto dokumentasi kebun dan proses penjemuran vanili.

### 3. Artikel Blog & Berita Ekspor
- **Endpoint**: `GET /wp-json/wp/v2/posts`
- **Response**: Daftar artikel edukasi vanili dan laporan musim panen.
