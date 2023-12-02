<?php
require 'koneksilog.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

  
    $query_sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
    echo "SQL Query: $query_sql<br>";

 
    $result = mysqli_query($conn, $query_sql);


    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    if(mysqli_num_rows($result) > 0) {
  
        $user_data = mysqli_fetch_assoc($result);


        $_SESSION['user_id'] = $user_data['user_id'];
        $_SESSION['email'] = $user_data['email'];

   
        if ($user_data['role'] == 'admin') {
  
            header("Location: admin_dashboard.php");

        } else {
    
            header("Location: home1.php");
        }
    } else {
        echo '<script>
                    window.location.href = "gagal.html";
                  </script>';
    }
}
?>
