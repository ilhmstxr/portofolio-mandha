<?php
// Hubungkan ke database
// Pastikan path ini benar (sesuai dengan file admin lain yang mundur 1 folder lalu masuk config)
include 'config/koneksi.php';

// Proses saat tombol diklik
if (isset($_POST['kirim'])) {
  // Ambil data dari form
  $nama    = htmlspecialchars($_POST['nama']);
  $email   = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // Query Insert ke tabel 'pengunjung'
  // Kolom ID tidak perlu diisi karena biasanya auto_increment
  $query = "INSERT INTO pengunjung (nama, email, message) VALUES ('$nama', '$email', '$message')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    echo "<script>
                alert('Pesan berhasil terkirim!'); 
                window.location.href = window.location.href; // Refresh halaman
              </script>";
  } else {
    echo "<script>alert('Gagal mengirim pesan. Silakan coba lagi.');</script>";
  }
}
?>

<!-- TODO: COMPONENT GET IN TOUCH -->
<!-- CONTACT SECTION (GET IN TOUCH + CONNECT WITH ME) -->
<section id="contact" class="max-w-[1100px] mx-auto mb-20">

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- LEFT: GET IN TOUCH -->
    <div class="bg-[#0d0d0d] rounded-2xl p-8">
      <div class="bg-[#1e1e1e] rounded-xl p-8">
        <h2 class="text-white text-lg font-semibold mb-2">Get In Touch</h2>
        <p class="text-gray-400 text-sm mb-6">Have something to discuss? Send me a message and let's talk.
        </p>

        <!-- FORM START -->
        <!-- Tambahkan method="POST" -->
        <form action="" method="POST" class="space-y-4">

          <!-- Input Nama: Tambah name="nama" -->
          <input type="text" name="nama" placeholder="Your Name" required
            class="w-full px-4 py-3 rounded-lg bg-black text-white text-sm focus:ring-2 focus:ring-gray-600 outline-none">

          <!-- Input Email: Tambah name="email" -->
          <input type="email" name="email" placeholder="Your Email" required
            class="w-full px-4 py-3 rounded-lg bg-black text-white text-sm focus:ring-2 focus:ring-gray-600 outline-none">

          <!-- Input Message: Tambah name="message" -->
          <textarea name="message" placeholder="Your Message" rows="4" required
            class="w-full px-4 py-3 rounded-lg bg-black text-white text-sm focus:ring-2 focus:ring-gray-600 outline-none"></textarea>

          <!-- Button: Tambah type="submit" dan name="kirim" -->
          <button type="submit" name="kirim"
            class="w-full bg-black text-white py-3 rounded-lg font-medium hover:bg-[#b69b89] transition">
            Send Message
          </button>
        </form>
        <!-- FORM END -->

      </div>
    </div>

    <!-- RIGHT: CONNECT WITH ME -->
    <div class="bg-[#0d0d0d] rounded-2xl p-8">
      <div class="bg-[#1e1e1e] rounded-xl p-8">
        <h2 class="text-white text-lg font-semibold mb-6">Connect With Me</h2>

        <div class="grid grid-cols-1 gap-4">

          <!-- Instagram -->
          <a href="https://www.instagram.com/rhmndhaa_/" target="_blank">
            <div class="bg-black text-white rounded-lg px-4 py-3 flex items-center gap-4 hover:bg-gray-800 transition">
              <img src="../Assets/INSTAGRAM.png" class="w-6 h-6" alt="">
              <div>
                <p class="font-medium">Instagram</p>
                <p class="text-xs text-gray-400">@rhmndhaa_</p>
              </div>
            </div>
          </a>

          <!-- Gmail -->
          <a href="mailto:rahmandhanuraini2@gmail.com">
            <div class="bg-black text-white rounded-lg px-4 py-3 flex items-center gap-4 hover:bg-gray-800 transition">
              <img src="../Assets/GMAIL.png" class="w-6 h-6" alt="">
              <div>
                <p class="font-medium">Gmail</p>
                <p class="text-xs text-gray-400">rahmandhanuraini2@gmail.com</p>
              </div>
            </div>
          </a>

          <!-- Facebook -->
          <div class="bg-black text-white rounded-lg px-4 py-3 flex items-center gap-4">
            <img src="../Assets/FACEBOOK.png" class="w-6 h-6" alt="">
            <div>
              <p class="font-medium">Facebook</p>
              <p class="text-xs text-gray-400">RahmandhaNurAini</p>
            </div>
          </div>

          <!-- Contact -->
          <div class="bg-black text-white rounded-lg px-4 py-3 flex items-center gap-4">
            <img src="../Assets/CONTACT.png" class="w-6 h-6" alt="">
            <div>
              <p class="font-medium">Contact</p>
              <p class="text-xs text-gray-400">087825467810</p>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

</section>