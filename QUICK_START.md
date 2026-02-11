# Quick Start Guide - Axis Laravel Application

## 5-Minute Setup

### Prerequisites
- XAMPP installed with PHP 8.0+ and MySQL
- Git (optional)
- Composer installed globally

### Fast Setup Steps

1. **Open Command Prompt** and navigate to the project:
```bash
cd d:\xampp\htdocs\project\sanq\mike\Axis-Laravel
```

2. **Install Dependencies**:
```bash
composer install
```

3. **Setup Environment**:
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database Setup**:
   - Open phpMyAdmin: http://localhost/phpmyadmin
   - Create new database named `axis_db`
   - Run in terminal: `php artisan migrate`

5. **Seed Sample Data** (Optional - adds demo content):
```bash
php artisan db:seed
```

6. **Create Storage Link**:
```bash
php artisan storage:link
```

7. **Copy Assets**:
```bash
xcopy "d:\xampp\htdocs\project\sanq\mike\Axis\assets" "d:\xampp\htdocs\project\sanq\mike\Axis-Laravel\public\assets" /E /I /Y
```

8. **Start Development Server**:
```bash
php artisan serve
```

9. **Access the Application**:
   - Frontend: http://localhost:8000
   - Admin Login: http://localhost:8000/login
   - Default Credentials (if seeded):
     - Email: `admin@axis.com`
     - Password: `password`

## Manual Admin User Creation

If you didn't seed the database, create an admin user:

1. Open Command Prompt in project directory
2. Run: `php artisan tinker`
3. Paste this code:
```php
App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@axis.com',
    'password' => bcrypt('password'),
    'role' => 'admin'
]);
exit;
```

## First Steps in Admin Panel

1. Login at `/login`
2. Go to Dashboard at `/admin/dashboard`
3. Add your first service at `/admin/services/create`
4. Add portfolio items at `/admin/portfolio/create`
5. Add team members at `/admin/team/create`
6. Configure site settings at `/admin/settings`

## Common Issues & Solutions

### Issue: "SQLSTATE[HY000]: General error"
**Solution**: Database connection problem
- Check `.env` file database settings
- Ensure MySQL is running
- Verify database `axis_db` exists

### Issue: Images not showing
**Solution**: Run storage link
```bash
php artisan storage:link
```

### Issue: "Call to undefined method"
**Solution**: Run migrations
```bash
php artisan migrate
```

### Issue: Permission Denied on Windows
**Solution**: Run Command Prompt as Administrator

## Useful Commands

```bash
# Clear all caches
php artisan optimize:clear

# Migrate database
php artisan migrate

# Seed sample data
php artisan db:seed

# Create new user
php artisan tinker

# Stop server
Ctrl + C
```

## Need Help?

1. Check `README.md` for detailed documentation
2. Check `ROUTES.md` for all available routes
3. Review error messages in terminal/browser

---

**You're ready to go!** Start building with Axis Laravel.
