<?php
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("location:../admin/login siswa/login.php");
    exit;
?>