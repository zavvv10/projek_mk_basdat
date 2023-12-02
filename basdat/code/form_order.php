<h1>Form pemesanan</h1>
<br>
<form method="post" action="input_order.php">
    <div style="padding: 30px"> 
        <table cellpadding=5 cellspacing=0>
            <tr>
                <td>
                    Nama
                </td> <td>:</td>
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
                        <option value="HP mati total">HP mati total</option>
                        <option value="HP konslet">HP Konslet</option>
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