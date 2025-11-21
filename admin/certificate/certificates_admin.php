<?php
session_start();
// Cek Login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:../login_admin.php");
  exit();
}

include '../../config/koneksi.php';

// Inisialisasi Variabel
$id_cert     = "";
$judul       = "";
$tanggal     = "";
$gambar_lama = "";
$is_edit     = false;

// 1. CEK MODE EDIT
if (isset($_GET['id'])) {
  $id_cert = $_GET['id'];
  $is_edit = true;

  $query = mysqli_query($koneksi, "SELECT * FROM certificate WHERE id='$id_cert'");
  $data  = mysqli_fetch_array($query);

  if ($data) {
    $judul       = $data['judul_certificate'];
    $tanggal     = $data['tanggal_certificate'];
    $gambar_lama = $data['gambar_certificate'];
  }
}

// 2. PROSES SIMPAN
if (isset($_POST['simpan'])) {
  $judul   = $_POST['judul'];
  $tanggal = $_POST['tanggal'];

  // Logic Upload Gambar
  $nama_gambar = $gambar_lama; // Default gambar lama

  if ($_FILES['gambar']['name'] != "") {
    $nama_file = $_FILES['gambar']['name'];
    $source    = $_FILES['gambar']['tmp_name'];
    
    // Path sesuai referensi project_admin.php (Mundur 3 folder ke root Assets)
    $folder    = '../../Assets/files/'; 

    // Hapus gambar lama jika ada
    if ($is_edit && $gambar_lama != "" && file_exists($folder . $gambar_lama)) {
      unlink($folder . $gambar_lama);
    }

    move_uploaded_file($source, $folder . $nama_file);
    $nama_gambar = $nama_file;
  }

  // Query INSERT atau UPDATE
  if ($is_edit) {
    $query = "UPDATE certificate SET 
              judul_certificate='$judul', 
              tanggal_certificate='$tanggal', 
              gambar_certificate='$nama_gambar' 
              WHERE id='$id_cert'";
  } else {
    $query = "INSERT INTO certificate VALUES (NULL, '$judul', '$tanggal', '$nama_gambar')";
  }

  $run = mysqli_query($koneksi, $query);

  if ($run) {
    echo "<script>alert('Data Berhasil Disimpan!'); window.location='editcertificates_admin.php';</script>";
  } else {
    echo "<script>alert('Gagal Menyimpan Data!');</script>";
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
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-white text-gray-900 w-auto min-h-screen mx-auto overflow-x-hidden">
  <div class="w-full flex">

    <?php include '../sidebar_admin.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-16">
      <h1 class="text-3xl font-semibold mb-10">
        <?= $is_edit ? 'EDIT CERTIFICATE' : 'TAMBAH CERTIFICATE' ?>
      </h1>

      <div class="bg-black text-white w-[900px] rounded-xl p-10 shadow-lg">
        <form action="" method="POST" enctype="multipart/form-data">

          <!-- FORM INPUTS -->
          <div class="space-y-6">
            <!-- Judul Sertifikat -->
            <div class="flex flex-col">
                <label class="text-sm mb-1 text-gray-300">Judul Sertifikat</label>
                <input
                type="text"
                name="judul" 
                value="<?= $judul ?>"
                class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none" required />
            </div>

            <!-- Upload File -->
            <div class="flex flex-col">
                <label class="text-sm mb-1 text-gray-300">Upload Gambar</label>
                <div class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md">
                <input type="file" name="gambar" class="w-full text-sm" />
                </div>
                <?php if ($is_edit && $gambar_lama): ?>
                <p class="text-xs mt-1 text-gray-400">File saat ini: <?= $gambar_lama ?></p>
                <?php endif; ?>
            </div>

            <!-- Tanggal -->
            <div class="flex flex-col">
                <label class="text-sm mb-1 text-gray-300">Tanggal</label>
                <input
                type="date"
                name="tanggal" 
                value="<?= $tanggal ?>"
                class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none" />
            </div>
          </div>

          <!-- Button Submit -->
          <div class="flex justify-center mt-10">
            <button type="submit" name="simpan"
              class="w-full bg-[#4B4949] hover:bg-[#5a5757] transition text-white py-2 rounded-lg text-sm tracking-wide text-center block">
              <?= $is_edit ? 'Simpan Perubahan' : 'Tambah Sertifikat' ?>
            </button>
          </div>

          <!-- Link Kembali -->
          <p class="text-center text-xs text-gray-300 mt-3">
            <a href="editcertificates_admin.php" class="hover:text-white">Kembali ke Daftar Sertifikat</a>
          </p>
        </form>
      </div>

    </main>

  </div>
</body>
</html>