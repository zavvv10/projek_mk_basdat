<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/form_order1.css">
    <title>Hi-Phone Website - Register</title>
</head>

<body>
    <div class="form-box"></div>
    <div class="content">
        <h1>Form Pemesanan</h1>
        <br>
        <form method="post" action="input_order.php">
            <div style="padding: 30px">
                <table cellpadding=5 cellspacing=0>
                    <tr>
                        <td>Nama</td> <td>:</td>
                        <td><input type="text" maxlength="30" name="nama" size="50"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td> <td>:</td>
                        <td><input type="text" maxlength="100" name="alamat" size="50"></td>
                    </tr>
                    <tr>
                        <td>No.HP</td><td>:</td>
                        <td><input type="tel" pattern="[0-9]+" maxlength="30" name="No_HP" size="50" required></td>
                    </tr>

                    <tr>
                        <td>Jasa</td>
                        <td>:</td>
                        <td>
                            <select name="pilihan_jasa">
                            <option value="Ganti baterai">Ganti Baterai</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><button type="submit" name="submit">Buat Pesanan</button></td>
                    </tr>

                </table>
            </div>
        </form>

        <!-- Tombol untuk langsung menuju ke input_order.php -->
        <form action="list_order.php">
            <button type="submit">Lihat Riwayat Pesanan</button>
        </form>
    </div>
</body>

</html>
