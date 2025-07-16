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

  <section class="bg-[#0099ff] text-white text-center py-12 px-6">
   <h1 class="font-extrabold text-2xl leading-tight">
    Bayar Zakat
   </h1>
   <p class="mt-2 max-w-xl mx-auto text-sm font-normal leading-relaxed">
    Tunaikan kewajiban zakat Anda dengan mudah dan amanah. Kami akan
      menyalurkan zakat Anda kepada yang berhak menerimanya.
   </p>
  </section>
  <main class="max-w-md mx-auto mt-10 mb-20 px-6">
   <form id="zakatForm" autocomplete="off" class="bg-[#fafafa] rounded-xl p-6 space-y-5 font-sans font-normal text-black text-sm">
    <h2 class="font-extrabold text-base leading-tight text-center">
     Kalkulator Zakat Pertanian
    </h2>
    <p class="text-center text-xs leading-tight mb-4">
     Hitung zakat pertanianmu dengan tepat sesuai ketentuan Baznas/MUI
    </p>
    <div>
     <label class="block mb-1 text-xs font-normal leading-tight" for="jenis-irigasi">
      Jenis Irigasi / Pengairan
     </label>
     <select required class="w-full rounded-lg border border-black/60 px-4 py-3 text-sm font-normal leading-tight appearance-none" id="jenis-irigasi" name="jenis-irigasi">
      <option disabled selected>
       Pilih Jenis Irigasi / Pengairan
      </option>
      <option value="tanpa-irigasi">
       Tanpa Irigasi (Tergantung Hujan)
      </option>
      <option value="irigasi-sederhana">
       Irigasi Sederhana
      </option>
      <option value="irigasi-mekanis">
       Irigasi Mekanis / Modern
      </option>
     </select>
    </div>
    <div>
     <label class="block mb-1 text-xs font-normal leading-tight" for="hasil-panen">
      Hasil Panen (Kg)
     </label>
     <div class="relative">
      <input required min="0" class="w-full rounded-lg border border-black/60 px-4 py-3 pr-14 text-sm font-normal leading-tight" id="hasil-panen" name="hasil-panen" placeholder=" " type="number"/>
      <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-normal text-black/80">
       Kg
      </span>
     </div>
    </div>
    <div>
     <label class="block mb-1 text-xs font-normal leading-tight" for="harga-pasar">
      Harga Pasar per Kg (Rp)
     </label>
     <input required min="0" class="w-full rounded-lg border border-black/60 px-4 py-3 text-sm font-normal leading-tight" id="harga-pasar" name="harga-pasar" placeholder="Rp" type="number"/>
    </div>
    <div>
     <label class="block mb-1 text-xs font-normal leading-tight" for="waktu-panen">
      Waktu Panen
     </label>
     <input required class="w-full rounded-lg border border-black/60 px-4 py-3 text-sm font-normal leading-tight" id="waktu-panen" name="waktu-panen" placeholder="Tanggal" type="date"/>
    </div>
    <div class="flex space-x-4">
     <button class="flex-1 bg-[#0099ff] text-white rounded-lg py-3 text-sm font-normal leading-tight hover:bg-[#0086e6] transition" type="submit">
      Hitung Zakat
     </button>
     <button class="flex-1 border border-[#0099ff] rounded-lg py-3 text-sm font-normal leading-tight hover:bg-[#f0f9ff] transition" type="reset" id="resetBtn">
      Reset
     </button>
    </div>
    <div id="hasilContainer" class="bg-[#cce4ff] rounded-lg p-4 space-y-2" style="display:none;">
     <p class="font-bold text-sm leading-tight">
      Zakat yang Harus Dibayarkan
     </p>
     <p id="hasilZakat" class="font-bold text-lg leading-tight">
      Rp. 0
     </p>
     <div class="flex items-center space-x-4">
      <!-- Tombol luar untuk buka modal -->
      <button id="openModalBtn" class="bg-blue-600 text-white rounded-full px-4 py-1 text-sm font-normal hover:bg-blue-700 transition" type="button">
        Bayar Zakat
      </button>

      <a class="text-blue-600 text-sm font-normal hover:underline inline-block cursor-pointer" id="toggleDetails">
       Rincian Perhitungan &gt;
      </a>
      <br> 
     </div>
     <blockquote class="mt-3 p-4 bg-white border-l-4 border-blue-600 text-black text-sm" id="details" style="display:none;">
      <p>
       <strong>
        Jenis Irigasi:
       </strong>
       <span id="detailIrigasi">
        -
       </span>
      </p>
      <p>
       <strong>
        Hasil Panen:
       </strong>
       <span id="detailHasilPanen">
        0 Kg
       </span>
      </p>
      <p>
       <strong>
        Harga Pasar per Kg:
       </strong>
       <span id="detailHargaPasar">
        Rp 0
       </span>
      </p>
      <p>
       <strong>
        Nisab (Minimal Hasil Panen untuk Wajib Zakat):
       </strong>
       <span id="detailNisab">
        653 Kg
       </span>
      </p>
      <p>
       <strong>
        Tarif Zakat:
       </strong>
       <span id="detailTarif">
        -
       </span>
      </p>
      <p>
       <strong>
        Cara Hitung:
       </strong>
       <span id="detailHitung">
        -
       </span>
      </p>
      <p>
       <strong>
        Total Zakat:
       </strong>
       <span id="detailTotalZakat">
        Rp 0
       </span>
      </p>
     </blockquote>
    </div>
   </form>
   @include('partials.zakat-modal')
  </main>
  <script>

    const resetBtn = document.getElementById('resetBtn');
    const form = document.getElementById('zakatForm');
    const hasilZakat = document.getElementById('hasilZakat');
    const detailIrigasi = document.getElementById('detailIrigasi');
    const detailHasilPanen = document.getElementById('detailHasilPanen');
    const detailHargaPasar = document.getElementById('detailHargaPasar');
    const detailNisab = document.getElementById('detailNisab');
    const detailTarif = document.getElementById('detailTarif');
    const detailHitung = document.getElementById('detailHitung');
    const detailTotalZakat = document.getElementById('detailTotalZakat');
    const toggleDetails = document.getElementById('toggleDetails');
    const details = document.getElementById('details');
    const bayarBtn = document.getElementById('bayarBtn');
                          



    resetBtn.addEventListener('click', () => {
      hasilContainer.style.display = 'none';
      hasilZakat.textContent = 'Rp. 0';
      detailIrigasi.textContent = '-';
      detailHasilPanen.textContent = '0 Kg';
      detailHargaPasar.textContent = 'Rp 0';
      detailNisab.textContent = '653 Kg';
      detailTarif.textContent = '-';
      detailHitung.textContent = '-';
      detailTotalZakat.textContent = 'Rp 0';

      // Sembunyikan rincian perhitungan jika sedang tampil
      details.style.display = 'none';
      toggleDetails.textContent = 'Rincian Perhitungan >';
    });
    // Nisab zakat pertanian dalam kg
    const nisab = 653;

    // Tarif zakat berdasarkan jenis irigasi
    const tarifZakat = {
      'tanpa-irigasi': 0.10,    // 10%
      'irigasi-sederhana': 0.10, // 10%
      'irigasi-mekanis': 0.05  // 5%
    };

    toggleDetails.addEventListener('click', () => {
      if (details.style.display === 'none' || details.style.display === '') {
        details.style.display = 'block';
        toggleDetails.textContent = 'Rincian Perhitungan >';
      } else {
        details.style.display = 'none';
        toggleDetails.textContent = 'Rincian Perhitungan >';
      }
    });

    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const jenisIrigasi = form['jenis-irigasi'].value;
      const hasilPanen = parseFloat(form['hasil-panen'].value);
      const hargaPasar = parseFloat(form['harga-pasar'].value);

      // Validasi minimal input
      if (hasilPanen < 0 || hargaPasar < 0) {
        alert('Input tidak boleh negatif.');
        return;
      }
      if (!jenisIrigasi) {
        alert('Pilih jenis irigasi terlebih dahulu.');
        return;
      }

      // Cek nisab
      let zakatKg = 0;
      let zakatRp = 0;
      let tarif = tarifZakat[jenisIrigasi] || 0;

      if (hasilPanen >= nisab) {
        zakatKg = hasilPanen * tarif;
        zakatRp = zakatKg * hargaPasar;
      } else {
        zakatKg = 0;
        zakatRp = 0;
      }

      // Format rupiah
      function formatRupiah(num) {
        return 'Rp ' + num.toLocaleString('id-ID', {minimumFractionDigits: 0});
      }

      // Update hasil zakat
      hasilZakat.textContent = formatRupiah(zakatRp);

      // Update rincian detail
      const jenisIrigasiText = {
        'tanpa-irigasi': 'Tanpa Irigasi (Tergantung Hujan)',
        'irigasi-sederhana': 'Irigasi Sederhana',
        'irigasi-mekanis': 'Irigasi Mekanis / Modern'
      };

      detailIrigasi.textContent = jenisIrigasiText[jenisIrigasi];
      detailHasilPanen.textContent = `${hasilPanen.toLocaleString('id-ID')} Kg`;
      detailHargaPasar.textContent = formatRupiah(hargaPasar);
      detailNisab.textContent = `${nisab} Kg`;

      detailTarif.textContent = `${(tarif * 100).toFixed(0)}%`;

        // Tampilkan container hasil zakat setelah klik hitung
  document.getElementById('hasilContainer').style.display = 'block';

      if(zakatRp > 0){
        detailHitung.textContent = `Zakat = Hasil Panen x Tarif = ${hasilPanen.toLocaleString('id-ID')} Kg x ${tarif * 100}% = ${zakatKg.toLocaleString('id-ID')} Kg`;
      } else {
        hasilZakat.textContent = 'Tidak wajib zakat';
        detailHitung.textContent = 'Hasil panen kurang dari nisab, tidak wajib zakat.';
        bayarBtn.style.display = 'none';
      }
      detailTotalZakat.textContent = formatRupiah(zakatRp);

    });

    // Reset form & hasil
    document.getElementById('resetBtn').addEventListener('click', () => {
      hasilZakat.textContent = 'Rp. 0';
      detailIrigasi.textContent = '-';
      detailHasilPanen.textContent = '0 Kg';
      detailHargaPasar.textContent = 'Rp 0';
      detailNisab.textContent = '653 Kg';
      detailTarif.textContent = '-';
      detailHitung.textContent = '-';
      detailTotalZakat.textContent = 'Rp 0';
      details.style.display = 'none';
    });

    // Toggle menu mobile
    document.getElementById('menu-toggle').addEventListener('click', () => {
      const menu = document.getElementById('menu');
      if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
      } else {
        menu.classList.add('hidden');
      }
    });

    // Bayar Zakat button: open modal with nominal
    bayarBtn.addEventListener('click', function() {
      const nominal = hasilZakat.textContent.replace(/[^\d]/g, '');
      if (parseInt(nominal) > 0) {
        window.dispatchEvent(new CustomEvent('openZakatModal', { detail: { nominal: nominal } }));
      } else {
        alert('Silakan hitung zakat terlebih dahulu.');
      }
    });

  </script>
 </body>
</html>
