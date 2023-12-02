<?php
require 'koneksilog.php';
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$nama = $_POST["nama"];

$query_sql = "INSERT INTO tbl_users (email, username, password, nama)
            VALUES ('$email', '$username', '$password', '$nama')";

if (mysqli_query($conn, $query_sql)){
    header("Location: register.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}