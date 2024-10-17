<?php
include('db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $type = $_POST['type'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $plate_number = $_POST['plate_number'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Gambar berhasil diupload, simpan path ke database
        $sql = "INSERT INTO kendaraan (name, type, year, price, plate_number, image) 
                VALUES ('$name', '$type', '$year', '$price', '$plate_number', '$target_file')";
    }

    if ($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan</title>
    <link rel="stylesheet" href="css/insert.css">
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
<div class="container"> <!-- Tambahkan class container di sini -->
        <h1>TAMBAHKAN KENDARAAN</h1>
        <h3>Silahkan isi data mengenai kendaraan yang ingin ditambahkan</h3>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th class="label">Nama Kendaraan:</th>
                    <td class="input"><input type="text" name="name" placeholder="Nama Kendaraan" required></td>
                </tr>
                <tr>
                    <th class="label">Jenis Kendaraan:</th>
                    <td class="input"><input type="text" name="type" placeholder="Jenis Kendaraan" required></td>
                </tr>
                <tr>
                    <th class="label">Nomor Plat:</th>
                    <td class="input"><input type="number" name="plate_number" placeholder="Nomor Plat" required></td>
                </tr>
                <tr>
                    <th class="label">Tahun:</th>
                    <td class="input"><input type="number" name="year" placeholder="Tahun" required></td>
                </tr>
                <tr>
                    <th class="label">Harga Kendaraan:</th>
                    <td class="input"><input type="number" step="0.01" name="price" placeholder="Harga Kendaraan" required></td>
                </tr>
                <tr>
                    <th class="label">Gambar Kendaraan:</th>
                    <td class="input"><input type="file" name="image" required></td>
                </tr>
                <tr class="submit-button">
                    <td colspan="2"><input type="submit" value="Tambahkan Kendaraan"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>