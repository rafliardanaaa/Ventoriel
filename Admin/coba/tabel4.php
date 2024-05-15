<?php
    require 'koneksi.php';
    
    $kode_barang = query("SELECT * FROM kode_barang ");

   
    
    //mysqli_fetch_row()//mengembalikan array numerik
    //mysqli_fetch_assoc()//mengembalikan array associative
    //mysqli_fetch_array()//mengembalikan keduanya

    //while ( $cb = mysqli_fetch_assoc($result) ) {
        //var_dump ($cb);
    //}
    if( isset($_POST["cari"]) ) {
        $kode_barang = cari ($_POST["keyword"]);
    }
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
    <table border="1" cellspacing="0">
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

    <table><br>

    <form action="" method="POST">

                <input type="hidden" name="kb" value="<?= $kode["kode barang"] ?>">

                <label for="ng">No</label><br>
                <input type="text" name="ng" id="no" required><br>

                <label for="kb">Kode Barang</label><br>
                <input type="text" name="kb" id="kode barang" required><br>

                <label for="nb">Nama Barang</label><br>
                <input type="text" name="nb" id="nama barang" required><br><br>

                <button type="submit" name="tambah">Tambah Data</button>


    </form><br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan barang yang anda cari" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>

    <h2>Breadcrumb Pagination</h2>

    <style>
ul.breadcrumb {
  padding: 8px 16px;
  list-style: none;
  background-color: #eee;
}

ul.breadcrumb li {display: inline;}

ul.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
}

ul.breadcrumb li a {color: green;}
</style>
</head>
<body>

<h2>Breadcrumb Pagination</h2>

<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Pictures</a></li>
  <li><a href="#">Summer 15</a></li>
  <li>Italy</li>
</ul>


<?php if( $halamanAktif > 1 ) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
        <?php if( $i == $halamanAktif ) : ?>
            <a href="?halaman=<?= $i; ?>" style="color: red"><?= $i; ?></a>
        <?php else: ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if( $halamanAktif < $jumlahHalaman ) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>

</body>
</html>