<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksikon = mysqli_connect("localhost", "root", "", "baru_db");

$user_id = $_SESSION['user_id'];

$query_current_consultations = "SELECT dk.id, dk.nama, dk.no_hp, dk.tanggal, p.nama_pegawai, p.CP
                                FROM daftar_konsultasi dk
                                JOIN pegawai p ON dk.pegawai_id = p.pegawai_id
                                WHERE dk.user_id = $user_id";
$result_current_consultations = mysqli_query($koneksikon, $query_current_consultations);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Konsultasi</title>
    <link rel="stylesheet" href="../css/riwayat_konsul.css">
</head>

<body>
    <h2>Riwayat Konsultasi</h2>
    <table border="1">
        <tr>
            <th>Consultation ID</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Tanggal Konsultasi</th>
            <th>Nama Pegawai</th>
            <th>Contact Person</th>
            <th>Menu</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result_current_consultations)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['nama_pegawai']; ?></td>
                <td><?php echo $row['CP']; ?></td>

                <!-- Tombol Menuju Dashboard -->
                <td>
                    <form action="home1.php" method="get">
                        <button type="submit" style="background-color: #008CBA; color: white; border: none; padding: 5px 10px; cursor: pointer;">Home</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
