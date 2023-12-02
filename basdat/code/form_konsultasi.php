<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/pesan_konsul.css">
    <title>Hi-Phone Website - Register</title>
</head>

<body>
    <div class="form-box"></div>
    <div class="content">
    <h1>Form Pemesanan</h1>
<br>
<h1>Form pemesanan</h1>
<br>

<form method="post" action="input_konsul.php">
    <div syle="padding : 30px">
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
                <td><button type="submit" name="submit">Buat Pesanan</button></td>
            </tr>
          
        </table>
    </div>
</form>
