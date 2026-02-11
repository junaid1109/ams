# AMS - Complete Routes Documentation

## Overview

This document lists all routes available in the AMS application, organized by type.

## Frontend Routes

Public routes that don't require authentication.

### Home & Navigation

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/` | `home` | `HomeController@index` | Homepage with hero, services, portfolio, team |
| GET | `/about` | `about` | `HomeController@about` | About page with team details |

### Services

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/services` | `services.index` | `ServiceController@index` | List all services |
| GET | `/services/{service}` | `services.show` | `ServiceController@show` | Service detail page (slugged) |

### Portfolio

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/portfolio` | `portfolio.index` | `PortfolioController@index` | List all portfolio items with categories |
| GET | `/portfolio/{portfolio}` | `portfolio.show` | `PortfolioController@show` | Portfolio item detail page (slugged) |

### Team

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/team` | `team` | `TeamController@index` | Show all team members |

### Contact

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/contact` | `contact.index` | `ContactController@index` | Contact form page |
| POST | `/contact` | `contact.store` | `ContactController@store` | Submit contact form |

### Static Pages

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/{page}` | `page.show` | `PageController@show` | Display custom page (privacy, terms, etc.) |

**Note**: Static page routes use slug matching. Examples:
- `/privacy` → Privacy Policy page
- `/terms` → Terms & Conditions page
- Any custom page slug created in admin

---

## Authentication Routes

### Login & Registration

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/login` | `login` | `LoginController@showLoginForm` | Show login form |
| POST | `/login` | `login` | `LoginController@login` | Process login |
| GET | `/register` | `register` | `RegisterController@showRegistrationForm` | Show registration form |
| POST | `/register` | `register.store` | `RegisterController@register` | Create new admin account |
| POST | `/logout` | `logout` | `LoginController@logout` | Logout (authenticated) |

**Middleware**: All auth routes use `guest` middleware (redirects logged-in users to dashboard)
**Logout**: Requires authentication middleware

---

## Admin Routes

**Prefix**: `/admin`
**Middleware**: `auth` (requires user login)
**Auth**: All admin routes are protected. Must be logged in to access.

### Dashboard

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/admin/dashboard` | `admin.dashboard` | `DashboardController@index` | Admin dashboard with statistics |

### Services Management

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/admin/services` | `admin.services.index` | `ServiceController@index` | List services (paginated) |
| GET | `/admin/services/create` | `admin.services.create` | `ServiceController@create` | Create service form |
| POST | `/admin/services` | `admin.services.store` | `ServiceController@store` | Save new service |
| GET | `/admin/services/{service}/edit` | `admin.services.edit` | `ServiceController@edit` | Edit service form |
| PUT | `/admin/services/{service}` | `admin.services.update` | `ServiceController@update` | Update service |
| DELETE | `/admin/services/{service}` | `admin.services.destroy` | `ServiceController@destroy` | Delete service |

**Resource**: Uses Laravel's resource route pattern
**Fields**: title, short_description, description, icon, image, features, pricing, published, order

### Portfolio Management

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/admin/portfolio` | `admin.portfolio.index` | `PortfolioController@index` | List portfolio items (paginated) |
| GET | `/admin/portfolio/create` | `admin.portfolio.create` | `PortfolioController@create` | Create portfolio form |
| POST | `/admin/portfolio` | `admin.portfolio.store` | `PortfolioController@store` | Save new portfolio item |
| GET | `/admin/portfolio/{portfolio}/edit` | `admin.portfolio.edit` | `PortfolioController@edit` | Edit portfolio form |
| PUT | `/admin/portfolio/{portfolio}` | `admin.portfolio.update` | `PortfolioController@update` | Update portfolio item |
| DELETE | `/admin/portfolio/{portfolio}` | `admin.portfolio.destroy` | `PortfolioController@destroy` | Delete portfolio item |

**Resource**: Uses Laravel's resource route pattern
**Fields**: title, description, category, image, image_secondary, client, project_url, project_date, details, published, order

### Team Members Management

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/admin/team` | `admin.team.index` | `TeamMemberController@index` | List team members (paginated) |
| GET | `/admin/team/create` | `admin.team.create` | `TeamMemberController@create` | Create team member form |
| POST | `/admin/team` | `admin.team.store` | `TeamMemberController@store` | Save new team member |
| GET | `/admin/team/{team}/edit` | `admin.team.edit` | `TeamMemberController@edit` | Edit team member form |
| PUT | `/admin/team/{team}` | `admin.team.update` | `TeamMemberController@update` | Update team member |
| DELETE | `/admin/team/{team}` | `admin.team.destroy` | `TeamMemberController@destroy` | Delete team member |

**Resource**: Uses Laravel's resource route pattern
**Fields**: name, position, bio, image, email, phone, twitter, linkedin, facebook, instagram, published, order

### Contacts Management

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/admin/contacts` | `admin.contacts.index` | `ContactController@index` | List contact submissions (paginated) |
| GET | `/admin/contacts/{contact}` | `admin.contacts.show` | `ContactController@show` | View contact message details |
| DELETE | `/admin/contacts/{contact}` | `admin.contacts.destroy` | `ContactController@destroy` | Delete contact message |
| POST | `/admin/contacts/delete-all` | `admin.contacts.deleteAll` | `ContactController@deleteAll` | Delete multiple contacts |

**Special Features**:
- Marks messages as read when viewed
- Shows unread count in sidebar
- Can bulk delete messages

### Pages Management

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/admin/pages` | `admin.pages.index` | `PageController@index` | List pages (paginated) |
| GET | `/admin/pages/create` | `admin.pages.create` | `PageController@create` | Create page form |
| POST | `/admin/pages` | `admin.pages.store` | `PageController@store` | Save new page |
| GET | `/admin/pages/{page}/edit` | `admin.pages.edit` | `PageController@edit` | Edit page form |
| PUT | `/admin/pages/{page}` | `admin.pages.update` | `PageController@update` | Update page |
| DELETE | `/admin/pages/{page}` | `admin.pages.destroy` | `PageController@destroy` | Delete page |

**Resource**: Uses Laravel's resource route pattern
**Page Types**: static, about, terms, privacy
**Fields**: title, slug, content, image, meta_description, meta_keywords, page_type, published

### Settings Management

| Method | Route | Name | Controller | Purpose |
|--------|-------|------|------------|---------|
| GET | `/admin/settings` | `admin.settings.index` | `SettingController@index` | Show settings form |
| POST | `/admin/settings` | `admin.settings.update` | `SettingController@update` | Update settings |

**Settings Keys**:
- `site_name` - Website name
- `site_email` - Contact email
- `site_phone` - Contact phone
- `site_address` - Physical address
- `site_description` - Site tagline
- `facebook_url` - Facebook page URL
- `twitter_url` - Twitter profile URL
- `linkedin_url` - LinkedIn profile URL
- `instagram_url` - Instagram profile URL

---

## API Response Examples

### Service Model Route Key
Uses `slug` for routing instead of `id`:
```
/services/web-design  ← Uses slug
```

### Portfolio Model Route Key
Uses `slug` for routing:
```
/portfolio/ecommerce-platform  ← Uses slug
```

### Page Model Route Key
Uses `slug` for routing:
```
/privacy  ← Privacy page slug
/terms    ← Terms page slug
```

---

## Middleware Groups

### Web Routes
- Sessions
- CSRF Protection
- Cookie Encryption

### Auth Routes
- Must be authenticated for admin routes
- Guest middleware for login/register

### Guest Routes
- Frontend routes accessible to all
- No authentication required

---

## Route Parameters

All resource routes use Route Model Binding:

```php
// Automatic model injection
// ServiceController@show receives Service model by slug
Route::get('/services/{service}', [ServiceController::class, 'show']);

// Same for admin routes
Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit']);
```

---

## URL Naming Convention

All routes follow Laravel convention:
- Resource routes: `{prefix}.{resource}.{action}`
- Examples:
  - `admin.services.index` → `/admin/services`
  - `admin.services.edit` → `/admin/services/{id}/edit`
  - `services.show` → `/services/{slug}`

---

## Generating Route URLs in Templates

Use `route()` helper in Blade templates:

```blade
<!-- Frontend -->
<a href="{{ route('home') }}">Home</a>
<a href="{{ route('services.show', $service) }}">View Service</a>
<a href="{{ route('portfolio.show', $portfolio) }}">View Project</a>

<!-- Admin -->
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
<a href="{{ route('admin.services.create') }}">Create Service</a>
<a href="{{ route('admin.services.edit', $service) }}">Edit</a>
```

---

## Security Notes

- **Admin routes** require authentication
- **CSRF protection** on all POST/PUT/DELETE requests
- **Model binding** ensures only authorized access
- **Published flag** hides unpublished content on frontend
- **Rate limiting** on contact form (can be added)

---

**Last Updated**: February 10, 2026
