<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Wakaf</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-white text-black">
<header class="flex items-center justify-between px-6 py-4 max-w-[1300px] mx-auto relative">
  <div class="flex items-center space-x-3">
    <img class="w-30 h-12 object-contain" src="/images/logo/bmku.png" alt="Logo" />
  </div>
  <button class="md:hidden text-2xl" id="menu-toggle">
    <i class="fas fa-bars"></i>
  </button>
  
  <!-- Menu -->
  <nav id="menu" class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-6 space-y-4 md:space-y-0 absolute md:relative top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none z-50 p-6 md:p-0 text-sm font-normal">
    <a class="hover:underline hover:text-[#0089FF] block" href="/">Beranda</a>
    <a class="hover:underline hover:text-[#0089FF] block" href="/zakat">Zakat</a>
    <a class="hover:underline hover:text-[#0089FF] block" href="/wakaf">Wakaf</a>
    <a href="/donasi" class="bg-[#0089FF] text-white rounded-full px-5 py-2 text-center hover:bg-[#0077e6] transition block md:inline">Donasi Sekarang</a>
  </nav>
</header>

<!-- Script -->
<script>
  const toggleButton = document.getElementById('menu-toggle');
  const menu = document.getElementById('menu');

  toggleButton.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>

  <section class="bg-[#0a82ff] text-white text-center py-10 px-6">
    <h1 class="font-bold text-xl md:text-2xl mb-2">Wakaf</h1>
    <p class="text-xs md:text-sm max-w-[600px] mx-auto leading-tight">
      Salurkan wakaf Anda dalam bentuk uang maupun barang. Setiap wakaf akan dikelola dan disalurkan dengan amanah.
    </p>
  </section>

  <main class="max-w-md mx-auto mt-10 mb-20 px-6">
    <!-- Alert maintenance -->
    <div id="alert-maintenance" class="flex items-center gap-3 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 px-4 py-3 mb-6 rounded-lg text-sm" role="alert">
      <i class="fas fa-tools text-xl"></i>
      <span>Fitur form wakaf masih dalam tahap pengembangan / maintenance.</span>
    </div>
    <form class="bg-[#fafafa] rounded-xl p-8 space-y-6" id="wakafForm">
      <h2 class="font-bold text-lg mb-4 text-center">Form Wakaf</h2>

      <!-- Jenis Wakaf -->
      <div>
        <label class="block text-xs mb-1" for="jenisWakaf">Jenis Wakaf</label>
        <select id="jenisWakaf" name="jenisWakaf" class="w-full border border-black rounded-lg py-3 px-4 text-sm">
          <option value="uang">Uang</option>
          <option value="barang">Barang (Tanah, Al-Qur’an, dll)</option>
        </select>
      </div>

      <!-- Form Wakaf Uang -->
      <div id="formUang">
        <label class="block text-xs mb-1">Pilih Nominal</label>
        <div class="grid grid-cols-3 gap-4 mb-4">
          <button type="button" class="nominal-btn border border-black rounded-lg py-2 text-xs font-semibold hover:bg-[#0a82ff] hover:text-white transition">Rp 100.000</button>
          <button type="button" class="nominal-btn border border-black rounded-lg py-2 text-xs font-semibold hover:bg-[#0a82ff] hover:text-white transition">Rp 200.000</button>
          <button type="button" class="nominal-btn border border-black rounded-lg py-2 text-xs font-semibold hover:bg-[#0a82ff] hover:text-white transition">Rp 500.000</button>
        </div>
        <input id="nominal" name="nominal" type="text" placeholder="Nominal lainnya (Rp)" class="w-full border border-black rounded-lg py-3 px-4 text-sm placeholder:text-black placeholder:opacity-50"/>
      </div>

      <!-- Form Wakaf Barang -->
      <div id="formBarang" class="hidden space-y-4">
        <div>
          <label class="block text-xs mb-1" for="jenisBarang">Jenis Barang</label>
          <input type="text" id="jenisBarang" name="jenisBarang" placeholder="Contoh: Tanah, Al-Qur’an, dll" class="w-full border border-black rounded-lg py-3 px-4 text-sm"/>
        </div>
        <div>
          <label class="block text-xs mb-1" for="jumlahBarang">Jumlah / Luas</label>
          <input type="text" id="jumlahBarang" name="jumlahBarang" placeholder="Contoh: 100 m² atau 50 buku" class="w-full border border-black rounded-lg py-3 px-4 text-sm"/>
        </div>
        <div>
          <label class="block text-xs mb-1" for="lokasiBarang">Lokasi Penyerahan</label>
          <input type="text" id="lokasiBarang" name="lokasiBarang" placeholder="Contoh: Bandung, Jakarta, dll" class="w-full border border-black rounded-lg py-3 px-4 text-sm"/>
        </div>
      </div>

      <!-- Data Umum -->
      <div class="space-y-4">
        <div>
          <label class="block text-xs mb-1" for="nama">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" class="w-full border border-black rounded-lg py-3 px-4 text-sm"/>
        </div>
        <div>
          <label class="block text-xs mb-1" for="email">Email</label>
          <input type="email" id="email" name="email" class="w-full border border-black rounded-lg py-3 px-4 text-sm"/>
        </div>
        <div>
          <label class="block text-xs mb-1" for="telepon">Nomor Telepon</label>
          <input type="tel" id="telepon" name="telepon" class="w-full border border-black rounded-lg py-3 px-4 text-sm"/>
        </div>
        <div>
          <label class="block text-xs mb-1" for="pesan">Pesan/Doa (Opsional)</label>
          <input type="text" id="pesan" name="pesan" class="w-full border border-black rounded-lg py-3 px-4 text-sm"/>
        </div>
        <div>
         <div id="formPembayaran">
            <label class="block text-xs mb-1" for="pembayaran">Pembayaran Via</label>
            <select id="pembayaran" name="pembayaran" class="w-full border border-black rounded-lg py-3 px-4 text-sm">
                <option value="">Pilih metode pembayaran</option>
                <option value="qris">QRIS</option>
                <option value="transfer">Transfer (BSI, CIMB, dll)</option>
            </select>
            </div>      
        </div>
      </div>

      <!-- Anonim -->
      <div class="flex items-center space-x-2 mt-2">
        <input type="checkbox" id="anonim" name="anonim" class="w-4 h-4 border border-black rounded"/>
        <label for="anonim" class="text-xs select-none">Sembunyikan nama saya (Hamba Allah)</label>
      </div>

      <!-- Tombol -->
      <div class="flex space-x-4 mt-6">
        <button type="submit" class="flex-1 bg-[#0a82ff] text-white rounded-lg py-3 text-sm font-normal hover:bg-[#0a82ffcc] transition">Kirim Wakaf</button>
        <button type="reset" class="flex-1 border border-[#0a82ff] text-sm font-normal rounded-lg py-3 hover:bg-[#0a82ff1a] transition">Reset</button>
      </div>
    </form>
    <!-- Modal maintenance -->
    <div id="modal-maintenance" class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">
      <div class="bg-white rounded-lg shadow-lg max-w-xs w-full mx-auto p-6 flex flex-col items-center relative">
        <i class="fas fa-tools text-yellow-500 text-4xl mb-3"></i>
        <h3 class="font-bold text-lg mb-2 text-gray-800 text-center">Fitur Masih Dalam Pengembangan</h3>
        <p class="text-gray-600 text-sm text-center mb-4">Form wakaf belum dapat digunakan saat ini. Silakan kembali lagi nanti.</p>
        <button id="closeModalMaintenance" class="mt-2 bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-semibold" type="button">
          Tutup
        </button>
      </div>
    </div>
  </main>

    <!-- Redesigned Footer White -->
  <footer class="bg-white text-gray-800 py-12 mt-10 border-t border-gray-200">
   <div class="max-w-7xl mx-auto px-6 md:px-20 grid grid-cols-1 md:grid-cols-3 gap-10">
    <div class="flex flex-col items-center md:items-start space-y-3">
     <img alt="BaitulMaalKu logo, blue geometric shape with text BaitulMaalKu" class="w-27 h-12" src="https://baitulmaalku.com/assets/img/bmku.png" />
    </div>
    <div>
     <h4 class="font-semibold mb-4 text-center md:text-left text-lg border-b border-[#0089FF] pb-2">
      Program Kami
     </h4>
     <ul class="space-y-2 text-sm text-center md:text-left">
      <li>
       <a class="hover:underline" href="/zakat">
        Zakat
       </a>
      </li>
      <li>
       <a class="hover:underline" href="/donasi">
        Infaq &amp; Shodaqoh
       </a>
      </li>
      <li>
       <a class="hover:underline" href="/wakaf">
        Wakaf
       </a>
      </li>
      <li>
        <a class="hover:underline" href="https://www.baitulmaalku.com" target="_blank" rel="noopener noreferrer">
          Website Resmi
        </a>
      </li>

     </ul>
    </div>
    <div>
     <h4 class="font-semibold mb-4 text-center md:text-left text-lg border-b border-[#0089FF] pb-2">
      Kontak Kami
     </h4>
     <ul class="space-y-2 text-sm text-center md:text-left">
      <li class="flex items-center justify-center md:justify-start">
       <i class="fas fa-map-marker-alt mr-2"></i> 
       Ruko Primadona, JL. Ahmad Yani No. A2, Desa Cikampek Selatan, Kecamatan Cikampek Kabupaten Karawang
      </li>
      <li class="flex items-center justify-center md:justify-start">
       <i class="fas fa-phone mr-2"></i> +62 8111 600 660
      </li>
      <li class="flex items-center justify-center md:justify-start">
       <i class="fas fa-envelope mr-2"></i> baitulmaalku@gmail.com
      </li>
      <li class="flex space-x-4 mt-3 justify-center md:justify-start">
       <a aria-label="Facebook" class="hover:text-[#0089FF] text-gray-600 hover:text-[#0089FF]" href="https://web.facebook.com/Baitulmaalku.official/">
        <i class="fab fa-facebook-f"></i>
       </a>
       <a aria-label="Instagram" class="hover:text-[#0089FF] text-gray-600 hover:text-[#0089FF]" href="https://www.instagram.com/baitulmaalku.official/">
        <i class="fab fa-instagram"></i>
       </a>
       <a aria-label="LinkedIn" class="hover:text-[#0089FF] text-gray-600 hover:text-[#0089FF]" href="https://www.linkedin.com/company/baitulmaalku/">
        <i class="fab fa-linkedin-in"></i>
       </a>
      </li>
     </ul>
    </div>
   </div>
   <div class="text-center text-xs text-gray-500 mt-8">
    &copy; 2025 BaitulMaalKu. All rights reserved.
   </div>
  </footer>

  <script>
    const jenisSelect = document.getElementById("jenisWakaf");
    const formUang = document.getElementById("formUang");
    const formBarang = document.getElementById("formBarang");
    const nominalInput = document.getElementById("nominal");
    const nominalBtns = document.querySelectorAll(".nominal-btn");
    const formPembayaran = document.getElementById("formPembayaran");

    // Toggle form based on jenis wakaf
    jenisSelect.addEventListener("change", () => {
      const value = jenisSelect.value;
      formUang.classList.toggle("hidden", value !== "uang");
      formBarang.classList.toggle("hidden", value !== "barang");
      formPembayaran.classList.toggle("hidden", value !== "uang");
    });

    // Set nominal input when button clicked
    nominalBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        nominalInput.value = btn.textContent.replace(/[^\d]/g, "");
      });
    });

    // Alert & Modal maintenance
    document.getElementById('wakafForm').addEventListener('submit', function(e) {
      e.preventDefault();
      document.getElementById('modal-maintenance').classList.remove('hidden');
      document.getElementById('modal-maintenance').classList.add('flex');
    });
    document.getElementById('closeModalMaintenance').addEventListener('click', function() {
      document.getElementById('modal-maintenance').classList.add('hidden');
      document.getElementById('modal-maintenance').classList.remove('flex');
    });
  </script>
</body>
</html>
