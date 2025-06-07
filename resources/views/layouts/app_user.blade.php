<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gusti Arya Galery Lukisan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    html { scroll-behavior: smooth; }
    .font-display { font-family: 'Playfair Display', serif; }
    .font-body { font-family: 'Open Sans', sans-serif; }
  </style>
</head>
<body class="bg-white text-gray-800 font-body">

  <!-- Navbar -->
  <header class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
      <!-- Logo -->
      <div class="flex items-center gap-3">
        <h1 class="text-2xl font-display text-indigo-700"> Gusti Arya Galery</h1>
      </div>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex space-x-6 items-center text-[16px]">
        <a href="{{ route('galeri.user') }}" class="hover:text-indigo-600 font-semibold flex items-center gap-2">
          <i data-lucide="home" class="w-5 h-5"></i> Beranda
        </a>
        <a href="{{ route('galery') }}" class="hover:text-indigo-600 font-semibold flex items-center gap-2">
          <i data-lucide="image" class="w-5 h-5"></i> Galery
        </a>
        @if (!Route::is('galery') && !Route::is('galery.detail'))
    <a href="#about" class="hover:text-indigo-600 font-semibold flex items-center gap-2">
      <i data-lucide="info" class="w-5 h-5"></i> Tentang
    </a>
    <a href="#contact" class="hover:text-indigo-600 font-semibold flex items-center gap-2">
      <i data-lucide="mail" class="w-5 h-5"></i> Kontak
    </a>
  @endif

      </nav>

      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button id="menu-toggle" class="text-gray-700 focus:outline-none">
          <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-6 pb-4 space-y-2">
      <a href="{{ route('galeri.user') }}" class="hover:text-indigo-600 font-semibold block flex items-center gap-2">
        <i data-lucide="home" class="w-5 h-5"></i> Beranda
      </a>
      <a href="{{ route('galery') }}" class="hover:text-indigo-600 font-semibold block flex items-center gap-2">
        <i data-lucide="image" class="w-5 h-5"></i> Galery
      </a>
      @if (!Route::is('galery') && !Route::is('galery.detail'))
    <a href="#about" class="hover:text-indigo-600 font-semibold flex items-center gap-2">
      <i data-lucide="info" class="w-5 h-5"></i> Tentang
    </a>
    <a href="#contact" class="hover:text-indigo-600 font-semibold flex items-center gap-2">
      <i data-lucide="mail" class="w-5 h-5"></i> Kontak
    </a>
  @endif

    </div>
  </header>

  <!-- Main Content -->
  <main class="pt-24">
    @yield('content')
  </main>

  <!-- Footer -->
 <footer class="relative bg-gradient-to-r from-indigo-900 via-indigo-800 to-indigo-700 text-white py-16 mt-20 border-t border-indigo-600 shadow-xl overflow-hidden">
  <!-- Subtle background pattern -->
  <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top_left,_var(--tw-gradient-stops))] from-indigo-600 via-indigo-700 to-indigo-900 pointer-events-none"></div>

  <div class="relative max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 grid md:grid-cols-3 gap-16 text-center md:text-left">

    <!-- Brand Info -->
    <div class="space-y-6 z-10">
      <h3 class="text-3xl font-extrabold tracking-wide drop-shadow-md">Gusti Arya Galery Lukisan</h3>
      <p class="text-indigo-200 leading-relaxed max-w-md mx-auto md:mx-0 drop-shadow-sm">
        Menampilkan karya seni lukis terbaik dari para seniman berbakat.<br>
        Jelajahi dan nikmati keindahan seni visual yang penuh inspirasi.
      </p>
      <p class="text-indigo-300 tracking-widest font-semibold">&copy; 2025 All rights reserved.</p>
      <p class="text-indigo-400 italic">Selalu Ready Via Whattsap</p>
    </div>

    <!-- Social Media & Contacts -->
    <div class="z-10">
      <h3 class="text-2xl font-semibold tracking-wide mb-8">Kontak & Sosial Media</h3>
      <ul class="space-y-6 text-indigo-100 max-w-xs mx-auto md:mx-0">
        <li>
          <a href="https://wa.me/087768849737" target="_blank" class="flex items-center gap-4 hover:text-green-400 transition duration-300">
            <img src="https://img.icons8.com/ios-filled/28/00e676/whatsapp.png" alt="WhatsApp" class="w-7 h-7"/>
            <span class="text-lg font-medium">+62 877 688 49737</span>
          </a>
        </li>
        <li>
          <a href="https://facebook.com/Gustiarya" target="_blank" class="flex items-center gap-4 hover:text-blue-500 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-current" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.5 9.87v-6.98h-2.17v-2.9h2.17v-2.2c0-2.15 1.28-3.34 3.22-3.34.93 0 1.9.17 1.9.17v2.08h-1.07c-1.05 0-1.37.65-1.37 1.31v1.58h2.33l-.37 2.9h-1.96v6.98A10 10 0 0 0 22 12z"/></svg>
            <span class="text-lg font-medium">Gustiarya</span>
          </a>
        </li>
        <li>
          <a href="https://instagram.com/gunkaryaa" target="_blank" class="flex items-center gap-4 hover:text-pink-500 transition duration-300">
            <img src="https://img.icons8.com/ios-filled/28/ff2d55/instagram-new.png" alt="Instagram" class="w-7 h-7"/>
            <span class="text-lg font-medium">@gunkaryaa</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Google Maps -->
    <div class="overflow-hidden rounded-3xl shadow-2xl border border-indigo-700 transition-shadow duration-300 hover:shadow-indigo-800/60 max-w-full mx-auto z-10">
      <h3 class="text-xl font-semibold tracking-wide mb-6 px-8 pt-8 text-indigo-100 drop-shadow-sm">Lokasi Gusti Arya Galery</h3>
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.7562571200474!2d115.24556467413497!3d-8.619383587584885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23fb6bffeb2f5%3A0xfc070dfbf35e7d4e!2sGang%20Pole!5e0!3m2!1sen!2sid!4v1747788780129!5m2!1sen!2sid" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade" 
        title="Lokasi Gusti Arya Galery Lukisan"
        class="w-full aspect-[16/9] rounded-b-3xl"
      ></iframe>
    </div>

  </div>

  <!-- Floating WhatsApp Button -->
  
</footer>

</div>


    </div>
  </div>
</footer>



  <!-- Scripts -->
  <script>
    lucide.createIcons();

    const toggleBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    toggleBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>
