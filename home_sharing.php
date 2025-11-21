<?php
// 1. Tentukan konten mana yang mau dimuat di tengah layout
$content = 'content/sharing_list.php';

// 2. Panggil Layout Utama
// Layout akan otomatis memuat navbar, hero, dll, lalu memasukkan $content di tengahnya.
include 'component/main_layout.php';
?>