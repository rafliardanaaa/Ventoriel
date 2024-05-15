<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login siswa/logsiswa.php");
        exit;
    }

    include 'koneksi.php';


    $kode_barang = query("SELECT * FROM tab_rpinjaman");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Riwayat - Inventory Skiell</title>
</head>

<body>
<div class="navbar">
        <center>
        <div class="underline"></div>
        </center>

        <center>
        <nav class="navigasi">
            <center>
            <ul>
                <li><a href="../akun siswa/as.php"><button class="akun">Akun</button></a></li>
                <li><a href="../beranda siswa/beranda.php"><button class="beranda">Beranda</button></a></li>
                <li><a href=""><button class="active">Riwayat</button></a></li>
            </ul>
            </center>
        </nav>
        </center>
    </div>

    <center>
    <div class="tab">
    <table cellspacing="0">
        <tr class="b1">
            <th class="k1">No</th>
            <th class="k2">Tanggal Peminjaman</th>
            <th class="k3">Kode Barang</th>
            <th class="k4">Nama Barang</th>
            <th class="k5">Nama Kelas</th>
            <th class="k6">Pengambilan</th>
            <th class="k7">Pengembalian</th>
            <th class="k8">Keterangan</th>
        </tr>
        
        <?php $i = 1 ?>
        <?php foreach( $kode_barang as $row ) :?> 

        <tr class="b2">
            <td class="k1" ALIGN="center"><?= $i ?></td>
            <td class="k2" ALIGN="center"><?= $row["tanggal"]; ?></td>
            <td class="k3" ALIGN="center"><?= $row["kode_barang"]; ?></td>
            <td class="k4" ALIGN="center"><?= $row["nama_barang"]; ?></td>
            <td class="k5" ALIGN="center"><?= $row["peminjam"]; ?></td>
            <td class="k6" ALIGN="center"><?= $row["pengambilan"]; ?></td>
            <td class="k7" ALIGN="center"><?= $row["pengembalian"]; ?></td>
            <td class="k8" ALIGN="center">
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('barang akan dihapus');"><button class="hapus">Hapus</button></a>  
            </td>
        </tr>

        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
    </div>

    </center>
</body>
</html>