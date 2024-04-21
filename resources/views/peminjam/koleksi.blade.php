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

    .column{
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
                Featured Books
            </h2>
            <div class="featured__container container">
                <div class="featured__swiper ">
                    <div class="column">
                        @forelse($collection->sortByDesc('created_at') as $item)
                        {{-- @if ($item->buku->status_tunggu !== 'tunggu')  --}}
                            <article class="featured__card swiper-slide">
                                <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}" alt="" class="featured__img">
                                <h2 class="featured__title">
                                    {{ $item->buku->judul }}
                                </h2>
                                <h2 class="featured__title">
                                    {{ $item->buku->penulis }}
                                </h2>
                                <div class="featured__prices">
                                    {{-- <span class="featured__discount">
                                        {{ $item->buku->penerbit }}
                                    </span>
                                    <span class="featured__discount">
                                        {{ $item->buku->tahun_terbit }}
                                    </span> --}}
                                    <span class="featured__discount">
                                        {{ $item->peminjaman->status_peminjaman }}
                                    </span>
                                   
                                </div>
                                <button class="button" data-bs-toggle="modal"
                                data-bs-target="#ModalBuku_{{ $item->id }}" type="button">
                                Detail
                            </button>
                                <div class="featured__actions">
                                    <button><i class="ri-search-line"></i></button>
                                    <button><i class="ri-heart-fill"></i></button>
                                    <button><i class="ri-eye-line"></i></button>
                                </div>
                            </article>
                        {{-- @endif --}}
                        @empty
                            <p>No featured books available</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        @foreach($collection->sortByDesc('updated_at') as $item)
        <div class="modal fade" id="ModalBuku_{{ $item->id }}" tabindex="-1" aria-labelledby="ModalBukuLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalBukuLabel">Buku yang dipinjam</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="card-text">{{ $item->buku->judul }}</h3>
                                <h5 class="card-text">{{ $item->buku->penulis }}</h5>
                                <h5 class="card-text">{{ $item->buku->penerbit }}</h5>
                                <h5 class="card-text">{{ $item->buku->tahun_terbit }}</h5>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}"
                                    class="img-thumbnail w-100 mb-3" style="margin-left: -15px">
                                <span class="ms-auto text-warning fw-bold d-block text-center rate"><span
                                        class="text-dark">Rate:
                                    </span>★{{ number_format($item->buku->ulasan->avg('rating'), 1) }}/5</span>
                            </div>
                        </div>

                        @if ($item->peminjaman->status_peminjaman == 'Dipinjam' && $item->peminjaman->status_tunggu == "idle")
                        <!-- Form for Ulasan dan Rating -->
                        <form action="{{ route('pengembalian.buku', ['id' => $item->peminjaman->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="booking_id" value="{{ $item->peminjaman->id }}">
                            <div class="form-group">
                                <div class="rate">
                                    <input type="radio" id="star5_{{ $item->id }}" class="rate" name="rating" value="5"/>
                                    <label for="star5_{{ $item->id }}" title="5 stars">5 stars</label>
                                    <input type="radio" id="star4_{{ $item->id }}" class="rate" name="rating" value="4"/>
                                    <label for="star4_{{ $item->id }}" title="4 stars">4 stars</label>
                                    <input type="radio" id="star3_{{ $item->id }}" class="rate" name="rating" value="3"/>
                                    <label for="star3_{{ $item->id }}" title="3 stars">3 stars</label>
                                    <input type="radio" id="star2_{{ $item->id }}" class="rate" name="rating" value="2">
                                    <label for="star2_{{ $item->id }}" title="2 stars">2 stars</label>
                                    <input type="radio" id="star1_{{ $item->id }}" class="rate" name="rating" value="1"/>
                                    <label for="star1_{{ $item->id }}" title="1 star">1 star</label>
                                </div>
                                @error('rating')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="d-flex">
                                <span>Penting! Harap Kembalikan Tepat Waktu jika tidak akan dikenakan denda Rp.5000 Perhari</span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="comment" rows="6" placeholder="Comment" maxlength="200"></textarea>
                                @error('comment')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3 text-right">
                                <button type="submit" class="btn btn-success">Kembalikan & beri rating</button>
                            </div>
                        </form>
                        @elseif ($item->peminjaman->status_peminjaman == 'Dipinjam' && $item->peminjaman->status_tunggu == "pengembalian")
                        <p class="card-text"><strong>Status peminjaman : Menunggu Di Approve oleh petugas</strong></p>
                        <button class="btn btn-outline-dark flex-shrink-0 btn-lg" type="button"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                        @else
                        <!-- Informasi peminjaman -->
                        <p class="card-text"><strong>Tanggal Peminjaman:</strong>
                            {{ date('d-m-Y', strtotime($item->peminjaman->tanggal_peminjaman)) }}</p>
                        <p class="card-text"><strong>Tanggal Pengembalian:</strong>
                            {{ date('d-m-Y', strtotime($item->peminjaman->tanggal_pengembalian)) }}</p>
                        <button class="btn btn-outline-dark flex-shrink-0 btn-lg" type="button"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</section>

@endsection
