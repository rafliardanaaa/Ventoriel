<?php
require 'koneksi.php';

    $no = $_GET["no"];

    if( hapus($no) > 0) {
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