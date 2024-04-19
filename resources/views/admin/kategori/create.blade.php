<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCreateLabel">Tambah Kategori Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form tambah kategori buku -->
          <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nama_kategori" class="form-label">Nama Kategori</label>
              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>
            <!-- tambahkan input lainnya sesuai kebutuhan -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  