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
Menampilkan sambutan kepada pengguna dengan informasi jumlah artikel, jumlah kategori berita, dan ketersediaan layanan berita 24/7. Terdapat tombol "Explore News" untuk langsung menuju berita terbaru. Tampilan ini menggunakan desain modern dengan elemen visual seperti gambar “Breaking News”.

### 2. Halaman Berita Terbaru
Menampilkan daftar artikel terbaru secara dinamis. Setiap berita ditampilkan dalam bentuk kartu yang mencakup kategori, waktu publikasi, gambar, dan ringkasan berita. Pengguna dapat mengklik "Read Full Story" untuk membaca berita lengkap.

### 3. Trending dan Kategori
Bagian "Trending Stories" menampilkan berita yang paling banyak dibaca dan dibagikan. Di bawahnya terdapat bagian "Explore Categories" yang menyajikan daftar kategori seperti Politik, Ekonomi, Olahraga, dan Teknologi dengan jumlah artikel di setiap kategori. Pengguna dapat menjelajah berdasarkan minat mereka.
