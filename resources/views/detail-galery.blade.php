@extends('layouts.app_user')

@section('title', 'Detail Lukisan')

@section('content')

<style>
  .detail-container {
    max-width: 1100px;
    margin: 50px auto;
    padding: 40px;
    background: linear-gradient(to bottom right, #f9fafb, #e0f2fe);
    border-radius: 24px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
  }

  .detail-image {
    width: 100%;
    height: 100%;
    border-radius: 20px;
    object-fit: cover;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    transition: transform 0.4s ease;
  }

  .detail-image:hover {
    transform: scale(1.05);
  }

  .detail-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .detail-title {
    font-size: 2.8rem;
    font-weight: 900;
    color: #1d4ed8;
    margin-bottom: 15px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
  }

  .detail-meta, .detail-pelukis {
    color: #475569;
    font-size: 1.1rem;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
  }

  .detail-meta i, .detail-pelukis i {
    margin-right: 10px;
    color: #2563eb;
  }

  .detail-category {
    background: #bfdbfe;
    color: #1e40af;
    font-size: 1rem;
    font-weight: 700;
    padding: 8px 18px;
    border-radius: 16px;
    display: inline-block;
    margin: 12px 0 20px;
    box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
  }

  .detail-desc {
    margin-top: 25px;
    font-size: 1.15rem;
    line-height: 1.9;
    color: #334155;
  }

  .extra-info {
    margin-top: 35px;
    background: #fff;
    padding: 25px 30px;
    border-radius: 18px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.07);
  }

  .extra-info ul {
    padding-left: 25px;
  }

  .extra-info li {
    margin-bottom: 14px;
    font-weight: 600;
    color: #1e293b;
  }

  .btn-back, .btn-beli {
    margin-top: 40px;
    display: inline-block;
    padding: 14px 28px;
    border-radius: 16px;
    text-decoration: none;
    font-weight: 700;
    box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    transition: background 0.4s ease, transform 0.2s ease;
    user-select: none;
  }

  .btn-back {
    background: #3b82f6;
    color: white;
    margin-right: 20px;
  }

  .btn-back:hover {
    background: #1e40af;
    transform: scale(1.05);
  }

  .btn-beli {
    background: #10b981;
    color: white;
  }

  .btn-beli:hover {
    background: #047857;
    transform: scale(1.05);
  }

  .star-rating {
    font-size: 2.4rem;
    color: #ddd;
    cursor: pointer;
    margin-top: 25px;
    user-select: none;
  }

  .star-rating .bi-star-fill {
    color: gold;
    filter: drop-shadow(0 0 2px gold);
  }

  /* Section Lukisan Lainnya */
  .other-paintings {
    max-width: 1100px;
    margin: 60px auto 100px;
    padding: 20px 40px;
    background: linear-gradient(135deg, #fef9f0, #e0e7ff);
    border-radius: 24px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.1);
  }

  .other-paintings h3 {
    font-size: 2.4rem;
    color: #1e40af;
    margin-bottom: 30px;
    font-weight: 800;
    text-align: center;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.12);
  }

  .painting-list {
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(240px,1fr));
    gap: 30px;
  }

  .painting-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    overflow: hidden;
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .painting-card:hover {
    transform: translateY(-8px);
  }

  .painting-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid #e2e8f0;
  }

  .painting-info {
    padding: 15px 20px;
    flex-grow: 1;
  }

  .painting-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2563eb;
    margin-bottom: 8px;
  }

  .painting-category {
    font-size: 0.95rem;
    font-weight: 600;
    color: #4b5563;
    margin-bottom: 15px;
  }

  .btn-beli-painting {
    display: block;
    margin: 0 20px 20px 20px;
    padding: 12px 20px;
    background: #2563eb;
    color: white;
    text-align: center;
    border-radius: 12px;
    font-weight: 600;
    box-shadow: 0 6px 18px rgba(37, 99, 235, 0.45);
    transition: background 0.3s ease;
    text-decoration: none;
  }

  .btn-beli-painting:hover {
    background: #1e40af;
  }

  @media (max-width: 768px) {
    .detail-container {
      grid-template-columns: 1fr;
      padding: 20px;
    }
    .detail-title {
      font-size: 2rem;
    }
    .other-paintings {
      padding: 20px;
    }
  }
</style>

<div class="detail-container">
  <div>
    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="detail-image">
  </div>

  <div class="detail-info">
    <span class="detail-category"><i class="bi bi-tags"></i> {{ $galeri->kategori }}</span>

    <h1 class="detail-title">{{ $galeri->judul }}</h1>

    <p class="detail-meta"><i class="bi bi-calendar-event"></i> Ditambahkan: {{ $galeri->created_at->format('d M Y') }}</p>
    
    <p class="detail-pelukis"><i class="bi bi-brush"></i> Karya oleh: <strong>{{ $galeri->pelukis }}</strong></p>

    <p class="detail-desc">Deskripsi: {{ $galeri->deskripsi }}</p>

    <div class="extra-info">
      <h5>Informasi Tambahan:</h5>
      <ul>
        <li>Ukuran: -</li>
        <li>Medium: Cat air di canvas</li>
        <li>Status: <span style="color: green; font-weight: 600;">Open Order</span></li>
        <li>Harga: <strong>-</strong></li>
      </ul>
    </div>

    <div style="margin-top: 20px;">
      <a href="{{ route('galery') }}" class="btn-back"><i class="bi bi-arrow-left"></i> Kembali ke Galeri</a>
      
      <a href="https://wa.me/087768849737?text=Saya%20ingin%20membeli%20lukisan%20{{ urlencode($galeri->judul) }}" target="_blank" class="btn-beli"><i class="bi bi-cart3"></i> Pesan Lukisan Ini Melalui Whattsap</a>
    </div>

    {{-- Rating Interaktif --}}
    <h5 style="margin-top: 30px;">Beri Rating Lukisan Ini:</h5>
    <div class="star-rating" id="starRating">
      @for ($i = 1; $i <= 5; $i++)
        <i class="bi bi-star" data-value="{{ $i }}"></i>
      @endfor
    </div>
    <p id="ratingResult" style="margin-top: 10px; color: #10b981; font-weight: bold;"></p>
  </div>
</div>



<script>
  // Script rating bintang interaktif sederhana
  const stars = document.querySelectorAll('#starRating i');
  const ratingResult = document.getElementById('ratingResult');
  let selectedRating = 0;

  stars.forEach(star => {
    star.addEventListener('mouseover', () => {
      const val = star.getAttribute('data-value');
      highlightStars(val);
    });
    star.addEventListener('mouseout', () => {
      highlightStars(selectedRating);
    });
    star.addEventListener('click', () => {
      selectedRating = star.getAttribute('data-value');
      ratingResult.textContent = `Anda memberikan rating ${selectedRating} bintang. Terima kasih!`;
    });
  });

  function highlightStars(rating) {
    stars.forEach(star => {
      if(star.getAttribute('data-value') <= rating) {
        star.classList.remove('bi-star');
        star.classList.add('bi-star-fill');
      } else {
        star.classList.remove('bi-star-fill');
        star.classList.add('bi-star');
      }
    });
  }
</script>

@endsection
