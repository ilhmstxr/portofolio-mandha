<?php
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika default XAMPP/Laragon
$db   = "database_portofolio";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
}

?>
