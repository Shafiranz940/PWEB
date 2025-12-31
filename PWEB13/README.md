## Pertemuan 13

### Arsitektur Aplikasi Web

Pada pertemuan minggu ini, kita diminta untuk membuat arsitektur aplikasi web dari tugas minggu sebelumnya. Berikut ini adalah representasi 3-layer architecture dari  ( Aplikasi Web Management Data Siswa + Foto dengan CRUD ) 

Penjelasan tiap layernya :

**Presentation Layer (Front-End)**

Presentation layer pada studi kasus ini berisi file PHP yang menghasilkan tampilan HTML (tanpa CSS khusus). File-file utama:

  - `index.php` : Entry point yang memuat dan menampilkan seluruh baris tabel siswa (termasuk menampilkan gambar dari folder images/).                       Menyediakan link: Tambah, Ubah, Hapus.

  - `form_simpan.php` : Form HTML untuk menambah data siswa (mengirim POST ke proses_simpan.php dengan enctype="multipart/form-data" untuk upload foto).

  - `form_ubah.php` : Form HTML yang mengisi nilai awal berdasar id dan mengirim POST ke proses_ubah.php. Juga memungkinkan upload foto baru.

**Application Layer (Back-End)**

Application layer mengandung logika pemrosesan request, interaksi dengan database lewat PDO, dan manajemen file upload/delete:

  - `koneksi.php` : Konfigurasi koneksi ke MySQL menggunakan PDO ($pdo) dan pengaturan error mode.

  - `proses_simpan.php` : Menerima POST dari form_simpan.php, memproses upload gambar (move_uploaded_file ke folder images/), membuat unique filename dengan date('dmYHis') . $foto, lalu INSERT ke tabel siswa (bindParam + execute). Jika sukses, redirect ke index.php.

  - `proses_ubah.php` : Jika tidak ada file baru, jalankan UPDATE tanpa mengubah kolom foto; jika ada file baru, upload, hapus file lama (unlink) lalu UPDATE dengan nama file baru.

  - `proses_hapus.php` : Mengambil nama foto dari DB, menghapus file foto dari images/ (jika ada), lalu DELETE baris di DB.

**Alur Ringkas Website**
```
Front-End → Back-End (POST/GET) → Database → Front-End (redirect).

```

**Data Layer (Database & File Storage)**

Database MySQL (`db.sql` menyediakan skema):
```
CREATE TABLE `siswa` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nis` VARCHAR(11) NOT NULL,
  `nama` VARCHAR(50) NOT NULL,
  `jenis_kelamin` VARCHAR(10) NOT NULL,
  `telp` VARCHAR(15) NOT NULL,
  `alamat` TEXT NOT NULL,
  `foto` VARCHAR(200) NOT NULL
);
```

Nama database yang dipakai di `koneksi.php` adalah `fotocrud`.

**File Storage**

  - `images/` : Folder penyimpanan file foto hasil upload (dipakai runtime). File disimpan dengan nama unik (date('dmYHis') + originalname).

  - `imgs/` : Folder asset gambar yang dipakai pada dokumentasi (tidak untuk upload pengguna).

**Pemetaan File Aplikasi Setiap Layer**

- Presentation: `index.php`, `form_simpan.php`, `form_ubah.php`

- Application: `koneksi.php`, `proses_simpan.php`, `proses_ubah.php`, `proses_hapus.php`

- Data: `db.sql`, folder `images/`, folder `imgs/`
