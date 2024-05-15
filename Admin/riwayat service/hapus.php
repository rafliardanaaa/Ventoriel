<?php
    include 'koneksi.php';

    $id = $_GET["id"];

    if( hapus($id) > 0) {
        echo "
            <script>
            alert('riwayat berhasil dihapus!');
            document.location.href = 'rs.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('riwayat gagal dihapus!');
            document.location.href = 'rs.php';
            </script>
        ";
    }   
?>