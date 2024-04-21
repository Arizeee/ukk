@extends('layout.detail')

@section('content')
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }

        .product {
            transition: transform 0.3s ease-in-out;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .column {
            display: flex;
            /* gap: 1px; */
            text-align: center;
            flex-wrap: wrap;
        }
    </style>

    <section class="py-2">

        <div class="container">
            <div class="pt-10 mx-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <section class="featured section" id="featured">
                <h2 class="section__title">
                    Favorited Books
                </h2>
                <div class="featured__container container">
                    <div class="featured__swiper ">
                        <div class="column">
                            @forelse($favorites->sortByDesc('id') as $item)
                                <article class="featured__card swiper-slide">
                                    <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}" alt=""
                                        class="featured__img">
                                    <h2 class="featured__title">
                                        {{ $item->buku->judul }}
                                    </h2>
                                    <h2 class="featured__title">
                                        {{ $item->buku->penulis }}
                                    </h2>
                                    <div class="featured__prices">
                                        <span class="featured__discount">
                                            {{ $item->buku->penerbit }}
                                        </span>
                                        <span class="featured__discount">
                                            {{ $item->buku->tahun_terbit }}
                                        </span>

                                    </div>
                                    <button class="button" type="button">
                                        <a href="{{ route('peminjam.show', ['id' => $item->buku->id]) }}">Detail</a>
                                    </button>
                                    <div class="featured__actions">
                                        {{-- <button><i class="ri-search-line"></i></button>
                                        <button><i class="ri-heart-fill"></i></button>
                                        <button><i class="ri-eye-line"></i></button> --}}
                                    </div>
                                </article>
                            @empty
                                <p>No Favorited books available</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>
    
@endsection