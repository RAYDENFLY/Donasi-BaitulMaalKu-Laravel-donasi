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
      font-family: "Inter", sans-serif;
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

  <section class="bg-blue-600 text-white text-center py-12 px-6">
   <h1 class="font-bold text-2xl mb-2">
    Bayar Zakat
   </h1>
   <p class="text-sm max-w-xl mx-auto leading-relaxed">
    Tunaikan kewajiban zakat Anda dengan mudah dan amanah. Kami akan
      menyalurkan zakat Anda kepada yang berhak menerimanya.
   </p>
  </section>
  <main class="max-w-lg mx-auto mt-10 mb-20 px-6">
   <form aria-label="Kalkulator Zakat form" class="bg-gray-50 rounded-xl p-8 space-y-6" id="zakatForm" onsubmit="return false">
    <div class="text-center">
     <h2 class="font-bold text-lg">
      Kalkulator Zakat
     </h2>
     <p class="text-sm mt-1">
      Hitung zakat mu terlebih dahulu sebelum membayar zakat
     </p>
    </div>
    <div>
     <label class="block text-sm mb-1 font-normal text-black" for="total-harta">
      Total Harta yang Dimiliki
     </label>
     <input class="w-full rounded-lg border border-black/40 px-4 py-3 text-black text-sm placeholder-black/50 focus:outline-none focus:ring-2 focus:ring-blue-600" id="total-harta" placeholder="Rp" type="text"/>
    </div>
    <div>
     <label class="block text-sm mb-1 font-normal text-black" for="total-hutang">
      Total Hutang yang Jatuh Tempo Tahun Ini
     </label>
     <input class="w-full rounded-lg border border-black/40 px-4 py-4 text-black text-sm placeholder-black/50 focus:outline-none focus:ring-2 focus:ring-blue-600" id="total-hutang" placeholder="Rp" type="text"/>
    </div>
    <div class="flex items-center space-x-3">
     <input class="w-5 h-5 rounded border border-black/40" id="sudah-1-tahun" type="checkbox"/>
     <label class="text-sm font-normal text-black" for="sudah-1-tahun">
      Sudah Dimiliki Selama 1 Tahun?
     </label>
    </div>
    <div class="flex space-x-4">
     <button class="flex-1 bg-blue-600 text-white rounded-xl py-3 text-sm font-normal hover:bg-blue-700 transition" id="hitungBtn" type="submit">
      Hitung Zakat
     </button>
     <button class="flex-1 border border-blue-600 text-black rounded-xl py-3 text-sm font-normal hover:bg-blue-50 transition" id="resetBtn" type="reset">
      Reset
     </button>
    </div>
    <div class="rounded-xl p-5 space-y-2" id="resultBox" style="display:none;">
     <p class="font-bold text-sm text-black" id="resultTitle">
      Zakat yang Harus Dibayarkan
     </p>
     <p class="font-extrabold text-xl text-black" id="resultAmount">
      Rp. 0
     </p>
     <button id="openModalBtn" class="bg-blue-600 text-white rounded-full px-4 py-1 text-sm font-normal hover:bg-blue-700 transition" type="button">
      Bayar Zakat
    </button>

     <a class="text-blue-600 text-sm font-normal hover:underline inline-block cursor-pointer" id="toggleDetails">
      Rincian Perhitungan &gt;
     </a>
     <blockquote class="mt-3 p-4 bg-white border-l-4 border-blue-600 text-black text-sm" id="details" style="display:none;">
      <p><strong>Total Harta:</strong> <span id="detailHarta">Rp 0</span></p>
      <p><strong>Total Hutang:</strong> <span id="detailHutang">Rp 0</span></p>
      <p><strong>Sudah dimiliki 1 tahun:</strong> <span id="detailTahun">Tidak</span></p>
      <p><strong>Ketentuan:</strong> <span id="detailKetentuan"></span></p>
     </blockquote>
    </div>
   </form>
   @include('partials.zakat-modal')
  </main>
  <script>
   const form = document.getElementById('zakatForm');
    const totalHartaInput = document.getElementById('total-harta');
    const totalHutangInput = document.getElementById('total-hutang');
    const sudah1TahunCheckbox = document.getElementById('sudah-1-tahun');
    const resultBox = document.getElementById('resultBox');
    const resultTitle = document.getElementById('resultTitle');
    const resultAmount = document.getElementById('resultAmount');
    const bayarBtn = document.getElementById('bayarBtn');
    const toggleDetails = document.getElementById('toggleDetails');
    const details = document.getElementById('details');
    const detailHarta = document.getElementById('detailHarta');
    const detailHutang = document.getElementById('detailHutang');
    const detailTahun = document.getElementById('detailTahun');
    const detailKetentuan = document.getElementById('detailKetentuan');

    function formatRupiah(angka) {
      let numberString = angka.toString().replace(/[^,\d]/g, '');
      let split = numberString.split(',');
      let sisa = split[0].length % 3;
      let rupiah = split[0].substr(0, sisa);
      let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
      return rupiah ? 'Rp ' + rupiah : 'Rp 0';
    }

    function calculateZakat(harta, hutang, sudah1tahun) {
      // Zakat wajib jika sudah dimiliki 1 tahun dan harta setelah hutang >= 5200000 (nisab approx)
      const nisab = 5200000;
      const netto = harta - hutang;
      if (!sudah1tahun || netto < nisab) {
        return 0;
      }
      return netto * 0.025; // 2.5%
    }

    form.addEventListener('submit', () => {
      const harta = parseInt(totalHartaInput.value.replace(/\D/g, '')) || 0;
      const hutang = parseInt(totalHutangInput.value.replace(/\D/g, '')) || 0;
      const sudah1tahun = sudah1TahunCheckbox.checked;

      const zakat = calculateZakat(harta, hutang, sudah1tahun);
      resultBox.style.display = 'block';

      detailHarta.textContent = formatRupiah(harta);
      detailHutang.textContent = formatRupiah(hutang);
      detailTahun.textContent = sudah1tahun ? 'Ya' : 'Tidak';

      if (zakat > 0) {
        resultBox.className = 'bg-blue-100 rounded-xl p-5 space-y-2';
        resultTitle.textContent = 'Zakat yang Harus Dibayarkan';
        resultAmount.textContent = formatRupiah(Math.round(zakat));
        detailKetentuan.textContent = 'Anda wajib membayar zakat karena harta sudah mencapai nisab dan sudah dimiliki selama 1 tahun.';
        bayarBtn.disabled = false;
        bayarBtn.classList.remove('opacity-50', 'cursor-not-allowed');
      } else {
        resultBox.className = 'bg-red-100 rounded-xl p-5 space-y-2';
        resultTitle.textContent = 'Anda Tidak Wajib Zakat';
        resultAmount.textContent = 'Rp. 0';
        detailKetentuan.textContent = 'Harta belum mencapai nisab atau belum dimiliki selama 1 tahun.';
        bayarBtn.disabled = true;
        bayarBtn.classList.add('opacity-50', 'cursor-not-allowed');
      }
      details.style.display = 'none';
      toggleDetails.textContent = 'Rincian Perhitungan >';
    });

    toggleDetails.addEventListener('click', () => {
      if (details.style.display === 'none') {
        details.style.display = 'block';
        toggleDetails.textContent = 'Sembunyikan Rincian Perhitungan >';
      } else {
        details.style.display = 'none';
        toggleDetails.textContent = 'Rincian Perhitungan >';
      }
    });

    form.addEventListener('reset', () => {
      resultBox.style.display = 'none';
      details.style.display = 'none';
      toggleDetails.textContent = 'Rincian Perhitungan >';
      bayarBtn.disabled = false;
      bayarBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    });

    // ...existing code...
    bayarBtn.addEventListener('click', () => {
      // Ambil nominal dari hasil kalkulator
      const resultAmount = document.getElementById('resultAmount').textContent.replace(/[^0-9]/g, '');
      const nominalInput = document.getElementById('nominalInput');
      if (nominalInput && resultAmount) {
        nominalInput.value = resultAmount;
      }
      // Buka modal form
      const modal = document.getElementById('modalBackdrop');
      if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
    });


        document.getElementById('openModalBtn').addEventListener('click', function () {
      // Ambil nominal dari hasil kalkulator
      const resultAmount = document.getElementById('resultAmount').textContent.replace(/[^0-9]/g, '');
      // Isi ke input nominal di modal
      const nominalInput = document.getElementById('nominalInput');
      if (nominalInput && resultAmount) {
        nominalInput.value = resultAmount;
      }
    });

  </script>

  
 </body>
</html>
