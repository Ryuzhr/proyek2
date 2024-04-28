@extends('layouts.mainproduk')

@section('container')
<section class="product h-100">
    <div class="container text-center mt-5 pb-2">
        <div class="title d-flex justify-content-between">
            <h3>Produk Kami</h3>
        </div>
        <hr class="mt-3 mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="img/produk1.jpg" class="img-thumbnail" alt="...">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="img/produk2.jpg" class="img-thumbnail" alt="...">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="img/produk3.jpg" class="img-thumbnail" alt="...">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <!-- Add more cards here -->
        </div>
    </div>
@endsection