@extends('layouts.app') 

<header class="dashboard-navbar">
    <div>
        <h2>Dashboard Admin</h2>
    </div>
    <nav>
        <a href="{{ route('galeris.index') }}">Dashboard</a>
        <a href="{{ route('contacts.index') }}">Pesan Masuk</a>
        <a href="#">Admin</a>
        <a href="#">Logout</a>
    </nav>
</header>

@section('content')

<style>
    body {
        background-color: #f3f4f6;
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(90deg, #0d6efd, #6f42c1);
        color: #fff;
        padding: 1rem 2rem;
        border-radius: 0 0 1rem 1rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    .dashboard-navbar h2 {
        font-size: 2rem;
        font-weight: bold;
    }

    .dashboard-navbar nav a {
        margin-left: 25px;
        color: #fff;
        font-weight: 500;
        transition: all 0.3s;
        text-decoration: none;
    }

    .dashboard-navbar nav a:hover {
        color: #22c55e;
    }

    .dashboard-panel {
         background: linear-gradient(90deg, #0d6efd, #6f42c1);
        color: white;
        padding: 2rem;
        border-radius: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .stat-box {
        background: #fff;
        border-radius: 1.5rem;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
    }

    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .stat-box i {
        font-size: 2.5rem;
        color: #6366f1;
        margin-bottom: 0.5rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color:  #0d6efd;
        color: white;
    }

    th, td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    tbody tr:hover {
        background-color: #f9fafb;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #dc2626;
        transform: scale(1.05);
    }

    .alert {
        font-size: 0.95rem;
        margin-bottom: 1rem;
        background-color: #d1fae5;
        border: 1px solid #10b981;
        color: #065f46;
        padding: 1rem;
        border-radius: 0.75rem;
    }

    .pagination {
        margin-top: 1.5rem;
    }

    .pagination .page-link {
        color: #6366f1;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        padding: 0.5rem 0.75rem;
        margin: 0 0.25rem;
        transition: 0.3s;
    }

    .pagination .page-link:hover {
        background-color: #e0e7ff;
        border-color: #a5b4fc;
    }

    .pagination .active .page-link {
        background-color: #6366f1;
        color: white;
        border-color: #6366f1;
    }
</style>


<div class="container-fluid">

    <!-- Statistik Panel -->
    <div class="dashboard-panel">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold"><i class="bi bi-envelope-fill me-2"></i> Daftar Pesan Masuk</h3>
        </div>
        <div class="row text-dark">
            <div class="col-md-6 mb-3">
                <div class="stat-box">
                    <i class="bi bi-chat-dots-fill"></i>
                    <h5 class="fw-bold mb-1">{{ $contacts->total() }}</h5>
                    <p class="text-muted mb-0">Total Pesan</p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="stat-box">
                    <i class="bi bi-person-fill"></i>
                    <h5 class="fw-bold mb-1">{{ $contacts->pluck('email')->unique()->count() }}</h5>
                    <p class="text-muted mb-0">User yang Mengirim</p>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover table-bordered bg-white text-center align-middle">
     <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-4">Belum ada pesan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $contacts->links() }}
    </div>
</div>
@endsection
