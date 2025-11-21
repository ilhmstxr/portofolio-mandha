<?php
// Hubungkan ke database
// Pastikan path ini benar relatif dari lokasi file ini
include '../config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Query data berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM project WHERE id='$id'");
$data  = mysqli_fetch_array($query);

// Jika data tidak ditemukan, kembalikan ke halaman list (opsional)
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.history.back();</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - <?= $data['judul_project']; ?></title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }
  </style>
</head>
<body class="bg-white text-gray-900">

  <!-- NAVBAR -->
  <nav class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-black to-[#bca2a2] text-white shadow-md">
    <div class="max-w-[1728px] mx-auto flex items-center justify-between py-3 px-10">
      <div class="flex items-center space-x-3">
        <!-- Path Logo disesuaikan agar naik satu folder -->
        <img class="w-35 h-40 sm:h-12" src="../Assets/LOGO.png" alt="Logo">
      </div>
      <ul class="flex space-x-8 text-sm font-medium">
        <li><a href="../indexcoba3.html" class="hover:text-[#b69b89] transition">Home</a></li>
        <li><a href="../biodata.html" class="hover:text-[#b69b89] transition">Biodata</a></li>
        <li><a href="../biodata.html" class="hover:text-[#b69b89] transition">Pendidikan</a></li>
        <li><a href="../indexcoba3.html" class="hover:text-[#b69b89] transition">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- MAIN LAYOUT DETAIL PROJECT -->
  <main class="pt-[80px] flex justify-center">
    <div class="max-w-[1728px] w-full min-h-[1084px] bg-white px-10 lg:px-16 pb-16">

      <!-- BREADCRUMB -->
      <div class="pt-8 mb-6">
        <a href="javascript:history.back()" class="text-sm font-semibold text-black hover:underline">
          Back
        </a>
        <span class="text-sm text-gray-500 ml-1">
          / Projects &gt; <?= $data['judul_project']; ?>
        </span>
      </div>

      <!-- 2 KOLOM: KIRI TEKS, KANAN GAMBAR -->
      <div class="grid grid-cols-1 lg:grid-cols-[1.1fr,1fr] gap-10 items-start">

        <!-- KIRI: CARD DESKRIPSI PROJECT -->
        <section class="bg-[#e3e3e3] rounded-[24px] shadow-md px-10 py-10">
          <div class="max-w-[560px]">

            <!-- Judul -->
            <!-- Menggunakan 'tipe_pengerjaan_project' sebagai Kategori (H1) agar dinamis -->
            <h1 class="text-3xl font-extrabold tracking-tight mb-2 uppercase">
              <?= $data['tipe_pengerjaan_project']; ?>
            </h1>
            <h2 class="text-sm font-semibold mb-6">
              <?= $data['judul_project']; ?>
            </h2>

            <!-- Deskripsi -->
            <p class="text-[11px] leading-relaxed mb-6 text-gray-800 text-justify">
              <?= nl2br($data['deskripsi_project']); ?>
            </p>

            <!-- Detail Project -->
            <div class="space-y-1 text-[11px] text-gray-900">
              <p>
                <span class="font-semibold">Tanggal Pengerjaan :</span>
                <span class="ml-1"><?= $data['tanggal_project']; ?></span>
              </p>
              <p>
                <span class="font-semibold">Pengerjaan :</span>
                <!-- Menampilkan tipe pengerjaan lagi sesuai layout asli -->
                <span class="ml-1"><?= $data['tipe_pengerjaan_project']; ?></span>
              </p>
              <p class="break-all">
                <span class="font-semibold">Link Project :</span>
                <a href="<?= $data['link_project']; ?>" target="_blank"
                   class="ml-1 text-blue-700 hover:underline">
                  <?= $data['link_project']; ?>
                </a>
              </p>
            </div>

            <!-- Durasi Pengerjaan -->
            <div class="mt-8">
              <div class="inline-flex flex-col items-center justify-center bg-black text-white rounded-full px-8 py-3">
                <span class="text-sm font-semibold"><?= $data['durasi_project']; ?></span>
                <span class="text-[10px] text-gray-300">Durasi Pengerjaan</span>
              </div>
            </div>

          </div>
        </section>

        <!-- KANAN: PREVIEW GAMBAR ACAD -->
        <section class="flex items-center justify-center">
          <div class="bg-white border border-gray-300 rounded-[24px] shadow-sm w-full max-w-[640px] aspect-[4/3] flex items-center justify-center overflow-hidden px-6 py-4">
            <img
              src="../Assets/files/<?= $data['gambar_project']; ?>"
              alt="<?= $data['judul_project']; ?>"
              class="w-full h-full object-contain"
            />
          </div>
        </section>

      </div>
    </div>
  </main>

</body>
</html>