<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:login_admin.php");
  exit();
}

include '../../config/koneksi.php';

// Inisialisasi
$id_cert    = "";
$judul      = "";
$tanggal    = "";
$gambar_lama = "";
$is_edit    = false;

// CEK MODE EDIT
if (isset($_GET['id'])) {
  $id_cert = $_GET['id'];
  $is_edit = true;
  $q = mysqli_query($koneksi, "SELECT * FROM certificate WHERE id='$id_cert'");
  $d = mysqli_fetch_array($q);

  if ($d) {
    // Sesuaikan dengan nama kolom di gambar database
    $judul       = $d['judul_certificate'];
    $tanggal     = $d['tanggal_certificate'];
    $gambar_lama = $d['gambar_certificate'];
  }
}

// PROSES SIMPAN
if (isset($_POST['simpan'])) {
  $judul   = $_POST['judul'];
  $tanggal = $_POST['tanggal'];

  // Logic Upload Gambar
  $nama_gambar = $gambar_lama;
  if ($_FILES['gambar']['name'] != "") {
    $nama_file = $_FILES['gambar']['name'];
    $source    = $_FILES['gambar']['tmp_name'];
    $folder    = '../../Assets/files/';

    if ($is_edit && $gambar_lama != "" && file_exists($folder . $gambar_lama)) {
      unlink($folder . $gambar_lama);
    }
    move_uploaded_file($source, $folder . $nama_file);
    $nama_gambar = $nama_file;
  }

  if ($is_edit) {
    // Query Update (Sesuai nama kolom DB)
    $query = "UPDATE certificate SET 
                  judul_certificate='$judul', 
                  tanggal_certificate='$tanggal', 
                  gambar_certificate='$nama_gambar' 
                  WHERE id='$id_cert'";
  } else {
    // Query Insert
    $query = "INSERT INTO certificate VALUES (NULL, '$judul', '$tanggal', '$nama_gambar')";
  }

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Berhasil Disimpan!'); window.location='editcertificates_admin.php';</script>";
  } else {
    echo "<script>alert('Gagal!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandha Panel - Certificates</title>
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
    <main class="flex-1 p-16">
      <h1 class="text-3xl font-semibold mb-10">Certificates</h1>

      <div class="bg-black text-white w-[900px] rounded-xl p-10 shadow-lg">
        <form action="" method="POST" enctype="multipart/form-data">

          <!-- FORM INPUTS -->
          <div class="space-y-6">
            <!-- Judul Sertifikat -->
            <input
              type="text"
              placeholder="Judul Sertifikat"
              name="judul" value="<?= $judul ?>"
              class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none" required />

            <!-- Upload File -->
            <div class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md">
              <input type="file" name="gambar" value="<?= $gambar ?>" class="w-full" />
            </div>
            <?php if ($is_edit && $gambar_lama): ?>
              <p class="text-xs mt-1 text-gray-400">File saat ini: <?= $gambar_lama ?></p>
            <?php endif; ?>

            <!-- Tanggal -->
            <input
              type="date"
              placeholder="hh - bb - tt"
              name="tanggal" value="<?= $tanggal ?>"
              class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none" />
          </div>

          <!-- Button Submit -->
          <div class="flex justify-center mt-10">
            <button type="submit" name="simpan"
              class="w-full bg-[#4B4949] hover:bg-[#5a5757] transition text-white py-2 rounded-lg text-sm tracking-wide text-center block">
              <?= $is_edit ? 'Simpan Perubahan' : 'Tambah Sertifikat' ?>
            </button>
          </div>

          <!-- TEKS EDIT CERTIFICATES -->
          <p class="text-center text-xs text-gray-300 mt-3">
            <a href="editcertificates_admin.php" class="hover:text-white">Edit Certificate</a>
          </p>
        </form>
      </div>

    </main>

  </div>
</body>

</html>