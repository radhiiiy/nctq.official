# PP Nur Cahaya Tarbiyatul Qur'an Putra — Website & Admin Panel

Aplikasi Laravel untuk website profil pondok pesantren, lengkap dengan halaman
publik (Home, Profile, Artikel, PPDB, Kritik & Saran) dan **Dashboard Admin**
untuk mengelola seluruh konten.

## Fitur

### Halaman Publik
- **Home** — hero section, ringkasan (Pendidikan/Kegiatan/PBDB), kegiatan terbaru, sambutan pengasuh.
- **Profile** — sejarah pondok, visi & misi, statistik (tahun berdiri, santri aktif, dewan guru).
- **Artikel** — daftar artikel (pagination) & halaman detail artikel.
- **PPDB** *(baru)* — informasi syarat & jadwal pendaftaran + **form pendaftaran santri baru** lengkap (data santri, orang tua, alamat, program, dsb). Setiap pendaftar otomatis mendapat nomor pendaftaran unik.
- **Kritik & Saran** — form untuk pengunjung mengirim kritik/saran.

### Dashboard Admin (`/login` lalu `/admin`)
- **Dashboard** — ringkasan statistik (jumlah artikel, kegiatan, pendaftar PPDB per status, kritik & saran belum dibaca) + daftar terbaru.
- **Artikel** — CRUD lengkap (judul, ringkasan, isi, gambar, status terbit/draft).
- **Kegiatan** — CRUD kegiatan yang tampil di beranda.
- **Pendaftar PPDB** — daftar semua pendaftar, filter berdasarkan status/pencarian, lihat detail, ubah status (menunggu/diterima/ditolak) + catatan admin, hapus data.
- **Kritik & Saran** — lihat semua masukan, tandai terbaca otomatis saat dibuka, hapus data.
- **Pengaturan Konten** — admin bisa mengubah semua teks & gambar yang tampil di halaman publik (hero, sambutan pengasuh, sejarah, visi/misi, statistik, konten halaman PPDB) tanpa perlu mengubah kode.

## Instalasi

Pastikan sudah menginstal **PHP 8.2+**, **Composer**, dan **MySQL** (5.7+/8.0+).
Node.js bersifat opsional karena project ini memakai Tailwind CSS via CDN,
sehingga tidak wajib menjalankan proses build front-end.

```bash
# 1. Masuk ke folder project
cd pesantren

# 2. Install dependency PHP
composer install

# 3. Siapkan file environment
cp .env.example .env    # lewati jika .env sudah tersedia
php artisan key:generate
```

Project ini sudah dikonfigurasi memakai **MySQL** secara default. Buat database
kosong terlebih dahulu, lalu sesuaikan kredensialnya di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pesantren
DB_USERNAME=root
DB_PASSWORD=
```

Buat database-nya (contoh via MySQL CLI):

```bash
mysql -u root -p -e "CREATE DATABASE pesantren CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

Lanjutkan dengan migrasi, seed, dan menjalankan server:

```bash
# 4. Jalankan migrasi + seed data awal (membuat akun admin & contoh konten)
php artisan migrate --seed

# 5. Buat symbolic link storage (agar gambar upload bisa diakses publik)
php artisan storage:link

# 6. Jalankan server
php artisan serve
```

Buka `http://127.0.0.1:8000` untuk situs publik.

### Login Admin

```
URL     : http://127.0.0.1:8000/login
Email   : admin@nurcahaya.sch.id
Password: password
```

> Segera ganti password default ini setelah login pertama kali (bisa lewat `php artisan tinker` atau menambahkan fitur ubah password sesuai kebutuhan).

## Struktur Data Utama

| Model        | Tabel           | Keterangan                                   |
|--------------|-----------------|-----------------------------------------------|
| `Article`    | `articles`      | Artikel/berita                                 |
| `Activity`   | `activities`    | Kegiatan terbaru di beranda                    |
| `Ppdb`       | `ppdbs`         | Data pendaftar PPDB                            |
| `KritikSaran`| `kritik_sarans` | Kritik & saran dari pengunjung                 |
| `Setting`    | `settings`      | Konten dinamis (key-value) untuk teks & gambar |
| `User`       | `users`         | Akun admin                                     |

## Catatan Teknis

- Styling menggunakan **Tailwind CSS via CDN** dengan tema warna *sage green* sesuai desain awal — tidak memerlukan proses build.
- Interaksi kecil pada sidebar admin (toggle di mobile) menggunakan **Alpine.js via CDN**.
- Upload gambar (artikel, kegiatan, sambutan pengasuh, sejarah, dsb.) disimpan di `storage/app/public` dan diakses lewat `storage:link`.
- Validasi & proteksi route admin menggunakan middleware `auth` bawaan Laravel.
