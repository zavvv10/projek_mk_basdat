<?php
session_start(); // Mulai session

if (!isset($_SESSION['user_id'])) {

    header("Location: http://localhost/basdat/index.html");
}

$koneksikon = mysqli_connect("localhost", "root", "", "baru_db");


$query_get_konsultans = "SELECT pegawai_id FROM pegawai WHERE role = 'konsultan'";
$result_get_konsultans = mysqli_query($koneksikon, $query_get_konsultans);


$konsultans = [];
while ($row = mysqli_fetch_assoc($result_get_konsultans)) {
    $konsultans[] = $row['pegawai_id'];
}

if (isset($_POST["submit"])) {

    $user_id = $_SESSION['user_id'];ogin
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
    $pegawai_id = isset($_POST['pegawai_id']) ? $_POST['pegawai_id'] : '';
    

    if ($nama && $no_hp && $pegawai_id) {
       
        $query_konsultasi = "INSERT INTO daftar_konsultasi (nama, no_hp, user_id) VALUES ('$nama', '$no_hp', '$user_id')";
        
        if (mysqli_query($koneksikon, $query_konsultasi)) {
       
            $konsultasi_id = mysqli_insert_id($koneksikon);
            
            if (in_array($pegawai_id, $konsultans)) {
          
                $query_daftar_konsultasi = "UPDATE daftar_konsultasi SET pegawai_id = '$pegawai_id' WHERE id = '$konsultasi_id'";
                
                if (mysqli_query($koneksikon, $query_daftar_konsultasi)) {
                    echo "Pemesanan berhasil!";
                  
                    echo '<script>
                        function redirectToConsultationHistory() {
                            window.location.href = "riwayat_konsul.php";
                        }
                        
                        // Panggil fungsi redirectToConsultationHistory tanpa penundaan
                        redirectToConsultationHistory();
                    </script>';
                } else {
                    echo "Error: " . $query_daftar_konsultasi . "<br>" . mysqli_error($koneksikon);
                }
            } else {
                echo "Konsultan tidak valid!";
            }
        } else {
            echo "Error: " . $query_konsultasi . "<br>" . mysqli_error($koneksikon);
        }
    } else {
        echo "Formulir tidak lengkap!";
    }
}
?>
