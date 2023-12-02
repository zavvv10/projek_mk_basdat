<?php
$koneksikon = mysqli_connect("localhost", "root", "", "baru_db");

L
if (isset($_GET['id'])) {
    $id = $_GET['id'];

 
    $query = "SELECT * FROM daftar_konsultasi WHERE id = $id";
    $result = mysqli_query($koneksikon, $query);

    if ($result) {
        $pesanan = mysqli_fetch_assoc($result);

    
        echo "<h1>Status Pesanan</h1>";
        echo "<p>ID Pesanan: " . $pesanan['id'] . "</p>";
        echo "<p>Nama: " . $pesanan['nama'] . "</p>";
        echo "<p>No. HP: " . $pesanan['no_hp'] . "</p>";
n
        echo '<a href="edit_pesanan.php?id=' . $id . '">Edit Pesanan</a>';

        echo ' | <a href="hapus_pesanan.php?id=' . $id . '">Hapus Pesanan</a>';
    } else {
        echo "Error: " . mysqli_error($koneksikon);
    }
} else {
    echo "ID pesanan tidak valid.";
}
?>