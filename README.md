## LAPORAN PRAKTIKUM 11
NAMA : ALI GUNAWAN | KELAS : TI.24.A3 | NIM : 312410400

## Tujuan Praktikum
1. Menerapkan konsep OOP pada PHP.
2. Memahami cara kerja modularisasi.
3. Menerapkan sistem routing sederhana menggunakan PHP.
4. Membuat form input dan menyimpan data ke database menggunakan OOP.

## Struktur folder project
```
lab11_php_oop/
 ├── .htaccess
 ├── config.php
 ├── index.php
 ├── class/
 │    ├── Database.php
 │    └── Form.php
 ├── module/
 │    └── home/
 │         └── index.php
 └── template/
      ├── header.php
      ├── footer.php
      └── sidebar.php

```
Keterangan:
- Folder class/ berisi library yang kita gunakan
- Folder module/ berisi halaman-halaman web
- Routing diarahkan ke folder module secara otomatis

<br>
<br>

## LANGKAH - LANGKAH PRAKTIKUM
### Langkah 1
Pindahkan file Database.php dan Form.php (dari praktikum sebelumnya) ke
dalam folder class/.

### File: form.php
<img width="2480" height="3332" alt="code from" src="https://github.com/user-attachments/assets/f85c8573-1e06-46f0-98f5-7c701be5de32" />

Nama database harus sesuai dengan yang dibuat di phpMyAdmin. <br>
Kemudian membuat tabel:
```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  email VARCHAR(100),
  pass VARCHAR(100),
  jenis_kelamin VARCHAR(20),
  agama VARCHAR(50),
  hobi TEXT,
  alamat TEXT
);
```
<br>
<br>

### File: database.php
<img width="1726" height="3522" alt="code database" src="https://github.com/user-attachments/assets/7753c7e2-8bfd-433f-afaa-ee6822d2502a" />

### Langkah 2
Konfigurasi Dasar

### File: config.php Sesuaikan dengan database anda
<img width="788" height="596" alt="code config" src="https://github.com/user-attachments/assets/4294e345-9257-4b26-8166-81434481451d" />

Implementasikan konsep modularisasi dari praktikum sebelumnya dan terapkan konsep routing pada project yang baru.

### File: Implementasi (Gabungan Form dan Simpan Data)
<img width="1388" height="2420" alt="code from dan data" src="https://github.com/user-attachments/assets/e4eafa5e-2756-4b25-a025-c06594466bb0" />

## Routing
Routing berada pada file `index.php`
```php
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/home/index';
$segments = explode('/', trim($path, '/'));
$mod  = isset($segments[0]) ? $segments[0] : 'home';
$page = isset($segments[1]) ? $segments[1] : 'index';
$file = "module/{$mod}/{$page}.php";
```
Apabila module tidak ditemukan, sistem akan menampilkan pesan kesalahan.

<br>
<br>

## Proses input data
Form dibuat menggunakan class Form. <br>
Contoh penggunaan:
```php
$form = new Form("", "Simpan Data");
$form->addField("nama","Nama");
$form->addField("email","Email");
$form->displayForm();
```
Data dikirim dengan method POST lalu disimpan melalui class Database:
```php
$db->insert('users', $data);
```

<br>
<br>

## Hasil program - Form input user
<img width="1919" height="1065" alt="Screenshot 2025-12-09 231953" src="https://github.com/user-attachments/assets/48bb9fc8-e7ef-4290-95c2-06d8029eb461" />

<img width="1919" height="1065" alt="Screenshot 2025-12-09 232042" src="https://github.com/user-attachments/assets/95404aec-b17f-478f-af8d-cf886acf349f" />

<img width="1919" height="1066" alt="Screenshot 2025-12-09 232059" src="https://github.com/user-attachments/assets/78d91da6-d837-4f3d-b5eb-db625412cb05" />

## Hasil tabel database
<img width="1919" height="1067" alt="Screenshot 2025-12-09 232305" src="https://github.com/user-attachments/assets/e2db69f5-08eb-4c85-be39-37d6aca53ee1" />

## Kesimpulan
Proyek Praktikum 11 berhasil membuat mini-framework sederhana berbasis PHP OOP dengan menerapkan konsep modularisasi, routing, serta pemisahan struktur folder yang lebih teratur. Melalui penggunaan class Database dan Form, aplikasi dapat menangani koneksi database, proses CRUD, serta pembuatan form secara dinamis. Implementasi routing melalui index.php dan .htaccess juga memungkinkan setiap modul diakses melalui URL yang rapi. Secara keseluruhan, proyek ini memberikan pemahaman dasar tentang cara kerja framework PHP dan bagaimana membangun aplikasi web yang lebih terstruktur dan mudah dikembangkan.



