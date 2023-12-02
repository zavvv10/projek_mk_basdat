<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

$is_admin = false; 

// Periksa apakah pengguna adalah admin
$user_id = $_SESSION['user_id'];
$query_check_admin = "SELECT role FROM tbl_users WHERE user_id = $user_id";
$result_check_admin = mysqli_query($koneksi, $query_check_admin);

if ($result_check_admin) {
    $row_check_admin = mysqli_fetch_assoc($result_check_admin);
    $is_admin = ($row_check_admin['role'] == 'admin');
}


if ($is_admin) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        
        $query_get_order = "SELECT * FROM daftar_pesanan WHERE id = $id";
        $result_get_order = mysqli_query($koneksi, $query_get_order);

        if ($result_get_order && mysqli_num_rows($result_get_order) > 0) {
            $row = mysqli_fetch_assoc($result_get_order);
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $No_HP = $row['No_HP'];
            $item_name = $row['item_name'];
            $status = $row['status'];
        } else {
            echo "Pesanan tidak ditemukan.";
            exit;
        }
    } else {
        echo "Order ID tidak valid.";
        exit;
    }

    // Proses form edit
    if (isset($_POST['edit_submit'])) {
        $nama_baru = $_POST['nama'];
        $alamat_baru = $_POST['alamat'];
        $No_HP_baru = $_POST['no_HP'];
        $item_name_baru = $_POST['pilihan_jasa'];
        $status_baru = $_POST['status'];
        $query_update_order = "UPDATE daftar_pesanan SET Nama = '$nama_baru', alamat = '$alamat_baru', no_HP = '$No_HP_baru', item_name = '$item_name_baru', status = '$status_baru' WHERE id = $id";

        if (mysqli_query($koneksi, $query_update_order)) {
            echo '<script>
            function redirectToadminOrders() {
                window.location.href = "admin_listorder.php";
            }
            setTimeout(function() {
                redirectToadminOrders();
            }, 2000);
    </script>';
        } else {
            echo "Error: " . $query_update_order . "<br>" . mysqli_error($koneksi);
        }
        
    }
} else {
    echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_editorder.css">
    <title>Edit Pesanan</title>
</head>

<body>
    <h2>Edit Pesanan</h2>
    <form action="admin_editorder.php?id=<?php echo $id; ?>" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $alamat; ?>" required><br>

        <label for="No_HP">No. HP:</label>
        <input type="text" name="no_HP" value="<?php echo $No_HP; ?>" required><br>

        <label for="pilihan_jasa">Item Name:</label>
        <input type="text" name="pilihan_jasa" value="<?php echo $item_name; ?>" required><br>

        <label for="status">Status:</label>
        <select name="status">
            <option value="Sedang Diproses" <?php echo ($status == 'Sedang Diproses') ? 'selected' : ''; ?>>Sedang Diproses</option>
            <option value="Sedang Dikirim" <?php echo ($status == 'Sedang Dikirim') ? 'selected' : ''; ?>>Sedang Dikirim</option>
            <option value="Selesai" <?php echo ($status == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
        </select><br>

        <input type="submit" name="edit_submit" value="Simpan Perubahan">
    </form>
</body>

</html>


