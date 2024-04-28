<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, redirect ke halaman yang diinginkan
            return redirect()->intended('/home');
        }
        
        // Jika otentikasi gagal, kembalikan pengguna ke halaman masuk dengan pesan kesalahan
        return back()->withErrors(['email' => 'Email atau kata sandi tidak valid.']);
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'address' => 'required',
        ], [
            'email.unique' => 'Email telah digunakan sebelumnya.',
            'password.min' => 'Password harus terdiri dari minimal 6 karakter.', // Pesan kustom untuk validasi panjang minimal password
        ]);
    
        // Simpan data pengguna ke dalam database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->save();
    
        // Redirect ke halaman masuk setelah pendaftaran berhasil
        return redirect('/masuk')->with('success', 'Akun Anda telah berhasil dibuat. Silakan masuk untuk melanjutkan.');
    }
    public function logout(Request $request)
{
    Auth::logout(); // Logout pengguna
    $request->session()->invalidate(); // Meregenerasi sesi
    $request->session()->regenerateToken(); // Membuat token baru
    return redirect('/'); // Redirect ke halaman utama setelah logout
}

}
