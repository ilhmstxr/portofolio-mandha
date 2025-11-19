<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandha Panel - Certificates</title>
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
      <h1 class="text-3xl font-semibold mb-10">Certificates</h1>

      <div class="bg-black text-white w-[900px] rounded-xl p-10 shadow-lg">

        <!-- FORM INPUTS -->
        <div class="space-y-6">
          <!-- Judul Sertifikat -->
          <input
            type="text"
            placeholder="Judul Sertifikat"
            class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none" />

          <!-- Upload File -->
          <div class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md">
            <input type="file" class="w-full" />
          </div>

          <!-- Tanggal -->
          <input
            type="text"
            placeholder="hh - bb - tt"
            class="w-full bg-[#E3E3E3] text-black px-4 py-3 rounded-md outline-none" />
        </div>

        <!-- Button Submit -->
        <div class="flex justify-center mt-10">
          <a href="editcertificates_admin.php"
            class="w-full bg-[#4B4949] hover:bg-[#5a5757] transition text-white py-2 rounded-lg text-sm tracking-wide text-center block">
            Tambah Sertifikat
          </a>
        </div>

        <!-- TEKS EDIT CERTIFICATES -->
        <p class="text-center text-xs text-gray-300 mt-3">
          <a href="editcertificates_admin.php" class="hover:text-white">Edit Certificate</a>
        </p>

      </div>

    </main>

  </div>
</body>

</html>