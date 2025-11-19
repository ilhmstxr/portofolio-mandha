<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:login_admin.php");
  exit();
}

include '../../config/koneksi.php';

// Proses Hapus
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];

  // Ambil nama gambar
  $q = mysqli_query($koneksi, "SELECT gambar_certificate FROM certificate WHERE id='$id'");
  $data = mysqli_fetch_array($q);
  $gambar = $data['gambar_certificate'];

  $delete = mysqli_query($koneksi, "DELETE FROM certificate WHERE id='$id'");
  if ($delete) {
    if (file_exists("../Assets/$gambar")) {
      unlink("../Assets/$gambar");
    }
    echo "<script>alert('Sertifikat Dihapus!'); window.location='editcertificates_admin.php';</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandha Panel - Edit Certificates</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-white text-gray-900 w-auto min-h-screen mx-auto overflow-x-hidden">

  <div class="w-full flex">

    <?php include '../sidebar_admin.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-16 pl-24">

      <!-- JUDUL -->
      <h1 class="text-4xl font-bold mt-4 mb-10">EDIT CERTIFICATES</h1>

      <!-- AREA TABLE + BACK -->
      <div class="w-[900px]">

        <!-- BACK DI POJOK KANAN ATAS TABEL -->
        <div class="flex justify-end mb-2">
          <a href="certificates_admin.php" class="text-sm text-black">Back</a>
        </div>

        <div class="flex justify-between mb-4">
          <a href="certificates_admin.php" class="bg-[#4B4949] text-white px-4 py-2 rounded text-sm hover:bg-[#2c2c2c] transition">
            + Tambah Sertifikat
          </a>
        </div>

        <!-- TABLE -->
        <table class="w-full text-sm border border-gray-500 border-collapse">

          <thead>
            <tr class="text-white text-center" style="background-color: #4B4949;">
              <th class="py-3 px-4 border border-gray-500">Judul</th>
              <th class="py-3 px-4 border border-gray-500">Gambar</th>
              <th class="py-3 px-4 border border-gray-500">Tanggal</th>
              <th class="py-3 px-4 border border-gray-500">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM certificate ORDER BY id DESC");
            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_array($query)) {
            ?>

                <tr style="background-color: #D9D9D9;">
                  <!-- Judul -->
                  <td class="py-3 px-4 border border-gray-400 text-center align-top text-xs leading-4">
                    <?= $row['judul_certificate']; ?>
                  </td>

                  <!-- Gambar -->
                  <td class="py-3 px-4 border border-gray-400 text-center align-top">
                    <?= $row['gambar_certificate']; ?>
                  </td>

                  <!-- Tanggal -->
                  <td class="py-3 px-4 border border-gray-400 text-center align-top">
                    <?= $row['tanggal_certificate']; ?>
                  </td>

                  <!-- Action -->
                  <td class="py-3 px-4 border border-gray-400 text-center align-top">
                    <div class="flex flex-col items-center leading-tight">
                      <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Edit</a>
                      <a href="editcertificates_admin.php?hapus=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline text-sm mt-1">Hapus</a>
                    </div>
                  </td>
                </tr>


            <?php
              }
            } else {
              echo "<tr><td colspan='4' class='text-center py-5'>Belum ada sertifikat.</td></tr>";
            }
            ?>
          </tbody>

        </table>
      </div>

    </main>
  </div>

</body>

</html>