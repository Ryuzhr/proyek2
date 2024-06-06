<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Tampilkan isi keranjang
  
    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
    
        // Filter out cart items with no related product
        $cartItems = $cartItems->filter(function($item) {
            return $item->product !== null;
        });
    
        return view('cart.keranjang', compact('cartItems'));
    }
    

    // Tambahkan produk ke keranjang
    public function add(Request $request)
    {
        try {
            $user = Auth::user();
            $product = Product::findOrFail($request->product_id);

            $cartItem = Cart::where('user_id', $user->id)
                            ->where('product_id', $request->product_id)
                            ->first();

            if ($cartItem) {
                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            } else {
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                ]);
            }

            return response()->json(['success' => 'Produk berhasil ditambahkan ke keranjang!']);
        } catch (\Exception $e) {
            Log::error('Error adding product to cart: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat menambahkan produk ke keranjang!'], 500);
        }
    }

    // Perbarui jumlah produk dalam keranjang
    public function update(Request $request, $id)
    {
        try {
            $cartItem = Cart::findOrFail($id);
        
            if ($cartItem->user_id != Auth::id()) {
                return redirect()->route('cart.index')->with('error', 'Anda tidak memiliki izin untuk memperbarui item ini.');
            }

            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error updating cart item: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan saat memperbarui produk dalam keranjang.');
        }
    }

    // Hapus produk dari keranjang
    public function destroy($id)
    {
        try {
            $cartItem = Cart::findOrFail($id);
        
            if ($cartItem->user_id != Auth::id()) {
                return redirect()->route('cart.index')->with('error', 'Anda tidak memiliki izin untuk menghapus item ini.');
            }

            $cartItem->delete();

            return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
        } catch (\Exception $e) {
            Log::error('Error deleting cart item: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan saat menghapus produk dari keranjang.');
        }
    }
}
