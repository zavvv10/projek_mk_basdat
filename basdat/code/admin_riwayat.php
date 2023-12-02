<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: /index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

$user_id = $_SESSION['user_id'];


$query_check_admin = "SELECT role FROM tbl_users WHERE user_id = $user_id";
$result_check_admin = mysqli_query($koneksi, $query_check_admin);

$is_admin = false;

if ($result_check_admin) {
    $row_check_admin = mysqli_fetch_assoc($result_check_admin);
    $is_admin = ($row_check_admin['role'] == 'admin');
}

if ($is_admin) {
   
    $query_all_consultations = "SELECT * FROM daftar_konsultasi";
    $result_all_consultations = mysqli_query($koneksi, $query_all_consultations);
} else {
  
    $query_current_consultations = "SELECT * FROM daftar_konsultasi WHERE user_id = $user_id";
    $result_current_consultations = mysqli_query($koneksi, $query_current_consultations);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Konsultasi</title>
    <link rel="stylesheet" href="../css/admin_riwayat.css">
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
    <h2>Riwayat Konsultasi</h2>
    </div>
    <div class="contents">
    <table border="1">
        <tr>
            <th>Consultation ID</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Tanggal Konsultasi</th>
            <?php if ($is_admin) { ?>
            
               
            <?php } ?>
        </tr>
        <?php
        if ($is_admin) {
        
            while ($row = mysqli_fetch_assoc($result_all_consultations)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['no_hp']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                
                    
                </tr>
            <?php }
        } else {
    
            while ($row = mysqli_fetch_assoc($result_current_consultations)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['no_hp']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                </tr>
        <?php }
        } ?>
    </table>
    </div>
</body>

</html>