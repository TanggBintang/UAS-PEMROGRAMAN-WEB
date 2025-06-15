# UAS Pemrograman Web News-App

Nama: Muhammad Ilham Bintang  
NIM / Kelas: 23091397129 / 2023D  
Prodi: D4 Manajemen Informatika  
Mata Kuliah: UAS - Pemrograman Web Lanjut  
Universitas: Universitas Negeri Surabaya

## Projek Aplikasi Berita Laravel 10 + AdminLTE

Projek ini adalah sebuah aplikasi manajemen berita berbasis web yang dibangun dengan framework Laravel 10 dan template AdminLTE. Aplikasi ini dirancang untuk mengelola konten berita dengan sistem role-based, memungkinkan berbagai jenis pengguna (admin, editor, wartawan) untuk berkolaborasi dalam pembuatan dan publikasi berita.

### Fitur Utama:

**Autentikasi**
- Login/Register dengan email dan password.
- Lupa/reset password.
- Login menggunakan akun sosial (Google, GitHub, Microsoft).

**Manajemen Pengguna**
- Tiga role: Admin (akses penuh), Editor (approve/reject berita), Wartawan (buat/edit berita).
- Update profil dengan upload avatar.

**Manajemen Berita**
- CRUD berita dengan upload gambar.
- Kategori berita (Politik, Ekonomi, Olahraga, dll.).
- Sistem status: Draft → Published/Rejected (butuh approval editor).

**Dashboard Admin**
- Statistik jumlah berita, kategori, dan pengguna.
- Daftar berita terbaru.

**Tampilan Modern**
- Template AdminLTE dengan desain responsif.
- Custom CSS untuk konsistensi visual.
- Animasi dan notifikasi interaktif.

### Teknologi:
- Backend: Laravel 10, MySQL.
- Frontend: AdminLTE, Bootstrap, jQuery.
- Libraries: Laravel Socialite (login sosial), Intervention Image (manajemen gambar).

## Demonstrasi Projek

Berikut adalah tampilan antarmuka dari aplikasi News-App:

### 1. Beranda (Welcome Page)
![Beranda 1](https://github.com/user-attachments/assets/4ebb8413-97ea-46e2-bd89-4af8fd16ff17)
![Beranda 2](https://github.com/user-attachments/assets/79576738-0781-4b95-9dfb-06f246645ebf)
![Beranda 3](https://github.com/user-attachments/assets/4ba353c8-abb7-4ae0-8237-400eeccae655)

Menampilkan sambutan kepada pengguna dengan informasi jumlah artikel, jumlah kategori berita, dan ketersediaan layanan berita 24/7. Terdapat tombol "Explore News" untuk langsung menuju berita terbaru. Tampilan ini menggunakan desain modern dengan elemen visual seperti gambar “Breaking News”.
## Halaman Berita Terbaru
Menampilkan daftar artikel terbaru secara dinamis. Setiap berita ditampilkan dalam bentuk kartu yang mencakup kategori, waktu publikasi, gambar, dan ringkasan berita. Pengguna dapat mengklik "Read Full Story" untuk membaca berita lengkap.
## Trending dan Kategori
Bagian "Trending Stories" menampilkan berita yang paling banyak dibaca dan dibagikan. Di bawahnya terdapat bagian "Explore Categories" yang menyajikan daftar kategori seperti Politik, Ekonomi, Olahraga, dan Teknologi dengan jumlah artikel di setiap kategori. Pengguna dapat menjelajah berdasarkan minat mereka.

## 2. Halaman Login

![Login](https://github.com/user-attachments/assets/11c31eca-d65d-48a8-a9fd-7457527ae121)

- **URL:** `http://127.0.0.1:8000/login`
- **Judul Halaman:** Login - News App

### Fitur
- Form login:
  - Input email/username
  - Input password
  - Checkbox "Remember Me"
- Tombol login:
  - `Sign In`
  - `Sign in using Google`
  - `Sign in using Github`
  - `Sign in using Microsoft`
- Link tambahan:
  - `I forgot my password`
  - `Register a new membership`

### Desain
- Background gradient ungu biru
- Kotak login berada di tengah halaman dengan tampilan modern
- Font konsisten dan tombol sosial media berwarna cerah
- Logo aplikasi: **NewsApp** dengan gaya gradasi warna

---

## 3. Halaman Register

![Register](https://github.com/user-attachments/assets/326430b0-b618-443c-9b0c-dccf042c512f)

- **URL:** `http://127.0.0.1:8000/register`
- **Judul Halaman:** Register - News App

### Fitur
- Form registrasi:
  - Input full name
  - Input email
  - Input password
  - Input retype password
  - Checkbox "I agree to the terms"
- Tombol register:
  - `Register`
  - `Sign up using Google`
  - `Sign up using Github`
  - `Sign up using Microsoft`
- Link tambahan:
  - `I already have a membership`

### Desain
- Warna dan tata letak konsisten dengan halaman login
- Form berada dalam card dengan tampilan elegan
- Tombol menggunakan gradasi warna dan ikon sesuai platform

## 4. Login dengan Google dan GitHub (Microsoft tidak bisa karena akun saya tidak bisa terdaftar sebagai tenant)

Proyek ini mendukung autentikasi menggunakan dua provider OAuth utama:

### Login dengan GitHub

![Login dengan Github](https://github.com/user-attachments/assets/0fd332d2-35e2-46d8-8c7a-333af45e5284)

- Pengguna dapat masuk menggunakan akun GitHub mereka
- Setelah mengklik opsi login GitHub, pengguna akan diarahkan ke halaman autentikasi GitHub
- Terlihat jelas bahwa aplikasi **"News App"** terdaftar sebagai aplikasi yang meminta akses
- URL menunjukkan proses OAuth dengan parameter client_id dan redirect yang sesuai

### Login dengan Google

![Login dengan Google](https://github.com/user-attachments/assets/a57c1b2f-1f08-4846-8f22-8417d15c2a93)

- Pengguna juga dapat memilih untuk masuk menggunakan akun Google
- Halaman autentikasi Google menampilkan "Sign in to continue to **news-app**"
- Ini membuktikan bahwa aplikasi telah dikonfigurasi dengan benar di Google Cloud Console
- Interface Google yang familiar memudahkan pengguna untuk melakukan autentikasi

### Bukti Integrasi
Kedua screenshot menunjukkan bahwa:
1. **Nama proyek "News App"** muncul di halaman autentikasi GitHub
2. **Identifier "news-app"** tampil di halaman autentikasi Google
3. URL OAuth yang valid menunjukkan konfigurasi yang tepat
4. Proses redirect berjalan dengan normal antara aplikasi dan provider autentikasi

Fitur dual authentication ini memberikan fleksibilitas bagi pengguna untuk memilih metode login yang paling nyaman bagi mereka.

## 5. Fitur Manajemen Berita (level akses ADMIN)

### Dashboard Admin
![Dashboard](https://github.com/user-attachments/assets/d2f4fa92-e18f-44db-b08e-efaf1ac0f398)

- **Dashboard Overview**: Menampilkan statistik lengkap dengan 5 total berita, 2 berita published, 2 draft, dan 5 kategori
- **Recent News Table**: Menampilkan daftar berita terbaru dengan informasi title, category, author, status, dan tanggal dibuat
- **Multi-status Management**: Sistem mendukung status "Published", "Rejected", dan "Draft"

### CRUD Operations
Aplikasi News App ini memiliki fitur CRUD (Create, Read, Update, Delete) yang lengkap:
![manajemen berita](https://github.com/user-attachments/assets/6ac2597a-b30a-4ce3-9b84-73b5885503ca)

#### **Create (Tambah Berita)**
![Halaman buat berita](https://github.com/user-attachments/assets/36af55ce-3d35-4974-a07c-6644f072c9ee)

- Form pembuatan berita dengan field:
  - Title (judul berita)
  - Category (dropdown kategori)
  - Featured Image (upload gambar dengan validasi Max 2MB, JPG/PNG/GIF)
  - Content (editor konten berita)
- File upload terintegrasi dengan file browser sistem

#### **Read (Lihat Berita)**
![halaman view berita](https://github.com/user-attachments/assets/c7fbd779-78d1-4021-98a6-385a2dac4f78)

- Halaman detail berita dengan tampilan lengkap
- Menampilkan gambar featured, judul, kategori, author, dan tanggal publish
- Breadcrumb navigation: Dashboard / News / View

#### **Update (Edit Berita)**
![Halaman Edit Berita](https://github.com/user-attachments/assets/17c72829-0073-4726-84ab-1e6fc0526fb3)

- Form edit dengan data yang sudah terisi
- Fitur "Change Image" untuk mengganti gambar
- Option "Leave blank to keep current image/picture"
- Preservasi data existing saat editing

#### **Delete (Hapus Berita)**
- Tombol delete tersedia di action buttons
- Tersedia di halaman list maupun detail view

### Sistem Approval Workflow
- **Status Management**: 
  - ✅ **Published** - Berita yang sudah disetujui dan dipublikasi
  - ❌ **Rejected** - Berita yang ditolak
  - 📝 **Draft** - Berita yang masih dalam tahap draft/menunggu approval

### Action Buttons Lengkap
Setiap berita memiliki action buttons dengan kode warna yang jelas:
- 🔵 **View** (Cyan) - Melihat detail berita
- 🟠 **Edit** (Orange) - Mengedit berita
- 🟢 **Approve** (Green) - Menyetujui berita untuk publish
- ⚫ **Reject** (Gray) - Menolak berita
- 🔴 **Delete** (Pink) - Menghapus berita

### Fitur Tambahan
- **User Profile Management**: Halaman profil dengan update foto, nama, email, dan password
- **Role-based Access**: Sistem mendeteksi level akses admin
- **File Management**: Terintegrasi dengan file browser untuk upload dan manage file
- **Responsive Design**: Interface yang clean dan user-friendly
- **Real-time Status Updates**: Status berita dapat diubah secara real-time

### Kategori Berita
Aplikasi mendukung berbagai kategori berita seperti:
- Kesehatan
- Teknologi  
- Olahraga
- Ekonomi
- Politik
- Dan kategori lainnya

Semua fitur ini menunjukkan bahwa News App memiliki sistem manajemen konten yang lengkap dan profesional untuk mengelola berita dari tahap draft hingga publikasi.

# News Management System

## 6. Dashboard News Management (Level Editor)

![Dashboard](https://github.com/user-attachments/assets/07915a80-5a1f-4c82-9323-bdeff1e8fbc8)

Dashboard utama untuk editor yang menampilkan daftar berita dengan berbagai status dan informasi lengkap.

### Navigasi Utama
Aplikasi menyediakan navigasi sidebar dengan menu:
- Dashboard
- News Management
- Profile

### Kategori Berita
Aplikasi mendukung berbagai kategori berita seperti:
- Kesehatan
- Teknologi
- Olahraga
- Ekonomi
- Politik

### Status Publikasi
Setiap berita memiliki status yang dapat diidentifikasi:
- Published (Hijau)
- Rejected (Merah)
- Draft (Kuning)

### Informasi Artikel
Setiap artikel menampilkan:
- Thumbnail gambar
- Judul berita
- Deskripsi singkat
- Nama penulis
- Tanggal publikasi
- Tombol aksi

## 7. Detail View Berita
![halaman view berita](https://github.com/user-attachments/assets/ca593c9b-3239-4c76-a53d-56381499b156)

Halaman detail untuk melihat dan mengelola artikel individual.

### Konten Artikel
Menampilkan informasi lengkap artikel:
- Judul: "Pemerintah Resmi Naikkan Subsidi Energi untuk Rakyat"
- Kategori: Ekonomi
- Penulis: MUHAMMAD ILHAM BINTANG
- Tanggal: 15 Jun 2025
- Status: Draft

### Panel Aksi Editor
Editor memiliki kontrol untuk:
- Approve & Publish
- Reject
- Back to List

## 8. Tabel Manajemen Berita
![manajemen berita](https://github.com/user-attachments/assets/426b8290-a06f-4a4b-9e14-ef8440de34ba)

Tampilan tabel komprehensif untuk manajemen berita massal.

### Kolom Tabel
- Image
- Title
- Category
- Author
- Status
- Created
- Actions

### Fitur Manajemen
- View artikel individual
- Approve/Reject artikel
- Bulk actions untuk multiple artikel
- Filter berdasarkan status dan kategori

## 9. Profil Editor
![Halaman Profile](https://github.com/user-attachments/assets/d3e1a899-45a9-4f76-bc4d-0db50bb6f5e1)

Halaman pengaturan profil untuk editor.

### Informasi Profil
- Foto profil
- Nama: Editor User
- Email: editor@editor.com
- Role: Editor
- Member since: 12 Jun 2025

### Pengaturan Akun
Form untuk mengubah:
- Full Name
- Email Address
- Profile Picture
- Current Password
- New Password

## 10. Dashboard Utama (Level Akses Wartawan)
![Dashboard](https://github.com/user-attachments/assets/a2aa08b2-9dbf-4acd-9076-28790a26d2f0)

Dashboard menampilkan ringkasan statistik aplikasi berita:
- **Total News**: 5 berita dalam sistem
- **Published News**: 3 berita yang telah dipublikasikan
- **Draft News**: 1 berita dalam status draft
- **Categories**: 5 kategori berita tersedia

### Recent News Table
Tabel menampilkan berita terbaru dengan kolom:
- **Title**: Judul berita
- **Category**: Kategori berita (Kesehatan, Teknologi, Olahraga, Ekonomi)
- **Author**: Penulis berita
- **Status**: Status publikasi (Published/Rejected)
- **Created**: Tanggal pembuatan

## 11. Edit News - Halaman Penyuntingan
![fitur edit berita](https://github.com/user-attachments/assets/b3251069-d3b1-4de7-8c40-c809006174d7)

Fitur untuk mengedit berita yang sudah ada:
- **Title**: Field untuk mengubah judul berita
- **Category**: Dropdown untuk memilih kategori (Teknologi dipilih)
- **Current Image**: Menampilkan gambar saat ini yang terkait dengan berita
- **Change Image**: Tombol untuk mengganti gambar dengan file baru
- **Content**: Area teks untuk mengedit isi berita

### Breadcrumb Navigation
`Dashboard / News / Edit` - menunjukkan lokasi halaman saat ini

## 12. View News - Tampilan Detail Berita
![Fitur view news](https://github.com/user-attachments/assets/b89a691f-4093-48ce-9355-255d3bfdc7e6)

Halaman untuk melihat detail berita:
- **Title**: "TES" (judul berita)
- **Metadata**: 
  - Category: Kesehatan
  - Author: Dennis Ipon 7
  - Date: 15 Jun 2025
  - Status: Draft
- **Featured Image**: Gambar utama berita (menampilkan vaksin rabies)
- **Actions Panel**: Panel di sebelah kanan dengan opsi:
  - Edit
  - Delete
  - Back to List

## 13. Create News - Formulir Pembuatan Berita
![Halaman Buat Berita](https://github.com/user-attachments/assets/f0bf8d15-75c2-4f0a-914b-5c7d04194c62)

Halaman untuk membuat berita baru:
- **Title**: Field input untuk judul berita ("TES")
- **Category**: Dropdown kategori (Kesehatan dipilih)
- **Featured Image**: 
  - Upload file (vaskin.jpg dipilih)
  - Preview gambar yang akan diupload
  - Batasan: Max 2MB, format JPG/PNG/GIF
- **Content**: Text area untuk menulis isi berita ("TES")

## 14. News Management - Daftar Berita (Level Wartawan)
![News Manajemen](https://github.com/user-attachments/assets/98ce8b5d-8358-4ec2-b6c1-a36539f63383)

### Catatan Penting untuk Level Wartawan:
Pada level akses wartawan, terdapat **3 fitur utama** dalam kolom Actions:
1. **View** (ikon mata biru) - Melihat detail berita
2. **Edit** (ikon pensil kuning) - Mengedit berita
3. **Delete** (ikon tempat sampah pink) - Menghapus berita

> **Penting**: Hanya berita yang diupload oleh akun wartawan sendiri yang dapat diakses untuk ketiga fitur tersebut.

### Tabel News List
- **Image**: Thumbnail gambar berita
- **Title**: Judul berita dengan deskripsi singkat
- **Category**: Badge kategori (Teknologi, Kesehatan, dll)
- **Author**: Nama penulis
- **Status**: Status publikasi dengan badge warna
- **Created**: Tanggal dan waktu pembuatan
- **Actions**: Tombol aksi sesuai level akses

## 15. Profile Management - Pengaturan Profil
![Profile](https://github.com/user-attachments/assets/23f91f39-3522-41db-a816-ab7729037c25)

### Informasi Akun
- **Name**: Dennis Ipon 7
- **Email**: muhammadilham.23129@mhs.unesa.ac.id
- **Role**: Wartawan (ditampilkan dengan ikon)
- **Member Since**: 14 Jun 2025

### Update Profile Form
- **Full Name**: Field untuk mengubah nama lengkap
- **Email Address**: Field email (dengan catatan login GitHub - akun UNESA)
- **Profile Picture**: Upload gambar profil baru
- **Password Management**: 
  - Current Password (required only if changing)
  - New Password

## 16. News Created Successfully
![setelah upload berita](https://github.com/user-attachments/assets/8c79ffaf-c5ad-495f-83ea-3303b84659d1)

Setelah berhasil membuat berita, sistem menampilkan:
- **Success Message**: "News created successfully!" dengan background hijau
- **Updated News List**: Berita baru "TES" muncul di daftar dengan status "Draft"
- **Timestamp**: Berita tersimpan pada 15 Jun 2025, 08:39

### Status Berita Baru
- Status otomatis: **Draft** (perlu review sebelum publikasi)
- Dapat diedit atau dihapus oleh penulis
- Menunggu persetujuan untuk publikasi

---

## Catatan Sistem
- **Version**: 1.0.0
- **Copyright**: © 2025 News App. All rights reserved.
- **Login Level**: Wartawan (akses terbatas pada konten sendiri)
- **User**: Dennis Ipon 7 (muhammadilham.23129@mhs.unesa.ac.id)

