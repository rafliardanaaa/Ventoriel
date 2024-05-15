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

    function hapus($id_kelas) {
        global $conn;
        mysqli_query($conn, "DELETE FROM tab_siswa WHERE id_kelas = $id_kelas");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;
        $id_kelas = $data["id_kelas"];
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
        $status = htmlspecialchars($data["status"]);

        $query = "UPDATE tab_siswa SET 
                username = '$username',
                password = '$password',
                status = '$status'
                WHERE id_kelas = $id_kelas
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
   }

    function cari($keyword) {
        $query = "SELECT * FROM tab_siswa
                WHERE
                username LIKE '%$keyword%' OR
                password LIKE '%$keyword%'
                ";
        return query($query);
   }
?>