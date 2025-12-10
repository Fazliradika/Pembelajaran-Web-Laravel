# 🚂 Deploy ke Railway - Panduan Lengkap

Project Laravel ini sudah siap deploy ke Railway dengan MySQL database.

## ✅ Yang Sudah Disiapkan

1. ✅ `Procfile` - Konfigurasi web server
2. ✅ `nixpacks.toml` - Build & deploy config
3. ✅ `AppServiceProvider.php` - Force HTTPS di production
4. ✅ `config/database.php` - Support Railway MySQL variables
5. ✅ `public/build/` - Vite assets sudah di-build

## 🚀 Langkah Deploy

### 1. Push ke GitHub

```bash
git add .
git commit -m "Ready for Railway deployment"
git push origin main
```

### 2. Setup Railway

1. Buka [railway.app](https://railway.app) dan login dengan GitHub
2. Klik **"New Project"** → **"Deploy from GitHub repo"**
3. Pilih repository: `Pembelajaran-Web-Laravel`
4. Railway akan otomatis detect Laravel dan deploy!

### 3. Tambah MySQL Database

1. Di Railway Dashboard, klik **"+ New"** → **"Database"** → **"Add MySQL"**
2. Railway akan otomatis inject variables:
   - `MYSQLHOST`
   - `MYSQLPORT`
   - `MYSQLDATABASE`
   - `MYSQLUSER`
   - `MYSQLPASSWORD`

### 4. Set Environment Variables

Di Railway Dashboard → Tab **"Variables"**, tambahkan:

```env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:XvpUC5EDDWdAS8Re1ydEVYl1o4rZTBZ4ztAIQ5Cpmuo=
APP_DEBUG=false
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
LOG_CHANNEL=stack
LOG_LEVEL=error
```

⚠️ **Catatan**: 
- `RAILWAY_PUBLIC_DOMAIN` dan MySQL variables akan auto-inject oleh Railway
- **JANGAN** set `APP_URL` manual, Railway akan handle otomatis

### 5. Generate Domain

1. Di Railway → Tab **"Settings"**
2. Klik **"Generate Domain"**
3. Railway akan beri domain seperti: `your-app.up.railway.app`

### 6. Database Migration

Railway akan otomatis run migration saat deploy (sudah dikonfigurasi di `nixpacks.toml`).

Cek logs: **Deployments** → **View Logs** → Pastikan migration berhasil

## 🗄️ Import Data ke Railway MySQL

### Opsi 1: Via Railway CLI

```bash
# Install Railway CLI
npm i -g @railway/cli

# Login
railway login

# Link project
railway link

# Connect ke MySQL
railway run mysql -u root -p
```

### Opsi 2: Export/Import Manual

1. Export database lokal:
```bash
mysqldump -u root tugasonlineweb > database.sql
```

2. Di Railway Dashboard → MySQL → **Data** tab
3. Use connection string untuk connect via MySQL client
4. Import file SQL

## ✅ Testing

1. Akses domain Railway: `https://your-app.up.railway.app`
2. Test halaman:
   - Home: `/`
   - Login: `/login`
   - Dashboard: `/dashboard`
   - Products: `/products`
   - Toko: `/toko`
   - Stok: `/stoks`

## 🐛 Troubleshooting

### Error "Mix Manifest Not Found"
Build assets sudah dilakukan, tapi jika masih error:
```bash
npm run build
git add public/build
git commit -m "Add build assets"
git push
```

### Error 500
1. Railway → **Variables** → Set `APP_DEBUG=true` sementara
2. **Deployments** → **View Logs** untuk lihat error detail

### Database Connection Failed
Pastikan MySQL service sudah ter-link dengan Laravel service di Railway.

### CSS/JS Tidak Load
- Pastikan `public/build/` sudah ter-commit ke Git
- Check console browser untuk error 404

## 🔄 Update Aplikasi

Setiap ada perubahan code:

```bash
git add .
git commit -m "Update feature"
git push
```

Railway akan **otomatis re-deploy**! 🎉

## 📊 Environment Variables di Railway

### Set Manual:
- `APP_NAME`
- `APP_ENV`
- `APP_KEY`
- `APP_DEBUG`
- `SESSION_DRIVER`
- `CACHE_STORE`
- `LOG_CHANNEL`

### Auto-Inject oleh Railway:
- `RAILWAY_PUBLIC_DOMAIN`
- `MYSQLHOST`
- `MYSQLPORT`
- `MYSQLDATABASE`
- `MYSQLUSER`
- `MYSQLPASSWORD`

## 💡 Tips

1. **Jangan commit `.env`** - File `.env` lokal tidak akan ter-upload (sudah di `.gitignore`)
2. **Monitor Logs** - Selalu cek deployment logs untuk error
3. **Free Plan Limit** - Railway free plan punya limit execution hours
4. **Database Backup** - Export database secara berkala

## 🔗 Links

- [Railway Documentation](https://docs.railway.app)
- [Laravel Deployment](https://laravel.com/docs/deployment)
- [Railway Discord](https://discord.gg/railway)

---

**Railway Features:**
- ✅ Auto detect Laravel
- ✅ Auto install Composer & NPM
- ✅ Auto run migrations
- ✅ Free SSL certificate
- ✅ Built-in MySQL database
- ✅ Auto deploy dari GitHub
- ✅ Environment variables management
- ✅ Deployment logs & monitoring

Selamat deploy! 🚀
