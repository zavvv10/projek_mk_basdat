<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/basdat/index.html");
}


$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi-Phone Home</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/items.css">
</head>
<script>
     function logout() {
            // Redirect ke halaman logout
            window.location.href = "logout.php";
        }
</script>
<body>
    <div class="container">
        <h1>Hi-Phone</h1>
        <div class="navbar">
            <ul>
                <li><a href="home1.php">HOME</a></li>
                <li><a href="items.php">ITEM</a></li>
                <li><a href="teknisi1.php">TEKNISI</a></li>
                <li><a href="order.html">ORDER</a></li>
                <li><a onclick="logout()">LOG OUT</a></li>
                
            </ul>
        </div>
    </div>
    <section class="section__container explore__container">
        <div class="explore__header">
            <h2 class="section__header">Explore Our Services</h2>
           
        </div>
        <div class="explore__grid">
            <div class="explore__card">
                <span><i class="ri-questionnaire-line"></i></span>
                <h4>Consultant</h4>
                <p>
                    Kamu bisa menggunakan fitur ini ketika kamu bingung harus 
                    diapakan hape kamu kedepannya.
                </p>
                <a href="konsultan.php">Check!<i class="ri-arrow-right-line"></i></a>
            </div>
            <div class="explore__card">
                <span><i class="ri-team-line"></i></span>
                <h4>Teknisi</h4>
                <p>
                    Kamu bisa menggunakan fitur ini ketika kamu mau melihat dan memilih 
                    teknisi kami untuk memperbaiki hp kamu.
                </p>
                <a href="teknisi1.php">Check!<i class="ri-arrow-right-line"></i></a>
            </div>
            <div class="explore__card">
                <span><i class="ri-tools-line"></i></span>
                <h4>Repair</h4>
                <p>
                    Kamu bisa menggunakan fitur ini ketika kamu bingung harus 
                    diapakan hape kamu kedepannya.
                </p>
                <a href="form_order1.php">Check!<i class="ri-arrow-right-line"></i></a>
            </div>
            <div class="explore__card">
                <span><i class="ri-checkbox-multiple-fill"></i></span>
                <h4>Status</h4>
                <p>
                    Kamu bisa menggunakan fitur ini untuk mengecek 
                    bagaimana progress dari orderan kamu. 
    
                </p>
                <a href="list_order.php">Check!<i class="ri-arrow-right-line"></i></a>
            </div>
        </div>
    </section>
</body>
</html>