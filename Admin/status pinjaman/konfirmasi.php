<?php
    include '../riwayat pinjaman/koneksi.php';

    $id = $_GET["id"];
 
    $kode = query("SELECT * FROM tab_spinjaman WHERE id = '$id'")[0];
    
    $result = mysqli_query($conn, "SELECT * FROM tab_rpinjaman");

    if( isset($_POST["tambah"]) ) {
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                alert('barang telah dikembalikan!');
                document.location.href = '../riwayat pinjaman/rp.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('barang telah dikembalikan!');
                document.location.href = '../riwayat pinjaman/rp.php';
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
    <link rel="stylesheet" href="konfirmasi.css">
    <title>Document</title>
</head>
<body>
    <center>
    <form class="form-pinjam" action="" method="post">
        <center>
        <h1 class="label-pinjam">Konfirmasi Barang</h1>
        </center>
        
        <div class="isi">
        <input type="hidden" name="id" value="<?= $kode_barang["id"] ?>">

        <input type="hidden" name="id_barang" value="<?= $kode["id_barang"] ?>">

        <label for="tanggal">Tanggal Peminjaman</label><br><br>
        <input type="Date" name="tanggal" id="tanggal" value="<?= $kode["tanggal"]; ?>" required autocomplete="off"><br><br>
           
        <label for="kode_barang">Kode Barang</label><br><br>
        <input type="text" name="kode_barang" id="kode_barang" value="<?= $kode["kode_barang"]; ?>" required autocomplete="off"><br><br>
         
        <label for="nama_barang">Nama Barang</label><br><br>
        <input type="text" name="nama_barang" id="nama_barang" value="<?= $kode["nama_barang"]; ?>" required autocomplete="off"><br><br>

        <label for="jumlah">Jumlah</label><br><br>
        <input type="text" name="jumlah" id="jumlah" value="<?= $kode["jumlah"]; ?>" required autocomplete="off"><br><br>
        
        <label for="peminjam">Nama Kelas</label><br><br>
        <input type="text" name="peminjam" id="peminjam" value="<?= $kode["peminjam"]; ?>" required autocomplete="off"><br><br>

        <label for="pengambilan">Waktu Pengambilan</label><br><br>
        <input type="time" name="pengambilan" id="pengambilan" value="<?= $kode["pengambilan"]; ?>" required autocomplete="off"><br><br>

        <label for="pengembalian">Waktu Pengembalian</label><br><br>
        <input type="time" name="pengembalian" id="pengembalian" value="<?= $kode["pengembalian"]; ?>" required autocomplete="off"><br><br>

        <label for="keterangan">Keterangan</label><br><br>
        <input type="text" name="keterangan" id="keterangan" required autocomplete="off"><br><br>
        </div>
                
        <center>
        <button class="tombol" type="submit" name="tambah">Konfirmasi</button>
        </center>
    </form>  
    </center>

</body>
</html>