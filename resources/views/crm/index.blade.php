<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRM Donatur') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-between items-center">
                <form method="GET" class="flex items-center gap-3 flex-wrap">
                    <input type="text" name="search" placeholder="Cari nama/email/WA..."
                        value="{{ request('search') }}"
                        class="border rounded px-4 py-2 text-sm w-96">

                    <select name="sort" class="border rounded px-3 py-2 text-sm">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                        <option value="highest" {{ request('sort') == 'highest' ? 'selected' : '' }}>Donasi Tertinggi</option>
                    </select>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">Filter</button>

                    <button onclick="exportToExcel()" class="bg-green-600 text-white px-4 py-2 rounded text-sm">
                        Export ke Excel
                    </button>

                </form>

            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase font-medium">
                        <tr>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">WhatsApp</th>
                            <th class="px-6 py-3">Total Donasi</th>
                            <th class="px-6 py-3">Jumlah Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($donors as $donor)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $donor->name ?? 'Hamba Allah' }}</td>
                                <td class="px-6 py-4">{{ $donor->email }}</td>
                                <td class="px-6 py-4">{{ $donor->whatsapp }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($donor->total_donasi, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">{{ $donor->jumlah_transaksi }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">
                                    Tidak ada data donatur.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>

    <script>
        function exportToExcel() {
            const table = document.querySelector("table");
            const wb = XLSX.utils.table_to_book(table, { sheet: "Donatur" });
            const wbout = XLSX.write(wb, { bookType: "xlsx", type: "array" });
            saveAs(new Blob([wbout], { type: "application/octet-stream" }), "laporan_crm.xlsx");
        }
    </script>

</x-app-layout>
