<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $validatedData['name'];
        $user->address = $validatedData['address'];
        $user->email = $validatedData['email'];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::delete('public/images/' . $user->image);
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->storeAs('public/images', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
