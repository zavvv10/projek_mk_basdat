<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.html');
    exit();
}
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel ="stylesheet" href="../css/admin_dashboard.css">
    <script>
       

        function redirectToOrders() {
          
            window.location.href = "admin_listorder.php";
        }

        function redirectToConsultationHistory() {
           
            window.location.href = "admin_riwayat.php";
        }

        function logout() {
          
            window.location.href = "logout.php";
        }
    </script>
</head>

<body>
    <div class="container">
    <h1>Admin</h1>
        <div class="navbar">
            <ul>
                <li><a onclick="redirectToOrders()">Daftar Pesanan</a></li>
                <li><a onclick="redirectToConsultationHistory()">Riwayat Konsultasi</a></li>
                <li><a onclick="logout()">Logout</a></li>
            </ul>
    </div>
    <div class="content">
        <h1>Selamat Datang di Halaman Utama, <?php echo $email; ?>!</h1>
    </div>
    </div>
</body>

</html>

