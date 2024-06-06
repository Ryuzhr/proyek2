@extends('layouts.mainkeranjang')


@section('content')
<div class="container mt-4">
    <h2>Keranjang Belanja</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control d-inline" style="width: 70px;">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($item->product->harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Keranjang kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="text-end">
        <h4>Total: Rp {{ number_format($cartItems->sum(fn($item) => $item->product->harga * $item->quantity), 0, ',', '.') }}</h4>
    </div>
</div>
@endsection