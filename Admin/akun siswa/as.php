<?php
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login siswa/logsiswa.php");
        exit;
    }
    
    include 'koneksi.php';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Akun - Inventory Skiell</title>
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
                <li><a href=""><button class="active">Akun</button></a></li>
                <li><a href="../beranda siswa/beranda.php"><button class="beranda">Beranda</button></a></li>
                <li><a href="../riwayat siswa/rs.php"><button class="riwayat">Riwayat</button></a></li>
            </ul>
            </center>
        </nav>
        </center>
    </div>
   

    <div class="box">
        <center>
        <div class="box-profil">
            <img class="box-gambar" src="../gambar/prof.jpeg" alt="">
        </div>
        </center>

        <center><h1>Inventory Skiell</h1></center>

        <div class="box-tab">
            <center>
            <p class="box-username">Username : <?php echo $_SESSION['userweb']; ?></p>

            <p class="box-password">Password : <?php echo $_SESSION['userweb1']; ?></p>
            </center>
        </div>
        
    </div>
  






</body>
</html>