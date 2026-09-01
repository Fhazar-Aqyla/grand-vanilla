# Grand Vanilla ID — REST API Specification

This document details the public API endpoints exposed by **Grand Vanilla ID** under prefix `/api/v1/`.

---

## General Rules & Headers

- **Base URL:** `http://grand-vanilla-id.test/api/v1`
- **Rate Limit:** 60 requests per minute (`throttle:60,1`)
- **Format:** `application/json`
- **Caching:** Public `GET` endpoints are cached via `Cache::store('api')` with `Cache-Control` response headers.

---

## 1. Products API

### `GET /api/v1/products`
List active vanilla commodity products with pagination.

**Response:**
```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "name": "Planifolia Gourmet Vanilla Beans",
        "slug": "planifolia-gourmet-vanilla-beans",
        "photo": "uploads/planifolia-cover.jpg",
        "description": "Premium Indonesian Vanilla Planifolia pods...",
        "varieties": ["Gourmet Grade A (16-22cm)", "Extraction Grade"],
        "characteristics": [
          { "label": "Origin", "value": "Bali & Papua, Indonesia" },
          { "label": "Vanillin Content", "value": "1.8% – 2.4%" },
          { "label": "Moisture Content", "value": "28% – 33%" },
          { "label": "Length", "value": "16 – 22 cm" }
        ],
        "applications": [
          { "title": "Gourmet Bakery", "description": "Ideal for fine pastries and gelato." }
        ],
        "is_active": true,
        "sort_order": 1,
        "media": [
          {
            "id": 10,
            "url": "http://grand-vanilla-id.test/storage/media/detail-1.webp",
            "alt_text": "Planifolia grading close up"
          }
        ]
      }
    ],
    "total": 3
  }
}
```

### `GET /api/v1/products/{slug}`
Get single product details by slug.

---

## 2. Gallery API

### `GET /api/v1/gallery`
List documentation photos. Supports query parameter `?category=Plantation|Harvesting|Curing & Drying|Grading & Quality|Packaging & Export`.

---

## 3. Blog & Articles API

### `GET /api/v1/blogs`
List published vanilla export articles. Supports `?category={slug}`.

### `GET /api/v1/blogs/{slug}`
Single blog article with author and category details.

---

## 4. Settings & SEO API

### `GET /api/v1/settings`
Returns global company info, export contact details, and social links.

### `GET /api/v1/page-seo`
Returns page-specific SEO meta configurations (`home`, `about`, `products`, `gallery`, `blog`, `contact`).

### `GET /api/v1/sitemap`
Lists all public indexable URLs for search engine sitemaps.
