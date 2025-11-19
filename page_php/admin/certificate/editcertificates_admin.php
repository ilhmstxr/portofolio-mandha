<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandha Panel - Edit Certificates</title>
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
    <main class="flex-1 p-16 pl-24">

      <!-- JUDUL -->
      <h1 class="text-4xl font-bold mt-4 mb-10">EDIT CERTIFICATES</h1>

      <!-- AREA TABLE + BACK -->
      <div class="w-[900px]">

        <!-- BACK DI POJOK KANAN ATAS TABEL -->
        <div class="flex justify-end mb-2">
          <a href="certificates_admin.html" class="text-sm text-black">Back</a>
        </div>

        <!-- TABLE -->
        <table class="w-full text-sm border border-gray-500 border-collapse">

          <thead>
            <tr class="text-white text-center" style="background-color: #4B4949;">
              <th class="py-3 px-4 border border-gray-500">Judul</th>
              <th class="py-3 px-4 border border-gray-500">Gambar</th>
              <th class="py-3 px-4 border border-gray-500">Tanggal</th>
              <th class="py-3 px-4 border border-gray-500">Action</th>
            </tr>
          </thead>

          <tbody>
            <tr style="background-color: #D9D9D9;">
              <!-- Judul -->
              <td class="py-3 px-4 border border-gray-400 text-center align-top text-xs leading-4">
                TODO: JUDUL_CERTIFICATE
              </td>

              <!-- Gambar -->
              <td class="py-3 px-4 border border-gray-400 text-center align-top">
                TODO: GAMBAR_CERTIFICATE
              </td>

              <!-- Tanggal -->
              <td class="py-3 px-4 border border-gray-400 text-center align-top">
                TODO: TANGGAL_CERTIFICATE
              </td>

              <!-- Action -->
              <td class="py-3 px-4 border border-gray-400 text-center align-top">
                <div class="flex flex-col items-center leading-tight">
                  <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Edit</a>
                  <a href="#" class="text-red-600 hover:underline text-sm mt-1">Hapus</a>
                </div>
              </td>
            </tr>


            <tr style="background-color: #D9D9D9;">
              <!-- Judul -->
              <td class="py-3 px-4 border border-gray-400 text-center align-top text-xs leading-4">
                Event Implementation:2JP
              </td>

              <!-- Gambar -->
              <td class="py-3 px-4 border border-gray-400 text-center align-top">
                Sertifikat1.jpg
              </td>

              <!-- Tanggal -->
              <td class="py-3 px-4 border border-gray-400 text-center align-top">
                10 - 02 - 24
              </td>

              <!-- Action -->
              <td class="py-3 px-4 border border-gray-400 text-center align-top">
                <div class="flex flex-col items-center leading-tight">
                  <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Edit</a>
                  <a href="#" class="text-red-600 hover:underline text-sm mt-1">Hapus</a>
                </div>
              </td>
            </tr>
          </tbody>

        </table>
      </div>

    </main>
  </div>

</body>

</html>