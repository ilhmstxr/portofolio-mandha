<?php
include 'config/koneksi.php';
?>

<!-- CERTIFICATE CARDS -->
<section class="max-w-[1100px] mx-auto mb-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM certificate ORDER BY id DESC");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
        ?>

                <!-- Looping Item Sertifikat -->
                <div class="bg-white border border-black/40 rounded-xl shadow-sm overflow-hidden">
                    <div class="h-48 bg-gray-100">
                        <img src="Assets/files/<?= $row['gambar_certificate']; ?>" alt="<?= $row['judul_certificate']; ?>" class="w-full h-full object-cover">
                    </div>
                </div>

        <?php
            }
        } else {
            echo '<p class="text-center col-span-3 py-10">Belum ada sertifikat.</p>';
        }
        ?>

    </div>
</section>