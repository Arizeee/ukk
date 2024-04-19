<header class="header" id="header">
    <nav class="nav container">
        <a href="" class="nav__logo">
            <i class="ri-book-3-line">E-Books</i>
        </a>
        <div class="nav__menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="{{ url('/') }}" class="nav__link active-link">
                        <i class="ri-home-line"></i>
                        <span>
                            Home
                        </span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="{{ url('/favorite') }}" class="nav__link">
                        <i class="ri-book-line"></i>
                        <span>
                            Favorite
                        </span>
                    </a>
                </li>
                {{-- <li class="nav__item">
                    <button class="nav__link btn-buy">
                        <i class="ri-menu-search-line"></i>
                        <span>
                            Category
                        </span>
                    </button>
                    <button class="btn-buy-list" id="dropBtn1"><span class="btn-arrow"><i class="ri-arrow-down-s-line"></i></span></button>
                    <ul class="dropdown-menu">
                        @foreach ($kategori as $kat)
                            <li><a class="dropdown-item" href="{{ route('books.by.category', ['category' => $kat->nama_kategori]) }}">{{ $kat->nama_kategori }}</a></li>
                        @endforeach
                    </ul>
                </li> --}}
                
                <li class="nav__item">
                    <a href="{{ url('/koleksi') }}" class="nav__link">
                        <i class="ri-bookmark-line"></i>
                        <span>
                            Koleksi
                        </span>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="nav__actions">
            @auth
                <!-- authenticated actions -->
                <a href="{{ route('profile.index') }}"><i class="ri-user-line login-button" id="login-button"></i></a>
                <a href="{{ route('logout') }}"><i class="ri-logout-box-r-line"></i></a>
            @else
                <!-- unauthenticated actions -->
                <a href="{{ route('login') }}"><i class="ri-login-box-line" id="login-button"></i></a>
                <a href="{{ route('register') }}"><i class="ri-user-add-fill"></i></a>
            @endauth
            <!-- theme button -->
            <i class="ri-moon-line change-theme" id="theme-button"></i>
        </div>
    </nav>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Saat tombol dropdown diklik
        $(".btn-buy-list").click(function() {
            // Toggle kelas 'show' pada elemen dropdown-menu
            $(".dropdown-menu").toggleClass("show");
        });

        // Saat mouse meninggalkan dropdown
        $(".dropdown-menu").mouseleave(function() {
            // Hapus kelas 'show' dari elemen dropdown-menu
            $(this).removeClass("show");
        });
    });
</script>