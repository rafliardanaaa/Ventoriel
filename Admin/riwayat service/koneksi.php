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

    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM tab_rservice WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;
        $id = $data["id"];
        $tanggal = htmlspecialchars($data["tanggal"]);
        $nama_barang = htmlspecialchars($data["nama_barang"]);
        $jenis = htmlspecialchars($data["jenis"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        $harga = htmlspecialchars($data["harga"]);

        $query = "UPDATE tab_rservice SET 
                  tanggal = '$tanggal',
                  nama_barang = '$nama_barang',
                  jenis = '$jenis',
                  keterangan = '$keterangan',
                  harga = '$harga'
                  WHERE id = $id
                  ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
   }

   function cari($keyword) {
    $query = "SELECT * FROM tab_rservice
            WHERE
            nama_barang LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%'
            ";
    return query($query);
}
?>