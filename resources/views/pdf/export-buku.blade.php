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
                            <h3 class="card-title">Daftar Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Stok</th>
                                        <th>Tahun terbit</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->penulis }}</td>
                                        <td>{{ $item->penerbit }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ $item->tahun_terbit }}</td>
                                        <td>{{ $item->kategori->nama_kategori }}</td>
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
