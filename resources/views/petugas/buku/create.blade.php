<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCreateLabel">Tambah Buku Petugas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form tambah buku -->
          <form action="{{ route('petugas.buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" class="form-control" id="penulis" name="penulis" required>
            </div>
            <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" class="form-control" id="penerbit" name="penerbit" required>
            </div>
            <div class="mb-3">
              <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
              <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
            </div>
            <div class="mb-3">
              <label for="kategori_id" class="form-label">Kategori</label>
              <select class="form-select" id="kategori_id" name="kategori_id" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                  <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="sampul" class="form-label">Sampul</label>
              <input type="file" class="form-control" id="sampul" name="sampul" required accept="image/*">
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
  