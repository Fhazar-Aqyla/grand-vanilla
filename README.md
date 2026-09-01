# 🌿 Grand Vanilla ID — WordPress Custom Theme & B2B Company Profile

**Grand Vanilla ID** is a high-performance WordPress CMS and B2B Company Profile custom theme built for **Grand Vanilla Indonesia**, a direct supplier and exporter of Indonesian gourmet vanilla beans (*Vanilla Planifolia* & *Vanilla Tahitensis*) to international markets.

---

## 🌟 Key Highlights & PRD Compliance

- **English Only**: Entire interface, navigation, product specifications, and lead generation forms are optimized for international buyers (importers, distributors, extract houses, and bakeries).
- **Custom Theme Architecture (`grand-vanilla-theme`)**: Clean, lightweight custom WordPress theme crafted without heavy page-builder bloat.
- **Vanilla Products CMS (`vanilla_product`)**: Full management of vanilla beans, lab specifications (Vanillin %, Moisture %, Pod Length, Origin, Grade), and direct B2B inquiry actions.
- **Harvest & Curing Gallery (`vanilla_gallery`)**: Visual proof of agroforestry farming, traditional sun drying, and vacuum packaging.
- **6 Core PRD Pages**:
  1. `Home` (`front-page.php`)
  2. `About Us` (`page-about.php`)
  3. `Products` (`archive-vanilla_product.php`)
  4. `Gallery` (`page-gallery.php`)
  5. `Articles` (`index.php`)
  6. `Contact Us` (`page-contact.php`)
- **Direct WhatsApp & Lead Routing**: Integrated WhatsApp CTA (`+62 812-2697-4731`) and official export email (`export@grandvanilla.id`).

---

## 🚀 Local Development (Laragon)

### 1. Requirements
- **Web Server**: Apache / Nginx (Laragon)
- **PHP**: 8.0+ (Tested on PHP 8.4)
- **Database**: MySQL 8.0+ / MariaDB

### 2. Local URLs & Credentials
- **Frontend URL**: `http://localhost/grand-vanilla-id/` (or `http://grand-vanilla-id.test/`)
- **Admin Dashboard**: `http://localhost/grand-vanilla-id/wp-admin/`
- **Username**: `admin`
- **Password**: `password`
- **Database**: `grand_vanilla_wp`

---

## 📂 Project Structure

```text
grand-vanilla-id/
├── _archive_laravel/               # Safe preservation archive of previous Laravel core
├── docs/                           # Architecture, SEO, GA4, & CMS specifications
│   └── CMS_REQUIREMENTS_SPECIFICATION.md
├── guides/                         # Setup guides (Search Console, Adsense, Analytics)
├── wp-content/
│   └── themes/
│       └── grand-vanilla-theme/    # Grand Vanilla ID Custom Theme
│           ├── assets/             # Fonts, styles, images & icons
│           ├── functions.php       # Theme setup, CPTs, Lab Specs meta box
│           ├── header.php          # Topbar, Logo, Responsive navigation
│           ├── footer.php          # Export hubs, links, contact & WhatsApp
│           ├── front-page.php      # Homepage template (Hero, Highlights, Products)
│           ├── archive-vanilla_product.php
│           ├── single-vanilla_product.php
│           ├── page-about.php
│           ├── page-contact.php
│           ├── page-gallery.php
│           ├── single.php
│           ├── index.php
│           └── style.css           # Theme metadata & design tokens
├── wp-config.php                   # Database & salt configurations
├── ADMIN_GUIDE.md                  # WP-Admin manual for client (Faris Muafa)
└── DEPLOYMENT.md                   # Production deployment guide
```

---

## 📚 Documentation
- [CMS Requirements Specification](docs/CMS_REQUIREMENTS_SPECIFICATION.md)
- [Admin Guide (WP-Admin)](ADMIN_GUIDE.md)
- [Deployment Guide](DEPLOYMENT.md)
- [SEO Best Practices](docs/SEO_BEST_PRACTICES.md)
- [GA4 Setup Guide](docs/GA4_SETUP_GUIDE.md)
