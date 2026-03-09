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

## Akun Default (Seeder)
- Email: admin@example.com
- Password: admin123

## Struktur Database & Relasi

Sistem ini menggunakan 3 tabel utama (termasuk tabel autentikasi bawaan):

### 1. Tabel `users`
Menyimpan data akun untuk *login* administrator.
- `id` (Primary Key)
- `name` (String)
- `email` (String, Unique)
- `password` (String)

### 2. Tabel `yayasans`
Menyimpan data induk yayasan.
- `id` (Primary Key)
- `nama_yayasan` (String) - Nama yayasan.
- `alamat` (Text) - Alamat operasional yayasan.
- `created_at` & `updated_at` (Timestamp)

### 3. Tabel `sekolahs`
Menyimpan data unit sekolah yang berinduk ke suatu yayasan.
- `id` (Primary Key)
- `yayasan_id` (Foreign Key) - Mengarah ke `id` pada tabel `yayasans`.
- `nama_sekolah` (String) - Nama unit sekolah.
- `jenjang_pendidikan` (String) - Jenjang (contoh: SD, SMP, SMA).
- `alamat` (Text) - Alamat fisik sekolah.
- `created_at` & `updated_at` (Timestamp)

### Penjelasan Relasi
Sistem ini menggunakan **One-to-Many Relationship**:
- **1 Yayasan** dapat menaungi **Banyak Sekolah** (`hasMany`).
- **1 Sekolah** hanya dapat terikat pada **1 Yayasan** (`belongsTo`).
- Diterapkan fitur *Cascade Delete*: Jika sebuah data Yayasan dihapus, maka seluruh data Sekolah yang memiliki `yayasan_id` tersebut akan ikut terhapus secara otomatis untuk mencegah adanya *orphan data* (data yatim).

---

## ERD (Entity Relationship Diagram)

```mermaid
erDiagram
    YAYASAN ||--o{ SEKOLAH : "memiliki"
    
    YAYASAN {
        bigint id PK
        string nama_yayasan
        text alamat
        timestamp created_at
        timestamp updated_at
    }
    
    SEKOLAH {
        bigint id PK
        bigint yayasan_id FK
        string nama_sekolah
        string tingkat_pendidikan
        text alamat
        timestamp created_at
        timestamp updated_at
    }
