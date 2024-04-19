<!-- Modal Create Peminjaman -->
<div class="modal fade" id="modalCreatePeminjaman" tabindex="-1" aria-labelledby="modalCreatePeminjamanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreatePeminjamanLabel">Tambah Peminjaman Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.peminjaman.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="buku_id" class="form-label">Buku</label>
                        <select class="form-select" id="buku_id" name="buku_id" required>
                            @foreach ($buku as $b)
                                <option value="{{ $b->id }}">{{ $b->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Pinjam Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
