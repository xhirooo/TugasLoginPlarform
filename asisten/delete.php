<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Hapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="container mt-4 p-5 bg-primary text-white rounded text-center">
            <h1>HAPUS ASISTEN PRAKTIKUM</h1>
        </div>
        <form action="/asisten/delete" method="post">
            <?= csrf_field() ?>
            <br>
            <div class="mb-3">
                <label for="nim" class="fw-bold">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Hapus</button>
                <a href="/AsistenController/logout" class="btn btn-danger">Logout</a>
            </div>
        </form>
    </div>
</body>

</html>