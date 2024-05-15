<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $id = $_GET['id'];
    
    $kode = query("SELECT * FROM tab_rservice WHERE id = '$id'")[0];

    if( isset($_POST["tambah"]) ) {
        if( ubah($_POST) > 0 ) {
            echo "
                <script>
                alert('data berhasil diubah!');
                document.location.href = 'rs.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('data gagal diubah!');
                document.location.href = 'rs.php';
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
    <title>Ubah Data - Riwayat Service</title>
</head>

<body>
    <center>
    <form action="" method="POST">
        <div class="tb">
            <h2>UBAH DATA</h2>
        </div><br><br>

        <input type="hidden" name="id" value="<?= $kode["id"] ?>">

        <label for="tanggal">Tanggal Service</label><br><br>
        <input type="Date" name="tanggal" id="tanggal" value="<?= $kode["tanggal"]; ?>"><br><br>
           
        <label for="nama_barang">Nama Barang</label><br><br>
        <input type="text" name="nama_barang" id="nama_barang" value="<?= $kode["nama_barang"]; ?>" required><br><br>
         
        <label for="jenis">Jenis</label><br><br>
        <select name="jenis">
            <option value=""><?php echo "$kode[jenis]"; ?></option>
            <option value="Service">Service</option>
            <option value="Ganti Sparepart">Ganti Sparepart</option>
            <option value="Service + Ganti Sparepart">Service + Ganti Sparepart</option>
        </select><br><br>

        <label for="keterangan">Keterangan</label><br><br>
        <input type="text" name="keterangan" id="keterangan" value="<?= $kode["keterangan"]; ?>" required><br><br>

        <label for="harga">Harga</label><br><br>
        <input type="text" name="harga" id="harga" value="<?= $kode["harga"]; ?>"><br><br><br>
                
        <div class="tombol">
            <button type="submit" name="tambah">Ubah</button>
            <button type="reset" name="reset">Reset</button>
        </div>

    </form>
    </center>    
</body>
</html>