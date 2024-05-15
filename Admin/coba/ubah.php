<?php
    require 'koneksi.php';
    require 'koneksitb.php';

    $no = $_GET["no"];
    
    $kode = query("SELECT * FROM kode_barang WHERE no = $no")[0];

    $kode_barang = query("SELECT * FROM kode_barang");

    $result = mysqli_query($conn, "SELECT * FROM kode_barang");
    
    //mysqli_fetch_row()//mengembalikan array numerik
    //mysqli_fetch_assoc()//mengembalikan array associative
    //mysqli_fetch_array()//mengembalikan keduanya

    //while ( $cb = mysqli_fetch_assoc($result) ) {
        //var_dump ($cb);
    //}

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
        <?php foreach( $kode_barang as $row ) :?>

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

    <form action="" method="POST">
        <input type="hidden" name="no" value="<?= $kode["no"] ?>">
        <ul>
            <li>
                <label for="no">No</label>
                <input type="text" name="no" id="no" value="<?= $kode["no"]; ?>" required>
            </li>
            <li>
                <label for="kb">Kode Barang</label>
                <input type="text" name="kb" id="kode barang" value="<?= $kode["kode barang"]; ?>" required>
            </li>
            <li>
                <label for="nb">Nama Barang</label>
                <input type="text" name="nb" id="nama barang" value="<?= $kode["nama barang"]; ?>" required>
            </li>
            <li>
                <button type="submit" name="tambah">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>