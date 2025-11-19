<?php
// 1. Ambil nama file halaman yang sedang dibuka (Wajib ada untuk logic active)
$current_page = basename($_SERVER['PHP_SELF']);

// 2. Ambil jalur URL script yang sedang berjalan saat ini (Untuk base path links)
$current_path = $_SERVER['SCRIPT_NAME']; 

// 3. Tentukan kata kunci folder pembatas (sesuaikan dengan nama folder admin Anda)
$keyword = '/admin/';

// 4. Cari posisi kata "/admin/" di dalam URL
$posisi = strpos($current_path, $keyword);

// 5. Tentukan Base URL untuk link (agar tidak broken link saat di sub-folder)
if ($posisi !== false) {
    $base_admin = substr($current_path, 0, $posisi + strlen($keyword));
} else {
    // Fallback: Jika file tidak di dalam folder bernama 'admin', anggap flat relative
    $base_admin = ''; 
}

// Class untuk menu aktif (Background Gelap & Teks Putih)
$active_class = "bg-gray-700 text-white shadow-md";

// Class untuk menu tidak aktif (Transparan & Hover Effect)
$inactive_class = "hover:bg-gray-700 hover:text-white transition text-gray-300";
?>

<!-- SIDEBAR -->
<aside class="w-[320px] bg-black text-white min-h-screen p-8 flex flex-col justify-between overflow-y-auto">
    <div class="flex flex-col items-center mt-4 w-full">
        <img src="../Assets/LOGO.png" class="h-28 mb-4 object-contain" alt="Logo Mandha" />
        <h2 class="text-xl font-semibold mb-6 tracking-wide">Mandha Panel</h2>
        <div class="w-full h-[1px] bg-white opacity-40 mb-6"></div>

        <nav class="w-full space-y-3 text-sm">

            <!-- MENU DATA DIRI -->
            <!-- Active jika file bernama 'datadiri_admin.php' -->
            <a class="block px-4 py-2 rounded transition <?= ($current_page == 'datadiri_admin.php') ? $active_class : $inactive_class ?>"
                href="<?= $base_admin ?>biodata/datadiri_admin.php">
                Data Diri
            </a>

            <!-- MENU PROJECTS -->
            <!-- Active jika nama file mengandung kata 'project' (misal: project_admin.php, editproject_admin.php) -->
            <a class="block px-4 py-2 rounded transition <?= (strpos($current_page, 'project') !== false) ? $active_class : $inactive_class ?>"
                href="<?= $base_admin ?>project/project_admin.php">
                Projects
            </a>

            <!-- MENU CERTIFICATES -->
            <!-- Active jika nama file mengandung kata 'certificate' -->
            <a class="block px-4 py-2 rounded transition <?= (strpos($current_page, 'certificate') !== false) ? $active_class : $inactive_class ?>"
                href="<?= $base_admin ?>certificate/certificates_admin.php">
                Certificates
            </a>

            <!-- MENU SHARING -->
            <!-- Active jika nama file mengandung kata 'sharing' -->
            <a class="block px-4 py-2 rounded transition <?= (strpos($current_page, 'sharing') !== false) ? $active_class : $inactive_class ?>"
                href="<?= $base_admin ?>sharing/sharing_admin.php">
                Sharing
            </a>

        </nav>
    </div>

    <!-- LOGOUT -->
    <a href="logout.php" class="text-sm opacity-70 cursor-pointer block hover:text-white transition hover:underline mt-10">
        Logout
    </a>
</aside>