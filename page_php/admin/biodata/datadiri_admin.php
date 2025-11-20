<?php
session_start();
// Cek Login (Optional, disamakan dengan file lain)
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:login_admin.php");
  exit();
}

include '../../config/koneksi.php';

// --- 1. LOGIKA UPDATE DATA ---
if (isset($_POST['update_data'])) {
  $id    = $_POST['id'];
  $field = $_POST['field'];
  $isi   = $_POST['isi'];

  $query_update = "UPDATE biodata SET field='$field', isi='$isi' WHERE id='$id'";
  $run_update   = mysqli_query($koneksi, $query_update);

  if ($run_update) {
    echo "<script>alert('Data Berhasil Diupdate!'); window.location='datadiri_admin.php';</script>";
  } else {
    echo "<script>alert('Gagal Update Data!');</script>";
  }
}

// --- 2. LOGIKA AMBIL DATA UNTUK DIEDIT ---
$data_edit = null;
$is_editing = false;

if (isset($_GET['id'])) {
  $id_edit = $_GET['id'];
  $q_edit  = mysqli_query($koneksi, "SELECT * FROM biodata WHERE id='$id_edit'");
  if (mysqli_num_rows($q_edit) > 0) {
    $data_edit = mysqli_fetch_array($q_edit);
    $is_editing = true;
  }
}

// --- 3. AMBIL SEMUA DATA UNTUK TABEL ---
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
    <main class="flex-1 p-16 pl-24">

      <h1 class="text-4xl font-bold mb-10 mt-4">KELOLA DATA DIRI</h1>

      <div class="w-[900px]">

        <!-- --- AREA FORM EDIT (Hanya Muncul Jika Tombol Edit Diklik) --- -->
        <?php if ($is_editing): ?>
          <div class="bg-black p-8 rounded-xl mb-8 text-white shadow-lg animate-fade-in-down">
            <h2 class="text-xl font-bold mb-4 text-[#bca2a2]">Edit Data: <?= $data_edit['field'] ?></h2>
            
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?= $data_edit['id'] ?>">

              <div class="grid grid-cols-1 gap-4 mb-4">
                <!-- Input Field (Nama Kolom) -->
                <div class="flex flex-col">
                  <label class="text-sm mb-1 text-gray-300">Nama Field</label>
                  <input type="text" name="field" value="<?= $data_edit['field'] ?>" 
                         class="w-full bg-[#D9D9D9] text-black py-2 px-3 rounded text-sm outline-none font-semibold" required />
                </div>

                <!-- Input Isi Data -->
                <div class="flex flex-col">
                  <label class="text-sm mb-1 text-gray-300">Isi Data</label>
                  <textarea name="isi" rows="3"
                            class="w-full bg-[#D9D9D9] text-black py-2 px-3 rounded text-sm outline-none resize-none" required><?= $data_edit['isi'] ?></textarea>
                </div>
              </div>

              <div class="flex gap-3">
                <button type="submit" name="update_data" 
                        class="bg-[#4B4949] hover:bg-white hover:text-black border border-transparent hover:border-white transition text-white py-2 px-6 rounded-lg text-sm font-bold">
                  Simpan Perubahan
                </button>
                <a href="datadiri_admin.php" 
                   class="bg-red-600 hover:bg-red-700 text-white py-2 px-6 rounded-lg text-sm font-bold transition flex items-center">
                  Batal
                </a>
              </div>
            </form>
          </div>
        <?php endif; ?>
        <!-- --- END AREA FORM --- -->


        <!-- TABEL DATA -->
        <table class="w-full text-sm border border-gray-500 border-collapse mb-6">
          <thead>
            <tr class="text-white text-center" style="background-color: #4B4949;">
              <th class="py-3 px-4 w-[200px] border border-gray-500">Field</th>
              <th class="py-3 px-4 border border-gray-500">Isi Data</th>
              <th class="py-3 px-4 w-[120px] border border-gray-500">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) :
                // Highlight baris yang sedang diedit
                $bg_class = ($is_editing && $row['id'] == $id_edit) ? "bg-yellow-100" : "bg-[#D9D9D9]";
            ?>
                <tr class="<?= $bg_class ?> transition duration-200">
                  <td class="py-3 px-4 border border-gray-400 font-bold">
                    <?= $row['field']; ?>
                  </td>

                  <td class="py-3 px-4 border border-gray-400">
                    <?= $row['isi']; ?>
                  </td>

                  <td class="py-3 px-4 border border-gray-400 text-sm text-center">
                    <!-- Tombol Edit mengarah ke file ini sendiri dengan parameter ID -->
                    <a class="text-blue-600 font-bold hover:underline block mb-1"
                       href="datadiri_admin.php?id=<?= $row['id']; ?>">
                       Edit
                    </a>
                    
                    <a class="text-red-600 font-bold hover:underline block"
                       href="proses_hapus.php?id=<?= $row['id']; ?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?');">
                       Hapus
                    </a>
                  </td>
                </tr>
            <?php
              endwhile;
            } else {
              echo "<tr><td colspan='3' class='text-center py-4'>Belum ada data.</td></tr>";
            }
            ?>
          </tbody>
        </table>

      </div>

    </main>
  </div>

</body>
</html>