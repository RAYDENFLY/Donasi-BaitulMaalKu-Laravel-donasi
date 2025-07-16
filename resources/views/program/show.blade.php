<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
   <title>{{ $program->judul }}</title>
    <meta name="description" content="{{ Str::limit(strip_tags($program->deskripsi), 150) }}">
    <meta name="keywords" content="donasi, zakat, wakaf, baitul maal, {{ $program->judul }}">
    <meta property="og:title" content="{{ $program->judul }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($program->deskripsi), 150) }}">
    <meta property="og:image" content="{{ asset('storage/' . $program->gambar) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: 'Inter', sans-serif; }
    img { height: 440px }
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

<hr class="border-t border-gray-300"/>
<main class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-8">
  <!-- Gambar 16:9 di atas -->
  <div class="w-full aspect-[16/9] overflow-hidden rounded-lg">
    <img 
      alt="{{ $program->judul }}"
      src="{{ asset('storage/' . $program->gambar) }}"
      class="w-full h-full object-cover"
    />
  </div>

  <!-- Konten -->
  <section class="flex flex-col justify-start">
    <h1 class="text-2xl font-extrabold mb-3 leading-tight">
      {{ $program->judul }}
    </h1>
    
    <p class="text-base font-normal mb-6 leading-relaxed text-justify">
      {!! nl2br(preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', e($program->deskripsi))) !!}
    </p>

    <div class="bg-gray-100 rounded-xl p-5 mb-6 text-sm text-gray-700">
      <div class="flex justify-between mb-1">
        <span>Terkumpul</span>
        <span>{{ number_format($program->terkumpul / $program->target * 100, 0) }}%</span>
      </div>
      <div class="w-full bg-gray-300 rounded-full h-4 overflow-hidden">
        <div class="bg-blue-600 h-4 rounded-full" style="width: {{ ($program->terkumpul / $program->target) * 100 }}%;"></div>
      </div>
      <div class="mt-3 font-bold text-base text-black">
        Rp {{ number_format($program->terkumpul) }}
      </div>
      <div class="text-xs text-gray-500">
        dari Rp {{ number_format($program->target) }}
      </div>
    </div>

    <div class="flex items-start space-x-2 text-gray-900 mb-6">
      <i class="fas fa-map-marker-alt text-lg mt-1"></i>
      <div class="flex flex-col leading-tight">
        <span class="text-sm font-normal">Lokasi</span>
        <span class="text-sm font-bold">{{ $program->lokasi }}</span>
      </div>
    </div>

    <button
      id="openModalBtn"
      class="bg-blue-600 text-white font-semibold text-lg py-3 rounded-lg text-center hover:bg-blue-700 transition w-full"
      type="button"
    >
      Donasi Sekarang
    </button>
  </section>
</main>

<!--
<section class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-2 gap-10">
  <div>
    <h2 class="text-2xl font-extrabold mb-6">Donatur</h2>
    <div class="mb-6">
      <div class="flex justify-between mb-1">
        <span class="font-bold">Ahmad Rizki</span>
        <span class="font-bold">Rp 1.000.000</span>
      </div>
      <div class="mb-1 text-sm">15/3/2024</div>
      <div class="text-sm">"Semoga menjadi amal jariyah"</div>
    </div>
    <div>
      <div class="flex justify-between mb-1">
        <span class="font-bold">Hamba Allah</span>
        <span class="font-bold">Rp 1.000.000</span>
      </div>
      <div class="mb-1 text-sm">15/3/2024</div>
      <div class="text-sm">"Bismillah untuk pembangunan masjid"</div>
    </div>
  </div>
  <form>
    <h2 class="text-2xl font-extrabold mb-6">Kritik dan Saran</h2>
    <label class="block font-semibold mb-1" for="name">Nama</label>
    <input class="w-full rounded-lg border border-gray-700 px-4 py-3 mb-6 text-base focus:outline-none focus:ring-2 focus:ring-blue-600" id="name" type="text"/>
    <label class="block font-semibold mb-1" for="message">Pesan</label>
    <textarea class="w-full rounded-lg border border-gray-700 px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-blue-600" id="message" rows="4"></textarea>
  </form>
</section>

-->



<!-- Modal backdrop -->
  <div
    id="modalBackdrop"
    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
  >
    <!-- Modal container -->
    <div
      class="bg-white rounded-lg max-w-xl w-full mx-4 max-h-[90vh] overflow-y-auto shadow-lg"
      role="dialog"
      aria-modal="true"
      aria-labelledby="modalTitle"
    >
      <!-- Modal header -->
      <header class="bg-[#0a7aff] p-6 rounded-t-lg">
        <h1 id="modalTitle" class="text-white font-extrabold text-lg">Pembayaran</h1>
      </header>

      <!-- Modal body -->
      <main class="p-6">
       <form id="donationForm" class="space-y-6" method="POST" action="{{ route('donation.store') }}">
  @csrf
      <input type="hidden" name="program_type" value="{{ $program->judul }}">

          <div>
            <label for="nama" class="block font-extrabold text-sm mb-1">Nama:</label>
            <input
              id="nama"
              type="text"
              name="name"
              class="w-full rounded-lg border border-gray-400 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0a7aff]"
              placeholder=""
              required
            />
            <p class="text-xs mt-1 text-gray-700">Contoh: Adi Gustiawan</p>
            <label class="inline-flex items-center mt-3 cursor-pointer select-none text-gray-900 text-xs">
              <input 
              type="checkbox"
              class="form-checkbox h-5 w-5 text-[#0a7aff]" 
              name="hide_name"
              />
              <span class="ml-2">Sembunyikan nama saya (Hamba Allah)</span>
            </label>
          </div>

          <div>
            <label for="whatsapp" class="block font-extrabold text-sm mb-1">No WhatsApp</label>
            <input
              id="whatsapp"
              type="text"
              name="whatsapp"
              class="w-full rounded-lg border border-gray-400 px-4 py-3 text-xs focus:outline-none focus:ring-2 focus:ring-[#0a7aff]"
              placeholder=""
              required
            />
            <p class="text-xs mt-1 text-gray-700">Contoh: 08123456789</p>
          </div>

          <div>
            <label for="email" class="block font-extrabold text-sm mb-1">Email</label>
            <input
              id="email"
              type="email"
              name="email"
              class="w-full rounded-lg border border-gray-400 px-4 py-3 text-xs focus:outline-none focus:ring-2 focus:ring-[#0a7aff]"
              placeholder=""
              required
            />
            <p class="text-xs mt-1 text-gray-700">Contoh: adi.gustiawan@gmal.com</p>
          </div>

          <div>
            <label for="nominal" class="block font-extrabold text-sm mb-1">Nominal</label>
            <div class="flex rounded-lg border border-gray-400 overflow-hidden">
              <span class="bg-[#0a7aff] text-white font-extrabold px-5 py-3 flex items-center justify-center text-xs rounded-l-lg select-none">Rp</span>
             <input
              id="nominalInput"
              name="nominal"
              type="text"
              inputmode="numeric"
              pattern="[0-9]*"
              class="w-full px-4 py-3 text-xs focus:outline-none"
              placeholder="Contoh: 100000"
              required
            />


            </div>
            <div class="mt-4 flex gap-2 flex-wrap">
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">5.000</button>
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">10.000</button>
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">20.000</button>
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">50.000</button>
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">100.000</button>
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">250.000</button>
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">500.000</button>
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">1.000.000</button>
              <button type="button" class="preset-nominal-btn border border-gray-400 rounded-lg px-6 py-2 text-sm text-gray-900 hover:bg-gray-100">2.000.000</button>
            </div>
          </div>
          <input type="hidden" id="totalDonasiInput" name="total_donasi" />
          <input type="hidden" id="kodeUnikInput" name="kode_unik" />
          <div>
            <label for="metode" class="block font-extrabold text-lg mb-1">Metode Pembayaran</label>
            <select
              id="metode"
              name="payment_method"
              required
              class="w-full rounded-lg border border-gray-400 px-4 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#0a7aff]"
            >
              <option selected disabled>Pilih Bank / Qris</option>
              
              @foreach ($bankAccounts as $bank)
                      <option 
                        value="Bank {{ $bank->bank_name }}"
                        data-bank-logo="{{ asset('storage/' . $bank->logo_path) }}"
                        data-account-number="{{ $bank->account_number }}"
                        data-account-name="{{ $bank->account_name }}"
                      >
                        {{ $bank->bank_name }}
                      </option>
                    @endforeach

                    @foreach ($qrisList as $qris)
                      <option 
                        value="QRIS - {{ $qris->program_type }}"
                        data-qris-image="{{ asset('storage/' . $qris->image_path) }}"
                      >
                        QRIS - {{ $qris->program_type }}
                      </option>
                    @endforeach


            </select>

          </div>

          <div>
            <label for="doa" class="block font-extrabold text-sm mb-1">Doa (Optional)</label>
            <textarea
              name="doa"
              id="doa"
              rows="4"
              class="w-full rounded-lg border border-gray-400 px-4 py-3 text-xs resize-none focus:outline-none focus:ring-2 focus:ring-[#0a7aff]"
              placeholder=""
            ></textarea>
          </div>
          

        <button
          id="bayarBtn"
          type="button"
          class="w-full bg-[#0a7aff] text-white font-extrabold text-sm py-4 rounded-lg hover:bg-[#0966e0] transition-colors"
        >
          Konfirmasi Donasi
        </button>

        </form>
      </main>

      <!-- Modal close button -->
      <button
        id="closeModalBtn"
        aria-label="Close modal"
        class="absolute top-4 right-4 text-white text-3xl font-extrabold hover:text-gray-300"
        type="button"
      >
        &times;
      </button>
    </div>
  </div>

    <!-- Modal Konfirmasi Donasi -->
  <div id="invoiceModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 relative">
      
      <button
        type="button"
        id="closeInvoiceModal"
        class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl font-bold"
      >
        &times;
      </button>

      <h2 class="text-lg font-bold text-center text-gray-800 mb-4">Konfirmasi Donasi Anda</h2>

      <!-- Tambahan di dalam modal invoice -->
      <div class="space-y-3 text-sm text-gray-700">
        <p><strong>Nama:</strong> <span id="previewName">-</span></p>
        <p><strong>Nominal:</strong> <span id="previewNominal">-</span></p>
        <input type="hidden" name="kode_unik" value="{{ old('kode_unik', $kodeUnik ?? '') }}" id="kodeUnikInput">
        <p><strong>Kode Unik:</strong> <span id="previewKodeUnik">{{ $kodeUnik ?? '-' }}</span></p>
        <p><strong>Total Donasi:</strong> <span id="previewTotal">-</span></p>
        <p><strong>Metode Pembayaran:</strong> <span id="previewMetode">-</span></p>
      </div>


      <!-- Jika metode adalah Bank -->
      <div id="previewBankInfo" class="mt-4 border border-blue-200 bg-blue-50 p-4 rounded-lg text-sm text-gray-800 hidden">
        <p class="font-semibold mb-2">Silakan transfer ke rekening berikut:</p>
        <div class="flex items-center gap-2 mb-1">
        <p><strong>Bank:</strong> <span id="previewBankName">-</span></p>
      </div>
        <p><strong>No Rekening:</strong> <span id="previewAccountNumber">-</span></p>
        <p><strong>Atas Nama:</strong> <span id="previewAccountName">-</span></p>
      </div>

      <!-- Jika metode adalah QRIS -->
      <div id="previewQrisInfo" class="mt-4 border border-pink-200 bg-pink-50 p-4 rounded-lg text-sm text-gray-800 text-center hidden">
        <p class="font-semibold mb-2">Silakan scan QRIS berikut untuk melakukan donasi:</p>
        <img id="previewQrisImage" class="w-40 h-40 mx-auto object-contain" alt="QRIS Preview" />
      </div>

      <blockquote class="mt-4 p-3 border-l-4 border-yellow-400 bg-yellow-50 text-sm text-gray-700 rounded">
        Pastikan Anda telah melakukan transfer sesuai dengan nominal tertera. Klik <strong>Lanjutkan Pembayaran</strong> untuk menyelesaikan donasi dan melihat invoice Anda.
      </blockquote>

      <div class="mt-6 flex justify-between gap-2">
        <button
          type="button"
          id="cancelInvoice"
          class="w-1/2 bg-gray-200 text-gray-800 rounded-lg py-2 hover:bg-gray-300"
        >
          Batal
        </button>
        <button
          type="submit"
          id="submitInvoice"
          class="w-1/2 bg-[#0a7aff] text-white rounded-lg py-2 hover:bg-[#0966e0]"
        >
          Lanjutkan Pembayaran
        </button>
      </div>
    </div>
  </div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById("modalBackdrop");
    const openBtn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModalBtn");

    const bayarBtn = document.getElementById('bayarBtn');
    const nominalInput = document.getElementById('nominalInput');
    const form = document.getElementById('donationForm');
    const invoiceModal = document.getElementById('invoiceModal');
    const cancelInvoice = document.getElementById('cancelInvoice');
    const closeInvoiceModal = document.getElementById('closeInvoiceModal');
    const submitInvoice = document.getElementById('submitInvoice');
    const metodeSelect = document.getElementById('metode');

    // Buka modal
    if (openBtn) {
      openBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
      });
    }

    // Tutup modal
    if (closeBtn) {
      closeBtn.addEventListener("click", () => {
        modal.classList.remove("flex");
        modal.classList.add("hidden");
      });
    }

    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.classList.remove("flex");
        modal.classList.add("hidden");
      }
    });

    // Update info bank / qris saat metode berubah
    metodeSelect.addEventListener('change', function () {
      const selectedOption = this.options[this.selectedIndex];
      const value = selectedOption.value;

      const bankInfo = document.getElementById('bankInfo');
      const qrisInfo = document.getElementById('qrisInfo');

      bankInfo.classList.add('hidden');
      qrisInfo.classList.add('hidden');

      if (value.startsWith('Bank')) {
        document.getElementById('bankLogo').src = selectedOption.getAttribute('data-bank-logo') || '';
        document.getElementById('bankName').textContent = value.replace('Bank ', '');
        document.getElementById('accountNumberDisplay').textContent = selectedOption.getAttribute('data-account-number') || '';
        document.getElementById('accountNameDisplay').textContent = selectedOption.getAttribute('data-account-name') || '';
        bankInfo.classList.remove('hidden');
      } else if (value.startsWith('QRIS')) {
        document.getElementById('qrisImage').src = selectedOption.getAttribute('data-qris-image') || '';
        qrisInfo.classList.remove('hidden');
      }
    });

    // Format input nominal hanya angka
    nominalInput.addEventListener("input", function (e) {
      this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Klik Konfirmasi Donasi
    bayarBtn.addEventListener('click', function (e) {
      e.preventDefault();

      const program = 'Program Donasi';
      const nominal = parseInt(nominalInput.value.replace(/\./g, '')) || 0;
      const kodeUnik = Math.floor(Math.random() * 1000);
      const total = nominal + kodeUnik;

      // Masukkan ke form hidden
      document.getElementById('kodeUnikInput').value = kodeUnik;
      document.getElementById('totalDonasiInput').value = total;
      document.getElementById('previewNominal').innerText = 'Rp ' + nominal.toLocaleString('id-ID');
      document.getElementById('previewKodeUnik').innerText = kodeUnik;
      document.getElementById('previewTotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
      


      // Preview data
      const selected = metodeSelect.options[metodeSelect.selectedIndex];

      document.getElementById('previewName').innerText = form.name.value || '-';
      document.getElementById('previewNominal').innerText = 'Rp ' + total.toLocaleString('id-ID');
      document.getElementById('previewMetode').innerText = selected.value || '-';

      // BANK Preview
      if (selected.dataset.accountNumber) {
        document.getElementById('previewBankInfo').classList.remove('hidden');
        document.getElementById('previewBankName').innerText = selected.innerText;
        document.getElementById('previewAccountNumber').innerText = selected.dataset.accountNumber;
        document.getElementById('previewAccountName').innerText = selected.dataset.accountName;
      } else {
        document.getElementById('previewBankInfo').classList.add('hidden');
      }

      // QRIS Preview
      if (selected.dataset.qrisImage) {
        document.getElementById('previewQrisInfo').classList.remove('hidden');
        document.getElementById('previewQrisImage').src = selected.dataset.qrisImage;
      } else {
        document.getElementById('previewQrisInfo').classList.add('hidden');
      }

      // Tampilkan invoice modal
      invoiceModal.classList.remove('hidden');
      invoiceModal.classList.add('flex');
    });

    // Tutup invoice modal
    cancelInvoice.addEventListener('click', () => {
      invoiceModal.classList.add('hidden');
      invoiceModal.classList.remove('flex');
    });
    closeInvoiceModal.addEventListener('click', () => {
      invoiceModal.classList.add('hidden');
      invoiceModal.classList.remove('flex');
    });

    // Submit form saat "Lanjutkan Pembayaran"
    submitInvoice.addEventListener('click', () => {
      form.submit();
    });
  });
</script>

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
  const nominalInput = document.getElementById('nominalInput');
  const presetButtons = document.querySelectorAll('.preset-nominal-btn');

  // Format Rupiah
  function formatRupiah(angka) {
    let numberString = angka.replace(/[^,\d]/g, ''),
        split = numberString.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substring(0, sisa),
        ribuan = split[0].substring(sisa).match(/\d{3}/gi);

    if (ribuan) {
      let separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    return rupiah;
  }

  // Hapus format
  function cleanRupiah(rp) {
    return rp.replace(/[^0-9]/g, '');
  }

  // Format saat input
  nominalInput.addEventListener('input', function() {
    const cleaned = cleanRupiah(this.value);
    this.value = formatRupiah(cleaned);
  });

  // Tombol preset
  presetButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Ambil angka murni tanpa titik
      const angka = this.textContent.replace(/\D/g, '');
      nominalInput.value = angka;
    });
  });

  // Variabel kode unik agar konsisten
  let kodeUnikGlobal = null;

  // Klik Konfirmasi Donasi
  const bayarBtn = document.getElementById('bayarBtn');
  const form = nominalInput.closest('form');
  bayarBtn.addEventListener('click', function (e) {
    e.preventDefault();

    // Pastikan nominal sudah bersih dari titik sebelum proses
    const nominal = parseInt(cleanRupiah(nominalInput.value)) || 0;

    // Generate kode unik hanya jika belum ada (agar konsisten)
    if (kodeUnikGlobal === null) {
      kodeUnikGlobal = Math.floor(Math.random() * 900) + 100; // 100-999
    }
    const kodeUnik = kodeUnikGlobal;
    const total = nominal + kodeUnik;

    // Masukkan ke form hidden
    document.getElementById('kodeUnikInput').value = kodeUnik;
    document.getElementById('totalDonasiInput').value = total;
    document.getElementById('previewNominal').innerText = 'Rp ' + nominal.toLocaleString('id-ID');
    document.getElementById('previewKodeUnik').innerText = kodeUnik;
    document.getElementById('previewTotal').innerText = 'Rp ' + total.toLocaleString('id-ID');

    // Preview data
    const metodeSelect = document.getElementById('metode');
    const selected = metodeSelect.options[metodeSelect.selectedIndex];

    document.getElementById('previewName').innerText = form.name.value || '-';
    document.getElementById('previewMetode').innerText = selected.value || '-';

    // BANK Preview
    if (selected.dataset.accountNumber) {
      document.getElementById('previewBankInfo').classList.remove('hidden');
      document.getElementById('previewBankName').innerText = selected.innerText;
      document.getElementById('previewAccountNumber').innerText = selected.dataset.accountNumber;
      document.getElementById('previewAccountName').innerText = selected.dataset.accountName;
    } else {
      document.getElementById('previewBankInfo').classList.add('hidden');
    }

    // QRIS Preview
    if (selected.dataset.qrisImage) {
      document.getElementById('previewQrisInfo').classList.remove('hidden');
      document.getElementById('previewQrisImage').src = selected.dataset.qrisImage;
    } else {
      document.getElementById('previewQrisInfo').classList.add('hidden');
    }

    // Tampilkan invoice modal
    const invoiceModal = document.getElementById('invoiceModal');
    invoiceModal.classList.remove('hidden');
    invoiceModal.classList.add('flex');
  });

  // Sebelum submit form, bersihkan nilai nominal dan pastikan kode unik sama
  form.addEventListener('submit', function() {
    nominalInput.value = cleanRupiah(nominalInput.value);
    // Set kode unik dan total donasi sesuai yang sudah di-generate
    if (kodeUnikGlobal !== null) {
      document.getElementById('kodeUnikInput').value = kodeUnikGlobal;
      document.getElementById('totalDonasiInput').value = (parseInt(nominalInput.value) || 0) + kodeUnikGlobal;
    }
  });
</script>

<script>
  const toggleButton = document.getElementById('menu-toggle');
  const menu = document.getElementById('menu');

  toggleButton.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>

    
</body>
</html>