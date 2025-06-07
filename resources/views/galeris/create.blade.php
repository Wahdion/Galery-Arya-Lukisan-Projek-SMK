@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="fw-bold text-primary">🎨 Tambah Lukisan</h2>
            <a class="btn btn-outline-primary rounded-pill shadow-sm px-4" href="{{ route('galeris.index') }}">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-3" role="alert">
            <strong><i class="bi bi-exclamation-triangle me-1"></i> Ups!</strong> Ada beberapa masalah dengan input Anda:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('galeris.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input untuk Judul Lukisan -->
                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold">Judul Lukisan</label>
                    <input type="text" name="judul" id="judul" class="form-control rounded-pill px-4 shadow-sm" placeholder="Masukkan judul lukisan" value="{{ old('judul') }}">
                </div>

                <!-- Input untuk Kategori -->
                <div class="mb-3">
                    <label for="kategori" class="form-label fw-semibold">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control rounded-pill px-4 shadow-sm" placeholder="Masukkan kategori lukisan" value="{{ old('kategori') }}">
                </div>

                <!-- Input untuk Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control rounded-3 px-4 shadow-sm" rows="4" placeholder="Masukkan deskripsi lukisan">{{ old('deskripsi') }}</textarea>
                </div>

                <!-- Input untuk Nama Pelukis -->
                <div class="mb-3">
                    <label for="pelukis" class="form-label fw-semibold">Nama Pelukis</label>
                    <input type="text" name="pelukis" id="pelukis" class="form-control rounded-pill px-4 shadow-sm" placeholder="Masukkan nama pelukis" value="{{ old('pelukis') }}">
                </div>

                <!-- Input untuk Gambar Lukisan -->
                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold">Gambar Lukisan</label>
                    <input type="file" name="gambar" id="gambar" class="form-control rounded-pill px-4 shadow-sm" accept="image/*">
                </div>

                <!-- Tombol Simpan -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success rounded-pill px-4 py-2 shadow">
                        <i class="bi bi-save me-2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
