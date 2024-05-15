<?php
require 'koneksi.php';


$no = $_GET["no"];
    
$kode = query("SELECT * FROM tab_bprojek WHERE no = $no")[0];

$tab_bprojek = query("SELECT * FROM tab_bprojek");

$result = mysqli_query($conn, "SELECT * FROM tab_bprojek");

if( isset($_POST["tambah"]) ) {
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'tabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'tabel.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <input type="hidden" name="no" value="<?= $kode["no"]; ?>"></input>
        <ul>
            <li>
                <label for="nobar">No</label>
                <input type="text" name="nobar" id="no" required value="<?= $kode["no"]; ?>">
            </li>
            <li>
                <label for="kb">Kode Barang</label>
                <input type="text" name="kb" id="kode barang" required value="<?= $kode["kode barang"]; ?>">
            </li>
            <li>
                <label for="nb">Nama Barang</label>
                <input type="text" name="nb" id="nama barang" required value="<?= $kode["nama barang"]; ?>">
            </li>
            <li>
                <button type="submit" name="tambah">Ubah Barang</button>
            </li>
        </ul>
    </form>
</body>
</html>