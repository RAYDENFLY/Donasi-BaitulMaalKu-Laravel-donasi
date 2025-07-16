<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invoice Donasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media print {
      .no-print {
        display: none !important;
      }
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800 py-10 px-4">
  <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6 space-y-6 border border-gray-200">
    <div class="text-center">
      <h1 class="text-3xl font-bold text-[#0a7aff] mb-1">Invoice Donasi</h1>
      <p class="text-sm text-gray-500">Mohon tunggu untuk proses verifikasi donasi Anda.</p>
    </div>

    <div class="space-y-4">
      <div>
        <p class="text-xs text-gray-500 uppercase font-semibold">Program</p>
        <p class="text-lg font-bold">{{ $program->judul ?? 'Nama Program' }}</p>
      </div>

      <div>
        <p class="text-xs text-gray-500 uppercase font-semibold">Nama Donatur</p>
        <p class="text-lg font-bold">{{ $donasi->name ?? 'Hamba Allah' }}</p>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <div>
          <p class="text-xs text-gray-500 uppercase font-semibold">Jumlah Donasi</p>
          <p class="text-lg font-bold text-gray-800">Rp {{ number_format($donasi->nominal - $donasi->kode_unik, 0, ',', '.') }}</p>
        </div>
        <div>
          <p class="text-xs text-gray-500 uppercase font-semibold">Kode Unik</p>
          <p class="text-lg font-bold text-gray-800">{{ $donasi->kode_unik }}</p>
        </div>
        <div class="col-span-2">
          <p class="text-xs text-gray-500 uppercase font-semibold">Total Dibayar</p>
          <p class="text-xl font-bold text-[#0a7aff]">Rp {{ number_format($donasi->nominal, 0, ',', '.') }}</p>
        </div>
      </div>

      <div>
        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">QR Code / Info Bank</p>
        <div class="bg-gray-50 border border-dashed border-gray-300 rounded-lg p-4 text-center text-sm text-gray-600">
          (QR Code atau informasi rekening bank ditampilkan di sini)
        </div>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-6 no-print">
      <a
        href="https://wa.me/6281234567890?text={{ urlencode('Saya telah berdonasi sebesar Rp ' . number_format($donasi->nominal, 0, ',', '.') . ' untuk ' . ($program->judul ?? 'Program Donasi')) }}"
        target="_blank"
        class="w-full sm:w-auto bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold text-sm text-center"
      >
        Konfirmasi Donasi via WhatsApp
      </a>

      <button
        onclick="window.print()"
        class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold text-sm"
      >
        Cetak Invoice
      </button>

      <a
        href="{{ route('donasi.index') }}"
        class="w-full sm:w-auto text-sm text-gray-600 hover:text-gray-900 underline text-center"
      >
        Kembali ke Beranda
      </a>
    </div>
  </div>
</body>
</html>
