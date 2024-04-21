@foreach ($peminjaman as $item)
    <!-- Modal Edit -->
    <div class="modal fade" id="approveModal{{ $item->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel{{ $item->id }}">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form edit kategori buku -->
                    <form action="{{ route('petugas.approve.pengembalian', $item->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                          {{-- <input type="date" class="form-control" id="tanggal_peminjaman" hidden name="tanggal_pengembalia" value="{{ now()->toDateString() }}" required> --}}
                          <input type="text" class="form-control" id="status_tunggu" hidden name="status_tunggu" value="dikembalikan" required>
                          <input type="text" class="form-control" id="status_peminjaman" hidden name="status_peminjaman" value="Dikembalikan" required>
                      </div>
                      <div class="mb-3">
                          <label for="tanggal_pengembalian" class="form-label">Tanggal Kembali</label>
                          <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ now()->toDateString() }}" required>
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