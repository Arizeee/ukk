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
                            <h3 class="card-title">Daftar Ulasan Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Buku</th>
                                        <th>Ulasan</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ulasan as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name_lengkap }}</td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td>{{ $item->ulasan }}</td>
                                        <td>{{ $item->rating }}</td>
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
