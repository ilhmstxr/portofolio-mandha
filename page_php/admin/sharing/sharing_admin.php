<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:login_admin.php");
  exit();
}

include '../../config/koneksi.php';

// Inisialisasi
$id_sharing = "";
$judul      = "";
$subjudul   = ""; // Variabel baru
$deskripsi  = "";
$gambar_lama = "";
$is_edit    = false;

// CEK MODE EDIT
if (isset($_GET['id'])) {
  $id_sharing = $_GET['id'];
  $is_edit = true;
  $q = mysqli_query($koneksi, "SELECT * FROM sharing WHERE id='$id_sharing'");
  $d = mysqli_fetch_array($q);
  if ($d) {
    // Sesuaikan dengan kolom database
    $judul       = $d['judul_content'];
    $subjudul    = $d['subJudul_content']; // Kolom baru sesuai gambar
    $deskripsi   = $d['deskripsi_content'];
    $gambar_lama = $d['gambar_content'];
  }
}

// PROSES SIMPAN
if (isset($_POST['simpan'])) {
  $judul     = $_POST['judul'];
  $subjudul  = $_POST['subjudul'];
  $deskripsi = $_POST['deskripsi'];

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
    $query = "UPDATE sharing SET 
                  judul_content='$judul', 
                  subJudul_content='$subjudul',
                  deskripsi_content='$deskripsi', 
                  gambar_content='$nama_gambar' 
                  WHERE id='$id_sharing'";
  } else {
    $query = "INSERT INTO sharing VALUES (NULL, '$judul', '$subjudul', '$deskripsi', '$nama_gambar')";
  }

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Berhasil Disimpan!'); window.location='editsharing_admin.php';</script>";
  } else {
    echo "<script>alert('Gagal: " . mysqli_error($koneksi) . "');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandha Panel - Sharing</title>
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
      <h1 class="text-3xl font-semibold mb-10">
        <?= $is_edit ? 'EDIT SHARING' : 'TAMBAH SHARING' ?>
      </h1>

      <div class="bg-black text-white w-[900px] rounded-xl p-10 shadow-lg">
        <form action="" method="POST" enctype="multipart/form-data">
          <!-- FORM INPUTS -->
          <div class="space-y-6">

            <!-- Judul Konten -->
            <input
              type="text"
              placeholder="Judul Konten"
              name="judul" value="<?= $judul ?>"
              class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none text-sm" rquired />
            <input
              type="text"
              placeholder="Sub-Judul Konten"
              name="judul" value="<?= $judul ?>"
              class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none text-sm" rquired />

            <!-- Upload File -->
            <div class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md">
              <input type="file" name="gambar" class="w-full text-sm" />
              <?php if ($is_edit && $gambar_lama): ?>
                <p class="text-xs mt-1 text-gray-400">File saat ini: <?= $gambar_lama ?></p>
              <?php endif; ?>
            </div>

            <!-- Deskripsi Konten -->
            <textarea
              placeholder="Deskripsi Konten"
              name="deskripsi"
              class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none text-sm h-64 resize-none">
            <?= $deskripsi ?>
          </textarea>

          </div>

          <!-- BUTTON -->
          <div class="flex justify-center mt-10">
            <button type="submit" name="simpan"
              class="w-full bg-[#4B4949] hover:bg-[#5a5757] transition text-white py-2 rounded-lg text-sm tracking-wide text-center block">
              <?= $is_edit ? 'Simpan Konten' : 'Tambah Konten' ?>
            </button>
          </div>

          <!-- Edit Sharing -->
          <p class="text-center text-xs text-gray-300 mt-3">
            <a href="editsharing_admin.php" class="hover:text-white">Edit Sharing</a>
          </p>
        </form>
      </div>
    </main>

  </div>
</body>

</html>