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
        $id_barang = htmlspecialchars($data["id_barang"]);
        $tanggal = htmlspecialchars($data["tanggal"]);
        $kode_barang = htmlspecialchars($data["kode_barang"]);
        $nama_barang = htmlspecialchars($data["nama_barang"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $peminjam = htmlspecialchars($data["peminjam"]);
        $pengambilan = htmlspecialchars($data["pengambilan"]);
        $pengembalian = htmlspecialchars($data["pengembalian"]);

        $query = "INSERT INTO tab_spinjaman VALUES ('$id','$id_barang','$tanggal','$kode_barang','$nama_barang',$jumlah,'$peminjam','$pengambilan','$pengembalian')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
   }
?>