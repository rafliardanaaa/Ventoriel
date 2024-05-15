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

    function ubah($data) {
        global $conn;
        $id_barang = $data["id_barang"];
        $kode_barang = htmlspecialchars($data["kode_barang"]);
        $nama_barang = htmlspecialchars($data["nama_barang"]);
        $jumlah_barang = htmlspecialchars($data["jumlah_barang"]);
        $keadaan_baik = htmlspecialchars($data["keadaan_baik"]);
        $keadaan_rusak = htmlspecialchars($data["keadaan_rusak"]);

        $query = "UPDATE tab_dbarang SET 
                kode_barang = '$kode_barang',
                nama_barang = '$nama_barang',
                jumlah_barang = '$jumlah_barang',
                keadaan_baik = '$keadaan_baik',
                keadaan_rusak = '$keadaan_rusak'
                WHERE id_barang = $id_barang
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapus($id_barang) {
        global $conn;
        mysqli_query($conn, "DELETE FROM tab_dbarang WHERE id_barang = $id_barang");

        return mysqli_affected_rows($conn);
    }

    function cari($keyword) {
        $query = "SELECT * FROM tab_dbarang
            WHERE
            kode_barang LIKE '%$keyword%' OR
            nama_barang LIKE '%$keyword%'
            ";
        return query($query);
    }
?>