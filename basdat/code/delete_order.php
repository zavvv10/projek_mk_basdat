<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

  
    $query_delete_order = "DELETE FROM daftar_pesanan WHERE id = $id";

    if (mysqli_query($koneksi, $query_delete_order)) {
        echo "Pesanan berhasil dihapus!";
        echo '<script>
                    function redirectToOrders() {
                        window.location.href = "http://localhost/basdat/list_order.php";
                    }
                    setTimeout(function() {
                        redirectToOrders();
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
