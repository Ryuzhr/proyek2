<nav class="navbar navbar-expand-lg navbar-dark bg-info mb-3">
  <div class="container">

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
        <!-- End Dropdown Merek -->
        <!-- Dropdown Kategori -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKategori" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownKategori">
              @foreach($categories as $category)
                  <li><a class="dropdown-item" href="{{ route('produk.byCategory', $category->id) }}">{{ $category->name }}</a></li>
              @endforeach
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
                  <li><hr class="dropdown-divider"></li>
                  <li>
                      <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                      <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
              </ul>
              
          
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-circle"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Masuk</a>
                </li>
            </ul>
        @endauth
        <li class="nav-item">
            <a class="nav-link" href="/cart"><i class="bi bi-cart-fill"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
