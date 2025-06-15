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

