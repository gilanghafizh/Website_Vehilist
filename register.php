<?php
include('db.php');

$error_message = ""; // Variabel untuk menyimpan pesan error

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_sql = "SELECT * FROM users WHERE username='$username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 0) {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Terjadi kesalahan: " . $conn->error;
        }
    } else {
        $error_message = "Username sudah digunakan!";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <style>
        /* Style header */
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
    </style>
</head>
<body>
    <div class="register-container">
    <form method="post">
        <h1>REGISTER</h1>
        <h3>Silahkan daftarkan akun anda!</h3>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">REGISTER</button>
        <?php if ($error_message != ""): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </form>
    </div>
</body>
</html>
