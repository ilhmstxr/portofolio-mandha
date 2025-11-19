<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - Rahmandha Nur Aini</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }
  </style>
</head>
<body class="bg-white text-gray-900">

  <?php include 'component/navbar_section.php'; ?>
  <!-- ============================
       MAIN: SECTION HALO
  ============================== -->
  <main class="pt-[80px] flex justify-center bg-black">
    <div class="max-w-[1728px] w-full bg-black text-white">

      <!-- SECTION HALO / BIODATA ATAS -->
      <section id="home" class="px-10 lg:px-24 pt-16 pb-10 flex justify-center">
        <div class="flex flex-col lg:flex-row gap-10 lg:gap-16 items-start">

          <!-- FOTO KIRI + FRAME KOTAK -->
          <div class="flex justify-center lg:justify-start">
            <div class="bg-white rounded-xl shadow-xl p-4">
              <div class="w-[360px] h-[360px] bg-[#f3f3f3] overflow-hidden">
                <img
                  src="../Assets/PHOTO PROFILE.jpg"
                  alt="Rahmandha Nur Aini"
                  class="w-full h-full object-cover"
                />
              </div>
            </div>
          </div>

          <!-- TEKS + BIODATA KANAN -->
          <div class="max-w-[640px]">
            <h2 class="text-2xl font-bold mb-3 tracking-tight">Halo!</h2>
            <!-- TODO: DESKRIPSI SINGKAT -->
            <p class="text-[11px] leading-relaxed mb-6 text-gray-100">
              Perkenalkan nama saya Rahmandha Nur Aini. Saya adalah mahasiswa Teknik Industri yang memiliki minat
              dalam pengembangan sistem, peningkatan efisiensi proses, dan analisis data. Saya senang mempelajari
              bagaimana suatu sistem bekerja serta bagaimana proses dapat dioptimalkan untuk mencapai hasil yang
              lebih efektif dan berkelanjutan.
              <br><br>
              Dengan semangat belajar dan kemampuan bekerja sama dalam tim, saya siap berkontribusi dalam berbagai
              proyek dan tantangan yang saya hadapi.
            </p>

            <!-- TODO: BIODATA  -->
            <!-- BIODATA CARD -->
            <div id="biodata" class="bg-[#e3e3e3] text-black rounded-lg px-6 py-4 text-[11px] w-full">
              <div class="flex items-center mb-1.5">
                <span class="w-[170px] font-semibold">Nama</span>
                <span class="mx-2">:</span>
                <div class="flex-1 bg-[#3a3a3a] text-white rounded-md px-3 py-1 text-[10px]">
                  Rahmandha Nur Aini
                </div>
              </div>

              <div class="flex items-center mb-1.5">
                <span class="w-[170px] font-semibold">Tempat, Tanggal Lahir</span>
                <span class="mx-2">:</span>
                <div class="flex-1 bg-[#3a3a3a] text-white rounded-md px-3 py-1 text-[10px]">
                  Tuban, 18 Oktober 2004
                </div>
              </div>

              <div class="flex items-center mb-1.5">
                <span class="w-[170px] font-semibold">Email</span>
                <span class="mx-2">:</span>
                <div class="flex-1 bg-[#3a3a3a] text-white rounded-md px-3 py-1 text-[10px]">
                  rahmandhanuraini2@gmail.com
                </div>
              </div>

              <div class="flex items-center mb-1.5">
                <span class="w-[170px] font-semibold">No. Telp</span>
                <span class="mx-2">:</span>
                <div class="flex-1 bg-[#3a3a3a] text-white rounded-md px-3 py-1 text-[10px]">
                  087825467810
                </div>
              </div>

              <div class="flex items-center">
                <span class="w-[170px] font-semibold">Instagram</span>
                <span class="mx-2">:</span>
                <div class="flex-1 bg-[#3a3a3a] text-white rounded-md px-3 py-1 text-[10px]">
                  @rhmndhaa_
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
    </div>
  </main>

  <!-- ============================
       MY HOBBIES TITLE
  ============================== -->
  <!-- TODO: LOOPING HOBBIES -->
  <section class="flex justify-center mt-4 mb-6">
    <div class="bg-black text-white rounded-full px-10 py-2 text-sm font-semibold shadow-md">
      My Hobbies
    </div>
  </section>

  <!-- ============================
       SECTION HOBBIES 
============================== -->
<section class="px-8 lg:px-16 mb-16">
  <div class="grid md:grid-cols-2 gap-10 max-w-[1300px] mx-auto">

    <!-- ============================
         KIRI: BASKET + BERNYANYI (HORIZONTAL)
    =============================== -->
    <div class="bg-gradient-to-r from-black to-[#735555] text-white rounded-2xl shadow-lg p-10">

      <!-- GRID 2 FOTO -->
      <div class="grid grid-cols-2 gap-10 text-center">

        <!-- BASKET -->
        <div class="flex flex-col items-center">
          <h3 class="font-bold mb-3 tracking-wide text-base">BASKET</h3>

          <div class="bg-white p-3 rounded-xl shadow-[0_0_0_3px_#ffffff] mb-3">
            <img src="../Assets/BASKET.jpg"
                 alt="Basket"
                 class="w-[150px] h-[180px] object-cover mx-auto" />
          </div>

          <p class="text-[11px] leading-snug max-w-[160px]">
            Awal mula muncul hobi bermain basket saat masuk pada ekskul yang saya
        ikuti sejak kelas 10 SMA.
          </p>
        </div>

        <!-- BERNYANYI -->
        <div class="flex flex-col items-center">
          <h3 class="font-bold mb-3 tracking-wide text-base">BERNYANYI</h3>

          <div class="bg-white p-3 rounded-xl shadow-[0_0_0_3px_#ffffff] mb-3">
            <img src="../Assets/NYANYI.jpg"
                 alt="Bernyanyi"
                 class="w-[150px] h-[180px] object-cover mx-auto" />
          </div>

          <p class="text-[11px] leading-snug max-w-[160px]">
            Awal mula muncul hobi menyanyi sejak kecil dan mencoba mengikuti berbagai lomba 
        bernyanyi saat SMA.
          </p>
        </div>

      </div>

    </div>

    <!-- ============================
         KANAN: MENARI
    =============================== -->
    <div class="bg-gradient-to-r from-[#735555] to-black text-white rounded-2xl shadow-lg p-10 text-center">
      <h3 class="text-base font-bold mb-3 tracking-wide">MENARI</h3>

      <div class="bg-white p-3 rounded-xl shadow-[0_0_0_3px_#ffffff] mb-4 mx-auto w-fit">
        <img src="../Assets/SAMAN.jpg"
             alt="Menari Saman"
             class="w-[320px] h-[180px] object-cover mx-auto" />
      </div>

      <p class="text-[11px] leading-snug text-center max-w-[350px] mx-auto">
        Awal mula muncul hobi menari sudah sejak kecil, dan mencoba mengembangkan bakat
tari tradisional (saman) hobi tersebut sejak SD, kemudian mencoba menekuni hobi tersebut
hingga saat ini.
      </p>
    </div>

  </div>
</section>

</body>
</html>
    <!-- TODO: LOOPING RIWAYAT PENDIDIKAN -->
      <!-- SECTION RIWAYAT PENDIDIKAN -->
<section id="pendidikan" class="px-8 lg:px-16 mb-16">
  <div class="text-center mb-6">
    <h2 class="text-2xl md:text-3xl font-extrabold tracking-wide">
      RIWAYAT PENDIDIKAN
    </h2>
    <p class="text-xs text-gray-500 mt-1 italic tracking-wide">
      SD  SMP  SMA  KULIAH
    </p>
  </div>

  <div class="space-y-4 max-w-[1200px] mx-auto">

    <!-- SD -->
    <div class="bg-black text-white rounded-2xl px-8 py-4 flex items-center">
      <div class="flex items-center gap-4">
        <div class="bg-white rounded-full p-2 w-14 h-14 flex items-center justify-center">
          <img src="../Assets/SDIT.png" alt="SDIT Al-Uswah Tuban" class="w-12 h-12 object-contain">
        </div>
        <div class="leading-tight">
          <h3 class="text-sm font-semibold">SDIT Al-Uswah Tuban</h3>
          <p class="text-[11px] text-gray-300">2011 - 2017</p>
          <p class="text-[11px] text-gray-300">Nilai Akhir : 95,5</p>
        </div>
      </div>
    </div>

    <!-- SMP -->
    <div class="bg-[#4B3C3C] text-white rounded-2xl px-8 py-4 flex items-center">
      <div class="flex items-center gap-4">
        <div class="bg-white rounded-full p-2 w-14 h-14 flex items-center justify-center">
          <img src="../Assets/SMP.png" alt="SMP Ar-Rohmah Putri IIBS Malang" class="w-12 h-12 object-contain">
        </div>
        <div class="leading-tight">
          <h3 class="text-sm font-semibold">SMP Ar-Rohmah Putri IIBS Malang</h3>
          <p class="text-[11px] text-gray-200">2017 - 2020</p>
          <p class="text-[11px] text-gray-200">Nilai Akhir : 92,5</p>
        </div>
      </div>
    </div>

    <!-- SMA -->
    <div class="bg-black text-white rounded-2xl px-8 py-4 flex items-center">
      <div class="flex items-center gap-4">
        <div class="bg-white rounded-full p-2 w-14 h-14 flex items-center justify-center">
          <img src="../Assets/SMAMDA.png" alt="SMA Muhammadiyah 2 Sidoarjo" class="w-12 h-12 object-contain">
        </div>
        <div class="leading-tight">
          <h3 class="text-sm font-semibold">SMA Muhammadiyah 2 Sidoarjo</h3>
          <p class="text-[11px] text-gray-300">2020 - 2023</p>
          <p class="text-[11px] text-gray-300">Nilai Akhir : 93,5</p>
        </div>
      </div>
    </div>

    <!-- KULIAH -->
    <div class="bg-[#4B3C3C] text-white rounded-2xl px-8 py-4 flex items-center">
      <div class="flex items-center gap-4">
        <div class="bg-white rounded-full p-2 w-14 h-14 flex items-center justify-center">
          <img src="../Assets/UPN.png" alt="UPN Veteran Jawa Timur" class="w-12 h-12 object-contain">
        </div>
        <div class="leading-tight">
          <h3 class="text-sm font-semibold">UPN "Veteran" Jawa Timur</h3>
          <p class="text-[11px] text-gray-200">2023 - Sekarang</p>
          <p class="text-[11px] text-gray-200">IPK Terakhir : 3,5</p>
        </div>
      </div>
    </div>

  </div>
</section>

    </div>
  </main>

  <?php include 'component/footer_section.php'; ?>

  <!-- FontAwesome Icon CDN -->
  <script src="https://kit.fontawesome.com/a2e0e6d6e0.js" crossorigin="anonymous"></script>

</body>
</html>
