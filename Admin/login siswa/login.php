<?php
    session_start();

    if( isset($_SESSION['userweb']) ) {
        header("location:../beranda siswa/beranda.php");
    }

    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Login Siswa - Inventory Skiell</title>
</head>

<body>
    <center>
    <div class="box"> 
        <form action="" method="post">
            <h2>Login Siswa</h2>

            <input type="hidden" name="id_kelas" value="<?= $kode_barang["id_kelas"] ?>">

            <div class="inputBox">
              <input type="text" name="username" required="required">
              <span>Username</span>
              <i></i>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
            </div><br>

            <button type="submit" name="login">Login</button>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $qry = mysqli_query($conn,"SELECT * FROM tab_siswa WHERE username = '$username' AND password = '$password'");
        $cek = mysqli_num_rows($qry);
        if ($cek===1) {
            $_SESSION['userweb']=$username;
            $_SESSION['userweb1']=$password;
            header ("location:../beranda siswa/beranda.php");
            exit;
        } else {
            echo "Maaf username dan password anda salah";
            }
        }
    ?>

        </form>
    </div>
    </center>


</body>
</html>