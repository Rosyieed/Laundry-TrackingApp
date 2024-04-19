<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laundry</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Laundry</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cashier.update', $item->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="invoice_number">Nomor Invoice:</label>
                                <input type="text" class="form-control" id="invoice_number" name="invoice_number"
                                    value="{{ $item->invoice_number }}" required>
                            </div>

                            <div class="form-group">
                                <label for="owner_name">Nama Pemilik:</label>
                                <input type="text" class="form-control" id="owner_name" name="owner_name"
                                    value="{{ $item->owner_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="weight">Berat (kg):</label>
                                <input type="number" class="form-control" id="weight" name="weight"
                                    value="{{ $item->weight }}" required>
                            </div>

                            <div class="form-group">
                                <label for="service">Layanan:</label>
                                <select class="form-control" id="service" name="service" required>
                                    <option value="Cuci Saja" {{ $item->service == 'Cuci Saja' ? 'selected' : '' }}>
                                        Cuci Saja</option>
                                    <option value="Setrika Saja"
                                        {{ $item->service == 'Setrika Saja' ? 'selected' : '' }}>Setrika Saja
                                    </option>
                                    <option value="Cuci dan Setrika"
                                        {{ $item->service == 'Cuci dan Setrika' ? 'selected' : '' }}>Cuci dan Setrika
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Diinput" {{ $item->status == 'Diinput' ? 'selected' : '' }}>
                                        Diinput</option>
                                    <option value="Sedang Dicuci"
                                        {{ $item->status == 'Sedang Dicuci' ? 'selected' : '' }}>Sedang Dicuci
                                    </option>
                                    <option value="Selesai Dicuci"
                                        {{ $item->status == 'Selesai Dicuci' ? 'selected' : '' }}>Selesai Dicuci
                                    </option>
                                    <option value="Sedang Disetrika"
                                        {{ $item->status == 'Sedang Disetrika' ? 'selected' : '' }}>Sedang Disetrika
                                    </option>
                                    <option value="Selesai Disetrika"
                                        {{ $item->status == 'Selesai Disetrika' ? 'selected' : '' }}>Selesai
                                        Disetrika</option>
                                    <option value="Sedang Dipack"
                                        {{ $item->status == 'Sedang Dipack' ? 'selected' : '' }}>Sedang Dipack
                                    </option>
                                    <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
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
