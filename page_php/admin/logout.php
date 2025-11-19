<?php
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Redirect kembali ke halaman login
header("location:page/login_admin.php");
exit();
?>