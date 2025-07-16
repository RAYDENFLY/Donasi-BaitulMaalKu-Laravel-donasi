<!-- Modal backdrop -->
<div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-lg max-w-xl w-full mx-4 max-h-[90vh] overflow-y-auto shadow-lg relative" role="dialog" aria-modal="true" aria-labelledby="modalTitle">

    <!-- Modal header -->
    <header class="bg-[#0a7aff] p-6 rounded-t-lg">
      <h1 id="modalTitle" class="text-white font-extrabold text-lg">Pembayaran Zakat</h1>
    </header>

    <!-- Modal body -->
    <main class="p-6">
      <form id="donationForm" method="POST" action="{{ route('donation.store') }}" class="space-y-6">
        @csrf
        <input type="hidden" name="program_type" value="{{ 'Zakat ' . ucfirst($jenis) }}">
        <input type="hidden" id="totalDonasiInput" name="total_donasi" />
        <input type="hidden" id="kodeUnikInput" name="kode_unik" />

        <!-- Nama -->
        <div>
          <label for="nama" class="block font-extrabold text-sm mb-1">Nama:</label>
          <input id="nama" type="text" name="name" class="w-full rounded-lg border border-gray-400 px-4 py-3 text-sm focus:ring-[#0a7aff]" required>
          <p class="text-xs text-gray-700 mt-1">Contoh: Adi Gustiawan</p>
          <label class="inline-flex items-center mt-3 text-xs text-gray-900">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-[#0a7aff]" name="hide_name">
            <span class="ml-2">Sembunyikan nama saya (Hamba Allah)</span>
          </label>
        </div>

        <!-- WhatsApp -->
        <div>
          <label for="whatsapp" class="block font-extrabold text-sm mb-1">No WhatsApp</label>
          <input id="whatsapp" type="text" name="whatsapp" class="w-full rounded-lg border border-gray-400 px-4 py-3 text-sm focus:ring-[#0a7aff]" required>
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block font-extrabold text-sm mb-1">Email</label>
          <input id="email" type="email" name="email" class="w-full rounded-lg border border-gray-400 px-4 py-3 text-sm focus:ring-[#0a7aff]" required>
        </div>

        <!-- Nominal -->
        <div>
          <label for="nominal" class="block font-extrabold text-sm mb-1">Nominal</label>
          <div class="flex rounded-lg border border-gray-400 overflow-hidden">
            <span class="bg-[#0a7aff] text-white px-4 py-3 text-sm font-bold">Rp</span>
            <input id="nominalInput" name="nominal" type="text" class="w-full px-4 py-3 text-sm focus:outline-none" placeholder="Contoh: 100000" required>
          </div>
        </div>

        <!-- Metode Pembayaran -->
        <!-- Metode Pembayaran -->
        <div>
          <label for="metode" class="block font-extrabold text-lg mb-1">Metode Pembayaran</label>
          <select id="metode" name="payment_method" required class="w-full rounded-lg border border-gray-400 px-4 py-4 text-sm focus:ring-[#0a7aff]">
           <option selected disabled>Pilih Bank / Qris</option>
            @foreach ($bankAccounts as $bank)
              <option 
                value="Bank {{ $bank->bank_name }}"
                data-bank-logo="{{ asset('storage/' . $bank->logo_path) }}"
                data-account-number="{{ $bank->account_number }}"
                data-account-name="{{ $bank->account_name }}"
              >
                {{ $bank->bank_name }} ({{ $bank->account_number }})
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

        <!-- Doa -->
        <div>
          <label for="doa" class="block font-extrabold text-sm mb-1">Doa Zakat</label>
          <blockquote class="p-4 bg-gray-100 border-l-4 border-yellow-500 text-sm text-gray-800 rounded">
            <p class="italic mb-1">اللَّهُمَّ اجْعَلْهَا مَغْنَمًا وَلاَ تَجْعَلْهَا مَغْرَمًا</p>
            <p>"Allahummaj'alha maghnaman wa laa taj'alha maghraman"</p>
            <p class="mt-1 text-gray-600">"Ya Allah, jadikanlah zakat ini sebagai keuntungan dan jangan jadikan ia sebagai kerugian."</p>
          </blockquote>
        </div>

        <!-- Tombol -->
        <button id="bayarBtn" type="button" class="w-full bg-[#0a7aff] text-white font-extrabold text-sm py-4 rounded-lg hover:bg-[#0966e0]">Konfirmasi Donasi</button>
      </form>
    </main>

    <!-- Tutup -->
    <button id="closeModalBtn" class="absolute top-4 right-4 text-white text-3xl font-extrabold hover:text-gray-300" type="button">&times;</button>
  </div>
</div>

<!-- INVOICE MODAL -->
<div id="invoiceModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-lg max-w-md w-full mx-4 p-6 shadow-lg relative">
    <button id="closeInvoiceModal" class="absolute top-4 right-4 text-gray-600 text-xl font-bold hover:text-gray-800" type="button">&times;</button>
    <h2 class="text-lg font-bold mb-4">Konfirmasi Zakat</h2>

    <!-- Preview Donasi -->
    <div class="space-y-3 text-sm text-gray-700">
      <p><strong>Nama:</strong> <span id="previewName">-</span></p>
      <p><strong>Nominal:</strong> <span id="previewNominal">-</span></p>
      <input type="hidden" name="kode_unik" id="kodeUnikInput">
      <p><strong>Kode Unik:</strong> <span id="previewKodeUnik">-</span></p>
      <p><strong>Total Donasi:</strong> <span id="previewTotal">-</span></p>
      <p><strong>Metode Pembayaran:</strong> <span id="previewMetode">-</span></p>
    </div>

    <!-- Info Bank -->
    <div id="previewBankInfo" class="mt-4 border border-blue-200 bg-blue-50 p-4 rounded-lg text-sm text-gray-800 hidden">
      <p class="font-semibold mb-2">Silakan transfer ke rekening berikut:</p>
      <p><strong>Bank:</strong> <span id="previewBankName">-</span></p>
      <p><strong>No Rekening:</strong> <span id="previewAccountNumber">-</span></p>
      <p><strong>Atas Nama:</strong> <span id="previewAccountName">-</span></p>
    </div>

    <!-- Info QRIS -->
    <div id="previewQrisInfo" class="mt-4 border border-pink-200 bg-pink-50 p-4 rounded-lg text-sm text-gray-800 text-center hidden">
      <p class="font-semibold mb-2">Silakan scan QRIS berikut untuk melakukan donasi:</p>
      <img id="previewQrisImage" class="w-40 h-40 mx-auto object-contain" alt="QRIS Preview" />
    </div>

    <!-- Note -->
    <blockquote class="mt-4 p-3 border-l-4 border-yellow-400 bg-yellow-50 text-sm text-gray-700 rounded">
      Pastikan Anda telah melakukan transfer sesuai dengan nominal tertera. Klik <strong>Lanjutkan Pembayaran</strong> untuk menyelesaikan donasi dan melihat invoice Anda.
    </blockquote>

    <!-- Aksi -->
    <div class="mt-6 flex justify-between gap-2">
      <button id="cancelInvoice" type="button" class="w-1/2 bg-gray-200 text-gray-800 rounded-lg py-2 hover:bg-gray-300">Batal</button>
      <button id="submitInvoice" type="submit" class="w-1/2 bg-[#0a7aff] text-white rounded-lg py-2 hover:bg-[#0966e0]">Lanjutkan Pembayaran</button>
    </div>
  </div>
</div>

<!-- SCRIPT -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById("modalBackdrop");
    const openBtn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModalBtn");
    const bayarBtn = document.getElementById('bayarBtn');
    const nominalInput = document.getElementById('nominalInput');
    const form = document.getElementById('donationForm');
    const metodeSelect = document.getElementById('metode');
    const invoiceModal = document.getElementById('invoiceModal');
    const cancelInvoice = document.getElementById('cancelInvoice');
    const closeInvoiceModal = document.getElementById('closeInvoiceModal');
    const submitInvoice = document.getElementById('submitInvoice');

    // Buka modal utama
    if (openBtn) {
      openBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
      });
    }

    // Tutup modal utama
    if (closeBtn) {
      closeBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
      });
    }

    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
      }
    });

    // Format input nominal hanya angka
    nominalInput.addEventListener("keydown", function(e) {
      if (
        [46, 8, 9, 27, 13, 110, 190].includes(e.keyCode) ||
        (e.keyCode == 65 && (e.ctrlKey || e.metaKey)) ||
        (e.keyCode == 67 && (e.ctrlKey || e.metaKey)) ||
        (e.keyCode == 86 && (e.ctrlKey || e.metaKey)) ||
        (e.keyCode == 88 && (e.ctrlKey || e.metaKey)) ||
        (e.keyCode >= 35 && e.keyCode <= 39)
      ) {
        return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
    });

    // Klik Konfirmasi Donasi
    bayarBtn.addEventListener('click', function (e) {
      e.preventDefault();

      const nominal = parseInt(nominalInput.value.replace(/\./g, '')) || 0;
      const kodeUnik = Math.floor(Math.random() * 1000);
      const total = nominal + kodeUnik;
      const selected = metodeSelect.options[metodeSelect.selectedIndex];

      // Validasi
      if (!selected || selected.disabled) {
        alert('Silakan pilih metode pembayaran terlebih dahulu.');
        return;
      }

      // Masukkan data ke form hidden
      document.getElementById('kodeUnikInput').value = kodeUnik;
      document.getElementById('totalDonasiInput').value = total;

      // Preview ke invoice
      document.getElementById('previewName').innerText = form.name.value || '-';
      document.getElementById('previewNominal').innerText = 'Rp ' + nominal.toLocaleString('id-ID');
      document.getElementById('previewKodeUnik').innerText = kodeUnik;
      document.getElementById('previewTotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
      document.getElementById('previewMetode').innerText = selected.value || '-';

      // Bank Info
      if (selected.dataset.accountNumber) {
        document.getElementById('previewBankInfo').classList.remove('hidden');
        document.getElementById('previewBankName').innerText = selected.innerText;
        document.getElementById('previewAccountNumber').innerText = selected.dataset.accountNumber;
        document.getElementById('previewAccountName').innerText = selected.dataset.accountName;
      } else {
        document.getElementById('previewBankInfo').classList.add('hidden');
      }

      // QRIS Info
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

    // Submit form
    submitInvoice.addEventListener('click', () => {
      form.submit();
    });
  });
</script>

