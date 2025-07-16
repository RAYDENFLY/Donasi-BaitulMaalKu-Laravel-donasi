<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <section class="flex flex-col sm:flex-row gap-4 mb-6">
                <div class="bg-white rounded-xl p-6 flex-1 max-w-xs sm:max-w-none" style="min-width: 220px">
                    <p class="text-gray-600 text-sm mb-1">Total Donasi</p>
                    <h2 class="text-2xl font-extrabold mb-2">Rp {{ number_format($totalDonasiBerhasil, 0, ',', '.') }}</h2>
                    <p class="text-green-500 text-sm">
                        {{ $persentaseKenaikan }}% dari bulan lalu
                    </p>

                </div>
                <div class="bg-white rounded-xl p-6 flex-1 max-w-xs sm:max-w-none" style="min-width: 220px">
                    <p class="text-gray-600 text-sm mb-1">Total Program</p>
                    <h2 class="text-2xl font-extrabold mb-2">{{ $totalProgram }}</h2>
                    <p class="text-green-500 text-sm">{{ $persentaseProgram }}% dari bulan lalu</p>

                </div>
                <div class="bg-white rounded-xl p-6 flex-1 max-w-xs sm:max-w-none" style="min-width: 220px">
                    <p class="text-gray-600 text-sm mb-1">Total Donatur</p>
                    <h2 class="text-2xl font-extrabold mb-2">{{ number_format($totalDonatur, 0, ',', '.') }}</h2>
                    <p class="text-green-500 text-sm">{{ $persentaseDonatur }}% dari bulan lalu</p>
                </div>

            </section>

            <section class="flex flex-col lg:flex-row gap-4">
                <!-- Tren Donasi -->
                <div class="bg-white rounded-xl p-4 shadow-md flex-1" style="min-width: 320px; height: 340px;">
                    <h2 class="font-bold text-gray-800 mb-4">Tren Donasi & Zakat</h2>
                    <canvas id="donationChart" class="w-full h-full"></canvas>
                </div>

            </section>


        </div>
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('donationChart');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($donationLabels) !!},
                    datasets: [{
                        label: 'Donasi & Zakat (Rp)',
                        data: {!! json_encode($donationData) !!},
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
        </script>

    </div>
</x-app-layout>
