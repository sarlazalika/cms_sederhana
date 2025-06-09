# CMS Sederhana

CMS (Content Management System) sederhana dengan tema feminin yang elegan. Dibangun menggunakan PHP native dengan struktur MVC.

## 🎨 Fitur

- **Tema Feminin**: Desain modern dengan warna-warna soft (ungu dan pink)
- **Responsif**: Tampilan yang optimal di desktop dan mobile
- **Manajemen Artikel**: 
  - Tambah artikel baru
  - Edit artikel
  - Hapus artikel
  - Tampilan grid yang menarik
- **Keamanan**:
  - Sistem login admin
  - Proteksi halaman admin
  - Sanitasi input
- **User Interface**:
  - Dashboard dengan statistik
  - Sidebar navigasi yang intuitif
  - Animasi dan transisi yang halus
  - Alert untuk feedback user

## 🚀 Instalasi

1. Clone repository ini ke folder htdocs:
   ```bash
   git clone [url-repository] project
   ```

2. Import database:
   - Buka phpMyAdmin
   - Buat database baru dengan nama `project`
   - Import file `database.sql`

3. Konfigurasi database:
   - Buka `config/database.php`
   - Sesuaikan pengaturan database jika diperlukan:
     ```php
     $host = "localhost";
     $user = "root";
     $pass = "";
     $db = "project";
     ```

4. Akses CMS:
   - Buka browser
   - Kunjungi `http://localhost/project/`
   - Login dengan kredensial default:
     - Username: `sarla`
     - Password: `12345`

## 📁 Struktur Folder

```
project/
├── app/
│   ├── controllers/     # Controller files
│   ├── models/         # Model files
│   ├── views/          # View files
│   │   ├── artikel/    # Article views
│   │   ├── dashboard/  # Dashboard views
│   │   └── layouts/    # Layout templates
│   └── config/         # Configuration files
├── uploads/            # Uploaded images
├── index.php          # Entry point
└── README.md          # Documentation
```

## 🎯 Penggunaan

### Login Admin
1. Buka `http://localhost/project/`
2. Masukkan username dan password
3. Klik tombol login

### Manajemen Artikel
1. **Tambah Artikel**:
   - Klik "Tambah Artikel" di halaman artikel
   - Isi judul dan konten
   - Klik "Tambah Artikel" untuk menyimpan

2. **Edit Artikel**:
   - Klik tombol "Edit" pada artikel yang ingin diubah
   - Modifikasi judul atau konten
   - Klik "Simpan" untuk mengupdate

3. **Hapus Artikel**:
   - Klik tombol "Hapus" pada artikel
   - Konfirmasi penghapusan

## 🎨 Tema & Styling

CMS menggunakan tema feminin dengan:
- Warna Utama: Soft Purple (#8A7AD8)
- Warna Sekunder: Pink (#FF69B4)
- Warna Aksen: Light Purple (#B19CD9)
- Background: Soft White (#F8F9FE)

Fitur desain:
- Gradient effects
- Soft shadows
- Rounded corners
- Smooth transitions
- Responsive grid layout

## 🔒 Keamanan

- Session management untuk autentikasi
- Sanitasi input untuk mencegah XSS
- Prepared statements untuk query database
- Validasi form
- Proteksi direktori uploads

## 🛠️ Teknologi

- PHP 7.4+
- MySQL/MariaDB
- HTML5
- CSS3 (Custom properties, Flexbox, Grid)
- JavaScript (Vanilla)

## 📝 Catatan

- Pastikan folder `uploads/` memiliki permission yang benar (777)
- Backup database secara berkala
- Gunakan password yang kuat untuk akun admin
- Update CMS secara berkala untuk keamanan

## 🤝 Kontribusi

Silakan buat pull request untuk kontribusi. Untuk perubahan besar, buka issue terlebih dahulu untuk mendiskusikan perubahan yang diinginkan.

## 📄 Lisensi

[MIT](https://choosealicense.com/licenses/mit/)