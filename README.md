# 📌 Aplikasi Manajemen Data KTP

Aplikasi ini merupakan sistem manajemen data KTP berbasis web yang dibangun menggunakan Laravel. Aplikasi ini dirancang untuk mengelola data penduduk dalam jumlah besar dengan fitur lengkap seperti CRUD, import/export data, API, serta pengaturan hak akses pengguna.

---

## 🚀 Fitur Utama

### 1. CRUD Data KTP

* Menampilkan, menambah, mengubah, dan menghapus data KTP
* Upload foto penduduk
* NIK digenerate otomatis (unik & random)
* Umur dihitung otomatis berdasarkan tanggal lahir

---

### 2. Export Data

* Export data ke format:

  * CSV (untuk data besar)
  * PDF (untuk laporan)

---

### 3. Import Data

* Import data KTP melalui file CSV
* Mendukung input data dalam jumlah besar

---

### 4. Data Besar (Big Data)

* Mendukung minimal **10.000 data penduduk**
* Optimasi performa menggunakan pagination

---

### 5. REST API (JSON)

* Menyediakan endpoint API:

  * GET data KTP
* Format response JSON
* Siap digunakan untuk integrasi frontend / mobile

---

### 6. Hak Akses (Role Management)

#### 👨‍💼 Admin

* CRUD data KTP
* Import data CSV
* Export CSV & PDF
* Melihat aktivitas user

#### 👤 User

* Melihat data KTP
* Export data (CSV & PDF)
* Tidak memiliki akses CRUD & import

---

### 7. Activity Log

* Mencatat aktivitas user seperti:

  * Login
  * Export data
  * Import data
  * Perubahan data

---

## 🛠️ Teknologi yang Digunakan

* Laravel
* Laravel Breeze (Authentication)
* Bootstrap (UI)
* MySQL
* DomPDF (Export PDF)

---

## 📦 Instalasi

```bash
git clone https://github.com/aldysufri17/bromindo_test.git
cd ktp-app
composer install
cp .env.example .env
php artisan key:generate
php artisan storege:link
php artisan migrate --seed
php artisan serve
```

---

## 🔐 Akun Default

| Role  | Email                                   | Password |
| ----- | --------------------------------------- | -------- |
| Admin | [admin@gmail.com] | password |
| User  | [user@gmail.com]  | password |

---

## 🌐 API Endpoint

```http
GET /api/ktp
```

Response:

```json
{
  "status": true,
  "data": [...]
}
```

---

## 📁 Struktur Fitur

* CRUD KTP
* Import CSV
* Export CSV & PDF
* API JSON
* Activity Log

---