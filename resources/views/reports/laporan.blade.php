<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Donasi - Sudah Diverifikasi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <button onclick="exportToExcel()" class="bg-green-500 text-white px-4 py-2 rounded">
                Export Excel
            </button>

                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase font-medium">
                        <tr>
                            <th class="px-6 py-3">Donatur</th>
                            <th class="px-6 py-3">Program</th>
                            <th class="px-6 py-3">Nominal</th>
                            <th class="px-6 py-3">Metode</th>
                            <th class="px-6 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($verifiedDonations as $donation)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $donation->name }}</td>
                            <td class="px-6 py-4">{{ $donation->program_type }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($donation->total_donasi ?? 0, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $donation->payment_method }}</td>
                            <td class="px-6 py-4">{{ $donation->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                Belum ada donasi terverifikasi.
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
    let table = document.querySelector('table'); // pastikan hanya 1 table
    let wb = XLSX.utils.table_to_book(table, { sheet: "Donasi" });
    let wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
    saveAs(new Blob([wbout], { type: "application/octet-stream" }), 'donasi_terverifikasi.xlsx');
}
</script>
</x-app-layout>
