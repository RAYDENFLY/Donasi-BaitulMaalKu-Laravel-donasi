<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   BaitulMaalKu - Zakat, Infaq, Sedekah, dan Wakaf, Terpercaya
  </title>

    <meta name="description" content="Donasi zakat, infaq, dan shodaqoh dengan mudah dan aman di BaitulMaalKu. Bantu sesama, raih keberkahan. Lembaga terpercaya dan transparan.">
    <meta name="keywords" content="zakat, donasi online,, donasi, shodaqoh, wakaf, infaq, baitulmaal, sedekah, lembaga zakat terpercaya">
    <meta name="author" content="BaitulMaalKu">
    <meta name="robots" content="index, follow" />
    
    <!-- Mobile Friendly -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://donasi.baitulmaalku.com" />
    
    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="BaitulMaalKu - Donasi Zakat Online Terpercaya" />
    <meta property="og:description" content="Salurkan zakat, infaq, dan wakaf Anda melalui BaitulMaalKu. Amanah, terpercaya, dan mudah." />
    <meta property="og:image" content="https://donasi.baitulmaalku.com/images/logo/bmku.png" />
    <meta property="og:url" content="https://donasi.baitulmaalku.com" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />
    
    
    <!-- Structured Data JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "BaitulMaalKu",
      "url": "https://yourdomain.com",
      "logo": "https://yourdomain.com/images/logo/bmku.png",
      "sameAs": [
        "https://www.facebook.com/baitulmaalku",
        "https://www.instagram.com/baitulmaalku"
      ]
    }
    </script>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.8s cubic-bezier(.4,0,.2,1), transform 0.8s cubic-bezier(.4,0,.2,1);
    }
    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .card-anim {
      transition: box-shadow 0.3s, transform 0.3s;
    }
    .card-anim:hover {
      box-shadow: 0 8px 32px rgba(0,0,0,0.12);
      transform: translateY(-6px) scale(1.03);
    }
  </style>
 </head>
 <body class="bg-white text-black">
  <!-- Header -->
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


  <!-- Hero Section -->
  <section class="bg-[#0089FF] text-white text-center px-6 py-16 md:py-20 fade-in" id="hero-section">
   <h1 class="text-xl md:text-2xl font-bold mb-2">
    Berbagi Kebaikan, Raih Keberkahan
   </h1>
   <p class="text-xs md:text-sm max-w-xl mx-auto mb-6 leading-tight">
    Berbagi Kebaikan, Raih Keberkahan
    <br/>
    Salurkan zakat, infaq, dan shodaqoh Anda untuk membantu sesama dan meraih keberkahan hidup. Bersama kita bisa mengubah lebih banyak kehidupan.
   </p>
   <div class="flex justify-center gap-4">
    <a href="/donasi">
      <button class="bg-white text-cyan-600 font-semibold text-xs md:text-sm rounded-full px-5 py-2 flex items-center gap-1 hover:bg-gray-100 transition">
        Donasi Sekarang
        <i class="fas fa-arrow-right text-xs"></i>
      </button>
    </a>

    <a href="/zakat">
    <button class="border border-white text-white font-semibold text-xs md:text-sm rounded-full px-5 py-2 hover:bg-white hover:text-cyan-600 transition">
     Hitung Zakat
    </button>
    </a>
   </div>
  </section>
  <!-- Kategori Program Centered single row -->
  <section class="px-6 py-10 max-w-7xl mx-auto text-center fade-in" id="kategori-section">
   <h2 class="font-semibold text-base md:text-lg mb-1">
    Kategori Program
   </h2>
   <p class="text-xs md:text-sm mb-6 max-w-md mx-auto">
    Pilih kategori program yang sesuai dengan niat donasi Anda
   </p>
   <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 justify-center">
   <div class="border border-gray-200 p-4 flex flex-col items-center rounded-lg shadow-sm w-full max-w-[140px] md:max-w-none mx-auto card-anim">
     <i class="fas fa-book-open text-[#0089FF] text-4xl mb-3"></i>
     <div class="font-semibold text-sm mb-1">
      Pendidikan
     </div>
     <div class="text-xs text-gray-600">
      Bantuan biaya pendidikan
     </div>
    </div>
    <div class="border border-gray-200 p-4 flex flex-col items-center rounded-lg shadow-sm w-full max-w-[140px] md:max-w-none mx-auto card-anim">
     <i class="fas fa-heartbeat text-[#0089FF] text-4xl mb-3"></i>
     <div class="font-semibold text-sm mb-1">
      Kesehatan
     </div>
     <div class="text-xs text-gray-600">
      Bantuan biaya pendidikan
     </div>
    </div>
    <div class="border border-gray-200 p-4 flex flex-col items-center rounded-lg shadow-sm w-full max-w-[140px] md:max-w-none mx-auto card-anim">
     <i class="fas fa-building text-[#0089FF] text-4xl mb-3"></i>
     <div class="font-semibold text-sm mb-1">
      Pembangunan
     </div>
     <div class="text-xs text-gray-600">
      Infrastruktur dan fasilitas
     </div>
    </div>
    <div class="border border-gray-200 p-4 flex flex-col items-center rounded-lg shadow-sm w-full max-w-[140px] md:max-w-none mx-auto card-anim">
     <i class="fas fa-pray text-[#0089FF] text-4xl mb-3"></i>
     <div class="font-semibold text-sm mb-1">
      Dakwah
     </div>
     <div class="text-xs text-gray-600">
      Penyebaran nilai-nilai Islam
     </div>
    </div>
    <div class="border border-gray-200 p-4 flex flex-col items-center rounded-lg shadow-sm w-full max-w-[140px] md:max-w-none mx-auto card-anim">
     <i class="fas fa-hands-helping text-[#0089FF] text-4xl mb-3"></i>
     <div class="font-semibold text-sm mb-1">
      Sosial
     </div>
     <div class="text-xs text-gray-600">
      Bantuan untuk masyarakat
     </div>
    </div>
    <div class="border border-gray-200 p-4 flex flex-col items-center rounded-lg shadow-sm w-full max-w-[140px]  md:max-w-none mx-auto card-anim">
     <i class="fas fa-globe-americas text-[#0089FF] text-4xl mb-3"></i>
     <div class="font-semibold text-sm mb-1">
      Kemanusiaan
     </div>
     <div class="text-xs text-gray-600">
      Bantuan bencana dan kemanusiaan
     </div>
    </div>
   </div>
  </section>
  <!-- Program Pilihan -->
    <section class="px-6 md:px-20 max-w-7xl mx-auto fade-in" id="program-section">
    <div class="flex justify-between items-center mb-4">
        <div>
        <h3 class="font-semibold text-base md:text-lg">
            Program Pilihan
        </h3>
        <p class="text-xs md:text-sm">
            Pilih program yang ingin Anda dukung
        </p>
        </div>
        <a class="text-xs md:text-sm hover:underline hover:text-[#0089FF]" href="/donasi">
        Lihat Semua→
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        @forelse($programs as $program)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden card-anim">
            <img
              alt="{{ $program->judul }}"
              class="w-full h-48 object-cover"
              src="{{ $program->gambar ? asset('storage/' . $program->gambar) : 'https://via.placeholder.com/600x300?text=No+Image' }}"
              loading="lazy"
            />
            <div class="p-3 text-xs md:text-sm">
            <div class="font-semibold mb-1">
                {{ $program->judul }}
            </div>
            <p class="mb-2 leading-tight">
                {{ Str::limit($program->deskripsi, 100) }}
            </p>
            <div class="text-[9px] text-gray-500 mb-2">
                Terkumpul s.d Rp {{ number_format($program->terkumpul, 0, ',', '.') }}
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mb-3">
                @php
                $progress = $program->target > 0 ? ($program->terkumpul / $program->target) * 100 : 0;
                @endphp
                <div class="bg-[#0089FF] h-1.5 rounded-full" style="width: {{ min($progress, 100) }}%;"></div>
            </div>
            <a href="{{ route('program.show', $program->id) }}" 
              class="block text-center w-full bg-[#0089FF] text-white text-xs md:text-sm font-semibold rounded-md py-1.5 hover:bg-cyan-700 transition">
                Donasi Sekarang
            </a>

            </div>
        </div>
        @empty
        <p class="col-span-3 text-center text-gray-500">Belum ada program tersedia.</p>
        @endforelse
    </div>
    </section>

  <!-- Kalkulator Zakat -->
<section class="bg-[#f0f9ff] text-center py-12 px-6 rounded-xl max-w-7xl mx-auto my-10 shadow-md">
  <h3 class="text-lg md:text-xl font-bold text-[#0089FF] mb-3">
    Tunaikan Zakatmu Hari Ini
  </h3>
  <p class="text-sm md:text-base text-gray-700 mb-6 max-w-md mx-auto">
    Mari wujudkan kepedulian dan keberkahan dengan menunaikan zakat. Hitung zakatmu sekarang, dan salurkan dengan mudah.
  </p>
  <a href="http://127.0.0.1:8000/zakat" target="_blank"
     class="inline-block bg-[#0089FF] text-white px-8 py-3 rounded-full text-sm font-semibold hover:bg-cyan-700 transition">
    Hitung & Bayar Zakat
  </a>
</section>


  <!-- Dampak Donasi Anda -->
  <section class="px-6 md:px-20 max-w-7xl mx-auto py-10">
   <h3 class="font-semibold text-base md:text-lg text-center mb-1">
    Dampak Donasi Anda
   </h3>
   <p class="text-xs md:text-sm text-center mb-6 max-w-mt mx-auto ">
    Donasi yang Anda berikan telah membantu ribuan orang di seluruh Indonesia
   </p>
   <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-5xl mx-auto text-center text-xs md:text-sm">
    <div class="border border-gray-200 p-4 rounded flex flex-col items-center shadow-sm hover:shadow-md transition">
     <i class="fas fa-graduation-cap text-[#0089FF] text-4xl mb-2"></i>
     <div class="font-semibold text-lg md:text-xl mb-1">
      25.000
     </div>
     <div class="font-semibold">
      Pendidikan
     </div>
     <div class="text-gray-600">
      Bantuan biaya pendidikan
     </div>
    </div>
    <div class="border border-gray-200 p-4 rounded flex flex-col items-center shadow-sm hover:shadow-md transition">
     <i class="fas fa-stethoscope  text-[#0089FF] text-4xl mb-2"></i>
     <div class="font-semibold text-lg md:text-xl mb-1">
      120
     </div>
     <div class="font-semibold">
      Kesehatan
     </div>
     <div class="text-gray-600">
      Bantuan biaya pendidikan
     </div>
    </div>
    <div class="border border-gray-200 p-4 rounded flex flex-col items-center shadow-sm hover:shadow-md transition">
     <i class="fas fa-users  text-[#0089FF] text-4xl mb-2"></i>
     <div class="font-semibold text-lg md:text-xl mb-1">
      45.000+
     </div>
     <div class="font-semibold">
      Donatur Aktif
     </div>
     <div class="text-gray-600">
      Orang baik yang telah berkontribusi untuk program-program kami.
     </div>
    </div>
    <div class="border border-gray-200 p-4 rounded flex flex-col items-center shadow-sm hover:shadow-md transition">
     <i class="fas fa-map-marked-alt  text-[#0089FF] text-4xl mb-2"></i>
     <div class="font-semibold text-lg md:text-xl mb-1">
      350
     </div>
     <div class="font-semibold">
      Desa Terjangkau
     </div>
     <div class="text-gray-600">
      Desa-desa di seluruh Indonesia yang telah terjangkau oleh program kami.
     </div>
    </div>
   </div>
  </section>
  <!-- Testimoni -->
 @if($testimonis->count())
<section class="px-6 md:px-20 max-w-4xl mx-auto py-10">
  <h3 class="font-semibold text-base md:text-lg text-center mb-1">
    Testimoni
  </h3>
  <p class="text-xs md:text-sm text-center mb-6 max-w-md mx-auto">
    Apa kata mereka tentang program dan layanan kami
  </p>

  @foreach ($testimonis as $testimoni)
  <div class="bg-white rounded-lg shadow-md p-6 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 mb-6">
    <img class="w-20 h-20 rounded-full object-cover" src="{{ asset('storage/' . $testimoni->image) }}" alt="Foto {{ $testimoni->name }}" />
    <div class="text-xs md:text-sm flex-1">
      <p class="mb-2 italic text-gray-600">{{ $testimoni->text }}</p>
      <div class="font-semibold">{{ $testimoni->name }}</div>
      <div class="text-[#0089FF] text-xs md:text-sm">{{ $testimoni->role }}</div>
    </div>
  </div>
  @endforeach
</section>
@endif


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
   function calculateZakat() {
      const pendapatanInput = document.getElementById('jumlahPendapatan');
      const hasilNominal = document.getElementById('hasilNominal');
      let pendapatan = parseFloat(pendapatanInput.value);
      if (isNaN(pendapatan) || pendapatan <= 0) {
        hasilNominal.textContent = 'Rp. 0';
        return;
      }
      // Calculate zakat 2.5%
      let zakat = pendapatan * 0.025;
      // Format as Indonesian Rupiah
      hasilNominal.textContent = 'Rp. ' + zakat.toLocaleString('id-ID');
    }

    document.getElementById('resetBtn').addEventListener('click', () => {
      document.getElementById('jumlahPendapatan').value = '';
      document.getElementById('hasilNominal').textContent = 'Rp. 0';
    });
  </script>

  <script>
  const testimonials = [
    {
      text: `"Beasiswa yang saya terima telah mengubah hidup saya. Sekarang saya bisa fokus kuliah tanpa memikirkan biaya. Semoga Allah membalas kebaikan para donatur yang telah membantu saya meraih cita-cita."`,
      name: "Siti Aisyah",
      role: "Penerima Beasiswa",
      img: "https://storage.googleapis.com/a1aa/image/bb108bfc-445c-453f-c40e-fcbcf476a7f8.jpg"
    },
    {
      text: `"Program ini sangat membantu saya dalam mengembangkan kemampuan. Terima kasih kepada semua pihak yang telah mendukung."`,
      name: "Ahmad Zulfikar",
      role: "Alumni Program",
      img: "https://storage.googleapis.com/a1aa/image/sample-1.jpg"
    },
    {
      text: `"Saya sangat bersyukur bisa menjadi bagian dari program ini. Pengalaman dan manfaatnya luar biasa."`,
      name: "Nurul Hidayati",
      role: "Mahasiswi Aktif",
      img: "https://storage.googleapis.com/a1aa/image/sample-2.jpg"
    }
  ];

  let currentIndex = 0;

  function updateTestimonial(index) {
    const testimonial = testimonials[index];
    document.querySelector("#testimonial-text").textContent = testimonial.text;
    document.querySelector("#testimonial-name").textContent = testimonial.name;
    document.querySelector("#testimonial-role").textContent = testimonial.role;
    document.querySelector("#testimonial-img").src = testimonial.img;

    // Update indicator dots
    document.querySelectorAll(".dot").forEach((dot, i) => {
      dot.classList.toggle("bg-[#0089FF]", i === index);
      dot.classList.toggle("bg-gray-400", i !== index);
    });
  }

  document.querySelector("#next-btn").addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % testimonials.length;
    updateTestimonial(currentIndex);
  });

  document.querySelector("#prev-btn").addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
    updateTestimonial(currentIndex);
  });

  // Initial render
  updateTestimonial(currentIndex);
</script>

<script>
  const toggle = document.getElementById("menu-toggle");
  const menu = document.getElementById("menu");

  toggle.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });
</script>

<script>
  // Fade-in animation on load
  document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
      document.getElementById('hero-section').classList.add('visible');
    }, 100);
    setTimeout(function() {
      document.getElementById('kategori-section').classList.add('visible');
    }, 400);
    setTimeout(function() {
      document.getElementById('program-section').classList.add('visible');
    }, 700);
  });
</script>

 </body>
</html>
