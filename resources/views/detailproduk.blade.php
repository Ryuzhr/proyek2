@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-tambah-keranjang').click(function(e) {
            e.preventDefault();

            var productId = $(this).data('product-id');

            $.ajax({
                url: '{{ route("cart.add") }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': productId,
                    'quantity': 1 // bisa disesuaikan dengan kebutuhan
                },
                success: function(response) {
                    alert(response.success);
                    // Redirect to cart page
                    window.location.href = '{{ route("cart.index") }}';
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan produk ke keranjang!');
                }
            });
        });
    });
</script>

<div class="container" style="margin-bottom: 260px;">
    <div class="row mb-4 pb-4">
        <div class="col-lg-6 pe-4">
            <div class="product-image">
                <img src="{{ asset($produk->gambar) }}" class="w-100" alt="Product Image">
            </div>
        </div>
        <div class="col-lg-6 ps-5">
            <div class="product-det border-bottom">
                <h1 class="fw-bold">{{ $produk->nama }}</h1>
                <p>{!! nl2br(e($produk->deskripsi)) !!}</p>
            </div>
            <div class="mt-4">
                <div class="mb-3">
                    <h3>Harga</h3>
                    <p>Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                </div>
                <div class="mb-3">
                    <h3>Stok</h3>
                    <p>{{ $produk->stok }}</p>
                </div>
                <div>
                    <a class="btn btn-primary btn-tambah-keranjang" data-product-id="{{ $produk->id }}">Tambahkan Ke Keranjang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
