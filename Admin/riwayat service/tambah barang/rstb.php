<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $result = mysqli_query($conn, "SELECT * FROM tab_rservice");

    if( isset($_POST["tambah"]) ) {
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href = '../rs.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('data gagal ditambahkan!');
                document.location.href = '../rs.php';
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
    <title>Tambah Data - Riwayat Service</title>
</head>

<body>
    <center>
    <form action="" method="POST">
        <div class="tb">
            <h2>TAMBAH DATA</h2>
        </div><br><br>
       
        <input type="hidden" name="no" value="<?= $kode["no"] ?>">

        <label for="tgl">Tanggal Service</label><br><br>
        <input type="Date" name="tgl" id="tanggal"><br><br>
           
        <label for="nb">Nama Barang</label><br><br>
        <input type="text" name="nb" id="nama barang" required><br><br>
         
        <label for="jn">Jenis</label><br><br>
        <select name="jn">
            <option value="Service">Service</option>
            <option value="Ganti Sparepart">Ganti Sparepart</option>
            <option value="Service + Ganti Sparepart">Service + Ganti Sparepart</option>
        </select><br><br>

        <label for="kt">Keterangan</label><br><br>
        <input type="text" name="kt" id="keterangan" required><br><br>

        <label for="hs">Harga</label><br><br>
        <input type="text" name="hs" id="harga"><br><br><br>
                
        <div class="tombol">
            <button type="submit" name="tambah">Tambah</button>
            <button type="reset" name="reset">Reset</button>
        </div>

    </form>
    </center>    
</body>
</html>