<?php
    include 'koneksi.php';

    $id_barang = $_GET["id_barang"];

    if( hapus($id_barang) > 0) {
        echo "
            <script>
            alert('data berhasil dihapus!');
            document.location.href = 'db.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal dihapus!');
            document.location.href = 'db.php';
            </script>
        ";
    }   
?>