@foreach ($peminjaman as $item)
    <!-- Modal Edit -->
    <div class="modal fade" id="declinestockModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="updateModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel{{ $item->id }}">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form edit kategori buku -->
                    <form action="{{ route('petugas.decline.stock', $item->id) }}" method="POST">
                        @csrf
                        @method('POST')

                        <!-- tambahkan input lainnya sesuai kebutuhan -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
