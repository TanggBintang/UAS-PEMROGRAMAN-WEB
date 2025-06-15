# Aplikasi Berita - Proyek Laravel

![Screenshot Aplikasi Berita](assets/images/screenshot.png)

## Deskripsi Proyek

Aplikasi Berita ini adalah platform web berbasis Laravel yang menyediakan fitur untuk:
- Publikasi berita
- Manajemen konten
- Sistem autentikasi pengguna
- Kontrol akses berbasis peran
- Integrasi media sosial

## Fitur Utama

### 1. Halaman Depan (`home.blade.php`)

**Fungsi:**
- Menampilkan berita terbaru dalam bentuk kartu
- Menyajikan berita trending/populer
- Eksplorasi kategori berita
- Formulir langganan newsletter

**Fitur Khusus:**
- Section hero dengan statistik
- Animasi kartu berita
- Desain responsif

### 2. Halaman Admin (`index.blade.php`)

**Fungsi:**
- Manajemen berita (CRUD)
- Approve/reject berita
- Statistik cepat

**Fitur Khusus:**
- Tabel dengan pagination
- Badge status berita
- Tombol aksi sesuai role

### 3. Halaman Buat/Edit Berita (`create.blade.php`, `edit.blade.php`)

**Fungsi:**
- Formulir pembuatan/editan berita
- Upload gambar
- Preview gambar

### 4. Halaman Detail Berita (`show.blade.php`)

**Fungsi:**
- Tampilan lengkap berita
- Share ke media sosial
- Berita terkait

### 5. Sistem Autentikasi

**Fungsi:**
- Login/Register
- Lupa password
- Login dengan Google/Github

## Teknologi Yang Digunakan

- Laravel 8/9
- Bootstrap 5
- MySQL
- Font Awesome
- jQuery

## Cara Instalasi

1. Clone repository
```bash
git clone https://github.com/username/repo.git
