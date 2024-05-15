<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $jumlahDataPerhalaman = 10;
    $jumlahData = count(query("SELECT * FROM tab_siswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;

    $kode_barang = query("SELECT * FROM tab_siswa LIMIT $awalData, $jumlahDataPerhalaman");
       
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
    <title>Data Akun - Inventory Skiell</title>
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
            <a href=""><li class="active">Data Akun</li></a>
            <a href="../status pinjaman/sp.php"><li>Status Pinjaman</li></a>
            <a href="../riwayat pinjaman/rp.php"><li>Riwayat Pinjaman</li></a>
            <a href="../riwayat service/rs.php"><li>Riwayat Service</li></a>
        </ul>
        </center>
    </nav>

    <div class="bawnbar">
        <div class="ketbawnbar">
            <a class="kbn1" href="">inventory skiell</a><a> / </a><a class="kbn2" href="">data akun</a>
        </div>
    </div>

    <h1 class="hadmin">Hallo, Admin</h1>

    <a href="../data akun/tambah barang/datb.php"><button class="tomtb">Tambah Barang</button></a>

    <form class="tomcb" action="" method="POST">
        <input class="keyword" type="search" name="keyword" autofocus placeholder="masukan barang yang anda cari" autocomplete="off" size="30">
        <button class="cari" type="submit" name="cari"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
    </form>

    <center>
    <div class="tab">
    <table cellspacing="0">
        <tr class="b1">
            <th class="k1">No</th>
            <th class="k2">Username</th>
            <th class="k3">Password</th>
            <th class="k4">Status</th>
            <th class="k5">Aksi</th>
        </tr>
        
        <?php $i = 1 + $awalData; ?>
        <?php foreach( $kode_barang as $row ) :?> 

        <tr class="b2">
            <td class="k1" ALIGN="center"><?= $i ?></td>
            <td class="k2" ALIGN="center"><?= $row["username"]; ?></td>
            <td class="k3" ALIGN="center"><?= $row["password"]; ?></td>
            <td class="k4" ALIGN="center"><?= $row["status"]; ?></td>
            <td class="k5" ALIGN="center">
                    <a href="ubah.php?id_kelas=<?= $row["id_kelas"]; ?>"><button class="ubah"><i class="fa-sharp fa-solid fa-pen"></i></button></a>
                    <a href="hapus.php?id_kelas=<?= $row["id_kelas"]; ?>" onclick="return confirm('barang akan dihapus');"><button class="hapus"><i class="fa-sharp fa-solid fa-trash-can"></i></button></a>  
            </td>
        </tr>

        <?php $i++ + $awalData; ?>
        <?php endforeach; ?>
    </table>

    <div class="pagination">
        <?php if( $halamanAktif > 1 ) : ?>
            <a href="?halaman=<?= $halamanAktif - 1; ?>">❮</a>
        <?php endif; ?>

        <?php if( $halamanAktif < $jumlahHalaman ) : ?>
            <a href="?halaman=<?= $halamanAktif + 1; ?>">❯</a>
        <?php endif; ?>
    </div>

    </div>
    </center>

</body>
</html>