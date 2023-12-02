<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

$user_id = $_SESSION['user_id'];
$is_admin = false; 


$query_check_admin = "SELECT role FROM tbl_users WHERE user_id = $user_id";
$result_check_admin = mysqli_query($koneksi, $query_check_admin);

if ($result_check_admin) {
    $row_check_admin = mysqli_fetch_assoc($result_check_admin);
    $is_admin = ($row_check_admin['role'] == 'admin');
}


if (!$is_admin) {
    header("Location: http://localhost/basdat/admin_dashboard.php");
    exit();
}

// Jika admin, ambil informasi pesanan dari semua pengguna
$query_all_orders = "SELECT dp.user_id, dp.id, dp.nama, dp.alamat, dp.No_HP, dp.item_name, dp.status, p.nama_pegawai, p.CP
                     FROM daftar_pesanan dp
                     JOIN pegawai p ON dp.pegawai_id = p.pegawai_id";
$result_all_orders = mysqli_query($koneksi, $query_all_orders);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan Admin</title>
    <link rel="stylesheet" href="../css/admin_listorder.css">
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
            <h1>
                <form action="admin_dashboard.php" method="get">
                    <button type="submit" style="background-color: #008CBA; color: white; border: none; padding: 5px 10px; cursor: pointer;">Dashboard</button>
                </form>
            </h1>
            <div class="content1">
                <h2>Daftar Pesanan Admin</h2>
            </div>
            <div class="contents">

                <table border="1">
                    <tr>
                        <th>User ID</th>
                        <th>Order Id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Item Name</th>
                        <th>Status</th>
                        <th>Teknisi</th>
                        <th>Contact Person</th>
                        <th>Action Edit</th>
                        <th>Action Delete</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result_all_orders)) { ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['No_HP']; ?></td>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['nama_pegawai']; ?></td>
                            <td><?php echo $row['CP']; ?></td>
                            <td>
                             
                                <form action="admin_editorder.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 5px 10px; cursor: pointer;">Edit</button>
                                </form>
                            </td>
                            <td>
                              
                                <form action="admin_deleteorder.php" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" style="background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
