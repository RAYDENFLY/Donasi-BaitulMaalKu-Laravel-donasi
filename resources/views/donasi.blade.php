<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Program Pilihan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: "Inter", sans-serif;
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


<section class="bg-[#0089FF] py-12 px-6">
  <div class="max-w-[1200px] mx-auto">
    <h1 class="text-white font-extrabold text-3xl mb-3">Program Pilihan</h1>
    <p class="text-white text-sm max-w-[600px] mb-4">
      Pilih program yang sesuai dengan niat donasi Anda. Setiap donasi akan membantu mereka yang membutuhkan dan membawa keberkahan.
    </p>
  </div>
</section>

<section class="max-w-[1200px] mx-auto px-6 -mt-10">
  <form action="{{ route('donasi.index') }}" class="bg-white rounded-xl shadow-lg flex flex-col sm:flex-row items-center gap-4 p-4" method="GET">
    <label class="sr-only" for="search">Cari Program</label>
    <div class="flex items-center flex-1 border border-gray-400 rounded-lg px-4 py-2">
      <i class="fas fa-search text-lg mr-2"></i>
      <input class="w-full outline-none text-sm" id="search" name="search" placeholder="Cari Program" type="text"/>
    </div>
    <label class="sr-only" for="sort">Sort</label>
    <select class="border border-gray-400 rounded-lg px-4 py-2 text-sm cursor-pointer w-[160px]" id="sort" name="sort">
      <option value="terbaru">Terbaru</option>
      <option value="terlama">Terlama</option>
    </select>
        @php
        $wilayah = config('wilayah');
    @endphp
  </form>
</section>

<section class="max-w-[1200px] mx-auto px-6 mt-8">
<nav class="flex flex-wrap gap-4 text-sm font-normal mb-8">
    <a href="{{ route('donasi.index') }}"
       class="px-4 py-2 rounded border {{ request('kategori') ? 'border-gray-300 text-gray-700 bg-white' : 'border-[#0089FF] text-[#0089FF] bg-white' }}">
        Semua
    </a>
    @foreach (['Pendidikan', 'Kesehatan', 'Pembangunan', 'Sosial', 'Dakwah', 'Kemanusiaan'] as $kategori)
        <a href="{{ route('donasi.index', ['kategori' => $kategori]) }}" 
           class="px-4 py-2 rounded border {{ request('kategori') === $kategori ? 'border-[#0089FF] text-[#0089FF] bg-white' : 'border-gray-300 text-gray-700 bg-white' }}">
            {{ $kategori }}
        </a>
    @endforeach
</nav>




  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
    @forelse ($programs as $program)
      <article class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
        <img
          alt="{{ $program->judul }}"
          class="w-full h-48 object-cover"
          src="{{ $program->gambar ? asset('storage/' . $program->gambar) : 'https://via.placeholder.com/600x300?text=No+Image' }}"
          loading="lazy"
        />
        <div class="p-4 flex flex-col flex-1">
          <span class="inline-block bg-[#0089FF]/30 text-[#0089FF] text-xs rounded-full px-2 py-0.5 mb-2 w-max">
            {{ ucfirst($program->kategori ?? 'Pembangunan') }}
          </span>
          <h2 class="font-bold text-sm leading-tight mb-1">
            {{ $program->judul }}
          </h2>
          <p class="text-[10px] mb-3 leading-tight">
            {{ Str::limit($program->deskripsi, 80) }}
          </p>

          @php
            // Hitung persen donasi, asumsikan ada kolom 'terkumpul' di tabel atau fungsi untuk hitung total donasi
            $target = $program->target;
            $terkumpul = $program->terkumpul ?? 0; // sesuaikan dengan data kamu
            $percent = $target > 0 ? min(100, round(($terkumpul / $target) * 100)) : 0;
          @endphp

          <div class="mb-2">
            <div class="w-full bg-gray-300 rounded-full h-2.5">
              <div class="bg-[#0089FF] h-2.5 rounded-full" style="width: {{ $percent }}%"></div>
            </div>
          </div>

          <p class="text-[9px] text-gray-600 mb-4">
            Terkumpul: Rp {{ number_format($terkumpul, 0, ',', '.') }}
            <span class="float-right">{{ $percent }}%</span>
          </p>

          <a href="{{ route('program.show', $program->id) }}" class="bg-[#0089FF] text-white text-sm rounded-md py-2 mt-auto hover:bg-[#0077e6] transition text-center">
            Donasi Sekarang
          </a>
        </div>
      </article>
    @empty
      <p class="text-center col-span-3">Belum ada program donasi aktif.</p>
    @endforelse
  </div>
</section>


<script>
    const wilayah = @json(config('wilayah'));
    const provinsiSelect = document.getElementById('provinsi-select');
    const kotaSelect = document.getElementById('kota-select');

    provinsiSelect.addEventListener('change', function () {
        const selectedProvinsi = this.value;
        kotaSelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';

        if (selectedProvinsi && wilayah[selectedProvinsi]) {
            wilayah[selectedProvinsi].forEach(kota => {
                const option = document.createElement('option');
                option.value = kota;
                option.textContent = kota;
                kotaSelect.appendChild(option);
            });
            kotaSelect.disabled = false;
        } else {
            kotaSelect.disabled = true;
        }
    });

    // Jika kembali dari pencarian dan kota sudah ada, isi ulang
    document.addEventListener('DOMContentLoaded', function () {
        const selectedProvinsi = provinsiSelect.value;
        const selectedKota = "{{ request('lokasi') }}";
        if (selectedProvinsi && wilayah[selectedProvinsi]) {
            wilayah[selectedProvinsi].forEach(kota => {
                const option = document.createElement('option');
                option.value = kota;
                option.textContent = kota;
                if (kota === selectedKota) {
                    option.selected = true;
                }
                kotaSelect.appendChild(option);
            });
            kotaSelect.disabled = false;
        }
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
</body>
</html>
