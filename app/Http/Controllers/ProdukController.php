<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProdukController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }
    public function index(Request $request)
    {
        $query = Product::query();
    
        if ($request->has('table_search')) {
            $search = $request->input('table_search');
            $query->where('nama', 'like', "%{$search}%");
        }
    
        $produks = $query->get();
    
        return view('dataproduk', compact('produks'));
    }
    
    public function show()
    {
        $produks = Product::get();
        return view('produk', compact('produks'));
    }

    public function showdetail($id)
    {
        $produk = Product::findOrFail($id);
        return view('detailproduk', compact('produk'));
    }
    
    

    public function create()
    {
        $categories = Category::all();

        return view('produk.create', compact('categories'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);
    
        $gambar = $request->file('gambar');
        $nama_gambar = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move(public_path('images'), $nama_gambar);
    
        Product::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'gambar' => '/images/'.$nama_gambar,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi, // Tambahkan deskripsi produk
        ]);
    
        return redirect()->route('produks.index')->with('success','Produk berhasil ditambahkan.');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);
    
        $produk = Product::find($id);
        $produk->nama = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi; // Perbarui deskripsi produk
    
        // Cek apakah ada file gambar yang diunggah
        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('images'), $nama_gambar);
            $produk->gambar = '/images/'.$nama_gambar;
        }
    
        $produk->save();
    
        return redirect()->route('produks.index')->with('success','Produk berhasil diperbarui.');
    }
    public function edit($id)
    {
    $produk = Product::findOrFail($id);
    $categories = Category::all();
    return view('produk.edit', compact('produk', 'categories'));
    }



    public function destroy($id)
    {
        $produk = Product::find($id);
    
        if(!$produk) {
            return redirect()->route('produks.index')->with('error', 'Produk tidak ditemukan.');
        }
    
        $produk->delete();
    
        return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus.');
    }
    public function byCategory($id)
{
    $category = Category::findOrFail($id);
    $produks = Product::where('kategori', $id)->get();

    return view('produk.byCategory', compact('produks', 'category'));
}
public function home()
{
    $produks = Product::all();
    return view('home', compact('produks'));
}


}
