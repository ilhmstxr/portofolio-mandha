<?php
session_start();
// Cek Login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:../login_admin.php"); // Sesuaikan path login jika perlu
  exit();
}

// Sesuaikan path koneksi (Mundur 3 folder: project -> admin -> page_php -> ROOT)
include '../../config/koneksi.php';

// Inisialisasi Variabel (Agar tidak error 'Undefined variable')
$id_project  = "";
$judul       = "";
$durasi      = "";
$tanggal     = "";
$tipe        = "";
$link        = "";
$deskripsi   = "";
$gambar_lama = "";
$is_edit     = false;

// 1. CEK APAKAH INI MODE EDIT? (Ada parameter 'id' di URL)
if (isset($_GET['id'])) {
  $id_project = $_GET['id'];
  $is_edit    = true;

  // Ambil data lama dari database berdasarkan ID
  $query  = mysqli_query($koneksi, "SELECT * FROM project WHERE id='$id_project'");
  $data   = mysqli_fetch_array($query);

  if ($data) {
    $judul       = $data['judul_project'];
    $durasi      = $data['durasi_project'];
    $tanggal     = $data['tanggal_project'];
    $tipe        = $data['tipe_pengerjaan_project'];
    $link        = $data['link_project'];
    $deskripsi   = $data['deskripsi_project'];
    $gambar_lama = $data['gambar_project'];
  }
}

// 2. PROSES SIMPAN (BISA INSERT ATAU UPDATE)
if (isset($_POST['simpan'])) {
  $judul      = $_POST['judul'];
  $durasi     = $_POST['durasi'];
  $tanggal    = $_POST['tanggal'];
  $tipe       = $_POST['tipe'];
  $link       = $_POST['link'];
  $deskripsi  = $_POST['deskripsi'];

  // Logic Upload Gambar
  $nama_gambar = $gambar_lama; // Default pakai gambar lama

  // Jika user mengupload gambar baru
  if ($_FILES['gambar']['name'] != "") {
    $nama_file   = $_FILES['gambar']['name'];
    $source      = $_FILES['gambar']['tmp_name'];
    
    // PERBAIKAN PATH: Mundur 3 kali ke folder Assets di root
    $folder    = '../../Assets/files/'; 

    // Hapus gambar lama jika mode edit & file lama ada
    if ($is_edit && $gambar_lama != "" && file_exists($folder . $gambar_lama)) {
      unlink($folder . $gambar_lama);
    }

    // Upload gambar baru
    move_uploaded_file($source, $folder . $nama_file);
    $nama_gambar = $nama_file;
  }

  // Cek kondisi: UPDATE atau INSERT?
  if ($is_edit) {
    // Query Update
    $query = "UPDATE project SET 
            judul_project='$judul',
            durasi_project='$durasi',
            tanggal_project='$tanggal',
            tipe_pengerjaan_project='$tipe',
            link_project='$link',
            deskripsi_project='$deskripsi',
            gambar_project='$nama_gambar'
            WHERE id='$id_project'";
  } else {
    // Query Insert
    $query = "INSERT INTO project VALUES (
            NULL, '$judul', '$durasi', '$tanggal', '$tipe', '$link', '$deskripsi', '$nama_gambar'
        )";
  }

  $run = mysqli_query($koneksi, $query);

  if ($run) {
    echo "<script>alert('Data Berhasil Disimpan!'); window.location='editproject_admin.php';</script>";
  } else {
    echo "<script>alert('Gagal Menyimpan Data!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <title>Mandha Panel - Project Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900 w-auto min-h-screen mx-auto overflow-x-hidden">

  <div class="w-full flex">

    <!-- Panggil Sidebar -->
    <?php include '../sidebar_admin.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-16">

      <h1 class="text-4xl font-bold mb-10 mt-4 tracking-wide">
        <!-- Judul Halaman Berubah Sesuai Mode -->
        <?= $is_edit ? 'EDIT PROJECT' : 'TAMBAH PROJECT' ?>
      </h1>

      <div class="bg-black p-10 rounded-xl w-[900px]">

        <!-- FORM -->
        <form action="" method="POST" enctype="multipart/form-data">
          
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex flex-col">
              <label class="text-white mb-1 text-sm">Judul Project</label>
              <input type="text" name="judul" value="<?= $judul ?>" class="w-full bg-[#D9D9D9] py-2 px-3 rounded text-sm outline-none" required />
            </div>

            <div class="flex flex-col">
              <label class="text-white mb-1 text-sm">Durasi</label>
              <input type="text" name="durasi" value="<?= $durasi ?>" class="w-full bg-[#D9D9D9] py-2 px-3 rounded text-sm outline-none" />
            </div>

            <div class="flex flex-col">
              <label class="text-white mb-1 text-sm">Tanggal (hh - bb - tt)</label>
              <!-- Gunakan type="text" agar fleksibel sesuai format database Anda -->
              <input type="date" name="tanggal" value="<?= $tanggal ?>" class="w-full bg-[#D9D9D9] py-2 px-3 rounded text-sm outline-none" placeholder="Contoh: 12 - 05 - 2024" />
            </div>

            <div class="flex flex-col">
              <label class="text-white mb-1 text-sm">Tipe</label>
              <input type="text" name="tipe" value="<?= $tipe ?>" class="w-full bg-[#D9D9D9] py-2 px-3 rounded text-sm outline-none" placeholder="kolaborasi / tim / individu" />
            </div>
          </div>

          <!-- Link Project -->
          <div class="flex flex-col mb-4">
            <label class="text-white mb-1 text-sm">Link Project</label>
            <input type="text" name="link" value="<?= $link ?>" class="w-full bg-[#D9D9D9] py-2 px-3 rounded text-sm outline-none" />
          </div>

          <!-- Upload File -->
          <div class="flex flex-col mb-4">
            <label class="text-white mb-1 text-sm">Upload File</label>
            <div class="flex items-center bg-[#D9D9D9] rounded px-3 py-2">
              <input type="file" name="gambar" class="text-sm" />
            </div>
            <!-- Tampilkan info gambar lama jika sedang edit -->
            <?php if ($is_edit && $gambar_lama): ?>
              <p class="text-gray-400 text-xs mt-1">File saat ini: <?= $gambar_lama ?></p>
            <?php endif; ?>
          </div>

          <!-- Deskripsi -->
          <div class="flex flex-col mb-6">
            <label class="text-white mb-1 text-sm">Deskripsi Project</label>
            <textarea name="deskripsi" class="w-full h-[150px] bg-[#D9D9D9] py-2 px-3 rounded text-sm outline-none resize-none"><?= $deskripsi ?></textarea>
          </div>

          <!-- TOMBOL SIMPAN -->
          <button type="submit" name="simpan" class="w-full bg-[#4B4949] hover:bg-[#5a5757] transition text-white py-2 rounded-lg text-sm tracking-wide">
              <?= $is_edit ? 'Simpan Perubahan' : 'Tambah Project' ?>
          </button>

        </form>

        <!-- TEKS EDIT PROJECT -->
        <p class="text-center text-xs text-gray-300 mt-3">
          <a href="editproject_admin.php" class="hover:text-white">Kembali ke Daftar Project</a>
        </p>

      </div>

    </main>

  </div>

</body>
</html>