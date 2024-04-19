<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd; /* Menambahkan garis kanan */
        }
        
        th {
            background-color: #f2f2f2;
        }

        /* Menghilangkan garis kanan untuk kolom terakhir */
        th:last-child,
        td:last-child {
            border-right: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="content pt-3">
            <div class="container pt-3">
                <div class="col-12">    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Peminjaman Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->user->name_lengkap }}</td>
                                            <td>{{ $item->buku->judul }}</td>
                                            <td>{{ $item->tanggal_peminjaman }}</td>
                                            <td>{{ $item->tanggal_pengembalian }}</td>
                                            <td>
                                                @if ($item->status_peminjaman == 'Dipinjam')
                                                    <div class="alert alert-warning" role="alert">
                                                        Dipinjam
                                                    </div>
                                                @elseif ($item->status_peminjaman == 'Dikembalikan')
                                                    <div class="alert alert-success" role="alert">
                                                        Dikembalikan
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- ./wrapper -->
</body>

</html>
