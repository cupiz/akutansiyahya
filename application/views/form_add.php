<!DOCTYPE html>
<html>
<head>
    <title>Form Add</title>
</head>
<body>
    <table>
        <form method="post" action="<?php echo base_url()."home/insert"; ?>">
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input required type="date" name="tanggal" ></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>:</td>
                <td><input type="text" name="jumlah"></td>
            </tr>
            <tr>
                <td>Jenis Pemasukan</td>
                <td>:</td>
                <td><input type="text" name="jenis"></td>
            </tr>
            <tr>
                <td>Penerima</td>
                <td>:</td>
                <td><input type="text" name="penerima"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><textarea style="resize: none;" name="deskripsi"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        </form>
    </table>
</body>
</html>
