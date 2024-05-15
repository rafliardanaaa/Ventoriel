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
          $nobarang = htmlspecialchars($data["ng"]);
          $kodbarang = htmlspecialchars($data["kb"]);
          $nambarang = htmlspecialchars($data["nb"]);

          $query = "INSERT INTO kode_barang VALUES ('$nobarang','$kodbarang','$nambarang')";
          mysqli_query($conn,$query);
          return mysqli_affected_rows($conn);
     }

     function hapus($no) {
          global $conn;
          mysqli_query($conn, "DELETE FROM kode_barang WHERE no = $no");
  
          return mysqli_affected_rows($conn);
      }

     function ubah($data) {
          global $conn;
          $no = $data["no"];
          $nobarang = htmlspecialchars($data["ng"]);
          $kodbarang = htmlspecialchars($data["kb"]);
          $nambarang = htmlspecialchars($data["nb"]);

          $query = "UPDATE kode_barang SET 
                    nobar = '$nobarang', 
                    kobar = '$kodbarang',
                    nabar = '$nambarang'
                    WHERE no = '$no' ;
                    ";
          mysqli_query($conn,$query);
          return mysqli_affected_rows($conn);
     }

     function cari($keyword) {
          $query = "SELECT * FROM kode_barang
                         WHERE
                         no = '$keyword' 
                         
                    ";
          return query($query);
     }
?>