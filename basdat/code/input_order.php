<?php
session_start(); // Mulai session


if (!isset($_SESSION['user_id'])) {

    header("Location: http://localhost/basdat/index.html");
}

$koneksi = mysqli_connect("localhost", "root", "", "baru_db");

if (isset($_POST["submit"])) {
 
    $user_id = $_SESSION['user_id'];
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $No_HP = isset($_POST['No_HP']) ? $_POST['No_HP'] : '';
    $item_name = isset($_POST['pilihan_jasa']) ? $_POST['pilihan_jasa'] : ''; 

   
    if ($nama && $alamat && $No_HP && $item_name) {
        
    
        $pegawai_id = '';
        switch ($item_name) {
            case 'HP mati total':
               
                $pegawai_query = "SELECT * FROM pegawai WHERE pegawai_id = 1";
                break;
            case 'HP konslet':
              
                $pegawai_query = "SELECT * FROM pegawai WHERE pegawai_id = 2";
                break;
            case 'Ganti baterai':
               
                $pegawai_query = "SELECT * FROM pegawai WHERE pegawai_id = 3";
                break;
        
            default:
               
                $pegawai_query = "SELECT * FROM pegawai WHERE pegawai_id = 1";
                break;
        }

      
        $pegawai_result = mysqli_query($koneksi, $pegawai_query);
        $pegawai_data = mysqli_fetch_assoc($pegawai_result);

        $pegawai_id = $pegawai_data['pegawai_id'];

 
        $query = "INSERT INTO daftar_pesanan (nama, alamat, no_hp, item_name, user_id, pegawai_id) VALUES ('$nama', '$alamat', '$No_HP', '$item_name', '$user_id', '$pegawai_id')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "Pemesanan berhasil!";
     
            echo '<script>
                    window.location.href = "list_order.php";
                  </script>';
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Formulir tidak lengkap!";
    }
}
?>
