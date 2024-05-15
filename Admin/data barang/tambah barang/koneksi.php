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
        $id_barang = htmlspecialchars($data["id_barang"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $kode_barang = htmlspecialchars($data["kode_barang"]);
        $nama_barang = htmlspecialchars($data["nama_barang"]);
        $jumlah_barang = htmlspecialchars($data["jumlah_barang"]);
        $barang_baik = htmlspecialchars($data["barang_baik"]);
        $barang_rusak = htmlspecialchars($data["barang_rusak"]);

        $query = "INSERT INTO tab_dbarang VALUES ('$id_barang','$gambar','$kode_barang','$nama_barang','$jumlah_barang','','','$barang_baik','$barang_rusak')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
   }
?>