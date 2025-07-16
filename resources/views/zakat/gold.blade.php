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


  <section class="bg-[#0096FF] text-white text-center py-12 px-6">
   <h1 class="font-extrabold text-2xl md:text-3xl">
    Bayar Zakat
   </h1>
   <p class="mt-2 max-w-xl mx-auto text-sm md:text-base font-normal leading-relaxed">
    Tunaikan kewajiban zakat Anda dengan mudah dan amanah. Kami akan
      menyalurkan zakat Anda kepada yang berhak menerimanya.
   </p>
  </section>
  <main class="max-w-lg mx-auto mt-10 mb-20 px-6">
   <form aria-label="Kalkulator Zakat form" class="bg-[#FAFAFA] rounded-xl p-8 space-y-5" id="zakat-form">
    <h2 class="font-extrabold text-lg text-center text-black">
     Kalkulator Zakat
    </h2>
    <p class="text-sm font-normal text-center text-black mb-4">
     Hitung zakat mu terle  bih dahulu sebelum membayar zakat
    </p>
    <div class="space-y-1">
     <label class="block text-sm font-normal text-black" for="jenis-logam-1">
      Jenis Logam
     </label>
     <select class="w-full rounded-lg border border-black/50 px-4 py-3 text-black text-sm font-normal appearance-none" id="jenis-logam-1" name="jenis-logam-1" required>
      <option value="" selected disabled>
       Pilih Jenis Logam
      </option>
      <option value="emas">
       Emas
      </option>
      <option value="perak">
       Perak
      </option>
     </select>
    </div>
    <div class="space-y-1" id="jenis-emas-container">
     <label class="block text-sm font-normal text-black" for="jenis-emas">
      Jenis Emas
     </label>
     <select class="w-full rounded-lg border border-black/50 px-4 py-3 text-black text-sm font-normal appearance-none" id="jenis-emas" name="jenis-emas">
      <option value="" selected disabled>
       Pilih Jenis Emas
      </option>
      <option value="perhiasan">
       Perhiasan
      </option>
      <option value="simpanan">
       Simpanan
      </option>
     </select>
    </div>
    <div class="space-y-1 relative">
     <label class="block text-sm font-normal text-black" for="jumlah-logam">
      Jumlah Logam yang Dimiliki
     </label>
     <input aria-describedby="gram-label" class="w-full rounded-lg border border-black/50 px-4 py-3 text-black text-sm font-normal pr-14" id="jumlah-logam" name="jumlah-logam" placeholder="0" type="number" min="0" required/>
     <span class="absolute right-4 top-1/2 -translate-y-1/2 text-black text-xs font-normal pointer-events-none select-none" id="gram-label">
      Gram
     </span>
    </div>
    <div class="flex items-center space-x-3">
     <input class="w-6 h-6 rounded border border-black/50" id="penghasilan-rutin" name="penghasilan-rutin" type="checkbox"/>
     <label class="text-sm font-normal text-black" for="penghasilan-rutin">
      Sudah 1 Tahun Penghasilan Rutin?
     </label>
    </div>
    <div class="flex space-x-4 mt-4">
     <button class="flex-1 bg-[#0096FF] text-white rounded-xl py-3 text-sm font-normal hover:bg-[#007acc] transition" type="submit">
      Hitung Zakat
     </button>
     <button class="flex-none border border-[#0096FF] text-[#0096FF] rounded-xl py-3 px-6 text-sm font-normal hover:bg-[#e6f2ff] transition" type="reset" id="reset-btn">
      Reset
     </button>
    </div>
    <div class="mt-6 bg-[#CCE4FF] rounded-lg p-5 space-y-2" id="result-container" style="display:none;">
     <p class="font-extrabold text-black text-sm">
      Zakat yang Harus Dibayarkan
     </p>
     <p class="font-extrabold text-black text-xl" id="zakat-amount">
      Rp. 0
     </p>
     <div class="flex items-center space-x-4">
      <button id="openModalBtn" class="bg-blue-600 text-white rounded-full px-4 py-1 text-sm font-normal hover:bg-blue-700 transition" type="button">
        Bayar Zakat
      </button>
      <a class="text-blue-600 text-sm font-normal hover:underline inline-block cursor-pointer" id="toggleDetails">
       Rincian Perhitungan &gt;
      </a>
     </div>
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
  let hargaPerak = 0;
  let hargaEmas = 0;

  const hargaSiap = Promise.all([
    fetch('https://baitulmaalku-hargaemas.nvsxa3.easypanel.host/api/harga-perak')
      .then(res => res.json())
      .then(data => hargaPerak = Number(data.perak?.bulat) || 0),

    fetch('https://baitulmaalku-hargaemas.nvsxa3.easypanel.host/api/harga-emas')
      .then(res => res.json())
      .then(data => hargaEmas = Number(data.emas?.buyBulat) || 0)
  ]);

  const jenisLogamSelect = document.getElementById('jenis-logam-1');
  const jenisEmasContainer = document.getElementById('jenis-emas-container');
  const jenisEmasSelect = document.getElementById('jenis-emas');
  const gramLabel = document.getElementById('gram-label');
  const resultContainer = document.getElementById('result-container');
  const zakatAmount = document.getElementById('zakat-amount');
  const form = document.getElementById('zakat-form');
  const resetBtn = document.getElementById('reset-btn');
  const toggleDetails = document.getElementById('toggleDetails');
  const details = document.getElementById('details');
  const detailHarta = document.getElementById('detailHarta');
  const detailHutang = document.getElementById('detailHutang');
  const detailTahun = document.getElementById('detailTahun');
  const detailKetentuan = document.getElementById('detailKetentuan');

  function updateFormByLogam() {
    const selectedLogam = jenisLogamSelect.value;
    if (selectedLogam === 'perak') {
      jenisEmasContainer.style.display = 'none';
      jenisEmasSelect.value = '';
      gramLabel.textContent = 'Gram Perak';
    } else if (selectedLogam === 'emas') {
      jenisEmasContainer.style.display = 'block';
      gramLabel.textContent = 'Gram Emas';
    } else {
      jenisEmasContainer.style.display = 'none';
      jenisEmasSelect.value = '';
      gramLabel.textContent = 'Gram';
    }

    zakatAmount.textContent = 'Rp. 0';
    resultContainer.style.display = 'none';
    details.style.display = 'none';
    toggleDetails.textContent = 'Rincian Perhitungan >';
  }

  jenisLogamSelect.addEventListener('change', updateFormByLogam);

  form.addEventListener('submit', async function(e) {
    e.preventDefault();
    await hargaSiap;

    const logam = jenisLogamSelect.value;
    const jenisEmas = jenisEmasSelect.value;
    const jumlah = parseFloat(document.getElementById('jumlah-logam').value) || 0;
    const penghasilanRutin = document.getElementById('penghasilan-rutin').checked;

    let zakat = 0;
    let ketentuanText = '';
    let hargaSatuan = 0;

    if (logam === 'perak') {
      hargaSatuan = hargaPerak;
      zakat = jumlah * 0.025 * hargaSatuan;
      ketentuanText = `Zakat Perak 2.5% dari total gram x harga perak (Rp ${hargaSatuan.toLocaleString('id-ID')}/gram)`;
    } else if (logam === 'emas') {
      hargaSatuan = hargaEmas;
      zakat = jumlah * 0.025 * hargaSatuan;
      if (jenisEmas === 'perhiasan') {
        ketentuanText = `Zakat Emas Perhiasan 2.5% dari total gram x harga emas (Rp ${hargaSatuan.toLocaleString('id-ID')}/gram)`;
      } else if (jenisEmas === 'simpanan') {
        ketentuanText = `Zakat Emas Simpanan 2.5% dari total gram x harga emas (Rp ${hargaSatuan.toLocaleString('id-ID')}/gram)`;
      } else {
        ketentuanText = `Zakat Emas 2.5% dari total gram x harga emas (Rp ${hargaSatuan.toLocaleString('id-ID')}/gram)`;
      }
    }

    if (!penghasilanRutin) {
      zakat = 0;
    }

    zakat = Math.round(zakat);

    zakatAmount.textContent = `Rp. ${zakat.toLocaleString('id-ID')}`;
    resultContainer.style.display = 'block';

    detailHarta.textContent = `Rp ${(jumlah * hargaSatuan).toLocaleString('id-ID')}`;
    detailHutang.textContent = 'Rp 0';
    detailTahun.textContent = penghasilanRutin ? 'Ya' : 'Tidak';
    detailKetentuan.textContent = ketentuanText;

    details.style.display = 'none';
    toggleDetails.textContent = 'Rincian Perhitungan >';
  });

  resetBtn.addEventListener('click', () => {
    jenisEmasContainer.style.display = 'none';
    zakatAmount.textContent = 'Rp. 0';
    resultContainer.style.display = 'none';
    details.style.display = 'none';
    toggleDetails.textContent = 'Rincian Perhitungan >';
    jenisLogamSelect.value = '';
    jenisEmasSelect.value = '';
    document.getElementById('jumlah-logam').value = '';
    document.getElementById('penghasilan-rutin').checked = false;
    gramLabel.textContent = 'Gram';
  });

  toggleDetails.addEventListener('click', () => {
    if (details.style.display === 'none') {
      details.style.display = 'block';
      toggleDetails.textContent = 'Sembunyikan Rincian >';
    } else {
      details.style.display = 'none';
      toggleDetails.textContent = 'Rincian Perhitungan >';
    }
  });

  document.getElementById('bayarBtn').addEventListener('click', function() {
    const nominal = zakatAmount.textContent.replace(/[^\d]/g, '');
    if (parseInt(nominal) > 0) {
      window.dispatchEvent(new CustomEvent('openZakatModal', { detail: { nominal: nominal } }));
    } else {
      alert('Silakan hitung zakat terlebih dahulu.');
    }
  });
</script>


 </body>
</html>
