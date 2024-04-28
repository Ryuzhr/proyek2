<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index(Request $request)
    {
        $categories = Category::query(); // Contoh pengambilan data dari model Category
    
        $search = $request->query('search');
    
        if ($search) {
            $categories->where('name', 'like', '%' . $search . '%');
        }
    
        $categories = $categories->get(); // Mengubah variabel $brands menjadi $categories
    
        return view('datakategori', compact('categories'));
    }
    
    

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('createkategori');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan detail kategori
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('editkategori', compact('category'));
    }

    // Menyimpan perubahan pada kategori yang sudah diedit
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
