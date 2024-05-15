<?php
if( isset($_POST["tambah"]) ) {
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'tabel4.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'tabel4.php';
            </script>
        ";
    }





}



?>