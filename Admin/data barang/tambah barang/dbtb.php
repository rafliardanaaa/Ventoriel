<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $result = mysqli_query($conn, "SELECT * FROM tab_dbarang");

    if( isset($_POST["tambah"]) ) {
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href = '../db.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('data gagal ditambahkan!');
                document.location.href = '../db.php';
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
    <link rel="icon" href="../../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Barang - Data Barang</title>
</head>

<body>
    <center>
    <form action="" method="POST">
        <div class="tb">
            <h2>TAMBAH BARANG</h2>
        </div><br><br>
       
        <input type="hidden" name="id_barang" value="<?= $kode["id_barang"] ?>">

        <label for="gambar">Gambar Barang</label><br><br>
        <input type="file" name="gambar" id="gambar" required><br><br>

        <label for="kode_barang">Kode Barang</label><br><br>
        <input type="text" name="kode_barang" id="kode_barang" required><br><br>
           
        <label for="nama_barang">Nama Barang</label><br><br>
        <input type="text" name="nama_barang" id="nama_barang" required><br><br>

        <label for="jumlah_barang">Jumlah Barang</label><br><br>
        <input type="text" name="jumlah_barang" id="jumlah_barang" required><br><br>
         
        <label for="barang_baik">Keadaan Baik</label><br><br>
        <input type="text" name="barang_baik" id="barang_baik" required><br><br>

        <label for="barang_rusak">Keadaan Rusak</label><br><br>
        <input type="text" name="barang_rusak" id="barang_rusak" required><br><br><br>
                
        <div class="tombol">
            <button type="submit" name="tambah">Tambah</button>
            <button type="reset" name="reset">Reset</button>
        </div>

    </form>
    </center>    
</body>
</html>