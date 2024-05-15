<?php 
    $conn = mysqli_connect("localhost","root","","data");

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
        $tgl = htmlspecialchars($data["tt"]);
        $nbar = htmlspecialchars($data["nb"]);
        $nspar = htmlspecialchars($data["ns"]);
        $hspar = htmlspecialchars($data["hs"]);

        $query = "INSERT INTO tab_2 VALUES ('$tgl','$nbar','$nspar','$hspar')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function hapus($nama) {
        global $conn;
        mysqli_query($conn, "DELETE FROM kode_barang WHERE no = $nama");

        return mysqli_affected_rows($conn);
    }
?>