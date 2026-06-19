# SIMEKA (Sistem Manajemen Event Kampus)

SIMEKA adalah aplikasi berbasis web yang digunakan untuk mengelola kegiatan event kampus secara terintegrasi, mulai dari pengelolaan event, peserta, pendaftaran, pembayaran, hingga laporan.

## Teknologi yang Digunakan

- PHP Native
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP

---

# Struktur Project

```plaintext
SIMEKA/
│
├── assets/
│   └── style.css
│
├── config/
│   └── koneksi.php
│
├── layout/
│   ├── header.php
│   └── sidebar.php
│
├── user/
│   ├── index.php
│   ├── tambah.php
│   ├── edit.php
│   └── hapus.php
│
├── kategori/
│   ├── index.php
│   ├── tambah.php
│   ├── edit.php
│   └── hapus.php
│
├── event/
│   ├── index.php
│   ├── tambah.php
│   ├── edit.php
│   └── hapus.php
│
├── peserta/
│   ├── index.php
│   ├── tambah.php
│   ├── edit.php
│   └── hapus.php
│
├── pendaftaran/
│   ├── index.php
│   ├── tambah.php
│   ├── edit.php
│   └── hapus.php
│
├── pembayaran/
│   ├── index.php
│   ├── tambah.php
│   ├── edit.php
│   └── hapus.php
│
├── laporan/
│   └── index.php
│
├── database/
│   └── simeka.sql
│
├── index.php
│
└── README.md
```

---

# Cara Menjalankan Aplikasi Secara Lokal

## 1. Install XAMPP

Download dan install XAMPP terlebih dahulu.

Pastikan service berikut aktif:

- Apache
- MySQL

---

## 2. Simpan Project

Pindahkan folder project ke dalam direktori:

```plaintext
C:\xampp\htdocs\
```

Contoh:

```plaintext
C:\xampp\htdocs\SIMEKA
```

---

## 3. Membuat Database

Buka browser:

```plaintext
http://localhost/phpmyadmin
```

Langkah-langkah:

1. Klik **New**
2. Buat database baru dengan nama:

```sql
simeka
```

3. Klik tombol **Create**

---

## 4. Import Database

Pilih database:

```plaintext
simeka
```

Kemudian:

1. Klik menu **Import**
2. Klik **Choose File**
3. Pilih file:

```plaintext
database/simeka.sql
```

4. Klik **Go**

Tunggu hingga proses import selesai.

---

## 5. Konfigurasi Database

Buka file:

```plaintext
config/koneksi.php
```

Pastikan konfigurasi sesuai:

```php
<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "simeka"
);

?>
```

---

## 6. Menjalankan Aplikasi

Aktifkan:

- Apache
- MySQL

melalui XAMPP Control Panel.

Buka browser:

```plaintext
http://localhost/SIMEKA
```

atau sesuaikan dengan nama folder project.

Contoh:

```plaintext
http://localhost/PROJECT LAB IR (GOOD LUCK)
```

---

# Petunjuk Operasional Sistem

## 1. Dashboard

Dashboard merupakan halaman utama sistem.

Informasi yang ditampilkan:

- Total Event
- Total Peserta
- Total Pendaftaran
- Total Pembayaran Valid
- Event Terbaru

Tujuan:

Memberikan ringkasan kondisi sistem secara cepat kepada administrator.

---

## 2. Menu User

Digunakan untuk mengelola data pengguna sistem.

### Tambah User

Langkah:

1. Klik menu **User**
2. Klik tombol **Tambah User**
3. Isi seluruh data yang diperlukan
4. Klik **Simpan**

### Edit User

Langkah:

1. Klik tombol **Edit**
2. Ubah data yang diperlukan
3. Klik **Update**

### Hapus User

Langkah:

1. Klik tombol **Hapus**
2. Konfirmasi penghapusan data

---

## 3. Menu Kategori Event

Digunakan untuk mengelompokkan event berdasarkan jenis kegiatan.

### Tambah Kategori

Langkah:

1. Klik menu **Kategori Event**
2. Klik **Tambah Kategori**
3. Isi nama kategori
4. Isi deskripsi kategori
5. Klik **Simpan**

Contoh:

- Seminar
- Workshop
- Webinar
- Kompetisi

---

## 4. Menu Event

Digunakan untuk mengelola seluruh kegiatan kampus.

### Tambah Event

Langkah:

1. Klik menu **Event**
2. Klik **Tambah Event**
3. Pilih kategori event
4. Isi nama event
5. Isi tanggal pelaksanaan
6. Isi lokasi kegiatan
7. Isi biaya pendaftaran
8. Isi kuota peserta
9. Klik **Simpan**

### Edit Event

1. Klik tombol **Edit**
2. Perbarui data
3. Klik **Update**

### Hapus Event

1. Klik tombol **Hapus**
2. Konfirmasi penghapusan

---

## 5. Menu Peserta

Digunakan untuk mengelola data peserta.

### Tambah Peserta

Langkah:

1. Klik menu **Peserta**
2. Klik **Tambah Peserta**
3. Isi data peserta
4. Klik **Simpan**

Data yang diinput:

- Nama Peserta
- NIM
- Program Studi
- Fakultas
- Email
- Nomor Telepon

### Edit dan Hapus Peserta

Dilakukan melalui tombol:

- Edit
- Hapus

pada tabel peserta.

---

## 6. Menu Pendaftaran

Digunakan untuk mendaftarkan peserta ke event tertentu.

### Tambah Pendaftaran

Langkah:

1. Klik menu **Pendaftaran**
2. Klik **Tambah Pendaftaran**
3. Pilih peserta
4. Pilih event
5. Tentukan tanggal pendaftaran
6. Klik **Simpan**

Hasil:

Peserta akan tercatat sebagai peserta pada event yang dipilih.

---

## 7. Menu Pembayaran

Digunakan untuk mencatat transaksi pembayaran peserta.

### Tambah Pembayaran

Langkah:

1. Klik menu **Pembayaran**
2. Klik **Tambah Pembayaran**
3. Pilih data pendaftaran
4. Isi jumlah pembayaran
5. Upload bukti pembayaran
6. Simpan data

### Verifikasi Pembayaran

Langkah:

1. Buka daftar pembayaran
2. Pilih transaksi
3. Ubah status menjadi:

```plaintext
Valid
```

atau

```plaintext
Pending
```

4. Simpan perubahan

---

## 8. Menu Laporan

Digunakan untuk melihat hasil rekapitulasi data.

### Dashboard Laporan

Menampilkan:

- Total Event
- Total Peserta
- Total Pendaftaran
- Total Pendapatan

### Insight Event

Menampilkan:

- Event Terpopuler
- Event Termahal
- Pembayaran Valid
- Pembayaran Pending

### Top 5 Event Terpopuler

Menampilkan ranking event berdasarkan jumlah peserta.

### Pendapatan Per Event

Menampilkan:

- Nama Event
- Total Peserta
- Biaya Event
- Total Pendapatan

### Statistik Program Studi

Menampilkan jumlah peserta berdasarkan program studi.

---

# Alur Penggunaan Sistem

```plaintext
Dashboard
    ↓
Kategori Event
    ↓
Event
    ↓
Peserta
    ↓
Pendaftaran
    ↓
Pembayaran
    ↓
Verifikasi Pembayaran
    ↓
Laporan
```

Urutan di atas merupakan alur penggunaan sistem yang direkomendasikan agar data saling terhubung dengan benar.

---

# Pengembang

SIMEKA dibuat sebagai implementasi Sistem Manajemen Event Kampus menggunakan PHP Native dan MySQL.
