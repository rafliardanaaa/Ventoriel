<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stindex.css">
    <title>Inventory Skiell</title>
</head>

<body>
    <center>    
    <div class="all">
        <h1>Inventory Skiell</h1>
        
        <p class="b1">Aplikasi peminjaman barang sarana dan prasarana berbasis web</p><br>
        <p class="b2">SMKN 1 GUNUNG PUTRI</p>

        <form action="" method="POST">
            <button type="submit" name="siswa">siswa</button><br><br><br>
            <button type="submit" name="admin">admin</button>
        </form>
    </div>
    </center>
</body>
</html>

<?php
    if (isset($_POST['siswa'])) {
        header ("location:../Inventory/admin/login siswa/login.php");
        exit;
    }
    if (isset($_POST['admin'])) {
        header ("location:../Inventory/admin/login admin/login.php");
        exit;
    }
?>