<div align="center">

# 🏫 Web OSIS
### Sistem Informasi Pendaftaran & Pemilihan OSIS Sekolah

![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![FilamentPHP](https://img.shields.io/badge/Filament-3.x-F59E0B?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

Aplikasi web untuk mendukung **pendaftaran anggota & ketua OSIS** serta **sistem voting online** berbasis Laravel dengan panel admin FilamentPHP.

</div>

---

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi Environment](#-konfigurasi-environment)
- [Setup Database & Migrasi](#-setup-database--migrasi)
- [Seeder](#-seeder)
- [Storage Link](#-storage-link)
- [Filament Admin User](#-filament-admin-user)
- [Menjalankan Aplikasi](#-menjalankan-aplikasi)
- [Panduan Penggunaan](#-panduan-penggunaan)
- [Struktur Proyek](#-struktur-proyek)
- [Rute Aplikasi](#-rute-aplikasi)

---

## ✨ Fitur Utama

### 📝 Pendaftaran OSIS (`/pendaftaran-osis`)
- **Form Pendaftaran Anggota** — Nama, NISN, Kelas, No. HP, Bidang, Pengalaman, Motivasi
- **Form Pendaftaran Ketua** — Nama, NISN, Kelas, No. HP, Jabatan, Visi, Misi, Motivasi
- Data anggota tersimpan di tabel `pendaftaran_anggotas`
- Data ketua tersimpan di tabel `pendaftaran_ketuas`

### 🗳️ Sistem Voting (`/voting`)
- Hanya pengguna yang **sudah login** yang dapat memberikan suara
- Setiap pengguna hanya bisa memilih **satu kali**
- Status voting (buka/tutup) dikendalikan lewat model `SettingVoting`
- Jika voting ditutup, pengguna diarahkan ke halaman `voting-closed`

### 🔐 Autentikasi & Profil
- Sistem login/register bawaan Laravel
- Halaman dashboard setelah login (`/dashboard`)
- Manajemen profil pengguna (`/profile`)

### 🛠️ Panel Admin (Filament)
- Kelola data pendaftaran anggota & ketua
- Atur status buka/tutup voting via `SettingVoting`
- Pantau data kandidat dan hasil pemilihan

---

## ✅ Persyaratan Sistem

| Kebutuhan | Versi Minimum |
|-----------|--------------|
| PHP | >= 8.2 |
| Composer | >= 2.x |
| Node.js | >= 18.x |
| NPM | >= 9.x |
| MySQL / MariaDB | >= 8.0 / >= 10.4 |
| Laravel | 13.x |
| FilamentPHP | >= 3.x |

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/calistadelinda-lab/Web_Osis.git
cd Web_Osis
```

### 2. Install Dependensi PHP

```bash
composer install
```

### 3. Install Dependensi Frontend

```bash
npm install
```

---

## ⚙️ Konfigurasi Environment

### 1. Salin File `.env`

```bash
cp .env.example .env
```

### 2. Generate Application Key

```bash
php artisan key:generate
```

### 3. Sesuaikan File `.env`

Buka file `.env` dan sesuaikan nilai berikut:

```env
APP_NAME="Web OSIS"
APP_ENV=local
APP_KEY=            # otomatis terisi setelah key:generate
APP_DEBUG=true
APP_URL=http://localhost:8000

# ─── Database ───────────────────────────────────────
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_osis
DB_USERNAME=root
DB_PASSWORD=

# ─── Filesystem ─────────────────────────────────────
FILESYSTEM_DISK=public

# ─── Session ────────────────────────────────────────
SESSION_DRIVER=database
SESSION_LIFETIME=120
```

---

## 🗄️ Setup Database & Migrasi

### 1. Buat Database Baru

```sql
CREATE DATABASE web_osis CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Atau buat lewat **phpMyAdmin**, **TablePlus**, atau **DBeaver**.

### 2. Jalankan Migrasi

```bash
php artisan migrate
```

Perintah ini akan membuat tabel-tabel berikut:

| Tabel | Keterangan |
|-------|------------|
| `users` | Data akun pengguna |
| `pendaftaran_anggotas` | Data pendaftar anggota OSIS |
| `pendaftaran_ketuas` | Data pendaftar ketua OSIS |
| `pemilihans` | Data kandidat voting |
| `setting_votings` | Konfigurasi buka/tutup voting |
| `sessions` | Sesi pengguna |

### 3. Reset & Migrasi Ulang (jika diperlukan)

> ⚠️ Perintah ini akan **menghapus semua data**. Hanya gunakan di environment lokal/development.

```bash
php artisan migrate:fresh
```

---

## 🌱 Seeder

Seeder digunakan untuk mengisi data awal ke database.

### Jalankan Semua Seeder

```bash
php artisan db:seed
```

### Jalankan Seeder Tertentu

```bash
# Isi data setting voting (buka/tutup)
php artisan db:seed --class=SettingVotingSeeder

# Isi data kandidat pemilihan
php artisan db:seed --class=PemilihanSeeder

# Isi data user admin
php artisan db:seed --class=UserSeeder
```

### Migrasi + Seeder Sekaligus ✅ (Direkomendasikan untuk setup awal)

```bash
php artisan migrate:fresh --seed
```

---

## 🔗 Storage Link

Jalankan perintah ini agar file yang diupload (foto kandidat, dokumen, dll.) bisa diakses secara publik:

```bash
php artisan storage:link
```

Perintah ini membuat symbolic link dari `public/storage` → `storage/app/public`.

> **Jika muncul error** karena link sudah ada sebelumnya:
>
> ```bash
> # Linux / Mac
> rm -rf public/storage
> php artisan storage:link
>
> # Windows (Command Prompt sebagai Administrator)
> rmdir /s /q public\storage
> php artisan storage:link
> ```

---

## 👤 Filament Admin User

### Buat User Admin Baru

```bash
php artisan make:filament-user
```

Isi data yang diminta:

```
Name     : Admin OSIS
Email    : admin@webosis.com
Password : ************
```

### Atau via Seeder (jika tersedia)

Jika `UserSeeder` sudah dikonfigurasi, kredensial default biasanya:

```
Email    : admin@webosis.com
Password : password
```

> 🔐 **Segera ganti password default** setelah pertama kali login di environment production!

### Akses Panel Admin

```
http://localhost:8000/admin
```

---

## ▶️ Menjalankan Aplikasi

### Development (dengan Hot Reload)

Buka **2 terminal** secara bersamaan:

**Terminal 1 — Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 — Vite (Asset Bundler):**
```bash
npm run dev
```

Aplikasi dapat diakses di: **http://localhost:8000**

### Production Build

```bash
npm run build
php artisan optimize
php artisan serve
```

### Queue Worker (jika menggunakan notifikasi/job)

```bash
php artisan queue:work
```

---

## 📖 Panduan Penggunaan

### Untuk Calon Anggota / Ketua OSIS

1. Buka aplikasi di browser → **http://localhost:8000**
2. Akses **`/pendaftaran-osis`** untuk mengisi formulir pendaftaran
3. Pilih jenis pendaftaran: **Anggota** atau **Ketua/Wakil**
4. Isi semua kolom yang tersedia dan submit formulir

### Untuk Pemilih (Voting)

1. **Daftar akun** atau **login** melalui sistem autentikasi Laravel
2. Akses **`/voting`** untuk melihat kandidat yang tersedia
3. Pilih satu kandidat dan konfirmasi pilihan
4. Setiap akun hanya dapat memilih **satu kali**
5. Jika voting sedang ditutup, akan muncul halaman pemberitahuan

### Untuk Admin (Filament Panel)

1. Login di **`/admin`** menggunakan akun admin
2. Kelola data pendaftaran anggota dan ketua
3. Atur status voting melalui menu **Setting Voting**:
   - `is_open = true` → Voting **dibuka**
   - `is_open = false` → Voting **ditutup**
4. Pantau rekap suara dan hasil pemilihan

---

## 📁 Struktur Proyek

```
Web_Osis/
├── app/
│   ├── Filament/
│   │   └── Resources/                          # Resource CRUD panel admin
│   ├── Http/
│   │   └── Controllers/
│   │       ├── PendaftaranAnggotaController.php # Simpan form pendaftaran anggota
│   │       ├── PendaftaranKetuaController.php   # Simpan form pendaftaran ketua
│   │       └── PemilihanController.php          # Logika sistem voting
│   └── Models/
│       ├── PendaftaranAnggota.php               # Model tabel pendaftaran_anggotas
│       ├── PendaftaranKetua.php                 # Model tabel pendaftaran_ketuas
│       ├── Pemilihan.php                        # Model kandidat voting
│       ├── SettingVoting.php                    # Model konfigurasi buka/tutup voting
│       └── User.php                             # Model pengguna
├── database/
│   ├── migrations/                              # File migrasi tabel
│   └── seeders/                                 # File seeder data awal
├── public/
│   └── storage/                                 # Symbolic link ke storage/app/public
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── welcome.blade.php                    # Halaman utama
│       ├── formulir.blade.php                   # Halaman pendaftaran OSIS
│       ├── voting.blade.php                     # Halaman voting
│       └── voting-closed.blade.php              # Halaman saat voting ditutup
├── routes/
│   └── web.php                                  # Definisi semua rute aplikasi
├── storage/
│   └── app/public/                              # Penyimpanan file upload
├── .env.example
├── composer.json
└── package.json
```

---

## 🗺️ Rute Aplikasi

| Metode | Rute | Keterangan | Auth |
|--------|------|------------|:----:|
| `GET` | `/` | Halaman utama | ❌ |
| `GET` | `/pendaftaran-osis` | Halaman form pendaftaran | ❌ |
| `POST` | `/pendaftaran-anggota` | Simpan pendaftaran anggota | ❌ |
| `POST` | `/pendaftaran-ketua` | Simpan pendaftaran ketua | ❌ |
| `GET` | `/voting` | Halaman voting kandidat | ✅ |
| `POST` | `/voting` | Submit pilihan suara | ✅ |
| `GET` | `/dashboard` | Dashboard pengguna | ✅ |
| `GET` | `/profile` | Halaman profil pengguna | ✅ |
| `GET` | `/admin` | Panel admin Filament | ✅ Admin |

---

## 🔧 Perintah Berguna

```bash
# Bersihkan semua cache
php artisan optimize:clear

# Cache ulang config, route, dan view (untuk production)
php artisan optimize

# Lihat daftar semua rute
php artisan route:list

# Cek status migrasi
php artisan migrate:status

# Rollback migrasi terakhir
php artisan migrate:rollback

# Jalankan unit test
php artisan test
```

---

## 🛠️ Teknologi

| Teknologi | Kegunaan |
|-----------|---------|
| [Laravel 13](https://laravel.com) | Backend Framework |
| [FilamentPHP 3](https://filamentphp.com) | Panel Admin |
| [Livewire](https://livewire.laravel.com) | Reaktivitas UI |
| [Alpine.js](https://alpinejs.dev) | JavaScript Interaksi |
| [Tailwind CSS](https://tailwindcss.com) | Styling |
| [MySQL](https://mysql.com) | Database |
| [Vite](https://vitejs.dev) | Asset Bundler |

---

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).

---

<div align="center">

Dibuat dengan ❤️ untuk kemajuan OSIS

**[⬆ Kembali ke Atas](#-web-osis)**

</div>