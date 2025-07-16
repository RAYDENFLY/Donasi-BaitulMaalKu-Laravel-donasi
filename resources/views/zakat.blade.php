<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Bayar Zakat
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
 <body class="bg-white">
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

  <section class="bg-[#0096FF] text-white text-center py-12 px-6">
   <h1 class="font-bold text-2xl mb-2">
    Bayar Zakat
   </h1>
   <p class="text-sm max-w-xl mx-auto leading-relaxed">
    Tunaikan kewajiban zakat Anda dengan mudah dan amanah. Kami akan
      menyalurkan zakat Anda kepada yang berhak menerimanya.
   </p>
  </section>
  <main class="max-w-xl mx-auto px-6 py-10">
   <h2 class="font-bold text-lg mb-6 text-center">
    Jenis Zakat
   </h2>
   <ul class="space-y-4">
    <li>
     <a href="/zakat/maal" class="flex items-start space-x-4 border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition">
      <i class="fas fa-wallet text-gray-600 mt-1 text-lg">
      </i>
      <div>
       <p class="font-semibold text-gray-900">
        Zakat Maal
       </p>
       <p class="text-gray-600 text-sm leading-snug">
        Zakat harta yang mencakup emas, perak, uang, dan tabungan
       </p>
      </div>
     </a>
    </li>
    <li>
     <a href="/zakat/income" class="flex items-start space-x-4 border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition">
      <i class="fas fa-dollar-sign text-gray-600 mt-1 text-lg">
      </i>
      <div>
       <p class="font-semibold text-gray-900">
        Zakat Penghasilan
       </p>
       <p class="text-gray-600 text-sm leading-snug">
        Zakat dari pendapatan/gaji bulanan
       </p>
      </div>
     </a>
    </li>
    <li>
     <a href="/zakat/trade" class="flex items-start space-x-4 border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition">
      <i class="fas fa-briefcase text-gray-600 mt-1 text-lg">
      </i>
      <div>
       <p class="font-semibold text-gray-900">
        Zakat Perdagangan
       </p>
       <p class="text-gray-600 text-sm leading-snug">
        Zakat dari hasil usaha atau perdagangan
       </p>
      </div>
     </a>
    </li>
    <li>
     <a href="/zakat/gold" class="flex items-start space-x-4 border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition">
      <i class="fas fa-coins text-gray-600 mt-1 text-lg">
      </i>
      <div>
       <p class="font-semibold text-gray-900">
        Zakat Emas &amp; Perak
       </p>
       <p class="text-gray-600 text-sm leading-snug">
        Zakat untuk kepemilikan emas dan perak
       </p>
      </div>
     </a>
    </li>
    <li>
     <a href="/zakat/agricultural" class="flex items-start space-x-4 border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition">
      <i class="fas fa-crop text-gray-600 mt-1 text-lg">
      </i>
      <div>
       <p class="font-semibold text-gray-900">
        Zakat Pertanian
       </p>
       <p class="text-gray-600 text-sm leading-snug">
        Zakat dari hasil pertanian
       </p>
      </div>
     </a>
    </li>
   </ul>
  </main>
  <section id="kalkulator-zakat" class="max-w-xl mx-auto px-6 py-10">
   <!-- Placeholder for Kalkulator Zakat section -->
  </section>
 </body>
</html>
