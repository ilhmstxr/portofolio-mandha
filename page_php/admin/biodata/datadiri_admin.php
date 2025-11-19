<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandha Panel - Edit Data Diri</title>
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

  <!-- TANPA NAVBAR -->
  <div class="w-full flex">
    
    <?php include 'sidebar_admin.php'; ?>


    <!-- MAIN CONTENT -->
    <main class="flex-1 p-16 pl-24">

      <h1 class="text-4xl font-bold mb-10 mt-4">EDIT DATA DIRI</h1>

      <!-- TABLE -->
      <div class="w-[900px]">
        <table class="w-full text-sm border border-gray-500 border-collapse">

          <thead>
            <tr class="text-white text-center" style="background-color: #4B4949;">
              <th class="py-3 px-4 w-[200px] border border-gray-500">Field</th>
              <th class="py-3 px-4 border border-gray-500">Isi</th>
              <th class="py-3 px-4 w-[120px] border border-gray-500">Action</th>
            </tr>
          </thead>

          <tbody>

            <tr style="background-color: #D9D9D9;">
              <td class="py-3 px-4 border border-gray-400">Nama</td>
              <td class="py-3 px-4 border border-gray-400">Rahmandha Nur Aini</td>
              <td class="py-3 px-4 border border-gray-400 text-sm text-center">
                <a class="text-blue-600" href="#">Edit</a><br>
                <a class="text-red-600" href="#">Hapus</a>
              </td>
            </tr>

            <tr style="background-color: #D9D9D9;">
              <td class="py-3 px-4 border border-gray-400">TTL</td>
              <td class="py-3 px-4 border border-gray-400">Tuban, 18 Oktober 2004</td>
              <td class="py-3 px-4 border border-gray-400 text-sm text-center">
                <a class="text-blue-600" href="#">Edit</a><br>
                <a class="text-red-600" href="#">Hapus</a>
              </td>
            </tr>

            <tr style="background-color: #D9D9D9;">
              <td class="py-3 px-4 border border-gray-400">Email</td>
              <td class="py-3 px-4 border border-gray-400">rahmandhanuraini2@gmail.com</td>
              <td class="py-3 px-4 border border-gray-400 text-sm text-center">
                <a class="text-blue-600" href="#">Edit</a><br>
                <a class="text-red-600" href="#">Hapus</a>
              </td>
            </tr>

            <tr style="background-color: #D9D9D9;">
              <td class="py-3 px-4 border border-gray-400">No. Telp</td>
              <td class="py-3 px-4 border border-gray-400">0812345678910</td>
              <td class="py-3 px-4 border border-gray-400 text-sm text-center">
                <a class="text-blue-600" href="#">Edit</a><br>
                <a class="text-red-600" href="#">Hapus</a>
              </td>
            </tr>

            <tr style="background-color: #D9D9D9;">
              <td class="py-3 px-4 border border-gray-400">Instagram</td>
              <td class="py-3 px-4 border border-gray-400">rhmndhaa_</td>
              <td class="py-3 px-4 border border-gray-400 text-sm text-center">
                <a class="text-blue-600" href="#">Edit</a><br>
                <a class="text-red-600" href="#">Hapus</a>
              </td>
            </tr>

          </tbody>
        </table>
      </div>

    </main>
  </div>

</body>

</html>