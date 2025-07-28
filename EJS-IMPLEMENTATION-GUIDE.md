# Panduan Implementasi EJS untuk Company Profile

## 📋 Daftar Isi
1. [Setup Node.js Project](#setup-nodejs-project)
2. [Struktur Folder](#struktur-folder)
3. [Instalasi Dependencies](#instalasi-dependencies)
4. [Konfigurasi Server](#konfigurasi-server)
5. [Template EJS](#template-ejs)
6. [Testing & Running](#testing--running)
7. [Deployment](#deployment)

## 🚀 Setup Node.js Project

### 1. Buat folder baru untuk company profile
```bash
mkdir company-profile-donasi
cd company-profile-donasi
```

### 2. Initialize Node.js project
```bash
npm init -y
```

### 3. Copy package.json yang sudah disediakan
Copy file `company-profile-package.json` ke folder project Anda dan rename menjadi `package.json`

## 📁 Struktur Folder

Buat struktur folder seperti ini:
```
company-profile-donasi/
├── package.json
├── server.js                 # Main server file
├── views/                    # EJS templates
│   ├── index.ejs            # Homepage
│   ├── donasi.ejs           # Donation page
│   ├── 404.ejs              # 404 page
│   └── error.ejs            # Error page
├── public/                   # Static files
│   ├── css/
│   ├── js/
│   └── images/
└── routes/                   # Route handlers (optional)
```

## 📦 Instalasi Dependencies

Jalankan command ini untuk install semua dependencies:

```bash
npm install
```

Dependencies yang akan terinstall:
- **express**: Web framework untuk Node.js
- **ejs**: Template engine
- **axios**: HTTP client untuk API calls
- **cors**: Cross-Origin Resource Sharing
- **helmet**: Security middleware
- **morgan**: HTTP request logger

## ⚙️ Konfigurasi Server

### 1. Copy server file
Copy file `nodejs-server-example.js` ke project Anda dan rename menjadi `server.js`

### 2. Update konfigurasi API
Edit file `server.js` dan update URL Laravel:

```javascript
const API_CONFIG = {
    baseUrl: 'https://your-laravel-domain.com/api', // Ganti dengan domain Laravel Anda
    timeout: 10000,
    headers: {
        'Accept': 'application/json',
        'User-Agent': 'CompanyProfile/1.0',
        'Origin': 'https://your-company-domain.com' // Ganti dengan domain company profile
    }
};
```

## 🎨 Template EJS

### 1. Buat folder views
```bash
mkdir views
```

### 2. Copy template files
Copy file-file berikut ke folder `views/`:
- `ejs-template-example.ejs` → `views/index.ejs`
- `ejs-donasi-page.ejs` → `views/donasi.ejs`

### 3. Buat template tambahan

**views/404.ejs:**
```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><%= title %></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="display-1">404</h1>
        <p class="fs-3"><span class="text-danger">Oops!</span> <%= message %></p>
        <p class="lead">Halaman yang Anda cari tidak ditemukan.</p>
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</body>
</html>
```

**views/error.ejs:**
```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><%= title %></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="display-4">Server Error</h1>
        <p class="lead"><%= message %></p>
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</body>
</html>
```

## 🧪 Testing & Running

### 1. Jalankan Laravel API terlebih dahulu
Pastikan Laravel API sudah berjalan di `http://localhost:8000`

### 2. Jalankan Node.js server
```bash
# Development mode (auto-reload)
npm run dev

# Production mode
npm start
```

### 3. Akses website
Buka browser dan kunjungi:
- Homepage: `http://localhost:3000`
- Donasi: `http://localhost:3000/donasi`
- API proxy: `http://localhost:3000/api/campaigns`

### 4. Test flow integration
1. Buka company profile di `http://localhost:3000`
2. Klik salah satu campaign card
3. Akan redirect ke Laravel website di `http://localhost:8000/program/{id}`

## 🚀 Deployment

### Deployment ke Vercel

1. Install Vercel CLI:
```bash
npm i -g vercel
```

2. Buat file `vercel.json`:
```json
{
  "version": 2,
  "builds": [
    {
      "src": "server.js",
      "use": "@vercel/node"
    }
  ],
  "routes": [
    {
      "src": "/(.*)",
      "dest": "/server.js"
    }
  ]
}
```

3. Deploy:
```bash
vercel --prod
```

### Deployment ke Heroku

1. Install Heroku CLI
2. Buat file `Procfile`:
```
web: node server.js
```

3. Deploy:
```bash
heroku create your-app-name
git push heroku main
```

## 🔧 Customization

### 1. Styling
Tambahkan CSS custom di folder `public/css/`:

```css
/* public/css/custom.css */
.company-brand {
    color: #your-brand-color;
}

.campaign-card-custom {
    border-radius: 15px;
    /* Custom styling sesuai brand */
}
```

### 2. JavaScript custom
Tambahkan JS custom di folder `public/js/`:

```javascript
// public/js/custom.js
function customTracking(data) {
    // Custom analytics atau tracking
    console.log('Custom tracking:', data);
}
```

### 3. Update template
Edit file `views/index.ejs` dan tambahkan link ke custom files:

```html
<link rel="stylesheet" href="/css/custom.css">
<script src="/js/custom.js"></script>
```

## 📝 Environment Variables

Buat file `.env` untuk konfigurasi:

```env
NODE_ENV=production
PORT=3000
LARAVEL_API_URL=https://your-laravel-domain.com/api
COMPANY_NAME=PT. Example Company
GOOGLE_ANALYTICS_ID=GA_MEASUREMENT_ID
```

Update `server.js` untuk menggunakan env variables:

```javascript
require('dotenv').config();

const API_CONFIG = {
    baseUrl: process.env.LARAVEL_API_URL || 'http://localhost:8000/api',
    // ...
};
```

## 🔍 Troubleshooting

### CORS Issues
Jika ada masalah CORS, pastikan Laravel API sudah dikonfigurasi untuk allow origin dari domain company profile.

### API Connection Issues
1. Cek apakah Laravel API sudah running
2. Cek URL di `API_CONFIG.baseUrl`
3. Cek network connectivity

### Template Errors
1. Pastikan semua variabel EJS sudah di-pass dari server
2. Cek syntax EJS di template files
3. Pastikan folder `views` ada dan readable

## 📞 Support

Jika ada issue atau pertanyaan:
1. Cek console browser untuk error JavaScript
2. Cek terminal Node.js untuk server errors
3. Test API endpoint langsung di browser/Postman

---

**Selamat! Company profile dengan integrasi donasi API sudah siap digunakan! 🎉**
