# Grand Vanilla ID — Database Schema Reference

This document outlines the complete relational database schema for **Grand Vanilla ID** (`grand_vanilla_id`).

---

## 1. Tables Overview

| Table Name | Primary Purpose | Soft Deletes |
|---|---|:---:|
| `users` | Administrator, editor, and staff accounts | ❌ |
| `products` | Vanilla commodity catalog, lab characteristics, and applications | ✅ |
| `galleries` | Harvest, plantation, and curing process documentation photos | ✅ |
| `inquiries` | B2B buyer leads and wholesale sample inquiries | ❌ |
| `categories` | Blog article categories | ✅ |
| `blogs` | Industry articles and export market insights | ✅ |
| `blog_category` | Pivot table linking blogs and categories | ❌ |
| `media` | Polymorphic media library and product gallery images | ✅ |
| `page_seos` | Per-page SEO metadata configuration | ❌ |
| `settings` | Global business profile, ports, and contact info | ❌ |
| `activity_logs` | Audit trail for security and sensitive data modifications | ❌ |
| `cache` / `api_cache` | High-performance cache stores | ❌ |

---

## 2. Table Schemas

### `users`
| Column | Type | Nullable | Default | Description |
|---|---|:---:|:---:|---|
| `id` | `BIGINT UNSIGNED` | ❌ | AUTO | Primary Key |
| `name` | `VARCHAR(255)` | ❌ | - | Full name |
| `email` | `VARCHAR(255)` | ❌ | - | Unique login email |
| `role` | `VARCHAR(20)` | ❌ | `'admin'` | `super_admin`, `admin`, `staff` |
| `is_active` | `BOOLEAN` | ❌ | `TRUE` | Login enabled flag |
| `avatar` | `VARCHAR(255)` | ✅ | `NULL` | Avatar path |
| `password` | `VARCHAR(255)` | ❌ | - | Bcrypt hash |
| `email_verified_at` | `TIMESTAMP` | ✅ | `NULL` | Verification date |
| `remember_token` | `VARCHAR(100)` | ✅ | `NULL` | Session token |
| `created_at` / `updated_at` | `TIMESTAMP` | ✅ | `NULL` | Timestamps |

### `products`
| Column | Type | Nullable | Default | Description |
|---|---|:---:|:---:|---|
| `id` | `BIGINT UNSIGNED` | ❌ | AUTO | Primary Key |
| `name` | `VARCHAR(255)` | ❌ | - | Product commodity name |
| `slug` | `VARCHAR(255)` | ❌ | - | Unique URL slug |
| `photo` | `VARCHAR(255)` | ✅ | `NULL` | Main cover photo path |
| `description` | `LONGTEXT` | ✅ | `NULL` | Product aroma profile & overview |
| `varieties` | `JSON` | ✅ | `NULL` | Array of grades (`["Gourmet Grade A", "Extraction"]`) |
| `characteristics` | `JSON` | ✅ | `NULL` | Key-value lab specs (`[{"label":"Vanillin","value":"2.0%"}]`) |
| `applications` | `JSON` | ✅ | `NULL` | Usage guides (`[{"title":"Bakery","description":"..."}]`) |
| `is_active` | `BOOLEAN` | ❌ | `TRUE` | Public visibility flag |
| `sort_order` | `INT` | ❌ | `0` | Catalog display order (1-3 on homepage) |
| `meta_title` | `VARCHAR(255)` | ✅ | `NULL` | SEO meta title |
| `meta_description` | `TEXT` | ✅ | `NULL` | SEO meta description |
| `og_image` | `VARCHAR(255)` | ✅ | `NULL` | Social sharing image |
| `created_at` / `updated_at` | `TIMESTAMP` | ✅ | `NULL` | Timestamps |
| `deleted_at` | `TIMESTAMP` | ✅ | `NULL` | Soft delete timestamp |

### `galleries`
| Column | Type | Nullable | Default | Description |
|---|---|:---:|:---:|---|
| `id` | `BIGINT UNSIGNED` | ❌ | AUTO | Primary Key |
| `title` | `VARCHAR(255)` | ❌ | - | Image title / process description |
| `category` | `VARCHAR(100)` | ✅ | `NULL` | Process stage (`Plantation`, `Curing`, etc.) |
| `image_path` | `VARCHAR(255)` | ❌ | - | File path in storage |
| `alt_text` | `VARCHAR(255)` | ✅ | `NULL` | SEO image alt text |
| `caption` | `TEXT` | ✅ | `NULL` | Additional description |
| `sort_order` | `INT` | ❌ | `0` | Display order |
| `is_active` | `BOOLEAN` | ❌ | `TRUE` | Visibility flag |
| `created_at` / `updated_at` | `TIMESTAMP` | ✅ | `NULL` | Timestamps |
| `deleted_at` | `TIMESTAMP` | ✅ | `NULL` | Soft delete timestamp |

### `inquiries`
| Column | Type | Nullable | Default | Description |
|---|---|:---:|:---:|---|
| `id` | `BIGINT UNSIGNED` | ❌ | AUTO | Primary Key |
| `name` | `VARCHAR(255)` | ❌ | - | Buyer / representative name |
| `email` | `VARCHAR(255)` | ❌ | - | Business contact email |
| `company` | `VARCHAR(255)` | ✅ | `NULL` | Importer company name |
| `phone` | `VARCHAR(50)` | ✅ | `NULL` | Phone / WhatsApp number |
| `country` | `VARCHAR(100)` | ✅ | `NULL` | Destination export country |
| `subject` | `VARCHAR(255)` | ❌ | - | Inquiry topic |
| `product_id` | `BIGINT UNSIGNED` | ✅ | `NULL` | Foreign key to `products.id` |
| `message` | `TEXT` | ❌ | - | Volume and order requirement details |
| `status` | `VARCHAR(50)` | ❌ | `'new'` | `new`, `contacted`, `in_negotiation`, `closed`, `spam` |
| `ip_address` | `VARCHAR(45)` | ✅ | `NULL` | Sender IP address |
| `user_agent` | `TEXT` | ✅ | `NULL` | Browser information |
| `created_at` / `updated_at` | `TIMESTAMP` | ✅ | `NULL` | Timestamps |
