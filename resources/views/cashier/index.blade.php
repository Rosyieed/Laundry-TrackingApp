<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laundry</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Data Laundry</div>
                    <a href="{{ route('cashier.create') }}">Tambah</a>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Invoice</th>
                                    <th>Nama Pemilik</th>
                                    <th>Berat (kg)</th>
                                    <th>Layanan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $laundry)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $laundry->invoice_number }}</td>
                                        <td>{{ $laundry->owner_name }}</td>
                                        <td>{{ $laundry->weight }}</td>
                                        <td>{{ $laundry->service }}</td>
                                        <td>{{ $laundry->status }}</td>
                                        <td>
                                            <a href="{{ route('cashier.edit', $laundry->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <!-- Tambahkan tombol hapus jika diperlukan -->
                                            <form action="{{ route('cashier.destroy', $laundry->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
