<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $jumlahDataPerhalaman = 10;
    $jumlahData = count(query("SELECT * FROM tab_rpinjaman"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;

    $kode_barang = query("SELECT * FROM tab_spinjaman LIMIT $awalData, $jumlahDataPerhalaman");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Status Pinjaman - Inventory Skiell</title>
</head>

<body>
    <div class="navbar">
        <label class="lo"><a href="../logoutadmin.php">Log Out</a></label>
    </div>

    <nav class="sidebar">
        <center>
        <label class="is">Inventory Skiell</label>
        </center>

        <center>
        <ul>
            <a href="../dashboard/dashboard.php"><li>Dashboard</li></a>
            <a href="../data barang/db.php"><li>Data Barang</li></a>
            <a href="../data akun/da.php"><li>Data Akun</li></a>
            <a href=""><li class="active">Status Pinjaman</li></a>
            <a href="../riwayat pinjaman/rp.php"><li>Riwayat Pinjaman</li></a>
            <a href="../riwayat service/rs.php"><li>Riwayat Service</li></a>
        </ul>
        </center>
    </nav>

    <div class="bawnbar">
        <div class="ketbawnbar">
            <a class="kbn1" href="">inventory skiell</a><a> / </a><a class="kbn2" href="">status pinjaman</a>
        </div>
    </div>

    <h1 class="hadmin">Hallo, Admin</h1>

    <center>
    <div class="tab">
    <table cellspacing="0">
        <tr class="b1">
            <th class="k1">No</th>
            <th class="k2">Tanggal</th>
            <th class="k3">Kode Barang</th>
            <th class="k4">Nama Barang</th>
            <th class="k5">Jumlah Barang</th>
            <th class="k6">Peminjam</th>
            <th class="k7">Pengambilan</th>
            <th class="k8">Pengembalian</th>
            <th class="k9">Konfirmasi</th>
        </tr>
        
        <?php $i = 1 + $awalData; ?>
        <?php foreach( $kode_barang as $row ) :?> 

        <tr class="b2">
            <td class="k1" ALIGN="center"><?= $i ?></td>
            <td class="k2" ALIGN="center"><?= $row["tanggal"]; ?></td>
            <td class="k3" ALIGN="center"><?= $row["kode_barang"]; ?></td>
            <td class="k4" ALIGN="center"><?= $row["nama_barang"]; ?></td>
            <td class="k5" ALIGN="center"><?= $row["jumlah"]; echo" Unit"?></td>
            <td class="k6" ALIGN="center"><?= $row["peminjam"]; ?></td>
            <td class="k7" ALIGN="center"><?= $row["pengambilan"]; ?></td>
            <td class="k8" ALIGN="center"><?= $row["pengembalian"]; ?></td>
            <td class="k9" ALIGN="center">
                    <a href="konfirmasi.php?id=<?= $row["id"]; ?>"><button class="cek">Cek</button></a>  
            </td>
        </tr>

        <?php $i++ + $awalData; ?>
        <?php endforeach; ?>
    </table>
    </div>
    </center>

    
</body>
</html>