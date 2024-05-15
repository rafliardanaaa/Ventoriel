<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $id_barang = $_GET['id_barang'];
    
    $kode = query("SELECT * FROM tab_dbarang WHERE id_barang = '$id_barang'")[0];

    if( isset($_POST["tambah"]) ) {
        if( ubah($_POST) > 0 ) {
            echo "
                <script>
                alert('data berhasil diubah!');
                document.location.href = 'db.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('data gagal diubah!');
                document.location.href = 'db.php';
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
    <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="ubah.css">
    <title>Ubah Barang - Data Barang</title>
</head>

<body>
    <center>
    <form action="" method="POST">
        <div class="tb">
            <h2>UBAH BARANG</h2>
        </div><br><br>
       
        <input type="hidden" name="id_barang" value="<?= $kode["id_barang"] ?>">

        <label for="gambar">Gambar</label><br><br>
        <input type="file" name="gambar" id="gambar" value="<?= $kode["gambar"]; ?>" required><br><br>

        <label for="kode_barang">Kode Barang</label><br><br>
        <input type="text" name="kode_barang" id="kode_barang" value="<?= $kode["kode_barang"]; ?>" required><br><br>
           
        <label for="nama_barang">Nama Barang</label><br><br>
        <input type="text" name="nama_barang" id="nama_barang" value="<?= $kode["nama_barang"]; ?>" required><br><br>

        <label for="jumlah_barang">Jumlah Barang</label><br><br>
        <input type="text" name="jumlah_barang" id="jumlah_barang" value="<?= $kode["jumlah_barang"]; ?>" required><br><br>
         
        <label for="keadaan_baik">Keadaan Baik</label><br><br>
        <input type="text" name="keadaan_baik" id="keadaan_baik" value="<?= $kode["keadaan_baik"]; ?>" required><br><br>

        <label for="keadaan_rusak">Keadaan Rusak</label><br><br>
        <input type="text" name="keadaan_rusak" id="keadaan_rusak" value="<?= $kode["keadaan_rusak"]; ?>" required><br><br><br>
                
        <div class="tombol">
            <button type="submit" name="tambah">Ubah</button>
            <button type="reset" name="reset">Reset</button>
        </div>

    </form>
    </center>    
</body>
</html>