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


  <section class="bg-[#008CFF] text-white text-center py-12 px-6">
   <h1 class="font-extrabold text-3xl leading-tight mb-2">
    Bayar Zakat
   </h1>
   <p class="text-sm max-w-xl mx-auto leading-relaxed">
    Tunaikan kewajiban zakat Anda dengan mudah dan amanah. Kami akan
      menyalurkan zakat Anda kepada yang berhak menerimanya.
   </p>
  </section>
  <main class="max-w-md mx-auto mt-10 mb-20 px-6">
   <form aria-label="Kalkulator Zakat" class="bg-[#FAFAFA] rounded-xl p-6 space-y-4" onsubmit="return false">
    <h2 class="font-extrabold text-center text-lg text-black mb-1">
     Kalkulator Zakat
    </h2>
    <p class="text-sm mb-4 text-center">
     Hitung zakat mu terlebih dahulu sebelum membayar zakat
    </p>
    <div>
     <label class="block text-sm mb-1" for="modal">
      Modal yang Diputar selama 1 tahun
     </label>
     <input class="w-full rounded-lg border border-black/40 px-4 py-3 text-sm placeholder-black/70 focus:outline-none focus:ring-2 focus:ring-[#008CFF]" id="modal" placeholder="Rp" type="text"/>
    </div>
    <div>
     <label class="block text-sm mb-1" for="keuntungan">
      Keuntungan selama 1 tahun
     </label>
     <input class="w-full rounded-lg border border-black/40 px-4 py-3 text-sm placeholder-black/70 focus:outline-none focus:ring-2 focus:ring-[#008CFF]" id="keuntungan" placeholder="Rp" type="text"/>
    </div>
    <div>
     <label class="block text-sm mb-1" for="piutang">
      Piutang Dagang
     </label>
     <input class="w-full rounded-lg border border-black/40 px-4 py-3 text-sm placeholder-black/70 focus:outline-none focus:ring-2 focus:ring-[#008CFF]" id="piutang" placeholder="Rp" type="text"/>
    </div>
    <div>
     <label class="block text-sm mb-1" for="utang">
      Utang jatuh tempo
     </label>
     <input class="w-full rounded-lg border border-black/40 px-4 py-3 text-sm placeholder-black/70 focus:outline-none focus:ring-2 focus:ring-[#008CFF]" id="utang" placeholder="Rp" type="text"/>
    </div>
    <div>
     <label class="block text-sm mb-1" for="kerugian">
      Kerugian selama 1 tahun
     </label>
     <input class="w-full rounded-lg border border-black/40 px-4 py-3 text-sm placeholder-black/70 focus:outline-none focus:ring-2 focus:ring-[#008CFF]" id="kerugian" placeholder="Rp" type="text"/>
    </div>
    <div class="flex items-center space-x-2 mt-2 mb-4">
     <input class="w-5 h-5 rounded border border-black/40 focus:ring-2 focus:ring-[#008CFF]" id="rutin" type="checkbox"/>
     <label class="text-sm select-none" for="rutin">
      Sudah 1 Tahun Penghasilan Rutin?
     </label>
    </div>
    <div class="flex space-x-4">
     <button class="flex-1 bg-[#008CFF] text-white rounded-lg py-3 text-sm font-normal hover:bg-[#0077e6] transition" id="hitungBtn" type="button">
      Hitung Zakat
     </button>
     <button class="flex-none border border-[#008CFF] text-[#008CFF] rounded-lg py-3 px-6 text-sm font-normal hover:bg-[#e6f0ff] transition" type="reset">
      Reset
     </button>
    </div>
    <div class="bg-[#D7E9FF] rounded-lg p-4 mt-6 text-sm" id="hasilContainerTrade" style="display:none;">
     <p class="font-extrabold mb-1 text-black">
      Zakat yang Harus Dibayarkan
     </p>
     <p class="font-extrabold text-lg mb-3 text-black" id="zakatAmount">
      Rp. 50.000
     </p>
     <button id="openModalBtn" class="bg-blue-600 text-white rounded-full px-4 py-1 text-sm font-normal hover:bg-blue-700 transition" type="button">
      Bayar Zakat
    </button>
     <a class="text-blue-600 text-sm font-normal hover:underline inline-block cursor-pointer" id="toggleDetails">
      Rincian Perhitungan &gt;
     </a>
     <blockquote class="mt-3 p-4 bg-white border-l-4 border-blue-600 text-black text-sm" id="details" style="display:none;">
  <p><strong>Modal:</strong> <span id="detailModal">Rp 0</span></p>
  <p><strong>Keuntungan:</strong> <span id="detailKeuntungan">Rp 0</span></p>
  <p><strong>Piutang:</strong> <span id="detailPiutang">Rp 0</span></p>
  <p><strong>Kerugian:</strong> <span id="detailKerugian">Rp 0</span></p>
  <p><strong>Utang:</strong> <span id="detailUtang">Rp 0</span></p>
  <p class="border-t pt-2 mt-2"><strong>Total Harta Bersih:</strong> <span id="detailHarta">Rp 0</span></p>
  <p><strong>Sudah dimiliki 1 tahun:</strong> <span id="detailTahun">Tidak</span></p>
  <p><strong>Ketentuan:</strong> <span id="detailKetentuan"></span></p>
</blockquote>
    </div>
   </form>
   @include('partials.zakat-modal')
  </main>
  <script>
  const toggleDetails = document.getElementById('toggleDetails');
  const details = document.getElementById('details');
  const bayarBtn = document.getElementById('bayarBtn');
  const hitungBtn = document.getElementById('hitungBtn');
  const zakatAmount = document.getElementById('zakatAmount');

  // Utilitas aman update textContent
  const setText = (id, value) => {
    const el = document.getElementById(id);
    if (el) el.textContent = value;
  };

  toggleDetails?.addEventListener('click', () => {
    const isHidden = details.style.display === 'none';
    details.style.display = isHidden ? 'block' : 'none';
    toggleDetails.textContent = isHidden ? 'Sembunyikan Rincian Perhitungan >' : 'Rincian Perhitungan >';
  });

  function parseRp(value) {
    return Number((value || '').replace(/[^0-9]/g, '')) || 0;
  }

  // Batasi input hanya angka
  ['modal', 'keuntungan', 'piutang', 'utang', 'kerugian'].forEach(id => {
    const input = document.getElementById(id);
    input?.addEventListener('input', function () {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  });

  hitungBtn?.addEventListener('click', () => {
    const modal = parseRp(document.getElementById('modal')?.value);
    const keuntungan = parseRp(document.getElementById('keuntungan')?.value);
    const piutang = parseRp(document.getElementById('piutang')?.value);
    const kerugian = parseRp(document.getElementById('kerugian')?.value);
    const utang = parseRp(document.getElementById('utang')?.value);
    const rutin = document.getElementById('rutin')?.checked;

    const totalKotor = modal + keuntungan + piutang;
    const totalBersih = Math.max(0, totalKotor - kerugian - utang);

    fetch('https://baitulmaalku-hargaemas.nvsxa3.easypanel.host/api/harga-emas')
      .then(res => {
        if (!res.ok) throw new Error('Gagal ambil harga emas');
        return res.json();
      })
      .then(data => {
        const hargaEmas = Number(data?.emas?.sellBulat || 0);
        const nisab = hargaEmas * 85;

        let zakat = 0;
        let ketentuan = '';

        if (!rutin) {
          ketentuan = 'Belum 1 tahun usaha berjalan, tidak wajib zakat.';
        } else if (totalBersih < nisab) {
          ketentuan = `Total harta bersih kurang dari nisab Rp ${nisab.toLocaleString('id-ID')}, tidak wajib zakat.`;
        } else {
          zakat = totalBersih * 0.025;
          ketentuan = `Zakat 2.5% dari total harta bersih (modal + keuntungan + piutang - kerugian - utang), nisab Rp ${nisab.toLocaleString('id-ID')}`;
        }

        zakatAmount.textContent = 'Rp. ' + zakat.toLocaleString('id-ID');
        setText('detailModal', 'Rp ' + modal.toLocaleString('id-ID'));
        setText('detailKeuntungan', 'Rp ' + keuntungan.toLocaleString('id-ID'));
        setText('detailPiutang', 'Rp ' + piutang.toLocaleString('id-ID'));
        setText('detailKerugian', 'Rp ' + kerugian.toLocaleString('id-ID'));
        setText('detailUtang', 'Rp ' + utang.toLocaleString('id-ID'));
        setText('detailHarta', 'Rp ' + totalBersih.toLocaleString('id-ID'));
        setText('detailHutang', 'Rp ' + utang.toLocaleString('id-ID'));
        setText('detailTahun', rutin ? 'Ya' : 'Tidak');
        setText('detailKetentuan', ketentuan);

        details.style.display = 'block';
        toggleDetails.textContent = 'Sembunyikan Rincian Perhitungan >';

        const hasilBox = document.getElementById('hasilContainerTrade');
        if (hasilBox) hasilBox.style.display = 'block';
      })
      .catch(err => {
        alert('Gagal mengambil harga emas. Periksa koneksi internet.');
        console.error('Fetch error:', err);
      });
  });

  bayarBtn?.addEventListener('click', function () {
    const nominal = zakatAmount.textContent.replace(/[^\d]/g, '');
    if (parseInt(nominal) > 0) {
      window.dispatchEvent(new CustomEvent('openZakatModal', { detail: { nominal } }));
    } else {
      alert('Silakan hitung zakat terlebih dahulu.');
    }
  });

  document.querySelector('form')?.addEventListener('reset', () => {
    zakatAmount.textContent = 'Rp. 50.000';
    ['detailModal','detailKeuntungan','detailPiutang','detailKerugian','detailUtang',
     'detailHarta','detailHutang','detailTahun','detailKetentuan']
    .forEach(id => setText(id, id === 'detailTahun' ? 'Tidak' : 'Rp 0'));

    details.style.display = 'none';
    toggleDetails.textContent = 'Rincian Perhitungan >';
    const hasilBox = document.getElementById('hasilContainerTrade');
    if (hasilBox) hasilBox.style.display = 'none';
  });
</script>



 </body>
</html>
