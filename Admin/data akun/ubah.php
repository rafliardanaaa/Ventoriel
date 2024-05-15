<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $id_kelas = $_GET['id_kelas'];
    
    $kode = query("SELECT * FROM tab_siswa WHERE id_kelas = '$id_kelas'")[0];

    if( isset($_POST["tambah"]) ) {
        if( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'da.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'da.php';
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
    <title>Ubah Akun - Data Akun</title>
</head>
<body>
    <center>
    <form action="ubah.php" method="POST">
        <div class="tb">
            <h2>UBAH AKUN</h2>
        </div><br><br>

        <input type="hidden" name="id_kelas" value="<?= $kode["id_kelas"] ?>">
           
        <label for="username">Username</label><br><br>
        <input type="text" name="username" id="username" value="<?= $kode["username"]; ?>" required><br><br>
         
        <label for="password">Password</label><br><br>
        <input type="text" name="password" id="password" value="<?= $kode["password"]; ?>" required><br><br>

        <label for="status">Status</label><br><br>
        <input type="text" name="status" id="status" value="<?= $kode["status"]; ?>" required><br><br><br>
                
        <div class="tombol">
            <button type="submit" name="tambah">Ubah</button>
            <button type="reset" name="reset">Reset</button>
        </div>

    </form>
    </center>
</body>
</html>