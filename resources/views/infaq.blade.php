<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Infaq Form
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-white text-black">
  <!-- Header -->
  <header class="flex items-center justify-between px-6 py-4 max-w-[1300px] mx-auto relative">
  <!-- Logo -->
  <div class="flex items-center space-x-3">
    <img class="w-30 h-12 object-contain" src="https://baitulmaalku.com/assets/img/bmku.png" alt="Logo" />
  </div>

  <!-- Hamburger (mobile only) -->
  <button class="md:hidden text-2xl" id="menu-toggle">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Menu -->
  <nav
  id="menu"
  class="hidden md:flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-6 text-sm font-normal p-6 md:p-0 md:static md:bg-transparent absolute md:relative top-full left-0 w-full md:w-auto bg-white md:shadow-none shadow-md z-50"
>
 <a class="hover:underline hover:text-[#0089FF]" href="/">Beranda</a>
    <a class="hover:underline hover:text-[#0089FF]" href="/zakat">Zakat</a>
    <a class="hover:underline hover:text-[#0089FF]" href="/infaq">Infaq</a>
    <a class="hover:underline hover:text-[#0089FF]" href="/wakaf">Wakaf</a>
    <a href="/donasi" class="bg-[#0089FF] text-white text-sm font-normal rounded-full px-5 py-2 hover:bg-[#0077e6] transition text-center block md:inline">Donasi Sekarang</a>
  </nav>
</header>

  <section class="bg-[#0a82ff] text-white text-center py-10 px-6">
   <h1 class="font-extrabold text-xl md:text-2xl mb-2">
    Infaq
   </h1>
   <p class="text-xs md:text-sm max-w-[600px] mx-auto leading-tight">
    Salurkan infaq Anda untuk membantu sesama dan raih keberkahan. Setiap infaq yang Anda berikan akan disalurkan kepada yang membutuhkan.
   </p>
  </section>
  <main class="max-w-md mx-auto mt-10 mb-20 px-6">
   <form autocomplete="off" class="bg-[#fafafa] rounded-xl p-8 space-y-6" novalidate="">
    <h2 class="font-extrabold text-lg mb-4 text-center">
     Pilih Nominal Infaq
    </h2>
    <div class="grid grid-cols-3 gap-4 mb-6">
     <button class="border border-black rounded-lg py-2 font-semibold text-xs leading-tight hover:bg-[#0a82ff] hover:text-white transition" type="button" data-nominal="10000">
      Rp. 10.000
     </button>
     <button class="border border-black rounded-lg py-2 font-semibold text-xs leading-tight hover:bg-[#0a82ff] hover:text-white transition" type="button" data-nominal="20000">
      Rp. 20.000
     </button>
     <button class="border border-black rounded-lg py-2 font-semibold text-xs leading-tight hover:bg-[#0a82ff] hover:text-white transition" type="button" data-nominal="50000">
      Rp. 50.000
     </button>
     <button class="border border-black rounded-lg py-2 font-semibold text-xs leading-tight hover:bg-[#0a82ff] hover:text-white transition" type="button" data-nominal="100000">
      Rp. 100.000
     </button>
     <button class="border border-black rounded-lg py-2 font-semibold text-xs leading-tight hover:bg-[#0a82ff] hover:text-white transition" type="button" data-nominal="200000">
      Rp. 200.000
     </button>
     <button class="border border-black rounded-lg py-2 font-semibold text-xs leading-tight hover:bg-[#0a82ff] hover:text-white transition" type="button" data-nominal="500000">
      Rp. 500.000
     </button>
    </div>
    <div class="space-y-4">
     <div>
      <label class="block text-xs mb-1" for="nominal">
       Nominal Lainnya
      </label>
      <input class="w-full border border-black rounded-lg py-3 px-4 text-sm placeholder:text-black placeholder:opacity-50" id="nominal" name="nominal" placeholder="Rp" type="text"/>
     </div>
     <div>
      <label class="block text-xs mb-1" for="nama">
       Nama Lengkap
      </label>
      <input class="w-full border border-black rounded-lg py-3 px-4 text-sm" id="nama" name="nama" type="text"/>
     </div>
     <div>
      <label class="block text-xs mb-1" for="email">
       Email
      </label>
      <input class="w-full border border-black rounded-lg py-3 px-4 text-sm" id="email" name="email" type="email"/>
     </div>
     <div>
      <label class="block text-xs mb-1" for="telepon">
       Nomor Telepon
      </label>
      <input class="w-full border border-black rounded-lg py-3 px-4 text-sm" id="telepon" name="telepon" type="tel"/>
     </div>
     <div>
      <label class="block text-xs mb-1" for="pesan">
       Pesan/Doa (Opsional)
      </label>
      <input class="w-full border border-black rounded-lg py-3 px-4 text-sm" id="pesan" name="pesan" type="text"/>
     </div>
     <div>
    <label class="block text-xs mb-1" for="pembayaran">
    Pembayaran Via
    </label>
    <select id="pembayaran" name="pembayaran" class="w-full border border-black rounded-lg py-3 px-4 text-sm">
    <option value="" disabled selected>Pilih metode pembayaran</option>
    <option value="bsi">Bank Transfer - BSI</option>
    <option value="cimb">Bank Transfer - CIMB</option>
    <option value="qris">QRIS</option>
    </select>
  </div>
    </div>
    <div class="flex items-center space-x-2 mt-2">
     <input class="w-4 h-4 border border-black rounded" id="anonim" name="anonim" type="checkbox"/>
     <label class="text-xs select-none" for="anonim">
      Sembunyikan nama saya (Hamba Allah)
     </label>
    </div>
    <div class="flex space-x-4 mt-6">
     <button class="flex-1 bg-[#0a82ff] text-white rounded-lg py-3 text-sm font-normal hover:bg-[#0a82ffcc] transition" type="submit">
      Bayar Infaq
     </button>
     <button class="flex-1 border border-[#0a82ff] text-sm font-normal rounded-lg py-3 hover:bg-[#0a82ff1a] transition" type="reset">
      Reset
     </button>
    </div>
   </form>
  </main>

  <script>
  document.querySelectorAll('button[data-nominal]').forEach(btn => {
    btn.addEventListener('click', () => {
      const nominal = btn.getAttribute('data-nominal');
      document.getElementById('nominal').value = nominal;
    });
  });
</script>

 </body>
</html>

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