<?php
include('db.php');
$id = $_GET['id'];

$sql = "SELECT * FROM kendaraan WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kendaraan</title>
    <link rel="stylesheet" href="css/detail.css">
    <style>
        @font-face {
                font-family: 'MonumentExtended-Ultrabold';
                src: url('fonts/MonumentExtended-Ultrabold.ttf') format('truetype');
                font-weight: normal;
                font-size: normal;
        }

        @font-face {
                font-family: 'AktivGrotesk-Medium';
                src: url('fonts/AktivGrotesk-Medium.ttf') format('truetype');
                font-weight: normal;
                font-size: normal;
        }

        @font-face {
                font-family: 'AktivGrotesk-Light';
                src: url('fonts/AktivGrotesk-Light.ttf') format('truetype');
                font-weight: normal;
                font-size: normal;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="image">
        <img src="<?php echo $row['image']; ?>" alt="Gambar Kendaraan">
    </div>
    <h1>DETAIL KENDARAAN</h1>

    <table class="detail-table">
        <tr>
            <th>Nama</th>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <th>Tipe</th>
            <td><?php echo $row['type']; ?></td>
        </tr>
        <tr>
            <th>Nomor Plat</th>
            <td><?php echo $row['plate_number']; ?></td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td><?php echo $row['year']; ?></td>
        </tr>
        <tr>
            <th>Harga</th>
            <td><?php echo 'Rp ' . number_format($row['price'], 2, ',', '.'); ?></td>
        </tr>
    </table>

    <div class="action-buttons">
        <a href="index.php">Kembali ke Daftar</a>
        <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
    </div>
</div>
</body>
</html>
