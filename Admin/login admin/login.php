<?php
    session_start();

    if( isset($_SESSION['userweb']) ) {
        header("location:../dashboard/dashboard.php");
    }

    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <title>Login Admin - Inventory Skiell</title>
</head>

<body>
    <center>
    <div class="box"> 
        <form action="" method="post">
            <h2>Login Admin</h2>


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
        $qry = mysqli_query($conn,"SELECT * FROM tab_admin WHERE username = '$username' AND password = '$password'");
        $cek = mysqli_num_rows($qry);
        if ($cek===1) {
            $_SESSION['userweb']=$username;
            $_SESSION['userweb1']=$password;
            header ("location:../dashboard/dashboard.php");
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