@extends('layout.detail')

@section('content')

<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #f8f9fa;

        /* Chrome 10-25, Safari 5.1-6 */
        background: #f8f9fa;

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: #f8f9fa;
    }
</style>

<section class="h-100 gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px; height: 300px;">
                            <div style="width: 150px; height: 155px; overflow: hidden; border: 3px solid #f8f9fa;">
                                <img src="{{ asset($user->profile_photo ? 'storage/' . $user->profile_photo : 'DetailPeminjaman/assets/default.png') }}"
                                    alt="Foto Profil" class="img-fluid"
                                    style="width: 100%; height: 100%; object-fit: cover; z-index: 1; background-color: #f8f9fa;">
                            </div>
                            <button type="button" class="btn btn-outline-dark mt-2" data-bs-toggle="modal"
                                data-bs-target="#editProfileModal" style="z-index: 1;">
                                Edit profile
                            </button>
                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                            <h5>{{ $user->username }}</h5>
                            <p>{{ $user->role }}</p>
                        </div>
                    </div>
                    <div class="p-4 text-black" style="background-color: #f8f9fa;">
                        <div class="d-flex justify-content-end text-center py-1">
                            <div>
                                <p class="mb-1 h5">{{ $totalPeminjaman }}</p>
                                <p class="small text-muted mb-0">Buku Dipinjam</p>
                            </div>
                            <div class="px-3">
                                <p class="mb-1 h5">{{ $totalPengembalian }}</p>
                                <p class="small text-muted mb-0">Buku Dikembalikan</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 text-black">
                        <div class="mb-5">
                            <p class="lead fw-normal mb-1">Tentang</p>
                            <div class="p-4" style="background-color: #f8f9fa;">
                                <p class="font-italic mb-1">Nama Lengkap : {{ $user->name_lengkap }}</p>
                                <p class="font-italic mb-1">Alamat : {{ $user->alamat }}</p>
                                <p class="font-italic mb-1">Email : {{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit Profile -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk mengedit data profil dan mengunggah foto profil -->
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="name_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name_lengkap" name="name_lengkap" value="{{ $user->name_lengkap }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="profile_photo" name="profile_photo">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
