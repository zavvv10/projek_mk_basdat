<?php
$koneksikon = mysqli_connect("localhost", "root", "", "baru_db");

if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>