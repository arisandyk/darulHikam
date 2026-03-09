# Sistem Manajemen Yayasan dan Sekolah

Aplikasi berbasis website menggunakan Laravel yang mengelola data Yayasan serta Sekolah dengan relasi One-to-Many. dilengkpai dengan fitur Autentikasi dan operasi CRUD (Create, Update, Delete).

## Fitur Utama
- Autentikasi: Login dan Logout menggunakan Laravel Breeze.
- CRUD Yayasan: Kelola data pusat yayasan.
- CRUD Sekolah: Kelola data sekolah sesuai dengan yayasan.
- Validasi Data: Validasi form required untuk menjaga integritas data.

## Langkah - langkah Setup
1. Clone Repository
2. Install Dependencies (Composer & NPM)
3. Environment Setup
4. Database Setup (db_yayasan_dh)
5. Migrate & Seed
6. Jalankan Aplikasi (serve & run dev)

## ERD
- Skema relasi tabel dalam aplikasi ini:
Satu yayasan memiliki banyak sekolah 1 to N
1. yayasans (id, nama_yayasan, alamat)
2. sekolahs (id, yayasan_id[FK], nama_sekolah, jenjang_pendidikan)
