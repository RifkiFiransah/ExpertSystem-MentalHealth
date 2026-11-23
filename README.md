# MentalCare — Sistem Ahli Skrining Kesehatan Mental

MentalCare adalah aplikasi web untuk membantu pengguna mengenali kemungkinan gangguan kesehatan mental dari gejala yang mereka pilih. Sistem ini bekerja berbasis aturan (rule-based expert system): gejala yang dipilih diuji terhadap basis pengetahuan, lalu menghasilkan persentase kecocokan per kondisi.

> **Penting:** Hasil skrining adalah kemungkinan berdasarkan gejala, **bukan diagnosis medis**. Sistem ini tidak menggantikan pemeriksaan dokter. Bila membutuhkan bantuan langsung, hubungi tenaga kesehatan.

Arah visual dan keputusan desain tercatat di [`DESIGN.md`](DESIGN.md) (tema tenang-klinis).

## Fitur

**Pengguna (publik)**

- Beranda dengan ringkasan kondisi dan alur skrining
- Daftar kondisi (`/data-penyakit`) dengan pencarian dan detail
- Diagnosa gejala → hasil persentase kecocokan
- Riwayat diagnosa
- Profil pengguna
- Registrasi dan masuk

**Admin**

- Dashboard
- Kelola data penyakit (CRUD)
- Kelola data gejala (CRUD)
- Kelola basis aturan diagnosa (`tbl_rule`)
- Kelola pengguna
- Data hasil diagnosa seluruh pengguna

## Cara Kerja Diagnosa

1. Pengguna memilih gejala yang dialami.
2. Sistem membaca basis aturan dari tabel `tbl_rule` — setiap baris adalah satu kondisi, setiap kolom gejala (`G001`, `G002`, …) bernilai `1` (relevan) atau `0`.
3. Gejala terpilih dicocokkan dengan aturan tiap kondisi. Persentase dihitung sebagai:

   ```
   persentase = (jumlah gejala cocok / jumlah gejala pada aturan kondisi) × 100
   ```

4. Kondisi dengan persentase **≥ 45%** masuk kandidat, lalu diurutkan dari yang tertinggi.
5. Kandidat teratas ditampilkan sebagai hasil skrining, beserta daftar ranking lainnya. Hasil tersimpan ke riwayat.

Basis aturan dapat diperbarui admin melalui halaman **Rule** tanpa mengubah kode.

## Tech Stack

| Komponen | Teknologi |
| --- | --- |
| Framework | CodeIgniter 4 (`^4.7.6`) |
| Bahasa | PHP `^8.3` |
| Database | MySQL / MariaDB (driver `MySQLi`) |
| Testing | PHPUnit `^11.5` |
| Server | Apache/Nginx, atau `php spark serve` |

## Persyaratan

- PHP ≥ 8.3 dengan ekstensi: `intl`, `mbstring`, `json`, `mysqlnd`
- [Composer](https://getcomposer.org)
- MySQL atau MariaDB
- Node.js tidak wajib (aset frontend sudah berupa statis di `public/assets`)

## Instalasi

```bash
# 1. Salin environment lalu sesuaikan
cp env .env
# Edit .env: app.baseURL, database.default.* (hostname, database, username, password)

# 2. Install dependensi
composer install

# 3. Buat database, lalu migrasi & seed
#    Buat database mis. "ci4_mentalhealth" di MySQL, sesuaikan .env
php spark migrate
php spark db:seed PenyakitSeeder
php spark db:seed GejalaSeeder
php spark db:seed RuleSeeder
php spark db:seed UserSeeder
php spark db:seed AdminSeeder
php spark db:seed DiagnosaSeeder   # opsional: data contoh hasil diagnosa

# 4. Jalankan server pengembangan
php spark serve
```

Buka `http://localhost:8080/` (atau `app.baseURL` di `.env`).

> **Web server produksi:** arahkan document root ke folder `public/`, bukan root proyek.

### Akun default

| Role | Email | Password |
| --- | --- | --- |
| Admin | `admin@gmail.com` | `admin123` |

Akun admin dibuat oleh `AdminSeeder`. **Ganti password ini sebelum deploy ke produksi.**

## Struktur Proyek

```
app/
├── Controllers/     # Home, Auth, Diagnosa, Penyakit, Gejala, Rule, User, Profile
├── Models/          # PenyakitModel, GejalaModel, RuleModel, DiagnosaModel, dll.
├── Views/           # frontend (publik), layouts + dashboard (admin)
├── Database/
│   ├── Migrations/  # skema tabel
│   └── Seeds/       # data awal (penyakit, gejala, rule, admin, …)
├── Filters/         # filter autentikasi (auth)
└── Config/          # Routes, Autoload, Database, dll.
public/              # document root: aset, index.php
tests/               # PHPUnit
writable/            # log, cache, session
DESIGN.md            # arah desain produk
```

### Tabel utama

| Tabel | Peran |
| --- | --- |
| `tbl_penyakit` | Kondisi / gangguan kesehatan mental |
| `tbl_gejala` | Daftar gejala (kode G001, G002, …) |
| `tbl_rule` | Basis aturan: gejala relevan per kondisi |
| `tbl_user` | Pengguna terdaftar |
| `tbl_admin` | Akun admin |
| `tbl_diagnosa` | Riwayat hasil skrining pengguna |

## Menjalankan Test

```bash
composer test
# atau
vendor/bin/phpunit
```

Konfigurasi test ada di `phpunit.xml.dist`.

## Batasan Produk

- Output adalah **kemungkinan** berdasarkan gejala yang dipilih, bukan diagnosis medis.
- Tidak menyediakan konsultasi, terapi, atau penanganan darurat.
- Pengguna dalam krisis atau membutuhkan bantuan langsung diarahkan ke tenaga kesehatan.

## Lisensi

MIT — lihat [`LICENSE`](LICENSE).
