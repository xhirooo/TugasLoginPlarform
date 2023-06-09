<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    <form action="/asisten/search" method="post">
        <?= csrf_field() ?>
        Search: <input type="text" name="key" />
        <input type="submit" name="submit" value="search" />
    </form>
    <?php
    if (!empty($hasil)) {
        echo "<h1>Hasil Pencarian</h1>";
        echo "Nama :" . $hasil['NAMA']; //hasil result set dari model
        echo "<br>Praktikum:" . $hasil['PRAKTIKUM'];
        echo "<br>IPK:" . $hasil['IPK'];
    }
    ?>
</body>

</html>