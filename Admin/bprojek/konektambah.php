<?php
    require 'koneksi.php';

    function tambah($data) {
        global $conn;
        $nobarang = htmlspecialchars($data["nobar"]);
        $kodbarang = htmlspecialchars($data["kb"]);
        $nambarang = htmlspecialchars($data["nb"]);

        $query = "INSERT INTO tab_bprojek VALUES ('$nobarang','$kodbarang','$nambarang')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
?>