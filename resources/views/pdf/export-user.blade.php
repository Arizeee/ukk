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
                            <h3 class="card-title">Daftar Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->name_lengkap }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->role }}</td>
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
