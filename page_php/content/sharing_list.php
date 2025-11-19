<?php
// Pastikan path koneksi sesuai
include 'config/koneksi.php'; 
?>

<!-- SHARING DETAIL CARDS -->
<section class="max-w-[1100px] mx-auto mb-16">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM sharing ORDER BY id DESC");
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
    ?>

    <!-- Looping Item Sharing -->
    <a href="details/detailsharing.php?id=<?= $row['id']; ?>" 
       class="block bg-white border border-black/40 rounded-xl shadow-sm overflow-hidden transform hover:-translate-y-1 hover:shadow-lg transition">
      
      <div class="h-48 bg-gray-100">
        <img src="../Assets/files/<?= $row['gambar_content']; ?>" alt="<?= $row['judul_content']; ?>" class="w-full h-full object-cover">
      </div>

      <div class="bg-[#4B3C3C] text-white px-4 py-3 flex items-center justify-between">
        <div class="text-left leading-tight">
          <!-- Sub Judul -->
          <p class="text-sm font-semibold"><?= $row['subJudul_content']; ?></p>
          <!-- Judul -->
          <p class="text-[11px] italic text-gray-200"><?= $row['judul_content']; ?></p>
        </div>
        <img src="../Assets/PANAH 2.png" class="w-4 h-4 object-contain" alt="arrow">
      </div>
    </a>

    <?php
        }
    } else {
        echo '<p class="text-center col-span-3 py-10">Belum ada konten sharing.</p>';
    }
    ?>

  </div>
</section>