# Laravel Admin Panel (Laravel 12)

> A comprehensive admin panel built with **Laravel 12**, featuring user management, profile management, settings, and a modern dashboard with sidebar navigation.

**Repository**: `laravel-admin-panel`  
**Laravel Version**: 12.x  
**PHP Version**: 8.2+

## Features

- 🔐 **Authentication** - Login and registration for admin users
- 👥 **User Management** - Full CRUD operations with search and filtering
- 👤 **Profile Management** - View/edit profile and change password
- ⚙️ **Settings Management** - Site configuration with database storage
- 📊 **Dashboard** - Statistics cards and recent users table
- 🎨 **Modern UI** - Tailwind CSS with dark mode support
- 🔒 **Security** - CSRF protection, password hashing, admin middleware

## Requirements

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL >= 8.0
- Laravel 12.x

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/aneeshaji/laravel-admin-panel.git
cd laravel-admin-panel
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Environment Configuration

Copy the `.env.example` file to `.env`:

```bash
copy .env.example .env
```

Update the database configuration in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Create Database

Create a MySQL database named `laravel12_db`:

```sql
CREATE DATABASE laravel12_db;
```

### 7. Run Migrations

```bash
php artisan migrate
```

### 8. Seed Database

Seed the database with an admin user and test users:

```bash
php artisan db:seed --class=AdminUserSeeder
```

This will create:
- **Admin User**: `admin@example.com` / `password`
- **Test User 1**: `john@example.com` / `password`
- **Test User 2**: `jane@example.com` / `password`

### 9. Build Frontend Assets

```bash
npm run build
```

For development with hot reload:

```bash
npm run dev
```

### 10. Start Development Server

```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

## Usage

### Accessing the Admin Panel

1. Navigate to `http://localhost:8000`
2. You'll be redirected to the login page
3. Login with admin credentials:
   - **Email**: `admin@example.com`
   - **Password**: `password`

### Available Routes

- `/` - Redirects to login
- `/login` - Login page
- `/register` - Admin registration
- `/dashboard` - Admin dashboard
- `/users` - User management
- `/profile` - Profile management
- `/settings` - Site settings

## Project Structure

```
laravel12-mysql-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Admin/
│   │   │       ├── AuthController.php
│   │   │       ├── DashboardController.php
│   │   │       ├── UserController.php
│   │   │       ├── ProfileController.php
│   │   │       └── SettingsController.php
│   │   └── Middleware/
│   │       └── EnsureUserIsAdmin.php
│   └── Models/
│       ├── User.php
│       └── Setting.php
├── database/
│   ├── migrations/
│   │   ├── 2026_02_12_152924_add_is_admin_to_users_table.php
│   │   └── 2026_02_13_014440_create_settings_table.php
│   └── seeders/
│       └── AdminUserSeeder.php
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── auth/
│       │   │   ├── login.blade.php
│       │   │   └── register.blade.php
│       │   ├── users/
│       │   │   ├── index.blade.php
│       │   │   ├── create.blade.php
│       │   │   └── edit.blade.php
│       │   ├── profile/
│       │   │   ├── show.blade.php
│       │   │   └── edit.blade.php
│       │   ├── settings/
│       │   │   └── index.blade.php
│       │   └── dashboard.blade.php
│       └── components/
│           └── admin-layout.blade.php
└── routes/
    └── web.php
```

## Database Schema

### Users Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | string | User's full name |
| email | string | Unique email address |
| password | string | Hashed password |
| is_admin | boolean | Admin flag |
| email_verified_at | timestamp | Email verification |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Update timestamp |

### Settings Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| key | string | Unique setting key |
| value | text | Setting value |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Update timestamp |

## Development

### Running Tests

```bash
php artisan test
```

### Code Style

This project follows PSR-12 coding standards.

### Building for Production

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Features in Detail

### User Management

- Create, read, update, and delete users
- Search users by name or email
- Filter users by admin/regular status
- Pagination (10 users per page)
- Self-deletion protection

### Profile Management

- View current user profile
- Edit name and email
- Change password with current password verification
- Separate forms for profile info and password

### Settings Management

- Site name configuration
- Site email configuration
- Maintenance mode toggle
- Users per page setting
- Database-backed key-value storage

### Dashboard

- Total users count
- Admin users count
- New signups (last 7 days)
- Regular users count
- Recent users table

## Security

- CSRF protection on all forms
- Password hashing with bcrypt
- Admin middleware for protected routes
- Session-based authentication
- SQL injection protection via Eloquent ORM

## Troubleshooting

### Vite Manifest Not Found

If you see a Vite manifest error:

```bash
npm install
npm run build
```

### Database Connection Error

Ensure your MySQL server is running and credentials in `.env` are correct.

### Permission Denied

On Linux/Mac, you may need to set permissions:

```bash
chmod -R 775 storage bootstrap/cache
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Credits

Built with:
- [Laravel 12](https://laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Vite](https://vitejs.dev)

## Support

For issues and questions, please open an issue on the repository.
