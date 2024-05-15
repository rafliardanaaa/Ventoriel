<?php 

    $conn = mysqli_connect("localhost","root","","bprojek");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }



    function hapus($no) {
        global $conn;
        mysqli_query($conn, "DELETE FROM tab_bprojek WHERE no = $no");

        return mysqli_affected_rows($conn);
    }
   
    function ubah($data) {
        global $conn;
        $no = $data["no"];
        $nobarang = htmlspecialchars($data["no"]);
        $kodbarang = htmlspecialchars($data["kb"]);
        $nambarang = htmlspecialchars($data["nb"]);

        $query = "UPDATE tab_bprojek SET 
                  nobar = '$nobarang', 
                  kb = '$kodbarang',
                  nb = '$nambarang'
                  WHERE no = $no
                  ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
   }
?>