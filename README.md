# CMS Sederhana dengan MVC

Content Management System (CMS) sederhana yang dibangun menggunakan PHP native dengan pola desain MVC (Model-View-Controller). CMS ini memiliki tema feminin yang elegan dan responsif.

## 🌟 Fitur Utama

### 1. Manajemen Konten
- **Artikel**
  - Tambah artikel baru
  - Edit artikel
  - Hapus artikel
  - Tampilan grid yang menarik
  - Upload gambar artikel
  - Format tanggal otomatis

### 2. Tampilan
- **Tema Feminin**
  - Warna Utama: Soft Purple (#8A7AD8)
  - Warna Sekunder: Pink (#FF69B4)
  - Warna Aksen: Light Purple (#B19CD9)
  - Background: Soft White (#F8F9FE)
- **Desain Responsif**
  - Tampilan optimal di desktop dan mobile
  - Sidebar yang bisa di-collapse
  - Grid layout yang adaptif

### 3. Keamanan
- Sistem login admin
- Proteksi halaman admin
- Sanitasi input
- Prepared statements
- Validasi form

## 🚀 Instalasi

### Prasyarat
- PHP 7.4+
- MySQL/MariaDB
- Web server (Apache/Nginx)
- Git

### Langkah Instalasi
1. **Clone Repository**
   ```bash
   git clone [url-repository] project
   cd project
   git checkout mvc_cms_sederhana
   ```

2. **Database**
   - Buat database: `project`
   - Import `database.sql`
   - Sesuaikan `config/database.php`

3. **Web Server**
   - Folder di `htdocs/`
   - Akses: `http://localhost/project/`

4. **Login Default**
   - Username: `sarla`
   - Password: `12345`

## 📁 Struktur Project

```
project/
├── app/
│   ├── controllers/     # Logic aplikasi
│   ├── models/         # Interaksi database
│   ├── views/          # Tampilan
│   └── config/         # Konfigurasi
├── uploads/            # Gambar artikel
├── index.php          # Entry point
└── README.md         # Dokumentasi
```

## 🔧 Pengembangan

### Branch Management
- `main` - Branch utama
- `mvc_cms_sederhana` - Branch development

### Cara Menggunakan Branch

1. **Pindah ke Branch Development**
   ```bash
   git checkout mvc_cms_sederhana
   ```

2. **Buat Branch Baru untuk Fitur**
   ```bash
   git checkout -b fitur-baru
   ```

3. **Commit Perubahan**
   ```bash
   git add .
   git commit -m "Deskripsi perubahan"
   ```

4. **Push ke GitHub**
   ```bash
   git push origin fitur-baru
   ```

5. **Merge ke Development**
   - Buat Pull Request
   - Review kode
   - Merge ke `mvc_cms_sederhana`

### Menggunakan Git Desktop

1. **Pindah Branch**
   - Klik menu "Branch"
   - Pilih "New Branch"
   - Nama: `mvc_cms_sederhana`
   - Klik "Create Branch"

2. **Commit**
   - Pilih file yang diubah
   - Tulis commit message
   - Klik "Commit to mvc_cms_sederhana"

3. **Push**
   - Klik "Push origin"
   - Pilih branch tujuan

## 🛠️ Teknologi

- **Backend**: PHP 7.4+, MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Pattern**: MVC

## 📝 Catatan

1. **Keamanan**
   - Ganti password default
   - Backup database rutin
   - Update CMS berkala

2. **Development**
   - Ikuti standar coding
   - Dokumentasi kode
   - Testing sebelum deploy

## 📄 Lisensi

[MIT License](https://choosealicense.com/licenses/mit/) 