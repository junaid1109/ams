# Axis Laravel - Complete Database Schema

## Overview

This document describes all database tables used in the Axis Laravel application.

## Table Structure

### 1. Users Table

**Purpose**: Store admin user accounts and authentication

```sql
CREATE TABLE users (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  email_verified_at TIMESTAMP NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(50) DEFAULT 'admin',
  remember_token VARCHAR(100) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_email (email)
);
```

**Fields**:
- `id` - Unique identifier
- `name` - User full name
- `email` - Login email (unique)
- `email_verified_at` - Email verification timestamp
- `password` - Hashed password
- `role` - User role (admin, moderator, etc.)
- `remember_token` - Session token for "remember me"
- `created_at` - Account creation timestamp
- `updated_at` - Last update timestamp

**Sample Data**:
```
id: 1
name: Admin User
email: admin@axis.com
password: (hashed)
role: admin
```

---

### 2. Services Table

**Purpose**: Store service offerings

```sql
CREATE TABLE services (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE NOT NULL,
  description LONGTEXT NOT NULL,
  short_description VARCHAR(500) NOT NULL,
  icon VARCHAR(255) NULL,
  image VARCHAR(255) NULL,
  features LONGTEXT NULL,
  pricing LONGTEXT NULL,
  published BOOLEAN DEFAULT 1,
  order INT DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_slug (slug),
  INDEX idx_published (published),
  INDEX idx_order (order)
);
```

**Fields**:
- `id` - Unique identifier
- `title` - Service name
- `slug` - URL-friendly identifier (unique)
- `description` - Full service description
- `short_description` - Brief description (< 500 chars)
- `icon` - CSS class for icon (e.g., "bi bi-house")
- `image` - Path to image file
- `features` - HTML content with features list
- `pricing` - HTML content with pricing info
- `published` - Boolean: visible on frontend?
- `order` - Display order on page
- Timestamps for creation/update

**Usage**:
- Display services on `/services` page
- Full service detail at `/services/{slug}`
- Show featured services on homepage

---

### 3. Portfolios Table

**Purpose**: Store portfolio/project items

```sql
CREATE TABLE portfolios (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE NOT NULL,
  description LONGTEXT NOT NULL,
  category VARCHAR(255) NULL,
  image VARCHAR(255) NULL,
  image_secondary VARCHAR(255) NULL,
  client VARCHAR(255) NULL,
  project_url VARCHAR(255) NULL,
  project_date DATE NULL,
  details LONGTEXT NULL,
  published BOOLEAN DEFAULT 1,
  order INT DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_slug (slug),
  INDEX idx_category (category),
  INDEX idx_published (published)
);
```

**Fields**:
- `id` - Unique identifier
- `title` - Project name
- `slug` - URL identifier
- `description` - Short project description
- `category` - Project category (e.g., "Web Design")
- `image` - Main project image
- `image_secondary` - Additional project image
- `client` - Client company name
- `project_url` - Live project URL
- `project_date` - Project completion date
- `details` - HTML detailed project info
- `published` - Visibility flag
- `order` - Display sort order

**Usage**:
- Portfolio grid at `/portfolio`
- Filterable by category
- Detail page at `/portfolio/{slug}`
- Related projects on detail page

---

### 4. Team Members Table

**Purpose**: Store team member profiles

```sql
CREATE TABLE team_members (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  position VARCHAR(255) NOT NULL,
  bio LONGTEXT NULL,
  image VARCHAR(255) NULL,
  email VARCHAR(255) NULL,
  phone VARCHAR(20) NULL,
  twitter VARCHAR(255) NULL,
  linkedin VARCHAR(255) NULL,
  facebook VARCHAR(255) NULL,
  instagram VARCHAR(255) NULL,
  published BOOLEAN DEFAULT 1,
  order INT DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_published (published),
  INDEX idx_order (order)
);
```

**Fields**:
- `id` - Unique identifier
- `name` - Full name
- `position` - Job title
- `bio` - Short biography
- `image` - Profile photo
- `email` - Contact email
- `phone` - Phone number
- `twitter` - Twitter profile URL
- `linkedin` - LinkedIn profile URL
- `facebook` - Facebook profile URL
- `instagram` - Instagram profile URL
- `published` - Visibility flag
- `order` - Display order

**Usage**:
- Team showcase at `/team`
- Featured on `/about` page
- Show on homepage
- Social links in footer

---

### 5. Contacts Table

**Purpose**: Store contact form submissions

```sql
CREATE TABLE contacts (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NULL,
  subject VARCHAR(255) NOT NULL,
  message LONGTEXT NOT NULL,
  is_read BOOLEAN DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_email (email),
  INDEX idx_is_read (is_read),
  INDEX idx_created (created_at)
);
```

**Fields**:
- `id` - Unique identifier
- `name` - Visitor name
- `email` - Visitor email
- `phone` - Visitor phone (optional)
- `subject` - Message subject
- `message` - Message content
- `is_read` - Has admin read this?
- Timestamps

**Usage**:
- Store submissions from contact form (`/contact`)
- Admin panel views at `/admin/contacts`
- Mark as read when viewed
- Admin gets unread count in sidebar

---

### 6. Pages Table

**Purpose**: Store static content pages

```sql
CREATE TABLE pages (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE NOT NULL,
  content LONGTEXT NOT NULL,
  image VARCHAR(255) NULL,
  meta_description TEXT NULL,
  meta_keywords TEXT NULL,
  published BOOLEAN DEFAULT 1,
  page_type VARCHAR(50) DEFAULT 'static',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_slug (slug),
  INDEX idx_page_type (page_type),
  INDEX idx_published (published)
);
```

**Fields**:
- `id` - Unique identifier
- `title` - Page title
- `slug` - URL slug (unique)
- `content` - HTML page content
- `image` - Page header image
- `meta_description` - SEO description
- `meta_keywords` - SEO keywords
- `published` - Visibility flag
- `page_type` - Type: static, about, terms, privacy
- Timestamps

**Page Types**:
- `static` - Generic static pages
- `about` - About us page
- `terms` - Terms & conditions
- `privacy` - Privacy policy

**Usage**:
- Route to `/{slug}` for display
- Edit in admin at `/admin/pages`
- About page at `/about`
- Custom pages for terms, privacy, etc.

---

### 7. Settings Table

**Purpose**: Store application settings

```sql
CREATE TABLE settings (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  key VARCHAR(255) UNIQUE NOT NULL,
  value LONGTEXT NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX idx_key (key)
);
```

**Fields**:
- `id` - Unique identifier
- `key` - Setting name (unique)
- `value` - Setting value
- Timestamps

**Common Settings**:
- `site_name` - Website name
- `site_email` - Contact email
- `site_phone` - Contact phone
- `site_address` - Physical address
- `site_description` - Site tagline
- `facebook_url` - Facebook page
- `twitter_url` - Twitter profile
- `linkedin_url` - LinkedIn profile
- `instagram_url` - Instagram profile

**Usage**:
- Manage at `/admin/settings`
- Retrieve with `Setting::where('key', 'site_name')->value('value')`
- Use in header/footer templates

---

## Relationships

```
User
├─ (No direct relationships - admin only)

Service
└─ Many on homepage
└─ Full list on /services
└─ Detail on /services/{slug}

Portfolio
└─ Grouped by category
└─ Filtered on /portfolio
└─ Detail on /portfolio/{slug}

TeamMember
└─ Displayed on /team
└─ Featured on /about
└─ Featured on homepage

Contact
└─ Submitted via /contact form
└─ Viewed in /admin/contacts

Page
└─ Routable via /{slug}
└─ Special types: about, terms, privacy
└─ Managed in /admin/pages

Setting
└─ Key-value pairs
└─ Managed in /admin/settings
```

---

## Indexes for Performance

All tables have optimized indexes:

- **Primary Keys**: All IDs are indexed
- **Slugs**: Foreign key lookups are indexed
- **Published Flag**: Filtered queries are indexed
- **Categories**: Filter by category is indexed
- **Timestamps**: Created/updated queries are indexed

---

## Data Type Rationale

| Type | Usage | Why |
|------|-------|-----|
| `BIGINT` | IDs | Support large datasets |
| `VARCHAR(255)` | Names, emails | Standard length limit |
| `VARCHAR(500)` | Short descriptions | Longer than names but reasonable limit |
| `LONGTEXT` | Content | Unlimited detailed content |
| `DATE` | Dates | No time component needed for dates |
| `TIMESTAMP` | Timestamps | Automatic current_timestamp |
| `BOOLEAN` | Flags | Space-efficient true/false |
| `INT` | Order | Sort sequence |

---

## Migration & Seeding

**Migrations** create the tables:
```
database/migrations/
├── 2014_10_12_000000_create_users_table.php
├── 2024_01_01_000001_create_services_table.php
├── 2024_01_01_000002_create_portfolios_table.php
├── 2024_01_01_000003_create_team_members_table.php
├── 2024_01_01_000004_create_contacts_table.php
├── 2024_01_01_000005_create_pages_table.php
└── 2024_01_01_000006_create_settings_table.php
```

**Seeder** adds sample data:
```
database/seeders/DatabaseSeeder.php
```

To seed sample data:
```bash
php artisan db:seed
```

---

## Query Examples

### Get published services
```php
Service::where('published', true)->orderBy('order')->get();
```

### Get portfolio by category
```php
Portfolio::where('published', true)
  ->where('category', 'Web Design')
  ->get();
```

### Get unread contacts
```php
Contact::where('is_read', false)
  ->latest()
  ->get();
```

### Get setting value
```php
$siteName = Setting::where('key', 'site_name')->value('value');
```

### Get team members in order
```php
TeamMember::where('published', true)
  ->orderBy('order')
  ->get();
```

---

**Last Updated**: February 10, 2026
