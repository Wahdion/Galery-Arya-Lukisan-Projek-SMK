@extends('layouts.app_user')

@section('content')

<style>
  html, body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    font-family: 'Poppins', sans-serif;
    background: from-indigo-50 to-white;
  }

  .title {
    text-align: center;
    margin: 40px 0 30px;
  }

  .title p {
    font-size: 2.4rem;
    font-weight: 700;
    color: #2563eb;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    position: relative;
    display: inline-block;
    padding-bottom: 8px;
  }

  /* Underline accent */
  .title p::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: #3b82f6;
    border-radius: 2px;
  }

  .search-filter {
    background: #ffffff;
    padding: 24px 20px;
    border-radius: 24px;
    box-shadow: 0 12px 32px rgba(59, 130, 246, 0.15);
    margin-bottom: 40px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    align-items: center;
    justify-content: center;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
  }

  .search-filter select {
    flex: 1 1 200px;
    padding: 14px 18px;
    border: 2px solid #93c5fd;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .search-filter select:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.3);
    outline: none;
  }

  .search-filter .btn-action,
  .btn-reset {
    background-color: #2563eb;
    color: white;
    padding: 14px 28px;
    border-radius: 14px;
    font-weight: 600;
    font-size: 1rem;
    border: none;
    cursor: pointer;
    transition: 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
  }

  .search-filter .btn-action:hover,
  .btn-reset:hover {
    background-color: #1e40af;
    box-shadow: 0 6px 18px rgba(30, 64, 175, 0.6);
    transform: scale(1.05);
  }

  .btn-reset {
    background-color: #e0e7ff;
    color: #1e40af;
    padding: 14px 24px;
    font-weight: 600;
    box-shadow: none;
  }

  .btn-reset:hover {
    background-color: #c7d2fe;
    color: #1e3a8a;
  }

  .gallery-stats {
    text-align: right;
    font-size: 1rem;
    color: #4b5563;
    margin-bottom: 20px;
    font-style: italic;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
  }

  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    max-width: 1100px;
    margin: 0 auto 60px;
    padding: 0 15px;
  }

  .card-gallery {
    background-color: white;
    border-radius: 24px;
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.07);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    cursor: pointer;
  }

  .card-gallery:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    z-index: 10;
  }

  .card-gallery img {
    width: 120%;
    height: 220px;
    object-fit: contain;
    border-bottom: 1px solid #e5e7eb;
    transition: transform 0.4s ease;
  }

  .card-gallery:hover img {
    transform: scale(1.05);
  }

  .card-gallery .content {
    padding: 22px 24px 28px;
  }

  .card-gallery h3 {
    font-size: 1.35rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 8px;
    transition: color 0.3s ease;
  }

  .card-gallery h3:hover {
    color: #2563eb;
  }

  .card-gallery p {
    font-size: 1rem;
    color: #4b5563;
    margin: 6px 0;
  }

  .card-gallery .deskripsi {
    color: #374151;
    font-size: 0.95rem;
    margin-top: 10px;
    line-height: 1.5;
    min-height: 70px;
  }

  .no-data {
    text-align: center;
    color: #9ca3af;
    font-style: italic;
    font-weight: 600;
    margin-top: 80px;
    font-size: 1.3rem;
  }

  .pagination {
    display: flex;
    justify-content: center;
    margin-bottom: 80px;
  }

  /* Additional decorative elements */
  body::before {
    content: '';
    position: fixed;
    top: -80px;
    left: -80px;
    width: 180px;
    height: 180px;
    background: radial-gradient(circle at center, #3b82f6, transparent 70%);
    border-radius: 50%;
    opacity: 0.2;
    z-index: 0;
  }

  body::after {
    content: '';
    position: fixed;
    bottom: -100px;
    right: -100px;
    width: 220px;
    height: 220px;
    background: radial-gradient(circle at center, #2563eb, transparent 70%);
    border-radius: 50%;
    opacity: 0.25;
    z-index: 0;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .title p {
      font-size: 1.8rem;
    }

    .search-filter {
      justify-content: center;
    }

    .gallery-grid {
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 24px;
      padding: 0 10px;
    }

    .card-gallery img {
      height: 180px;
    }

    .card-gallery .content {
      padding: 16px 18px 20px;
    }

    .card-gallery h3 {
      font-size: 1.15rem;
    }

    .card-galerry p .teks-detail{
      font-size:0.5 rem;
      font-weight: 100;
    }

    .card-gallery p,
    .card-gallery .deskripsi {
      font-size: 0.9rem;
    }
  }

  @media (max-width: 400px) {
    .search-filter select,
    .search-filter .btn-action,
    .btn-reset {
      flex: 1 1 100%;
      font-size: 0.9rem;
      padding: 12px 18px;
    }
  }
</style>


<!-- Judul -->
<div class="title" data-aos="fade-down" data-aos-duration="800">
  <p>Galery Karya Lukisan</p>
</div>


<!-- Search & Filter -->
<div class="search-filter" role="search" data-aos="fade-up" data-aos-delay="100">
  <form method="GET" action="{{ route('galery') }}" style="width: 100%; display: flex; gap: 16px; flex-wrap: wrap; justify-content: center; align-items: center;">
    
    <div class="alert alert-info shadow-sm mb-3" role="alert" data-aos="fade-right" data-aos-delay="200">
      💡 Silakan lakukan pemfilteran agar kamu mudah dan nyaman melihat berbagai kategori lukisan yang tersedia.
    </div>

    <select name="kategori" aria-label="Filter Kategori Lukisan" class="form-select shadow-sm mb-3" data-aos="fade-right" data-aos-delay="300">
      <option value="">Filter Kategori Lukisan</option>
      @php
        $kategoriList = $galeris->pluck('kategori')->unique();
      @endphp
      @foreach ($kategoriList as $kategori)
        <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
          {{ $kategori }}
        </option>
      @endforeach
    </select>

    <button type="submit" class="btn-action" aria-label="Cari galeri" data-aos="fade-left" data-aos-delay="400">
      <i class="bi bi-search me-1"></i> Cari
    </button>

    @if(request('kategori'))
      <a href="{{ route('galery') }}" class="btn-reset" aria-label="Reset filter kategori" data-aos="fade-left" data-aos-delay="500">
        Reset Filter
      </a>
    @endif
  </form>
</div>

<!-- Stat -->
<div class="gallery-stats" aria-live="polite" aria-atomic="true" data-aos="zoom-in" data-aos-delay="100">
  Total Galeri: <strong>{{ $galeris->total() }}</strong>
</div>

<!-- Konten Galeri -->
@if ($galeris->count() == 0)
  <div class="no-data" role="alert" aria-live="assertive" data-aos="fade-up">
    Tidak ada galeri lukisan ditemukan.
  </div>
@else
  <div class="gallery-grid" role="list">
    @foreach ($galeris as $index => $galeri)
    <article class="card-gallery" role="listitem" tabindex="0" aria-label="Lukisan {{ $galeri->judul }}"
      data-aos="fade-up" data-aos-delay="{{ 100 + ($index % 6) * 100 }}">
      <a href="{{ route('galery.detail', $galeri->id) }}">
    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" />
      <div class="content">
        <h3>{{ $galeri->judul }}</h3>
        <p><strong>Kategori:</strong> {{ $galeri->kategori }}</p>
          <p><strong>Pelukis:</strong> {{ $galeri->pelukis }}</p>
        <p class="deskripsi"><strong>Deskripsi :</strong> {{ \Illuminate\Support\Str::limit($galeri->deskripsi, 120, '...') }}</p>
        <p class="teks-detail"><i>Klik untuk melihat detail lebih lanjut</i></p>
      </div>
       </a>
    </article>
    @endforeach
  </div>
@endif

<!-- Pagination -->
<div class="pagination" role="navigation" aria-label="Pagination Galeri" data-aos="fade-up">
  {{ $galeris->withQueryString()->links() }}
</div>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    once: true, // animasi hanya terjadi sekali saat scroll pertama kali
    duration: 800, // durasi animasi default
  });
</script>

@endsection
