
    <?php
// Mendapatkan nama file halaman saat ini (misal: project_admin.php)
$current_page = basename($_SERVER['PHP_SELF']);

// Class untuk menu aktif (Warna Abu-abu Terang)
$active_class = "bg-gray-700 text-white";

// Class untuk menu tidak aktif (Hover effect saja)
$inactive_class = "hover:bg-gray-700 hover:text-white transition text-gray-300";
?>

<!-- SIDEBAR -->
<aside class="w-[320px] bg-black text-white min-h-screen p-8 flex flex-col justify-between">
    <div class="flex flex-col items-center mt-4 w-full">
        <img src="../Assets/LOGO.png" class="h-28 mb-4" />
        <h2 class="text-xl font-semibold mb-6 tracking-wide">Mandha Panel</h2>
        <div class="w-full h-[1px] bg-white opacity-40 mb-6"></div>

        <nav class="w-full space-y-3 text-sm">
            
            <!-- MENU DATA DIRI -->
            <a class="block px-4 py-2 rounded <?= ($current_page == 'datadiri_admin.php') ? $active_class : $inactive_class ?>" 
               href="datadiri_admin.php">
               Data Diri
            </a>

            <!-- MENU PROJECTS -->
            <!-- Kita gunakan strpos agar editproject_admin.php juga tetap menyorot menu Projects -->
            <a class="block px-4 py-2 rounded <?= (strpos($current_page, 'project') !== false) ? $active_class : $inactive_class ?>" 
               href="project_admin.php">
               Projects
            </a>

            <!-- MENU CERTIFICATES -->
            <a class="block px-4 py-2 rounded <?= (strpos($current_page, 'certificates') !== false) ? $active_class : $inactive_class ?>" 
               href="certificates_admin.php">
               Certificates
            </a>

            <!-- MENU SHARING -->
            <a class="block px-4 py-2 rounded <?= (strpos($current_page, 'sharing') !== false) ? $active_class : $inactive_class ?>" 
               href="sharing_admin.php">
               Sharing
            </a>

        </nav>
    </div>

    <a href="logout.php" class="text-sm opacity-70 cursor-pointer block hover:text-white transition">
        Logout
    </a>
</aside>