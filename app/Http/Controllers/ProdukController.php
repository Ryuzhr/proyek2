<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload gambar
        $gambarName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images'), $gambarName);

        // Simpan data
        Produk::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'merek' => $request->merek,
            'gambar' => $gambarName
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'merek' => 'required'
        ]);

        // Update data
        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'merek' => $request->merek
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
