<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $kode_barang = query("SELECT * FROM tab_dbarang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard - Inventory Skiell</title>
</head>

<body>
    <div class="nbar">
        <label class="lo"><a href="../logoutadmin.php">Log Out</a></label>
    </div>
    <nav class="sbar">
        <center>
        <label class="is">Inventory Skiell</label>
        </center>

        <center>
        <ul>
            <a href=""><li class="active">Dashboard</li></a>
            <a href="../data barang/db.php"><li>Data Barang</li></a>
            <a href="../data akun/da.php"><li>Data Akun</li></a>
            <a href="../status pinjaman/sp.php"><li>Status Pinjaman</li></a>
            <a href="../riwayat pinjaman/rp.php"><li>Riwayat Pinjaman</li></a>
            <a href="../riwayat service/rs.php"><li>Riwayat Service</li></a>
        </ul>
        </center>
    </nav>

    <div class="bawnbar">
        <div class="ketbawnbar">
            <a class="kbn1" href="">inventory skiell</a><a> / </a><a class="kbn2" href="">dashboard</a>
        </div>
    </div>

    <h1 class="hadmin">Hallo, Admin</h1>

    <div class="tab">
        
        
        <?php foreach( $kode_barang as $row ) :?> 

        <div class="tab-items">
            <p><?= $row["nama_barang"]; ?></p>
        </div>
        
        <div class="tab-qty">
            <p><?= $row["barang_tersedia"]; echo" Tersedia" ?> | <?= $row["barang_terpinjam"]; echo" Terpinjam" ?></p>
        </div>
    
       
        <?php endforeach; ?>

    </div>

</html>