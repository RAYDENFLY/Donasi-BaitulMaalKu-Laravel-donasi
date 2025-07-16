<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   BaitulMaalKu
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    };
    img {
      height: 440px
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

  <hr class="border-t border-gray-300"/>
  <main class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-2 gap-10">
  <img 
  alt="White mosque with arches and golden details reflecting on shiny marble floor under blue sky with clouds"
  class="rounded-lg w-full object-cover -mb-10"
  src="https://storage.googleapis.com/a1aa/image/ad86e3a5-36b9-454a-128d-ae627d731993.jpg"
  width="720"
  style="height: 420px; object-fit: cover; margin-bottom: 2px;"
/>
 <section class="flex flex-col justify-start">
    <div>
     <h1 class="text-2xl font-extrabold mb-3 leading-tight">
      Bantu Bangun Masjid di Desa Terpencil
     </h1>
     <p class="text-base font-normal mb-6 leading-relaxed">
      Bantu warga desa memiliki tempat ibadah yang layak untuk beribadah
          dan mengaji. Program ini bertujuan membangun masjid yang dapat
          menampung hingga 200 jamaah.
     </p>
     <div aria-label="Donation progress" class="bg-gray-100 rounded-xl p-5 mb-6 max-w-full w-full text-sm text-gray-700">
      <div class="flex justify-between mb-1">
       <span>
        Terkumpul
       </span>
       <span>
        40%
       </span>
      </div>
      <div class="w-full bg-gray-300 rounded-full h-4 overflow-hidden">
       <div class="bg-blue-600 h-4 rounded-full" style="width: 40%;">
       </div>
      </div>
      <div class="mt-3 font-bold text-base text-black">
       Rp 65.000.000
      </div>
      <div class="text-xs text-gray-500">
       dari Rp 150.000.000
      </div>
     </div>
     <div class="flex items-start space-x-2 text-gray-900 mb-6">
      <i class="fas fa-map-marker-alt text-lg mt-1">
      </i>
      <div class="flex flex-col leading-tight">
       <span class="text-sm font-normal">
        Lokasi
       </span>
       <span class="text-sm font-bold">
        Cianjur, Jawa Barat
       </span>
      </div>
     </div>
    </div>
    <a class="bg-blue-600 text-white font-semibold text-lg py-3 rounded-lg text-center hover:bg-blue-700 transition" href="#">
     Donasi Sekarang
    </a>
   </section>
  </main>
  <section class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-2 gap-10">
   <div>
    <h2 class="text-2xl font-extrabold mb-6">
     Donatur
    </h2>
    <div class="mb-6">
     <div class="flex justify-between mb-1">
      <span class="font-bold">
       Ahmad Rizki
      </span>
      <span class="font-bold">
       Rp 1.000.000
      </span>
     </div>
     <div class="mb-1 text-sm">
      15/3/2024
     </div>
     <div class="text-sm">
      "Semoga menjadi amal jariyah"
     </div>
    </div>
    <div>
     <div class="flex justify-between mb-1">
      <span class="font-bold">
       Hamba Allah
      </span>
      <span class="font-bold">
       Rp 1.000.000
      </span>
     </div>
     <div class="mb-1 text-sm">
      15/3/2024
     </div>
     <div class="text-sm">
      "Bismillah untuk pembangunan masjid"
     </div>
    </div>
   </div>
   <form>
    <h2 class="text-2xl font-extrabold mb-6">
     Kritik dan Saran
    </h2>
    <label class="block font-semibold mb-1" for="name">
     Nama
    </label>
    <input class="w-full rounded-lg border border-gray-700 px-4 py-3 mb-6 text-base focus:outline-none focus:ring-2 focus:ring-blue-600" id="name" type="text"/>
    <label class="block font-semibold mb-1" for="message">
     Pesan
    </label>
    <textarea class="w-full rounded-lg border border-gray-700 px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-blue-600" id="message" rows="4"></textarea>
   </form>
  </section>
 </body>
</html>
