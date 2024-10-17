<?php
include('db.php');
$id = $_GET['id'];
$sql = "SELECT * FROM kendaraan WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $type = $_POST['type'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $plate_number = $_POST['plate_number'];
    $target_file = $row['image'];

    if(!empty($_FILES["image"]["name"])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $sql = "UPDATE kendaraan SET name='$name', type='$type', year='$year', price='$price', plate_number='$plate_number', image='$target_file' WHERE id=$id";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit();
    } else {
        echo "Error " . $conn->error;
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kendaraan</title>
    <link rel="stylesheet" href="css/update.css">
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
    <h1>UPDATE KENDARAAN</h1>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th class="label">Nama Kendaraan:</th>
                <td class="input"><input type="text" name="name" value="<?php echo $row['name']; ?>" required></td>
            </tr>
            <tr>
                <th class="label">Jenis Kendaraan:</th>
                <td class="input"><input type="text" name="type" value="<?php echo $row['type']; ?>" required></td>
            </tr>
            <tr>
                <th class="label">Nomor Plat:</th>
                <td class="input"><input type="text" name="plate_number" value="<?php echo $row['plate_number']; ?>" required></td>
            </tr>
            <tr>
                <th class="label">Tahun:</th>
                <td class="input"><input type="number" name="year" value="<?php echo $row['year']; ?>" required></td>
            </tr>
            <tr>
                <th class="label">Harga Kendaraan:</th>
                <td class="input"><input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required></td>
            </tr>
            <tr>
                <th class="label">Gambar Kendaraan:</th>
                <td class="input"><input type="file" name="image"></td>
            </tr>
            <tr class="submit-button">
                <td colspan="2"><input type="submit" value="Update Kendaraan"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>