<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../../login admin/login.php");
        exit;
    }

    include 'koneksi.php';

    $result = mysqli_query($conn, "SELECT * FROM tab_siswa");

    if( isset($_POST["tambah"]) ) {
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href = '../da.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('data gagal ditambahkan!');
                document.location.href = '../da.php';
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
    <title>Tambah Akun - Data Akun</title>
</head>

<body>
    <center>
    <form action="" method="POST">
        <div class="tb">
            <h2>TAMBAH AKUN</h2>
        </div><br><br>
       
        <input type="hidden" name="id_kelas" value="<?= $kode["id_kelas"] ?>">
           
        <label for="username">Username</label><br><br>
        <input type="text" name="username" id="username" required><br><br>
         
        <label for="password">Password</label><br><br>
        <input type="text" name="password" id="password" required><br><br>

        <label for="status">Status</label><br><br>
        <input type="text" name="status" id="status" required><br><br><br>
                
        <div class="tombol">
            <button type="submit" name="tambah">Tambah</button>
            <button type="reset" name="reset">Reset</button>
        </div>

    </form>
    </center>
</body>
</html>