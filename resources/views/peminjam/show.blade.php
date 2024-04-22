@extends('layout.detail')

@section('content')
    <section class="py-5 mt-10 pt-10">
        <div class="container px-4 px-lg-5 my-5">
            <div class="pt-2 mx-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6 text-center">
                    <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/buku/' . $buku->sampul) }}"
                        alt="{{ $buku->judul }}"
                        style="max-width: 100%; height: auto; max-height: 500px; max-width: 400px;" />
                </div>
                <div class="col-md-6">
                    <h4 class="lead fs-2 fw-bolder">Judul : {{ $buku->judul }}</h4>
                    <h1 class="lead fs-3">Kategori: {{ $buku->kategori->nama_kategori }}</h1>
                    <h1 class="lead fs-3">Tahun Terbit: {{ $buku->tahun_terbit }}</h1>
                    <h1 class="lead fs-3">Penulis: {{ $buku->penulis }}</h1>
                    <h1 class="lead fs-3">Penerbit: {{ $buku->penerbit }}</h1>
                    <h1 class="lead fs-3">Stock buku: {{ $buku->stock }}</h1>
                    <div class="lead rate mt-2">
                        @php
                            $ratingValue = $buku->ulasan->avg('rating'); // Dapatkan nilai rating dari database
                            $fullStars = (int) $ratingValue;
                            $halfStar = $ratingValue - $fullStars >= 0.5;
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
                    @auth
                        @php
                            $role = auth()->user()->role;
                        @endphp

                        @if ($role == 'peminjam')
                            @if (isset($status) && $status->status_tunggu === 'tunggu' && $status->status_peminjaman === null && $buku->stock != 0)
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button disabled class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        menunggu approval
                                    </button>
                                </form>
                            @elseif (isset($status) && $status->status_tunggu === 'idle' && $status->status_peminjaman === 'Dipinjam')
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="">
                                    @csrf
                                    <button disabled class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        peminjaman telah di approve
                                    </button>
                                    <div class="">
                                        <span>Penting! Harap Kembalikan Tepat Waktu jika tidak akan dikenakan denda Rp.5000
                                            Perhari</span>
                                    </div>
                                </form>
                                {{-- <form action="{{ route('ajukan.pengembalian.buku', ['id' => $status->id]) }}" method="POST"
                                    class="d-flex mx-4">
                                    @csrf
                                    <button class="btn btn-primary flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        Ajukan Pengembalian
                                    </button>
                                </form> --}}
                            @elseif(isset($status) && $status->status_tunggu === 'pengembalian')
                                <form action="{{ route('peminjam.buku', ['id' => $status->id]) }}" method="POST"
                                    class="d-flex">
                                    @csrf
                                    <button disabled class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        menunggu approval pengembalian
                                    </button>
                                </form>
                            @elseif($buku->stock == 0 && $status->status_peminjaman == 'Ditolak')
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="">
                                    @csrf
                                    <button class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" disabled type="submit">
                                        <i class="bi bi-book-half"></i>
                                        Stock habis
                                    </button>
                                    <div class="">
                                        <span>Yahh stock buku habis nih. Tunggu sampai stock nya ada lagi ya.</span>
                                    </div>
                                </form>
                            @elseif($buku->stock <= 0)
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="">
                                    @csrf
                                    <button class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" disabled type="submit">
                                        <i class="bi bi-book-half"></i>
                                        Stock habis
                                    </button>
                                    <div class="">
                                        <span>Yahh stock buku habis nih. Tunggu sampai stock nya ada lagi ya.</span>
                                    </div>
                                </form>
                            @else
                                <button class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="button"
                                    data-bs-toggle="modal" data-bs-target="#pinjamModal{{ $buku->id }}">
                                    <i class="bi bi-book-half"></i>
                                    Pinjam
                                </button>
                            @endif
                        @elseif($role == 'admin' || $role == 'petugas')
                            <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                @csrf
                                <button class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="button" disabled>
                                    <i class="bi bi-book-half"></i>
                                    Pinjam
                                </button>
                            </form>
                        @endif

                    @endauth
                </div>
                <div class="modal fade" id="pinjamModal{{ $buku->id }}" tabindex="-1" aria-labelledby="pinjamModalLabel{{ $buku->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pinjamModalLabel{{ $buku->id }}">Pinjam Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Isi modal di sini, misalnya form untuk memasukkan informasi peminjam -->
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST">
                                    @csrf
                                    <!-- Isi form disini -->
                                    <div class="mb-3">
                                        <label for="tanggal_peminjaman" class="form-label">Tanggal peminjaman</label>
                                        <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                        <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_telp" class="form-label">Nomer Whatsapp</label>
                                        <input type="number" placeholder="62+" class="form-control" required id="no_telp" name="no_telp">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Pinjam</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container m-5 ">
                    <!-- Daftar komentar yang sudah ada -->
                    <!-- Daftar komentar yang sudah ada -->
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="card shadow col-md-12">
                            <!-- Menambahkan class col-md-8 untuk mengatur lebar kolom komentar -->
                            <div class="p-3">
                                <h6>Komentar</h6>
                            </div>
                            <!-- Formulir komentar -->
                            {{-- <form action="{{ route('add.comment', ['id' => $buku->id]) }}" method="POST" class="mt-3">
            @csrf
            <div class="mt-2 d-flex flex-row align-items-center p-3 form-color">
                @if (Auth::check() && Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" width="40" height="40" class="rounded-circle m-2">
                @else
                    <img src="{{ asset('DetailPeminjaman/assets/default.png') }}" width="40" height="40" class="rounded-circle m-2">
                @endif
                <input type="text" name="comment" class="form-control" placeholder="Masukkan komentar Anda...">
                <button type="submit" class="btn btn-primary ml-2 m-1">Kirim</button>
            </div>
        </form> --}}
                            @foreach ($ulasan->sortByDesc('created_at') as $ulasanBuku)
                                <div class="mt-2 row">
                                    <div class="col-12">
                                        <div class="d-flex flex-row p-3">
                                            <img src="{{ $ulasanBuku->user->profile_photo ? asset('storage/' . $ulasanBuku->user->profile_photo) : asset('DetailPeminjaman/assets/default.png') }}"
                                                width="40" height="40" class="rounded-circle m-2">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    {{ $ulasanBuku->user->name_lengkap }}<small>{{ $ulasanBuku->created_at->diffForHumans() }}</small>
                                                </div>
                                                <p class="text-justify comment-text mb-0">{{ $ulasanBuku->ulasan }}</p>
                                                <p class="text-justify comment-text mb-0"> @php
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
                                                </p>
                                                <div class="mt-2">
                                                    @if (Auth::check() && Auth::id() == $ulasanBuku->user_id)
                                                        <!-- Tombol edit -->
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $ulasanBuku->id }}">Edit</button>
                                                        <!-- Tombol hapus -->
                                                        <form
                                                            action="{{ route('comment.delete', ['id' => $ulasanBuku->id]) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $ulasanBuku->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel{{ $ulasanBuku->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $ulasanBuku->id }}">Edit
                                                    Komentar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('comment.update', ['id' => $ulasanBuku->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="edit-comment{{ $ulasanBuku->id }}"
                                                            class="form-label">Komentar</label>
                                                        <textarea class="form-control" id="edit-comment{{ $ulasanBuku->id }}" name="comment" rows="3">{{ $ulasanBuku->ulasan }}</textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
