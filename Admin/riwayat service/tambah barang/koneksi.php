<?php
    $conn = mysqli_connect("localhost","root","","inventory");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
             $rows[] = $row;
        }
        return $rows;
   }

    function tambah($data) {
        global $conn;
        $id = htmlspecialchars($data["id"]);
        $tgl = htmlspecialchars($data["tgl"]);
        $nb = htmlspecialchars($data["nb"]);
        $jn = htmlspecialchars($data["jn"]);
        $kt = htmlspecialchars($data["kt"]);
        $hs = htmlspecialchars($data["hs"]);

        $query = "INSERT INTO tab_rservice VALUES ('$id','$tgl','$nb','$jn','$kt','$hs')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
   }
?>