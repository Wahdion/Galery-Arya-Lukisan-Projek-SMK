@extends('layouts.app')

<header class="dashboard-navbar mb-4">
    <div>
        <h2>Dashboard Admin</h2>
    </div>
    <nav>
        <a href="#">Dashboard</a>
        <a href="{{ route('contacts.index') }}" class="text-indigo-300">Pesan Masuk</a>
        <a href="#">Admin</a>
        <a href="#">Logout</a>
    </nav>
</header>

@section('content')

<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(90deg, #0d6efd, #6f42c1);
        color: #ffffff;
        padding: 1.2rem 2rem;
        border-radius: 0 0 1rem 1rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .dashboard-navbar h2 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }

    .dashboard-navbar nav a {
        margin-left: 25px;
        color: #ffffff;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .dashboard-navbar nav a:hover {
        color: #22c55e;
    }

    @media (max-width: 768px) {
        .dashboard-navbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .dashboard-navbar nav {
            margin-top: 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    }

    .dashboard-panel {
        background: linear-gradient(135deg, #6f42c1, #0d6efd);
        color: white;
        padding: 2rem;
        border-radius: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
    }

    .stat-box {
        background: #ffffff;
        border-radius: 1.5rem;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .stat-box i {
        font-size: 2rem;
        color: #0d6efd;
        margin-bottom: 0.5rem;
    }

    .table thead {
        background-color: #0d6efd;
        color: #fff;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .btn-action {
        transition: all 0.3s ease;
    }

    .btn-action:hover {
        transform: scale(1.05);
    }

    .alert {
        font-size: 0.95rem;
    }

    .table img {
        max-height: 80px;
        object-fit: cover;
        border-radius: 0.5rem;
    }

    .form-control, .form-select {
        height: 45px;
    }
</style>

<!-- Navbar -->


<!-- Konten -->
<div class="container-fluid">
    <!-- Panel Statistik -->
    <div class="dashboard-panel">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold"><i class="bi bi-palette2 me-2"></i> Dashboard Galeri Lukisan</h3>
        </div>
        <div class="row text-dark">
            <div class="col-md-6 mb-3">
                <div class="stat-box">
                    <i class="bi bi-images"></i>
                    <h5 class="fw-bold mb-1">{{ $galeris->total() }}</h5>
                    <p class="text-muted mb-0">Total Lukisan</p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="stat-box">
                    <i class="bi bi-tags-fill"></i>
                    <h5 class="fw-bold mb-1">{{ $galeris->pluck('kategori')->unique()->count() }}</h5>
                    <p class="text-muted mb-0">Kategori Lukisan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Header & Tombol Tambah -->
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="fw-bold text-dark">🖼️ Daftar Lukisan</h2>
            <a class="btn btn-success shadow px-4 py-2 rounded-pill btn-action" href="{{ route('galeris.create') }}">
                <i class="bi bi-plus-circle me-2"></i> Tambah Lukisan
            </a>
        </div>
    </div>

    <!-- Filter & Pencarian -->
    <form action="{{ route('galeris.index') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control shadow-sm rounded-pill" 
                placeholder="🔍 Cari judul atau pelukis..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="kategori" class="form-select shadow-sm rounded-pill">
                <option value="">-- Filter Kategori --</option>
                @php $kategoriList = $galeris->pluck('kategori')->unique(); @endphp
                @foreach ($kategoriList as $kategori)
                    <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary w-100 shadow-sm rounded-pill btn-action">
                <i class="bi bi-search me-1"></i> Cari
            </button>
        </div>
    </form>

    <!-- Notifikasi -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-pill px-4 py-2" role="alert">
            <i class="bi bi-check-circle me-2"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <!-- Tabel Lukisan -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover table-bordered bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pelukis</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galeris as $index => $lukisan)
                    <tr>
                        <td>{{ ($galeris->currentPage() - 1) * $galeris->perPage() + $index + 1 }}</td>
                        <td>{{ $lukisan->judul }}</td>
                        <td>{{ $lukisan->pelukis }}</td>
                        <td>{{ $lukisan->kategori }}</td>
                        <td>{{ $lukisan->deskripsi }}</td>
                        <td>
                            @if($lukisan->gambar)
                                <img src="{{ asset('storage/' . $lukisan->gambar) }}" width="80">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary rounded-circle btn-action" href="{{ route('galeris.edit', $lukisan->id) }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('galeris.destroy', $lukisan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle btn-action"
                                    onclick="return confirm('Yakin ingin menghapus lukisan ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted fst-italic">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
  <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
    <div class="text-muted mb-2">
        Menampilkan <strong>{{ $galeris->firstItem() }}</strong> sampai <strong>{{ $galeris->lastItem() }}</strong> dari <strong>{{ $galeris->total() }}</strong> hasil
    </div>
    <div class="custom-pagination mb-2">
        {{ $galeris->appends(request()->query())->onEachSide(1)->links('vendor.pagination.custom') }}
    </div>
</div>

</div>

@endsection
