<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

// memeriksa apakah pengguna adalah admin
$user_id = $_SESSION['user_id'];
$query_check_admin = "SELECT role FROM tbl_users WHERE user_id = $user_id";
$result_check_admin = mysqli_query($koneksi, $query_check_admin);

$is_admin = false;

if ($result_check_admin) {
    $row_check_admin = mysqli_fetch_assoc($result_check_admin);
    $is_admin = ($row_check_admin['role'] == 'admin');
}

if (!$is_admin) {
    echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit;
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    
    $query_delete_order = "DELETE FROM daftar_pesanan WHERE id = $id";

    if (mysqli_query($koneksi, $query_delete_order)) {
        echo "Pesanan berhasil dihapus!";
        echo '<script>
        function redirectToadminOrders() {
            window.location.href = "http://localhost/basdat/admin_listorder.php";
        }
        setTimeout(function() {
            redirectToadminOrders();
        }, 2000);
</script>';
    } else {
        echo "Error: " . $query_delete_order . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Order ID tidak valid.";
    exit;
}
?>
