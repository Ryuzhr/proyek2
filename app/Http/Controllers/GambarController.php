<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    public function show($nama_file)
    {
        $file_path = storage_path('app/public/images/' . $nama_file); // Perhatikan tanda '/' di sini
        
        if (!file_exists($file_path)) {
            abort(404);
        }

        return response()->file($file_path);
    }
}
