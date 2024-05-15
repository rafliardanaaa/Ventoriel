<?php
    require 'koneksi.php';

    $kode = query("SELECT * FROM tab_bprojek");

    $result = mysqli_query($conn, "SELECT * FROM tab_bprojek");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylein.css">
    <title>Document</title>
</head>
<body>
<table border="1">
        <tr class="b1">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
        </tr>
        
        <?php $i = 1; ?>
        <?php foreach( $kode as $row ) :?>

        <tr>
            <td><?= $i ?></td>
            <td><?= $row["kode barang"]; ?></td>
            <td><?= $row["nama barang"]; ?></td>
            <td>
                <a href="ubah.php?no=<?= $row["no"]; ?> ">Ubah</a>
                <a href="hapus.php?no=<?= $row["no"]; ?> "onclick="return confirm('barang akan dihapus');">Hapus</a>
            </td>
        </tr>

        <?php $i++; ?>
        <?php endforeach; ?>

    <table>

    <a href="tambah.php">tambah</a>
</body>
</html>