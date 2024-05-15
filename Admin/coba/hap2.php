<?php
require 'kon2.php';

    $nama = $_GET["no"];

    if( hapus($nama) > 0) {
        echo "
            <script>
            alert('data berhasil dihapus!');
            document.location.href = 'tabel4.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal dihapus!');
            document.location.href = 'tabel4.php';
            </script>
        ";
    }   
?>