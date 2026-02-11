# 📋 INSTALLATION CHECKLIST - Axis Laravel

Complete this checklist to set up your Axis Laravel application.

---

## ✅ PRE-INSTALLATION REQUIREMENTS

- [ ] PHP 8.0 or higher installed
- [ ] Composer installed globally
- [ ] MySQL 5.7 or higher installed
- [ ] XAMPP running (Apache & MySQL)
- [ ] Git installed (optional)
- [ ] Text editor or IDE ready (VS Code)

**To Check:**
```bash
php --version
composer --version
mysql --version
```

---

## ✅ STEP 1: PREPARE THE PROJECT

- [ ] Navigate to project directory:
  ```bash
  cd d:\xampp\htdocs\project\sanq\mike\Axis-Laravel
  ```
- [ ] Verify Laravel files are in place
- [ ] Check `.env.example` file exists
- [ ] Check `composer.json` exists

---

## ✅ STEP 2: INSTALL DEPENDENCIES

- [ ] Install Composer packages:
  ```bash
  composer install
  ```
- [ ] Wait for download to complete
- [ ] Verify `vendor/` directory created
- [ ] No errors in console

---

## ✅ STEP 3: ENVIRONMENT SETUP

- [ ] Create `.env` file:
  ```bash
  cp .env.example .env
  ```
- [ ] Generate application key:
  ```bash
  php artisan key:generate
  ```
- [ ] Verify `APP_KEY=` populated in `.env`
- [ ] Edit `.env` with your database info:
  ```
  DB_DATABASE=axis_db
  DB_USERNAME=root
  DB_PASSWORD=
  ```

---

## ✅ STEP 4: DATABASE SETUP

- [ ] Open phpMyAdmin: http://localhost/phpmyadmin
- [ ] Create new database `axis_db`
- [ ] Verify database created
- [ ] Close phpMyAdmin

---

## ✅ STEP 5: RUN MIGRATIONS

- [ ] Run Laravel migrations:
  ```bash
  php artisan migrate
  ```
- [ ] Verify tables created (check phpMyAdmin)
- [ ] No errors in console
- [ ] All 7 tables visible:
  - users
  - services
  - portfolios
  - team_members
  - contacts
  - pages
  - settings

---

## ✅ STEP 6: SEED SAMPLE DATA (OPTIONAL)

- [ ] Seed database (adds sample content):
  ```bash
  php artisan db:seed
  ```
- [ ] Default admin created:
  - Email: `admin@axis.com`
  - Password: `password`
- [ ] Sample services, portfolio, team created
- [ ] Sample pages created
- [ ] Settings initialized

---

## ✅ STEP 7: STORAGE CONFIGURATION

- [ ] Create storage link:
  ```bash
  php artisan storage:link
  ```
- [ ] Verify symbolic link created:
  ```
  public/storage → storage/app/public
  ```
- [ ] No errors in console

---

## ✅ STEP 8: COPY ASSETS

Copy assets from original Axis project to Laravel:

**Option A: Windows Command Prompt (as Administrator)**
```bash
xcopy "d:\xampp\htdocs\project\sanq\mike\Axis\assets" ^
       "d:\xampp\htdocs\project\sanq\mike\Axis-Laravel\public\assets" ^
       /E /I /Y
```

**Option B: Manual Copy**
- [ ] Open `d:\xampp\htdocs\project\sanq\mike\Axis\`
- [ ] Copy `assets/` folder
- [ ] Paste into `d:\xampp\htdocs\project\sanq\mike\Axis-Laravel\public\`

**Option C: XAMPP File Manager**
- [ ] Navigate to XAMPP folder
- [ ] Copy assets folder
- [ ] Paste in public directory

---

## ✅ STEP 9: START DEVELOPMENT SERVER

- [ ] Start Laravel development server:
  ```bash
  php artisan serve
  ```
- [ ] See: `Starting Laravel development server: http://127.0.0.1:8000`
- [ ] Open browser: http://localhost:8000
- [ ] Homepage loads successfully
- [ ] Navigation works

---

## ✅ STEP 10: TEST FRONTEND

Open each link and verify it loads:

- [ ] http://localhost:8000 → Homepage
- [ ] http://localhost:8000/about → About page
- [ ] http://localhost:8000/services → Services listing
- [ ] http://localhost:8000/portfolio → Portfolio listing
- [ ] http://localhost:8000/team → Team page
- [ ] http://localhost:8000/contact → Contact form works
- [ ] http://localhost:8000/privacy → Privacy page loads

---

## ✅ STEP 11: ADMIN LOGIN

- [ ] Go to: http://localhost:8000/login
- [ ] Login with:
  - Email: `admin@axis.com`
  - Password: `password`
- [ ] Redirects to dashboard
- [ ] See admin sidebar
- [ ] See statistics

---

## ✅ STEP 12: TEST ADMIN FEATURES

- [ ] Dashboard loads → http://localhost:8000/admin/dashboard
- [ ] Services list → http://localhost:8000/admin/services
- [ ] Portfolio list → http://localhost:8000/admin/portfolio
- [ ] Team list → http://localhost:8000/admin/team
- [ ] Pages list → http://localhost:8000/admin/pages
- [ ] Contacts list → http://localhost:8000/admin/contacts
- [ ] Settings → http://localhost:8000/admin/settings

---

## ✅ STEP 13: SECURITY - CHANGE PASSWORD

- [ ] Open MySQL/phpMyAdmin
- [ ] Find admin user in `users` table
- [ ] Update password immediately (don't use default)
- [ ] Or use admin panel to change (future feature)

---

## ✅ STEP 14: TEST FORM SUBMISSION

- [ ] Go to http://localhost:8000/contact
- [ ] Fill out form:
  - Name: Test
  - Email: test@test.com
  - Subject: Test Message
  - Message: This is a test
- [ ] Submit form
- [ ] See success message
- [ ] Check admin contacts: http://localhost:8000/admin/contacts

---

## ✅ STEP 15: CUSTOMIZE SETTINGS

- [ ] Login to admin
- [ ] Go to Settings
- [ ] Update:
  - [ ] Site Name
  - [ ] Site Email
  - [ ] Site Phone
  - [ ] Site Address
  - [ ] Social Media URLs
- [ ] Save changes

---

## ✅ TROUBLESHOOTING CHECKLIST

If you encounter issues:

### Database Connection Error
- [ ] Check `.env` has correct database name
- [ ] Check MySQL is running
- [ ] Verify database exists: `axis_db`
- [ ] Test connection in phpMyAdmin

### Composer Error
- [ ] Delete `composer.lock` file
- [ ] Delete `vendor/` folder
- [ ] Run `composer install` again
- [ ] Update Composer: `composer self-update`

### Storage/Image Issues
- [ ] Rerun: `php artisan storage:link`
- [ ] Check storage folder permissions
- [ ] Rerun: `php artisan config:clear`
- [ ] Clear browser cache

### Server Won't Start
- [ ] Check port 8000 not in use
- [ ] Change port: `php artisan serve --port=8001`
- [ ] Check PHP version: `php --version` (need 8.0+)

### Assets Not Loading
- [ ] Verify `public/assets/` folder has content
- [ ] Check browser network tab for 404 errors
- [ ] Clear browser cache
- [ ] Run `php artisan optimize:clear`

---

## ✅ POST-INSTALLATION

### Important Tasks
- [ ] Change default admin password
- [ ] Create additional admin users if needed
- [ ] Upload real images (logo, service images, portfolio)
- [ ] Update contact information
- [ ] Update social media links
- [ ] Create your actual content (services, portfolio, pages)

### Optional Enhancements
- [ ] Customize CSS styling
- [ ] Set up email sending
- [ ] Configure deployment
- [ ] Set up domain name
- [ ] Enable HTTPS

---

## ✅ FILE STRUCTURE VERIFICATION

Verify these key files exist:

- [ ] `.env` - Environment config
- [ ] `composer.json` - Dependencies
- [ ] `routes/web.php` - Routes definition
- [ ] `app/Models/` - Model files (7 files)
- [ ] `app/Http/Controllers/` - Controllers
- [ ] `database/migrations/` - Migration files
- [ ] `resources/views/` - View files
- [ ] `public/assets/` - CSS, JS, images

---

## ✅ QUICK COMMANDS REFERENCE

Keep these handy:

```bash
# Start server
php artisan serve

# Stop server
Ctrl + C

# Clear all caches
php artisan optimize:clear

# Run migrations
php artisan migrate

# Seed data
php artisan db:seed

# Create storage link
php artisan storage:link

# Interactive shell
php artisan tinker
```

---

## ✅ SUCCESSFUL INSTALLATION INDICATORS

You'll know setup is complete when:

✅ http://localhost:8000 loads homepage  
✅ Navigation links work  
✅ Can login at /login  
✅ Admin dashboard loads  
✅ Can view services, portfolio, team  
✅ Contact form works  
✅ Database has data  
✅ No console errors  

---

## 🎉 YOU'RE READY!

If you've completed all checklist items, your Axis Laravel app is ready to use!

### Next Steps:
1. **Customize** the content via admin panel
2. **Upload** your own images
3. **Update** site settings
4. **Add** your services, portfolio items, team members
5. **Deploy** to production when ready

### Need Help?
- Read `README.md` for detailed guide
- Check `QUICK_START.md` for fast setup
- Review `ROUTES.md` for all available routes
- See `DATABASE_SCHEMA.md` for database details

---

**Start Date**: ___________  
**Completion Date**: ___________  
**Prepared By**: ___________  

---

**Axis Laravel - Conversion Complete ✅**
