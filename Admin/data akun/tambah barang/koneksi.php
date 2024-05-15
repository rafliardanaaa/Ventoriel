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
        $id_kelas = htmlspecialchars($data["id_kelas"]);
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
        $status = htmlspecialchars($data["status"]);

        $query = "INSERT INTO tab_siswa VALUES ('$id_kelas','$username','$password','$status')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
   }
?>