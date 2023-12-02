<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/pesan_konsul.css">
    <title>Hi-Phone Website - Form Konsultasi</title>
</head>

<body>
    <div class="form-box"></div>
    <div class="content">
        <h1>Form Konsultasi</h1>
        <br>
        <form method="post" action="input_konsul.php">

            <div style="padding: 30px">
                <table cellpadding=5 cellspacing=0>
                    <tr>
                        <td>
                            Nama
                        </td> <td>:</td>
                        <td><input type="text" maxlength="30" name="nama" size="50"></td>
                    </tr>

                    <tr>
                        <td>No.HP</td><td>:</td>
                        <td><input type="tel" pattern="[0-9]+" maxlength="30" name="no_hp" size="50" required></td>
                    </tr>

                 
                    <tr>
                        <td>Pilih Konsultan</td><td>:</td>
                        <td>
                            <select name="pegawai_id" required>
                                <?php
                            
                                $koneksi = mysqli_connect("localhost", "root", "", "baru_db");

                    
                                $query_pegawai = "SELECT pegawai_id, nama_pegawai FROM pegawai WHERE role = 'konsultan'";
                                $result_pegawai = mysqli_query($koneksi, $query_pegawai);

                               
                                while ($row_pegawai = mysqli_fetch_assoc($result_pegawai)) {
                                    echo "<option value='" . $row_pegawai['pegawai_id'] . "'>" . $row_pegawai['nama_pegawai'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><button type="submit" name="submit">Buat Pesanan</button></td>
                    </tr>

                </table>
            </div>
        </form>
        <form action="riwayat_konsul.php">
            <button type="submit">Lihat Riwayat Pesanan</button>
        </form>
    </div>
</body>
