<?php
session_start();
include('db.php');
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM kendaraan";
$result = $conn->query($sql);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
        /* Style header */
@font-face {
    font-family: 'MonumentExtended-Ultrabold';
    src: url('fonts/MonumentExtended-Ultrabold.ttf') format('truetype');
    font-weight: normal;
    font-size: normal;
}

@font-face {
    font-family: 'MonumentExtended-Regular';
    src: url('fonts/MonumentExtended-Regular.ttf') format('truetype');
    font-weight: normal;
    font-size: normal;
}

@font-face {
    font-family: 'AktivGrotesk-Light';
    src: url('fonts/AktivGrotesk-Light.ttf') format('truetype');
    font-weight: normal;
    font-size: normal;
}

@font-face {
    font-family: 'AktivGrotesk-Medium';
    src: url('fonts/AktivGrotesk-Medium.ttf') format('truetype');
    font-weight: normal;
    font-size: normal;
}
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
    <h1 style="margin: 0;">VEHILIST</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <h1>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h1>

   
    <!-- Grid container untuk daftar kendaraan -->
    <div class="grid-container <?php if ($result->num_rows == 0) { echo 'empty'; } ?>">
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()){ ?>
                <div class="vehicle-card">
                    <img src="uploads/<?php echo basename($row['image']); ?>" alt="<?php echo $row['name']; ?>">
                    <h2><?php echo $row['name']; ?></h2>
                    <div class="actions">
                        <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Hapus</a>
                        <a href="detail.php?id=<?php echo $row['id']; ?>">Detail</a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="message">Tabel kosong, silahkan tambahkan kendaraan!</p>
        <?php } ?>
    </div>

    <!-- Tombol tambahkan kendaraan baru di tengah bawah -->
    <div class="add-vehicle-container">
        <a href="insert.php" class="add-vehicle-btn">Tambahkan kendaraan baru</a>
    </div>

</body>
</html>
