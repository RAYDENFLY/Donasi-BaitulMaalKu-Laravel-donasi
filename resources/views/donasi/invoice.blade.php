<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Invoice Donasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: 'Inter', sans-serif; }
    @media print { .no-print { display: none !important; } }
  </style>
</head>
<body class="bg-[#f0f4ff] min-h-screen flex items-center justify-center p-4">
  <div class="max-w-3xl w-full bg-white rounded-xl shadow-md overflow-hidden">
    <header class="bg-[#1e56f0] px-8 py-6 flex items-center justify-between rounded-t-xl">
      <div class="flex items-center space-x-5">
        <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-[#3a6df0]">
          <i class="far fa-file-alt text-white text-xl"></i>
        </div>
        <div>
          <h1 class="text-white font-semibold text-xl">Invoice Donasi</h1>
          <p class="text-[#cbdcff] text-sm">#DONASI-{{ $donation->id ?? '000' }}</p>
        </div>
      </div>
      @php
            $status = $donation->status;
            $statusClasses = [
                'menunggu' => ['text-[#d46a00]', 'bg-[#ffe6c7]', 'fa-clock', 'Menunggu Verifikasi'],
                'verifikasi' => ['text-blue-600', 'bg-blue-100', 'fa-hourglass-half', 'Sedang Diverifikasi'],
                'berhasil' => ['text-green-600', 'bg-green-100', 'fa-check-circle', 'Terverifikasi'],
                'gagal' => ['text-red-600', 'bg-red-100', 'fa-times-circle', 'Gagal Verifikasi'],
            ];

            $class = $statusClasses[$status] ?? $statusClasses['menunggu'];
        @endphp

        <span class="flex items-center space-x-2 {{ $class[0] }} {{ $class[1] }} text-sm font-medium rounded-full px-4 py-2">
            <i class="far {{ $class[2] }}"></i>
            <span>{{ $class[3] }}</span>
        </span>

    </header>

    <section class="px-8 py-8 text-[#4a4a4a] text-base space-y-8">
      <div class="flex items-center space-x-3">
        <i class="far fa-calendar-alt text-lg"></i>
        <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y \p\u\k\u\l H:i') }}</p>
      </div>

      <div class="grid grid-cols-2 gap-x-12 gap-y-8">
        <div>
          <div class="flex items-center space-x-2 text-sm text-[#7a7a7a] mb-2">
            <i class="far fa-user"></i>
            <span>Nama Donatur</span>
          </div>
          <p class="font-semibold text-lg">{{ $donation->name ?? 'Hamba Allah' }}</p>
        </div>
        <div>
          <div class="flex items-center space-x-2 text-sm text-[#7a7a7a] mb-2">
            <span>Nominal Donasi</span>
          </div>
          <p class="font-bold text-lg">Rp {{ number_format($donation->nominal, 0, ',', '.') }}</p>
        </div>

        <div>
          <div class="flex items-center space-x-2 text-sm text-[#7a7a7a] mb-2">
            <i class="far fa-file-alt"></i>
            <span>Program Donasi</span>
          </div>
          <p class="font-semibold text-lg">{{ $donation->program_type }}</p>
        </div>
        <div>
          <div class="flex items-center space-x-2 text-sm text-[#7a7a7a] mb-2">
            <span class="font-normal">#</span>
            <span>Kode Unik</span>
          </div>
          <p class="bg-[#f5f8ff] rounded-md px-4 py-3 font-semibold text-base w-max">
            {{ $donation->kode_unik }}
          </p>
        </div>

        <div>
          <div class="flex items-center space-x-2 text-sm text-[#7a7a7a] mb-2">
            <i class="far fa-credit-card"></i>
            <span>Metode Pembayaran</span>
          </div>
          <p class="font-normal text-lg">{{ $donation->payment_method }}</p>
        </div>
        <div>
            <div class="bg-[#dff6e4] rounded-md px-6 py-4 text-[#1a7a2f] font-semibold">
                <div class="flex items-center space-x-2 mb-2">
                  <span class="text-base">Total Transfer</span>
                </div>
                <p class="text-2xl font-extrabold">Rp {{ number_format($donation->total_donasi, 0, ',', '.') }}</p>
            </div>
        </div>
      </div>

      <div class="bg-[#e6f0ff] rounded-lg p-6 text-[#2a4db7] text-sm leading-relaxed">
        <div class="flex items-center space-x-3 mb-2">
          <div class="flex items-center justify-center w-7 h-7 rounded-full bg-[#3a6df0]">
            <i class="far fa-file-alt text-white text-sm"></i>
          </div>
          <p class="font-semibold text-sm">Informasi Penting</p>
        </div>
        <p>
          Donasi Anda telah berhasil dicatat dalam sistem kami. Mohon tunggu proses verifikasi dalam 1x24 jam.
          Untuk mempercepat proses, klik tombol <strong>Konfirmasi via WhatsApp</strong> dan kirimkan bukti transfer Anda.
        </p>
      </div>

      <div class="flex flex-col sm:flex-row sm:space-x-6 space-y-4 sm:space-y-0 no-print">
        <a
          href="https://wa.me/628111600660?text={{ urlencode('Saya telah berdonasi sebesar Rp ' . number_format($donation->total_donasi, 0, ',', '.') . ' untuk program ' . $donation->program_type . '.') }}"
          target="_blank"
          class="flex items-center justify-center space-x-3 bg-[#2ea64a] hover:bg-[#27903f] text-white font-semibold rounded-lg px-7 py-4 w-full sm:w-auto"
        >
          <i class="fas fa-phone-alt text-sm"></i>
          <span class="text-lg">Konfirmasi via WhatsApp</span>
        </a>

        <button
          onclick="window.print()"
          class="flex items-center justify-center space-x-3 bg-[#3a4451] hover:bg-[#2a2f3a] text-white font-semibold rounded-lg px-7 py-4 w-full sm:w-auto"
        >
          <i class="fas fa-print text-sm"></i>
          <span class="text-lg">Cetak Invoice</span>
        </button>

        <a
          href="/donasi"
          class="bg-[#e2e8f0] hover:bg-[#cbd5e1] text-[#4a4a4a] font-semibold rounded-lg px-7 py-4 w-full sm:w-auto text-lg text-center"
        >
          ← Kembali
        </a>
      </div>
    </section>

    <footer class="flex justify-between text-sm text-[#4a4a4a] px-8 py-4 border-t border-[#e2e8f0] rounded-b-xl select-text">
      <p>© {{ date('Y') }} LAZ BaitulMaalKu</p>
      <p>Terima kasih atas kepercayaan Anda.</p>
    </footer>
  </div>
</body>
</html>
