<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi-Phone Konsultan</title>
    <link rel="stylesheet" href="../css/konsultan.css">
</head>
<script>
       
        function logout() {
          
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
        <h1>Masih Bingung dengan Kondisi HP Anda? <br>
            Tanyakan saja pada kami.</h1>
            <p>Nikmati sensasi kinerja dari kami yang akan memuaskan anda dalam  proses pengerjaan hape anda.<br> Mari coba untuk konsultasikan saja kepada kami!</p>
    </div>
    <div class="edit">
        <a href="pesan_konsul.php">Konsultasi disini!</a>
        <a href="riwayat_konsul.php">Riwayat</a>
    </div>
</body>
</html>