<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <title>Daftar Calon Asisten</title>
</head>

<body>
    <div class="container mt-4 p-5 bg-primary text-white rounded text-center">
        <h1>Pendaftaran Asisten Praktikum</h1>
    </div>
    <div class="tab-content">
        <div class="container mt-3">

            <table>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>Kelas Praktikum</th>
                    <th>IPK</th>
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($list as $astn) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= esc($astn['NIM']) ?></td>
                        <td><?= esc($astn['NAMA']) ?></td>
                        <td><?= esc($astn['PRAKTIKUM']) ?></td>
                        <td><?= esc($astn['IPK']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/AsistenController/logout">Logout</a>
        </div>

    </div>
</body>

</html>