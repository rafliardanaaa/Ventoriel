<?php  
    session_start();

    if( !isset($_SESSION["userweb"]) ) {
        header("Location:../login siswa/logsiswa.php");
        exit;
    }

    include 'koneksi.php';

    $kode_barang = query("SELECT * FROM tab_dbarang");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="icon" href="../gambar/skiell.png" type="image/x-icon">
    <link rel="stylesheet" href="../status siswa/swiper-bundle.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Beranda - Inventory Skiell</title>
</head>

<body>
    <div class="background">
        <div class="navbar">
            <img class="navbar-img" src="../gambar/skiell.png">
            
            <label class="inventory">Inventory Skiell</label>

            <center>
            <div class="underline"></div>
            </center>

            <center>
            <nav class="navbar-items">
                <center>
                <ul>
                    <li><a href="../akun siswa/as.php"><button class="akun">Akun</button></a></li>
                    <li><a href=""><button class="active">Beranda</button></a></li>
                    <li><a href="../riwayat siswa/rs.php"><button class="riwayat">Riwayat</button></a></li>
                </ul>
                </center>
            </nav>
            </center>

            <div class="logout">
                <a href="../logoutsiswa.php">Log Out</a>
            </div>
        </div>
    
                <div class="text">
                    <h1 style="font-size:80px">INVENTORY SKIELL</h1>

                    <h3>Aplikasi peminjaman barang sarana & prasarana berbasis web</h3>
                </div>

                <div class="shade"></div>
            </div>

           
        </div>

        <div class="block"></div>

        <div class="container-items">

            <div class="shade2"></div>

        <div class="slide-container swiper">
            <div class="slide-content"> 
                <div class="card-wrapper swiper-wrapper">

                    <?php foreach( $kode_barang as $row ) :?> 

                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="../gambar/proyektor.jpg" alt="" class="card-img">
                            </div> 
                        </div>

                        <div class="card-content">
                            <h2 class="name"><?= $row["nama_barang"]; ?></h2>
                            <p class="description"><?= $row["barang_tersedia"]; echo" Tersedia" ?> | <?= $row["barang_terpinjam"]; echo" Terpinjam" ?></p>
                            <a href="../pinjam siswa/ps.php?id_barang=<?= $row["id_barang"]; ?>"><button class="button">Pinjam</button></a>
                        </div>
                        
                    </div>        

                    <?php endforeach; ?>

                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>      
    
        <div class="shade3"></div>

        </div>

    <footer>
        <div class="gabung">
            <div class="foto">
                <img class="footer-img" src="../gambar/skiell.png"></img>
            </div>

            <div class="image-text">
                <p class="image-text1">INVENTORY</p>
                <p class="image-text2">SKIELL</p>
            </div>
        </div>

        <div class="ket">
            <p class="footer-text">© 2022 INVENTORY SKIELL All Rights Reserved</p>
        </div>

        <center>
        <div class="footer-address">
            <p>Jl. Barokah No. 06 Wanaherang Gunungputri 16965</p>
        </div>
        </center>
        
        <div class="footer-sosmed">
            <ul class="sosmed-items">   
                <li><a>Sosial Media : </a></li> 
                <li><a href="https://www.facebook.com/SMKN1GUNPUTRI" target="blannk"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/smkn1gunungputri/" target="blank"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/@SMKN1GunungputriOfficial" target="blank"><i class="fa-brands fa-youtube"></i></a></li>   
            </ul>
        </div>
       
        <div class="footer-contact">
            <ul>
                <li>smkn1gnp@smkn1gnputri.sch.id</li>
                <li>(021) 8673310</li>
            </ul>
        </div>
    </footer>
</body>

    <script src="../status siswa/swiper-bundle.min.js"></script>
    <script src="../status siswa/script.js"></script>
</html>