@extends('layout.landing.template')

@section('content')
    @auth
        @foreach ($kategori as $data)
            <section class="featured section" id="featured">
                <h2 class="section__title">
                    Category {{ $data->nama_kategori }}
                </h2>
                <div class="featured__container container">
                    <div class="featured__swiper swiper">
                        <div class="swiper-wrapper">
                            @if (is_null($buku))
                                <div class="col mb-5 mt-5">
                                    <div class="alert alert-warning text-center" role="alert">
                                        Buku tidak tersedia.
                                    </div>
                                </div>
                            @else
                                @foreach ($buku->sortByDesc('created_at') as $item)
                                    @if ($data->id === $item->kategori_id)
                                        <article class="featured__card swiper-slide">
                                            <img src="{{ asset('storage/buku/' . $item->sampul) }}" alt=""
                                                class="featured__img">
                                            <h2 class="featured__title">{{ $item->judul }}</h2>
                                            <div class="featured__prices">
                                                <span class="featured__discount">{{ $item->penulis }}</span>
                                            </div>
                                            <button class="button">
                                                <a href="{{ route('peminjam.show', ['id' => $item->id]) }}">Lihat Buku</a>
                                            </button>
                                            <div class="featured__actions">
                                                @if ($favorites->contains('buku_id', $item->id))
                                                    <button class="after-favorited" {{-- style="display: none;" --}}
                                                        onclick="toggleCancelFavorite(this)" data-id="{{ $item->id }}">
                                                        <i class="ri-heart-fill"></i>
                                                    </button>
                                                @else
                                                    <button class="before-favorited" onclick="toggleFavorite(this)"
                                                        data-id="{{ $item->id }}">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </article>
                                    @endif
                                @endforeach
                                <script>
                                    function toggleFavorite(button) {
                                        var bookId = button.getAttribute('data-id');

                                        // Mendapatkan token CSRF dari meta tag
                                        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                                        // Kirim permintaan POST ke backend untuk menambahkan buku ke favorit
                                        fetch('/favorite/add/' + bookId, {
                                                method: 'POST',
                                                body: JSON.stringify({
                                                    book_id: bookId
                                                }),
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': csrfToken, // Menambahkan token CSRF ke header
                                                    // Anda mungkin perlu menambahkan header authorization jika diperlukan
                                                    // 'Authorization': 'Bearer ' + token,
                                                }
                                            })
                                            .then(response => {
                                                if (response.ok) {
                                                    // Perubahan UI saat buku ditambahkan ke favorit
                                                    button.innerHTML = '<i class="ri-heart-fill"></i>';
                                                    button.setAttribute('onclick', 'toggleCancelFavorite(this)');
                                                } else {
                                                    // Handle kesalahan jika ada
                                                    console.error('Gagal menambahkan ke favorit');
                                                }
                                            })
                                            .catch(error => console.error('Terjadi kesalahan:', error));
                                    }

                                    function toggleCancelFavorite(button) {
                                        var bookId = button.getAttribute('data-id');
                                        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                                        fetch('/favorite/delete/' + bookId, {
                                                method: 'DELETE',
                                                body: JSON.stringify({
                                                    book_id: bookId
                                                }),
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': csrfToken,
                                                }
                                            })
                                            .then(response => {
                                                if (response.ok) {
                                                    button.innerHTML = '<i class="ri-heart-line"></i>';
                                                    button.setAttribute('onclick', 'toggleFavorite(this)');
                                                } else {
                                                    console.error('Gagal menghapus dari favorit');
                                                }
                                            })
                                            .catch(error => console.error('Terjadi kesalahan:', error));
                                    }
                                </script>
                        </div>
                        <div class="swiper-button-prev">
                            <i class="ri-arrow-left-s-line"></i>
                        </div>
                        <div class="swiper-button-next">
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </div>
                </div>
        @endif
        </section>
        @endforeach
    @endauth

    <!--==================== DISCOUNT ====================-->
    @guest
        <section class="featured section" id="featured">
            <h2 class="section__title">
                Featured Books
            </h2>
            <div class="featured__container container">
                <div class="featured__swiper swiper">
                    <div class="swiper-wrapper">
                        @if (is_null($buku))
                            <div class="col mb-5 mt-5">
                                <div class="alert alert-warning text-center" role="alert">
                                    Buku tidak tersedia.
                                </div>
                            </div>
                        @else
                            @foreach ($buku->sortByDesc('created_at') as $item)
                                <article class="featured__card swiper-slide">
                                    <img src="{{ asset('storage/buku/' . $item->sampul) }}" alt=""
                                        class="featured__img">
                                    <h2 class="featured__title">
                                        {{ $item->judul }}
                                    </h2>
                                    <div class="featured__prices">
                                        <span class="featured__discount">
                                            {{ $item->penulis }}
                                        </span>
                                    </div>
                                    <button class="button">
                                        <a href="{{ route('login') }}">Lihat Buku</a>
                                    </button>
                                    <div class="featured__actions">
                                        <button><i class="ri-heart-fill"></i></button>
                                        <button><i class="ri-eye-line"></i></button>
                                    </div>
                                </article>
                            @endforeach
                    </div>
                    <div class="swiper-button-prev">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                    <div class="swiper-button-next">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </div>
            </div>
            @endif
        </section>


        <section class="discount section" id="category">
            <div class="discount__container container grid">
                <div class="discount__data">
                    <h2 class="discount__title section__title">
                        Pinjam buku berkualitas di Ebooks
                    </h2>
                    <p class="discount__description">
                        Temukan dunia baru dalam setiap halaman. Mulailah petualanganmu dengan peminjaman buku kami!
                    </p>
                </div>
                <div class="discount__images">
                    <img src="/front/landing/assets/img/book3.png" alt="Cover - Book Cover@pngkey.com">
                </div>
            </div>
        </section>
    @endguest


    {{-- <section class="testimonial section" id="testimonial">
    <h2 class="section__title">
        Customer options
    </h2>
    <div class="testimonial__container container">
        <div class="testimonial__swiper swiper">
            <div class="swiper-wrapper">
                @foreach ($ulasan->sortByDesc('created_at') as $ulasanBuku)
                <article class="testimonial__card swiper-slide">
                    <img src="{{ $ulasanBuku->user->profile_photo ? asset('storage/' . $ulasanBuku->user->profile_photo) : asset('DetailPeminjaman/assets/default.png') }}" alt="img" class="testimonial__img">
                    <h2 class="testimonial__title">
                        {{$ulasanBuku->user->name_lengkap}}
                    </h2>
                    <p class="testimonial__description">
                        {{$ulasanBuku->ulasan}}
                    </p>
                    <div class="testimonial_stars">
                         @php
                            $fullStars = (int) $ulasanBuku->rating;
                            $halfStar = $ulasanBuku->rating - $fullStars >= 0.5;
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp
        
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullStars)
                                    ⭐️ <!-- Bintang penuh -->
                                @elseif ($i == $fullStars + 1 && $halfStar)
                                    🌟 <!-- Bintang setengah -->
                                @else
                                    ☆ <!-- Bintang kosong -->
                                @endif
                            @endfor
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}
    <script src="
                https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js
                "></script>
@endsection
