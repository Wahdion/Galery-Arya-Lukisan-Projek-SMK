@extends('layouts.app_user')

@section('content')

<!-- CDN AOS (Animate On Scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script> AOS.init(); </script>

<!-- Hero Section -->
<section id="home" class="pt-20 pb-20 bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{ asset('bg1.jpg') }}');">
  <!-- Overlay gelap semi-transparan agar teks menyatu -->
  <div class="absolute inset-0 bg-black/50"></div>

  <div class="container mx-auto px-4 sm:px-6 md:px-8 text-center relative z-10">
    <div class="p-6 sm:p-10 md:p-14 rounded-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-display text-white mb-1 sm:mb-2">Selamat Datang di</h2>
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-display text-white font-semibold mb-3 sm:mb-4">Gusti Arya Galery Lukisan</h1>
      <p class="text-sm sm:text-base md:text-lg text-gray-200 mb-5 sm:mb-6 max-w-xl sm:max-w-2xl mx-auto">Temukan keindahan lukisan klasik hingga kontemporer dalam koleksi karya seni kami.</p>
      <a href="{{ route('galery') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 sm:px-6 sm:py-3 rounded-full text-xs sm:text-sm md:text-base transition-all duration-300 shadow-md hover:shadow-lg">Lihat Galery</a>
    </div>
  </div>
</section>



<!-- About Section -->
<section id="about" class="py-24 bg-gradient-to-b from-indigo-50 to-white">
  <div class="container mx-auto px-6 md:px-12">
    <div class="text-center mb-16">
      <h3 class="text-4xl font-display text-indigo-700 mb-4" data-aos="fade-up">Tentang Kami</h3>
      <p class="text-gray-700 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Gusti Arya Galery Lukisan adalah ruang bagi para penikmat seni untuk mengeksplorasi keindahan visual dari berbagai pelukis Indonesia maupun mancanegara. Setiap lukisan memiliki jiwa dan cerita tersendiri.</p>
    </div>
    <div class="grid md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="200">
      <div class="p-6 border rounded-xl shadow-md hover:shadow-xl transition">
        <div class="flex items-center mb-4 text-indigo-600">
          <i data-lucide="award" class="w-6 h-6 mr-2"></i>
          <h4 class="text-xl font-semibold">Karya Berkualitas</h4>
        </div>
        <p>Kami menjual lukisan dengan kualitas terjamin yang akan membuat pandangan pembeli menjadi nyaman.</p>
      </div>
      <div class="p-6 border rounded-xl shadow-md hover:shadow-xl transition">
        <div class="flex items-center mb-4 text-indigo-600">
          <i data-lucide="palette" class="w-6 h-6 mr-2"></i>
          <h4 class="text-xl font-semibold">Seniman Profesional</h4>
        </div>
        <p>Seniman lukisa yang sudah profesional di bidang seninya.</p>
      </div>
      <div class="p-6 border rounded-xl shadow-md hover:shadow-xl transition">
  <div class="flex items-center mb-4 text-indigo-600">
    <i data-lucide="map-pin" class="w-6 h-6 mr-2"></i>
    <h4 class="text-xl font-semibold">Lokasi Galeri</h4>
  </div>
  <p>Galeri kami berlokasi di Kota Denpasar, Kecamatan Denpasar Timur, Desa Penatih Dangin Puri, Banjar Laplap Arya.</p>
</div>

</section>

<!-- Lukisan Terfavorit Section -->
<section id="favorites" class="py-24 bg-gradient-to-b from-indigo-50 to-white">
  <div class="container mx-auto px-6 md:px-12">
    <div class="text-center mb-12">
      <h3 class="text-4xl font-display text-indigo-700 mb-4" data-aos="fade-up">Lukisan Terfavorit</h3>
      <p class="text-gray-700 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        Inilah lukisan-lukisan pilihan yang paling banyak disukai pengunjung galeri kami.
      </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="200">

      <!-- Lukisan Favorit 1 -->
      <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:scale-105 active:scale-95 duration-300 overflow-hidden cursor-pointer">
        <div class="w-full h-64 flex items-center justify-center bg-gray-100">
          <img src="storage/galeri/abstrack/abstrak1.jpeg" alt="Lukisan 1" class="max-h-full object-contain">
        </div>
        <div class="p-5">
          <h4 class="text-xl font-semibold text-indigo-700 mb-2">Abstrak</h4>
          <p class="text-gray-600 mb-3">Lukisan ini menggambarkan visual alam dengan bentuk abstrak.</p>
          <span class="inline-block bg-indigo-100 text-indigo-800 px-3 py-1 text-sm rounded-full">❤️ 135 suka</span>
        </div>
      </div>

      <!-- Lukisan Favorit 2 -->
      <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:scale-105 active:scale-95 duration-300 overflow-hidden cursor-pointer">
        <div class="w-full h-64 flex items-center justify-center bg-gray-100">
          <img src="storage/galeri/figure/figure7.jpeg" alt="Lukisan 2" class="max-h-full object-contain">
        </div>
        <div class="p-5">
          <h4 class="text-xl font-semibold text-indigo-700 mb-2">Figure</h4>
          <p class="text-gray-600 mb-3">Lukisan ini menggambarkan 2 orang wanita yang sedang meluapkan rasa kangen kepada saudara perempuannya.</p>
          <span class="inline-block bg-indigo-100 text-indigo-800 px-3 py-1 text-sm rounded-full">❤️ 112 suka</span>
        </div>
      </div>

      <!-- Lukisan Favorit 3 -->
      <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition transform hover:scale-105 active:scale-95 duration-300 overflow-hidden cursor-pointer">
        <div class="w-full h-64 flex items-center justify-center bg-gray-100">
          <img src="storage/galeri/tradisi/tradisi1.jpeg" alt="Lukisan 3" class="max-h-full object-contain">
        </div>
        <div class="p-5">
          <h4 class="text-xl font-semibold text-indigo-700 mb-2">Tradisi</h4>
          <p class="text-gray-600 mb-3">Lukisan ini mengekspresikan kekuatan baik dan buruk dengan mencerminkan dengan warna hitam putih.</p>
          <span class="inline-block bg-indigo-100 text-indigo-800 px-3 py-1 text-sm rounded-full">❤️ 97 suka</span>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- Contact Section -->
<section id="contact" class="py-24 bg-gradient-to-b from-indigo-50 to-white">
  <div class="container mx-auto px-6 md:px-12">
    <div class="text-center mb-12">
      <h3 class="text-4xl font-display text-indigo-700 mb-4" data-aos="fade-up">Hubungi Kami</h3>
      <p class="text-gray-700 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">Ada pertanyaan, ingin memberikan pesan ke pelukis? Kirim pesan Anda melalui form berikut.</p>
    </div>

    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 max-w-2xl mx-auto">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg space-y-5 text-base" data-aos="fade-up" data-aos-delay="200">
  @csrf
  <div>
    <label class="block mb-2 text-gray-700 font-semibold">Nama Anda</label>
    <input type="text" name="name" placeholder="Nama lengkap" required
      class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
  </div>
  <div>
    <label class="block mb-2 text-gray-700 font-semibold">Email</label>
    <input type="email" name="email" placeholder="Alamat email" required
      class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
  </div>
  <div>
    <label class="block mb-2 text-gray-700 font-semibold">Pesan</label>
    <textarea name="message" rows="5" placeholder="Tulis pesan Anda..." required
      class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
  </div>
  <button type="submit"
    class="bg-indigo-700 hover:bg-indigo-800 text-white px-7 py-3 rounded-full transition text-lg font-semibold">Kirim Pesan</button>
</form>


  </div>
</section>

<!-- Lucide Icons Script -->
<script>
  lucide.createIcons();
</script>



@endsection
