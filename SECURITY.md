# Security Policy

## Reporting Security Issues

If you discover a security vulnerability within this project, please email the maintainer. All security vulnerabilities will be promptly addressed.

## Security Best Practices

### Environment Configuration

1. **Never commit `.env` files** - The `.env` file contains sensitive credentials and should never be committed to version control.

2. **Generate a new APP_KEY** - After deployment, generate a new application key:
   ```bash
   php artisan key:generate
   ```

3. **Use strong database passwords** - Ensure your database password is strong and unique.

4. **Environment-specific settings**:
   - Set `APP_DEBUG=false` in production
   - Set `APP_ENV=production` in production
   - Use HTTPS in production (set `APP_URL` to `https://`)

### Database Credentials

The `.env.example` file provides a template for required environment variables. Copy it to `.env` and fill in your actual credentials:

```bash
cp .env.example .env
php artisan key:generate
```

### Railway Deployment

When deploying to Railway, the platform automatically injects database variables. You can reference them in your `.env`:

```
DB_HOST=${MYSQLHOST}
DB_PORT=${MYSQLPORT}
DB_DATABASE=${MYSQLDATABASE}
DB_USERNAME=${MYSQLUSER}
DB_PASSWORD=${MYSQLPASSWORD}
```

## Password Hashing

This application uses bcrypt for password hashing. All passwords are automatically hashed when stored in the database through Laravel's password casting feature.

## Updated Security Fixes

### 2024-12-10
- Removed committed `.env` file from repository
- Enabled password hashing in User model
- Updated database seeder to use bcrypt for passwords
- Updated `.gitignore` to properly exclude `.env` file
