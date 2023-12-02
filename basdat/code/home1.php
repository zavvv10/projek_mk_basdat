<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

// Ambil informasi pengguna dari session
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi-Phone Home</title>
    <link rel="stylesheet" href="../css/home1.css">
</head>
<script>
     

        function logout() {
            // Redirect ke halaman logout
            window.location.href = "logout.php";
        }
    </script>
<body>
    <div class="container">
        <h1>Hi-Phone</h1>
        <div class="navbar">
            <ul>
                <li><a href="home1.php">HOME</a></li>
                <li><a href="items.php">ITEM</a></li>
                <li><a href="teknisi1.php">TEKNISI</a></li>
                <li><a href="order.html">ORDER</a></li>
                <li><a onclick="logout()">LOG OUT</a></li>
                
            </ul>
        </div>
    </div>
    <div class="content">
        <h1>HP ANDA BERMASALAH? <br>BAWALAH KEMARI</h1>
    </div>
    <div class="contents">
        <h2>Berikan hidup baru untuk hape Anda dengan layanan servis terbaik kami! Tim profesional kami siap memperbaiki segala kerusakan, Percayakan hape Anda kepada ahli kami dan nikmati pengalaman menggunakan hape seperti baru kembali. Kunjungi toko servis kami sekarang dan rasakan perbedaan!</h2>
    </div>
    <div class="order">
        <a href="order.html">ORDER</a>
    </div>
</body>
</html>