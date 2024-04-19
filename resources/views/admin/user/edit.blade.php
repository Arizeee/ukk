<!-- Modal Edit -->
@foreach ($user as $item)
<div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel{{ $item->id }}">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form edit user -->
                <form action="{{ route('users.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edit_username" name="username" value="{{ $item->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" value="{{ $item->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_name_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="edit_name_lengkap" name="name_lengkap" value="{{ $item->name_lengkap }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="edit_alamat" name="alamat" required>{{ $item->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_role" class="form-label">Role</label>
                        <select class="form-select" id="edit_role" name="role" required>
                            <option value="admin" {{ $item->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ $item->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="peminjam" {{ $item->role == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="edit_password" name="password">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                    </div>
                    <!-- tambahkan input lainnya sesuai kebutuhan -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
