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
   <h1 class="font-extrabold text-3xl mb-2">
    Bayar Zakat
   </h1>
   <p class="text-sm max-w-xl mx-auto leading-relaxed">
    Tunaikan kewajiban zakat Anda dengan mudah dan amanah. Kami akan
      menyalurkan zakat Anda kepada yang berhak menerimanya.
   </p>
  </section>
  <main class="max-w-xl mx-auto p-6">
   <form id="formPenghasilan" aria-label="Kalkulator Zakat form" class="bg-gray-50 rounded-xl p-8 space-y-6" onsubmit="return false">
    <div>
     <h2 class="font-bold text-lg mb-1 text-black">
      Kalkulator Zakat
     </h2>
     <p class="text-sm text-black">
      Hitung zakat mu terlebih dahulu sebelum membayar zakat
     </p>
    </div>
    <div>
     <label class="block mb-1 text-sm text-black font-normal" for="penghasilanPerBulan">
      Penghasilan Per Bulan
     </label>
     <input class="w-full rounded-lg border border-gray-400 px-4 py-3 text-black text-base placeholder-black placeholder-opacity-50 focus:outline-none focus:ring-2 focus:ring-blue-500" id="penghasilanPerBulan" name="penghasilanPerBulan" placeholder="Rp" type="text"/>
    </div>
    <div>
     <label class="block mb-1 text-sm text-black font-normal" for="penghasilanLainnya">
      Penghasilan Lainnya
     </label>
     <input class="w-full rounded-lg border border-gray-400 px-4 py-3 text-black text-base placeholder-black placeholder-opacity-50 focus:outline-none focus:ring-2 focus:ring-blue-500" id="penghasilanLainnya" name="penghasilanLainnya" placeholder="Rp" type="text"/>
    </div>
    <div>
     <label class="block mb-1 text-sm text-black font-normal" for="pengeluaranKebutuhan">
      Pengeluaran Kebutuhan Pokok Bulanan
     </label>
     <input class="w-full rounded-lg border border-gray-400 px-4 py-3 text-black text-base placeholder-black placeholder-opacity-50 focus:outline-none focus:ring-2 focus:ring-blue-500" id="pengeluaranKebutuhan" name="pengeluaranKebutuhan" placeholder="Rp" type="text"/>
    </div>
    <div class="flex items-center space-x-3">
     <input class="w-5 h-5 rounded-md border border-gray-400 text-blue-600 focus:ring-blue-500" id="sudah1Tahun" name="sudah1Tahun" type="checkbox"/>
     <label class="text-sm text-black font-normal" for="sudah1Tahun">
      Sudah 1 Tahun Penghasilan Rutin?
     </label>
    </div>
    <div class="flex space-x-4">
     <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-base font-normal rounded-lg py-3" type="submit">
      Hitung Zakat
     </button>
     <button class="flex-none border border-blue-500 text-blue-600 text-base font-normal rounded-lg px-6 py-3 hover:bg-blue-50" type="reset">
      Reset
     </button>
    </div>
    <div class="bg-blue-100 rounded-lg p-5 space-y-2" id="hasilContainerPenghasilan" style="display:none;">
     <p class="font-bold text-black text-sm">
      Zakat yang Harus Dibayarkan
     </p>
     <p class="font-extrabold text-black text-2xl" id="hasilZakatPenghasilan">
      Rp. 0
     </p>
     <button id="bayarBtnPenghasilan" class="bg-blue-600 text-white rounded-full px-4 py-1 text-sm font-normal hover:bg-blue-700 transition" type="button" style="display:none;">
      Bayar Zakat
    </button>
     <a class="text-blue-600 text-sm font-normal hover:underline inline-block cursor-pointer" id="toggleDetailsPenghasilan">
      Rincian Perhitungan &gt;
     </a>
     <blockquote class="mt-3 p-4 bg-white border-l-4 border-blue-600 text-black text-sm" id="detailsPenghasilan" style="display:none;">
      <p><strong>Total Pendapatan:</strong> <span id="detailPendapatan">Rp 0</span></p>
      <p><strong>Harga 1 gram emas:</strong> <span id="hargaPerGramEmas">Rp 0</span></p>
      <p><strong>Nisab (85 gram emas):</strong> <span id="detailNisabPenghasilan">Rp 0</span></p>
      <p><strong>Tarif Zakat:</strong> <span id="detailTarifPenghasilan">2.5%</span></p>
      <p><strong>Cara Hitung:</strong> <span id="detailHitungPenghasilan"></span></p>
    </blockquote>

    </div>
   </form>
   @include('partials.zakat-modal')
  </main>
<script>
  const nisabGram = 85; // Nisab zakat penghasilan = 85 gram emas
  let hargaEmas = 0;

  // Ambil harga emas dari API
  async function ambilHargaEmas() {
    try {
      const response = await fetch('https://baitulmaalku-hargaemas.nvsxa3.easypanel.host/api/harga-emas');
      const data = await response.json();
      // Gunakan data.sellBulat jika ada, fallback ke data.harga jika tidak
      hargaEmas = Number(data.emas?.sellBulat || data.emas?.harga) || 0;
    } catch (error) {
      hargaEmas = 1200000; // fallback manual
    }
  }

  ambilHargaEmas();

  // Format input hanya angka
  function onlyNumberInput(el) {
    el.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  }
  onlyNumberInput(document.getElementById('penghasilanPerBulan'));
  onlyNumberInput(document.getElementById('penghasilanLainnya'));
  onlyNumberInput(document.getElementById('pengeluaranKebutuhan'));

  document.getElementById('formPenghasilan').addEventListener('submit', async function (e) {
    e.preventDefault();

    // Pastikan harga emas sudah didapat
    if (!hargaEmas || hargaEmas < 10000) {
      await ambilHargaEmas();
    }

    const penghasilanPerBulan = parseInt(document.getElementById('penghasilanPerBulan').value) || 0;
    const penghasilanLainnya = parseInt(document.getElementById('penghasilanLainnya').value) || 0;
    const pengeluaranKebutuhan = parseInt(document.getElementById('pengeluaranKebutuhan').value) || 0;
    const sudah1Tahun = document.getElementById('sudah1Tahun').checked;

    // Total pendapatan bersih
    const totalPendapatan = (penghasilanPerBulan + penghasilanLainnya - pengeluaranKebutuhan) * 12;

    // Hitung nisab bulanan berdasarkan harga emas terkini
    const nisab = hargaEmas * nisabGram;
    const tarif = 0.025;
    const wajibZakat = sudah1Tahun && totalPendapatan >= nisab;
    const jumlahZakat = wajibZakat ? totalPendapatan * tarif : 0;

    // Format rupiah
    const formatRupiah = n => 'Rp ' + n.toLocaleString('id-ID');

    // Tampilkan hasil
    document.getElementById('hasilZakatPenghasilan').textContent = wajibZakat
      ? formatRupiah(jumlahZakat)
      : 'Tidak wajib zakat';

    document.getElementById('detailPendapatan').textContent = formatRupiah(totalPendapatan);
    document.getElementById('hargaPerGramEmas').textContent = formatRupiah(hargaEmas);
    document.getElementById('detailNisabPenghasilan').textContent = formatRupiah(nisab);
    document.getElementById('detailTarifPenghasilan').textContent = '2.5%';
    document.getElementById('detailHitungPenghasilan').textContent = wajibZakat
      ? `Zakat = ${formatRupiah(totalPendapatan)} x 2.5% = ${formatRupiah(jumlahZakat)}`
      : 'Pendapatan kurang dari nisab atau belum 1 tahun, tidak wajib zakat.';

    document.getElementById('hasilContainerPenghasilan').style.display = 'block';
    document.getElementById('bayarBtnPenghasilan').style.display = wajibZakat ? 'inline-block' : 'none';
  });

  // Toggle rincian
  document.getElementById('toggleDetailsPenghasilan').addEventListener('click', function() {
    const details = document.getElementById('detailsPenghasilan');
    if (details.style.display === 'none' || details.style.display === '') {
      details.style.display = 'block';
      this.textContent = 'Sembunyikan Rincian >';
    } else {
      details.style.display = 'none';
      this.textContent = 'Rincian Perhitungan >';
    }
  });

  // Tombol bayar zakat
  document.getElementById('bayarBtnPenghasilan').addEventListener('click', () => {
    const nominal = document.getElementById('hasilZakatPenghasilan').textContent.replace(/[^\d]/g, '');
    if (parseInt(nominal) > 0) {
      window.dispatchEvent(new CustomEvent('openZakatModal', { detail: { nominal: nominal } }));
    } else {
      alert('Silakan hitung zakat terlebih dahulu.');
    }
  });
</script>
</body>
</html>
