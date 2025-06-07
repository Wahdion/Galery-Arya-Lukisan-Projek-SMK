<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        // Ambil daftar kategori unik
        $kategoriList = Galeri::select('kategori')->distinct()->pluck('kategori');

        // Filter berdasarkan pencarian dan kategori
        $galeris = Galeri::when($search, function ($query, $search) {
                return $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('judul', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%")
                             ->orWhere('kategori', 'like', "%{$search}%")
                             ->orWhere('pelukis', 'like', "%{$search}%");
                });
            })
            ->when($kategori, function ($query, $kategori) {
                return $query->where('kategori', $kategori);
            })
            ->orderBy('judul', 'asc')
            ->paginate(10);

        $galeris->appends($request->all());

        return view('galeris.index', compact('galeris', 'kategoriList'));
    }

    //USERRR Halaman Galery
    public function userGalery(Request $request)
{
    $query = Galeri::query();

    // Filter pencarian judul dan pelukis
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('judul', 'like', '%' . $request->search . '%')
              ->orWhere('pelukis', 'like', '%' . $request->search . '%');
        });
    }

    // Filter kategori
    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    // Ambil list kategori unik untuk dropdown
    $kategoriList = Galeri::select('kategori')->distinct()->pluck('kategori');

    // Ambil data galeri dengan pagination
    $galeris = $query->latest()->paginate(9)->withQueryString();

    // Kirim data ke view
    return view('galery', compact('galeris', 'kategoriList'));
}


// USERR UNTUK DETAIL GALERY

public function show($id)
{
    $galeri = Galeri::findOrFail($id);
    return view('detail-galery', compact('galeri'));
}



    public function create()
    {
        return view('galeris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:100',
            'pelukis' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ]);

        // Simpan gambar ke folder storage/galeri
        $gambarPath = $request->file('gambar')->store('galeri', 'public');

        // Simpan data ke database
        Galeri::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'pelukis' => $request->pelukis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('galeris.index')->with('success', 'Data galeri berhasil ditambahkan!');
    }

    public function edit(Galeri $galeri)
    {
        return view('galeris.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:100',
            'pelukis' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'kategori', 'pelukis', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            $gambarPath = $request->file('gambar')->store('galeri', 'public');
            $data['gambar'] = $gambarPath;
        }

        $galeri->update($data);

        return redirect()->route('galeris.index')->with('success', 'Data galeri berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->route('galeris.index')->with('success', 'Data galeri berhasil dihapus!');
    }
}
