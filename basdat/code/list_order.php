<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

$user_id = $_SESSION['user_id'];


$query_current_orders = "SELECT dp.id, dp.nama, dp.alamat, dp.No_HP, dp.item_name, dp.status, p.nama_pegawai, p.CP
                         FROM daftar_pesanan dp
                         JOIN pegawai p ON dp.pegawai_id = p.pegawai_id
                         WHERE dp.user_id = $user_id";
$result_current_orders = mysqli_query($koneksi, $query_current_orders);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="../css/list_order.css">
</head>

<body>
    <h1>
        <form action="./home1.php" method="get">
            <button type="submit" style="background-color: #008CBA; color: white; border: none; padding: 10px 27px; cursor: pointer;">Home</button>
        </form>
    </h1>
    <h2>Daftar Pesanan</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Item Name</th>
            <th>Status</th>
            <th>Teknisi</th>
            <th>Contact Person</th>
            <th>Action Edit</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result_current_orders)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['No_HP']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['nama_pegawai']; ?></td>
                <td><?php echo $row['CP']; ?></td>

             
                <td>
                    <form action="edit_order.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 5px 10px; cursor: pointer;">Edit</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
