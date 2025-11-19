<?php
session_start();
include '../config/koneksi.php'; // Pastikan path ini benar

// Jika sudah login, langsung lempar ke dashboard
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
  header("location:project_admin.php");
  exit();
}

// Proses saat tombol Sign In ditekan
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Cek ke database
  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($query);

  if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:project_admin.php");
  } else {
    echo "<script>alert('Username atau Password Salah!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio - Rahmandha Nur Aini</title>
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

<body class="w-full h-screen bg-black text-gray-900 flex items-center justify-center relative">

  <!-- Background Image -->
  <div class="absolute inset-0 w-full h-full -z-10">
    <img src="../../Assets/NEW BG.png" class="w-full h-full object-cover opacity-50" />
  </div>

  <div class="bg-[#e6e6e6]/90 w-[520px] rounded-2xl shadow-xl p-10 text-center">
    <h1 class="text-3xl font-semibold text-black mb-8">Login Admin</h1>

    <!-- Form Login -->
    <form action="" method="POST">
      <div class="text-left mb-4">
        <label class="text-sm font-medium text-black">Username</label>
        <input type="text" name="username" class="w-full mt-1 px-3 py-2 rounded bg-black text-white focus:outline-none" required />
      </div>

      <div class="text-left mb-6">
        <label class="text-sm font-medium text-black">Password</label>
        <input type="password" name="password" class="w-full mt-1 px-3 py-2 rounded bg-black text-white focus:outline-none" required />
      </div>

      <button type="submit" name="login" class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 rounded mb-4 transition">
        Sign in
      </button>
    </form>

    <a href="../index.php" class="text-sm text-black underline">Back to Home</a>
  </div>

</body>

</html>