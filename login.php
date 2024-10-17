<?php
session_start();
include('db.php');

$error_message = ""; // Inisialisasi variabel untuk pesan kesalahan

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Username atau Password salah!";
        }
    } else {
        $error_message = "Username atau Password salah!";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
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
    <div class="login-container">
        <h1>LOGIN</h1>
        <h3>Silahkan login terlebih dahulu</h3>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required> 
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">LOGIN</button>
        </form>
        <p class="error-message"><?php echo $error_message; ?></p> <!-- Menampilkan pesan kesalahan -->
        <p>Belum punya akun? <a href="register.php">Register di sini</a></p>
    </div>
</body>
</html>
