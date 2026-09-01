# Grand Vanilla ID — AI Agent & Developer Architecture Context

This document serves as the primary system context for AI coding assistants working in the **Grand Vanilla ID** repository (`grand-vanilla-id`).

---

## 1. Project Mission & Identity

- **Application:** Grand Vanilla ID
- **Domain:** B2B Indonesian Gourmet Vanilla Beans & Commodity Export
- **Tech Stack:** Laravel 13 (PHP 8.2+), MySQL, Tailwind CSS v4, Alpine.js, Breeze Session Auth, Vite.

---

## 2. Core Architectural Pillars

### A. Secret Admin Route (`ADMIN_PATH`)
- The admin route prefix is dynamic and read via `config('app.admin_path', 'admin')`.
- All admin links and redirects **MUST** use named routes (e.g., `route('admin.dashboard')`, `route('admin.products.index')`), never hardcoded `/admin`.

### B. Product Commodity Architecture
- `products` stores core fields and JSON repeaters (`varieties`, `characteristics`, `applications`).
- Cover photo stored in `photo`.
- Gallery detail photos (up to 4 images) managed through polymorphic `$product->media()`.

### C. Inquiries & B2B Leads
- Direct incoming leads from `/contact` stored in `inquiries`.
- Honeypot spam defense via hidden `website_url` field.
- Lifecycle statuses: `new`, `contacted`, `in_negotiation`, `closed`, `spam`.

### D. User Management & Security
- 3 roles: `super_admin`, `admin`, `staff` (via PHP Enum `App\Enums\UserRole`).
- Super Admin protected against self-deletion and self-demotion.
- All sensitive operations logged in `activity_logs`.

---

## 3. Directory Layout

- `app/Http/Controllers/Admin/`: Backoffice controllers (`ProductController`, `GalleryController`, `InquiryController`, `UserController`, `BlogController`, `SettingController`, `PageSeoController`, etc.).
- `app/Http/Controllers/Web/`: Public company profile controllers (`HomeController`, `AboutController`, `ProductController`, `GalleryController`, `BlogController`, `ContactController`).
- `app/Models/`: Eloquent models with typed casts and scopes.
- `resources/views/admin/`: Admin panel Blade templates using `<x-admin.layouts.app>`.
- `resources/views/compro/`: Public frontend Blade views using `<x-layouts.compro>`.
- `tests/Feature/`: Pest feature tests.
