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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Form Laundry</h2>
                <form action="{{ route('cashier.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="owner_name">Nama Pemilik:</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name" required>
                    </div>
                    <div class="form-group">
                        <label for="weight">Berat (kg):</label>
                        <input type="number" class="form-control" id="weight" name="weight" required>
                    </div>
                    <div class="form-group">
                        <label for="service">Layanan:</label>
                        <select class="form-control" id="service" name="service" required>
                            <option value="Cuci Saja">Cuci Saja</option>
                            <option value="Setrika Saja">Setrika Saja</option>
                            <option value="Cuci dan Setrika">Cuci dan Setrika</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
