<nav class="navbar navbar-expand-lg navbar-dark bg-info mb-3">
  <div class="container">
    <a class="navbar-brand" href="/"><img src="img/logo.png" width="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/produk">Produk</a>
        </li>
        <!-- Dropdown Merek -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMerek" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Merek
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMerek">
            <li><a class="dropdown-item" href="#">Wardah</a></li>
            <li><a class="dropdown-item" href="#">Hanasui</a></li>
            <li><a class="dropdown-item" href="#">Implora</a></li>
          </ul>
        </li>
        <!-- End Dropdown Merek -->
        <!-- Dropdown Kategori -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKategori" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownKategori">
            <li><a class="dropdown-item" href="#">Body Lotion</a></li>
            <li><a class="dropdown-item" href="#">Lipstik</a></li>
            <li><a class="dropdown-item" href="#">Sunscren</a></li>
          </ul>
        </li>
        <!-- End Dropdown Kategori -->
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        @auth 
        @if(Auth::user()->image)
        <li class="nav-item">
          <a class="nav-link" href="/profil">
            <img src="{{ route('gambar.show', ['nama_file' => Auth::user()->image]) }}" alt="Gambar Profil" class="rounded-circle" width="30" height="30">
          </a>
      </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-circle"></i></a>
                </li>
            @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a> 
                <!-- Tambahkan atribut data-bs-toggle="dropdown" di atas -->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                    <li><a class="dropdown-item" href="/profil">Profil Saya</a></li>
                    <li><a class="dropdown-item" href="#">Pesanan Saya</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Keluar</a> <!-- Tautan untuk logout -->
            </li>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-circle"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/daftar">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/masuk">Masuk</a>
                </li>
            </ul>
        @endauth
        <li class="nav-item">
            <a class="nav-link" href="/keranjang"><i class="bi bi-cart-fill"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
