<?php
include './dbkon.php';
$db = new database();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mahasiswa</title>
</head>

<body>
    <h2>Tambah Data Mahasiswa</h2>
    <?php include './menu.php'; ?>
    <form method="post" action="mhs_proc.php">
        NPM
        <br><input type="text" name="npm">
        <br>Nama
        <br><input type="text" name="nama">
        <br>prodi
        <br>
        <select name=prodi_id>
            <?php
            $sql_pr = "SELECT * FROM prodi";
            $data_pr = $db->fetchdata($sql_pr);
            foreach ($data_pr as $data_pr) {
                echo "<option value='" . $data_pr['id'] . "'>" . $data_pr['nama'] . "</option>";
            }
            ?>
        </select>
        <br>Alamat
        <br><textarea name="alamat"></textarea>
        <br><br><input type="submit" name="submit_add" value="SIMPAN">
    </form>
</body>

</html>