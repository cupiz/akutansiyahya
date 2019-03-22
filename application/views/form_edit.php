<!DOCTYPE html>
<html>
<head>
    <title>Form Add</title>
</head>
<body>
    <table>
        <form method="post" action="<?php echo base_url()."home/update"; ?>">
          <?php foreach ($masuk as $p): ?>

            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input required type="date" name="tanggal" value="<?php echo $p->tanggal ?>"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>:</td>
                <td><input type="text" name="jumlah" value="<?php echo $p->jumlah ?>"></td>
            </tr>
            <tr>
                <td>Jenis Pemasukan</td>
                <td>:</td>
                <td><input type="text" name="jenis_pemasukan" value="<?php echo $p->jenis_pemasukan ?>"></td>
            </tr>
            <tr>
                <td>Penerima</td>
                <td>:</td>
                <td><input type="text" name="penerima" value="<?php echo $p->penerima ?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><textarea style="resize: none;" name="deskripsi" value="<?php echo $p->deskripsi ?>"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <input type="hidden" value="<?php echo $p->id;?>" name="id">
                <td><input type="submit" name="submit" value="Update"></td>
            </tr>
        </form>
            <?php endforeach; ?>
        <?php  ?>
    </table>
</body>
</html>
