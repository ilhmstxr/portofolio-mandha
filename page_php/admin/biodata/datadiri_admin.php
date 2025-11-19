<?php
include '../../config/koneksi.php';

$query = "SELECT * FROM biodata";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mandha Panel - Edit Data Diri</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-white text-gray-900 w-auto min-h-screen mx-auto overflow-x-hidden">

  <div class="w-full flex">

    <!-- Include Sidebar -->
    <?php include '../sidebar_admin.php'; ?>

    <!-- MAIN CONTENT -->
    <!-- Tambah ml-[320px] agar tidak tertutup sidebar fixed -->
    <main class="flex-1 p-16 pl-24">

      <h1 class="text-4xl font-bold mb-10 mt-4">KELOLA DATA DIRI</h1>

      <div class="w-[900px]">

        <!-- Form Wrapper -->
        <form action="" method="POST">
          <table class="w-full text-sm border border-gray-500 border-collapse mb-6">

            <thead>
              <tr class="text-white text-center" style="background-color: #4B4949;">
                <th class="py-3 px-4 w-[200px] border border-gray-500">Field</th>
                <th class="py-3 px-4 border border-gray-500">Isi Data</th>
                <th class="py-3 px-4 w-[120px] border border-gray-500">Action</th>
                <!-- Kolom Action dihapus karena kita pakai tombol simpan global -->
              </tr>
            </thead>

            <tbody>
              <?php
              // 4. LOOPING DATA DARI DATABASE
              // Cek apakah ada data?
              if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) :
              ?>

                  <tr style="background-color: #D9D9D9;">

                    <td class="py-3 px-4 border border-gray-400 font-medium">
                      <?= $row['field']; ?>
                    </td>

                    <td class="py-3 px-4 border border-gray-400">
                      <?= $row['isi']; ?>
                    </td>

                    <td class="py-3 px-4 border border-gray-400 text-sm text-center">
                      <a class="text-blue-600 font-semibold hover:underline"
                        href="edit_datadiri.php?id=<?= $row['id']; ?>">
                        Edit
                      </a>
                      <br>
                      <a class="text-red-600 font-semibold hover:underline"
                        href="proses_hapus.php?id=<?= $row['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?');">
                        Hapus
                      </a>
                    </td>
                  </tr>
              <?php
                endwhile;
              } else {
                // Jika data kosong
                echo "<tr><td colspan='3' class='text-center py-4'>Belum ada data.</td></tr>";
              }
              ?>



            </tbody>
          </table>

          <!-- TOMBOL SIMPAN -->
          <div class="flex justify-end">
            <button type="submit" name="simpan" class="bg-[#4B4949] hover:bg-[#2c2c2c] text-white font-bold py-3 px-8 rounded transition">
              Simpan Perubahan
            </button>
          </div>
        </form>

      </div>

    </main>
  </div>

</body>

</html>