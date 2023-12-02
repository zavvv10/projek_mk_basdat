<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query_get_order = "SELECT * FROM daftar_pesanan WHERE id = $id";
    $result_get_order = mysqli_query($koneksi, $query_get_order);

    if ($result_get_order && mysqli_num_rows($result_get_order) > 0) {
        $row = mysqli_fetch_assoc($result_get_order);

       
        $status = $row['status'];

        // Cek apakah status sedang diproses
        if ($status !== 'Sedang Diproses') {
            header("Location: maaf.html");
            exit;
        }

        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $No_HP = $row['No_HP'];
        $item_name = $row['item_name'];
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
    $No_HP_baru = $_POST['No_HP'];
    $item_name_baru = $_POST['pilihan_jasa'];

    
    $query_update_order = "UPDATE daftar_pesanan SET nama = '$nama_baru', alamat = '$alamat_baru', No_HP = '$No_HP_baru', item_name = '$item_name_baru' WHERE id = $id";

    if (mysqli_query($koneksi, $query_update_order)) {
        echo "Pesanan berhasil diupdate!";
        echo '<script>
        function redirectToOrders() {
            window.location.href = "list_order.php";
        }
        setTimeout(function() {
            redirectToOrders();
        }, 2000);
</script>';
    } else {
        echo "Error: " . $query_update_order . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="../css/edit_order.css">
</head>

<body>
    <h2>Edit Pesanan</h2>
    <form action="edit_order.php?id=<?php echo $id; ?>" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $alamat; ?>" required><br>

        <label for="No_HP">No. HP:</label>
        <input type="text" name="No_HP" value="<?php echo $No_HP; ?>" required><br>

        <label for="pilihan_jasa">Item Name:</label>
        <select name="pilihan_jasa" value="<?php echo $item_name; ?>"required><br>
                            <option value="HP mati total">HP mati total</option>
                            <option value="HP konslet">HP Konslet</option>
                        <   <option value="Ganti baterai">Ganti Baterai</option>
                            
        </select>
        
        <input type="submit" name="edit_submit" value="Simpan Perubahan">
    </form>
</body>

</html>
