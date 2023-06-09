<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;"> 
        <form action="/AsistenController/check" method="post">
            <?= csrf_field() ?>
            <div class="mb-3 text-center">
                <label for="nim">USERNAME</label>
                <input type="text" class="form-control" id="usr" name="usr">
                <br>
                <label for="nim">PASSWORD</label>
                <input type="text" class="form-control" id="pwd" name="pwd">
                <br>
                <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="login" />
                </div>
        </form>
    </div>
</body>

</html>