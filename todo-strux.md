Tahap 1: Persiapan Database & Backend

[ ] Buat Database (database_portofolio)

Buka phpMyAdmin (biasanya di localhost/phpmyadmin).

Buat database baru dengan nama database_portofolio.

Jalankan query SQL untuk membuat tabel-tabel berikut:

admin (id, username, password)

profile (id, nama, ttl, email, no_telp, instagram, deskripsi, foto_profile)

projects (id, judul, kategori, durasi, tanggal, tipe_pengerjaan, link_project, deskripsi, gambar_thumbnail, gambar_detail)

certificates (id, judul, tanggal, gambar)

sharing (id, judul, kategori, deskripsi, gambar)

[ ] Buat Koneksi Database (koneksi.php)

Buat file baru bernama koneksi.php di folder utama project.

Tulis kode koneksi PHP ke MySQL:

<?php
$host = "localhost";
$user = "root";
$pass = ""; // Sesuaikan jika ada password
$db   = "database_portofolio";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Gagal koneksi: " . mysqli_connect_error());
}
?>


Tahap 2: Konversi Halaman User (Frontend)

[ ] Ubah Ekstensi File Utama

Ubah indexcoba3.html (atau file home utama Anda) menjadi index.php.

Ubah file-file di folder page/ dari .html menjadi .php (contoh: home_project.html -> projects.php).

[ ] Dinamiskan Halaman Home (index.php)

Tambahkan include 'koneksi.php'; di baris paling atas.

Ubah bagian "About Me" (nama, deskripsi, foto) agar mengambil data dari tabel profile menggunakan query SELECT.

[ ] Dinamiskan Halaman Project (page/projects.php)

Tambahkan include '../koneksi.php';.

Hapus kartu project statis, sisakan satu sebagai template.

Bungkus template kartu dengan looping while($row = mysqli_fetch_assoc($query)) { ... }.

Ganti data statis (judul, kategori, gambar) dengan echo $row['judul'], dll.

Ubah link ke detail project agar mengirim ID: <a href="detail_project.php?id=<?= $row['id']; ?>">.

[ ] Buat Halaman Detail Project Tunggal (page/detail_project.php)

Hapus file detailproject(1).html sampai (5).html.

Buat satu file baru: detail_project.php.

Ambil ID dari URL: $id = $_GET['id'];.

Query database berdasarkan ID tersebut: SELECT * FROM projects WHERE id = '$id'.

Tampilkan data detail (deskripsi, gambar detail, link, dll) sesuai data yang diambil.

[ ] Dinamiskan Halaman Certificates & Sharing

Ulangi langkah "Dinamiskan Halaman Project" untuk file page/certificates.php dan page/sharing.php menggunakan tabel database masing-masing.

Tahap 3: Pembuatan Panel Admin (Backend Management)

[ ] Fitur Login (page/login_admin.php)

Ubah login_admin.html menjadi login_admin.php.

Buat logika PHP untuk memproses form login.

Cek kecocokan username dan password (gunakan password_verify jika password di-hash, atau md5/plain text untuk pembelajaran awal).

Gunakan session_start() dan $_SESSION['admin'] untuk menyimpan status login.

Redirect ke datadiri_admin.php jika login sukses.

[ ] Kelola Data Diri (page/datadiri_admin.php)

Ubah menjadi file .php.

Tampilkan data saat ini di dalam value input form.

Buat logika UPDATE ke database saat tombol simpan ditekan.

[ ] Kelola Projects (page/project_admin.php & tambah_project.php)

Read: Tampilkan daftar project dalam tabel HTML yang datanya diambil dari database.

Create: Ubah form tambah project agar memiliki atribut enctype="multipart/form-data". Buat script PHP untuk meng-handle upload gambar (move_uploaded_file) dan INSERT data ke database.

Update: Buat fitur edit yang mengambil data lama, menampilkannya di form, dan melakukan UPDATE sql.

Delete: Buat tombol hapus yang mengirim ID ke script penghapus (DELETE FROM projects WHERE id=...) dan menghapus file gambar terkait (unlink).

[ ] Kelola Certificates & Sharing

Lakukan hal yang sama (CRUD) untuk halaman admin Certificates dan Sharing.

Tahap 4: Finishing & Pengecekan

[ ] Rapikan Struktur Folder

Pastikan semua gambar terkumpul di folder Assets/ (atau uploads/).

Pastikan file PHP yang memanggil gambar memiliki path yang benar (misal: ../Assets/gambar.jpg).

[ ] Perbaikan Link (Routing)

Cek semua tag <a> di navbar. Pastikan link mengarah ke file .php (bukan .html).

Cek tombol "Back" di halaman detail, pastikan kembali ke halaman list yang benar.

[ ] Keamanan Dasar (Opsional tapi Disarankan)

Tambahkan pengecekan if (!isset($_SESSION['admin'])) { header("Location: login_admin.php"); } di bagian atas setiap halaman admin agar orang luar tidak bisa masuk tanpa login.