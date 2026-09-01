# 🏛️ JSON-LD Structured Data (Schema.org) — Grand Vanilla ID

Dokumen ini mendefinisikan skema data terstruktur (**JSON-LD**) untuk website **Grand Vanilla ID** guna membantu mesin pencari (Google & Bing) memahami entitas bisnis, lokasi, produk komoditas vanili, dan breadcrumbs.

---

## 1. Schema Organization (Global)

Ditempatkan pada `header.php` atau homepage:

```json
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Grand Vanilla Indonesia",
  "alternateName": "Grand Vanilla ID",
  "url": "https://grandvanilla.id",
  "logo": "https://grandvanilla.id/wp-content/themes/grand-vanilla-theme/assets/images/Logo.png",
  "description": "Premier Indonesian vanilla bean supplier and exporter, providing certified Planifolia and Tahitensis vanilla pods for global food industries.",
  "foundingDate": "2019",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Sumbersari 2 Street",
    "addressLocality": "Jember",
    "addressRegion": "East Java",
    "addressCountry": "ID"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+62-812-2697-4731",
    "contactType": "Sales & Export Desk",
    "email": "grandvanilla@gmail.com",
    "availableLanguage": ["English", "Indonesian"]
  },
  "sameAs": [
    "https://instagram.com/grandvanilla.id",
    "https://linkedin.com/company/grand-vanilla-id"
  ]
}
```

---

## 2. Schema Product (Halaman Produk Vanili)

Ditempatkan pada single product template (`single-vanilla_product.php`):

```json
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "Indonesian Planifolia Gourmet Vanilla Beans (Grade A)",
  "image": "https://grandvanilla.id/wp-content/themes/grand-vanilla-theme/assets/images/Product%20Unggulan%201.png",
  "description": "Premium Gourmet Grade A Indonesian Planifolia vanilla beans with 2.0% - 2.4% certified vanillin content and rich floral-bourbon aroma.",
  "brand": {
    "@type": "Brand",
    "name": "Grand Vanilla"
  },
  "countryOfOrigin": {
    "@type": "Country",
    "name": "Indonesia"
  },
  "offers": {
    "@type": "AggregateOffer",
    "priceCurrency": "USD",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
  }
}
```
