<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $kode_barang = query("SELECT * FROM tab_rservice");

    if( isset($_POST["cari"]) ) {
        $kode_barang = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Riwayat Service - Inventory Skiell</title>
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
            <a href="../dashboard/dashboard.php"><li>Dashboard</li></a>
            <a href="../data barang/db.php"><li>Data Barang</li></a>
            <a href="../data akun/da.php"><li>Data Akun</li></a>
            <a href="../status pinjaman/sp.php"><li>Status Pinjaman</li></a>
            <a href="../riwayat pinjaman/rp.php"><li>Riwayat Pinjaman</li></a>
            <a href="../riwayat service/rs.php"><li class="active">Riwayat Service</li></a>
        </ul>
        </center>
    </nav>

    <div class="bawnbar">
        <div class="ketbawnbar">
            <a class="kbn1" href="">inventory skiell</a><a> / </a><a class="kbn2" href="">riwayat service</a>
        </div>
    </div>

    <h1 class="hadmin">Hallo, Admin</h1>

    <a href="../riwayat service/tambah barang/rstb.php"><button class="tomtb">Tambah Barang</button></a>

    <form class="tomcb" action="" method="POST">
        <input class="keyword" type="search" name="keyword" autofocus placeholder="masukan barang yang anda cari" autocomplete="off" size="30">
        <button class="cari" type="submit" name="cari"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
    </form>

    <center>
    <div class="tab">
    <table cellspacing="0">
        <tr class="b1">
            <th class="k1">No</th>
            <th class="k2">Tanggal</th>
            <th class="k3">Nama Barang</th>
            <th class="k4">Jenis Perbaikan</th>
            <th class="k5">Keterangan</th>
            <th class="k6">Harga</th>
            <th class="k7">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $kode_barang as $row ) :?> 

        <tr class="b2">
            <td class="k1" ALIGN="center"><?= $i ?></td>
            <td class="k2" ALIGN="center"><?= $row["tanggal"]; ?></td>
            <td class="k3" ALIGN="center"><?= $row["nama_barang"]; ?></td>
            <td class="k4" ALIGN="center"><?= $row["jenis"]; ?></td>
            <td class="k5" ALIGN="center"><?= $row["keterangan"]; ?></td>
            <td class="k6" ALIGN="center">Rp. <?= $row["harga"]; ?>,00</td>
            <td class="k7" ALIGN="center">
                    <a href="ubah.php?id=<?= $row["id"]; ?>"><button class="ubah">Ubah</button></a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('barang akan dihapus');"><button class="hapus">Hapus</button></a>  
            </td>
        </tr>

        <?php $i++; ?>
        <?php endforeach; ?>

    </table>
    </div>
    </center>

    
        
    

    
    
</body>
</html>
