<?php
    require'kon2.php';

    $service = query("SELECT * FROM tab_2");
    

    if( isset($_POST["tambah"]) ) {
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href = '';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('data gagal ditambahkan!');
                document.location.href = '';
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
    <table border="1" cellspacing="0" cellpadding="20">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Nama Sparepart</th>
            <th>Harga</th>
            <th>Aksi</th>
        
        </tr>
        
        <?php $i = 1; ?>
        <?php foreach( $service as $row ) :?>

        <tr>
            <td><?= $i ?></td>
            <td><?= $row["tanggal"]; ?></td>
            <td><?= $row["nama barang"]; ?></td>
            <td><?= $row["nama sparepart"]; ?></td>
            <td><?= $row["harga sparepart"]; ?></td>
            <td>
                <a href="">Edit</a>
                <a href="hap2.php?nama=<?= $row["nama barang"]; ?>" onclick="return confirm('barang akan dihapus');">Hapus</a>
            </td>
        </tr>

        <?php $i++; ?>
        <?php endforeach; ?>
    <table><br>

    <form action="" method="POST">

        <label for="tt">Tanggal</label><br>
        <input type="date" name="tt" id="tanggal" required><br>

        <label for="nb">Nama Barang</label><br>
        <input type="text" name="nb" id="nama barang" required><br>

        <label for="ns">Nama Sparepart</label><br>
        <input type="text" name="ns" id="nama sparepart" required><br>

        <label for="hs">Harga Sparepart</label><br>
        <input type="text" name="hs" id="harga sparepart" required><br><br>

        <button type="submit" name="tambah">Tambah Data</button>


</form>

</body>
</html>