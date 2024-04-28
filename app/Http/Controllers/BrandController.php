<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
    
        $brands = Brand::query();
    
        if ($search) {
            $brands->where('name', 'like', '%' . $search . '%');
        }
    
        $brands = $brands->get();
    
        return view('datamerek', compact('brands'));
    }
    
   
    public function create()
    {
        // Tampilkan form untuk menambahkan merek baru
        return view('createmerek');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        // Redirect ke halaman yang sesuai setelah data berhasil disimpan
        return redirect()->route('brands.index')->with('success', 'Merek berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('editmerek', compact('brand'));
    }
    
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        
        // Validasi data dari form
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update data merek ke dalam database
        $brand->update([
            'name' => $request->name,
        ]);

        // Redirect ke halaman yang sesuai setelah data berhasil diupdate
        return redirect()->route('brands.index')->with('success', 'Merek berhasil diupdate.');
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        
        // Hapus data merek dari database
        $brand->delete();

        // Redirect ke halaman yang sesuai setelah data berhasil dihapus
        return redirect()->route('brands.index')->with('success', 'Merek berhasil dihapus.');
    }
}
