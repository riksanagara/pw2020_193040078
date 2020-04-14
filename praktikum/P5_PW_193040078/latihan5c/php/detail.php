<?php
    // Mengecek apakah ada id yang dikirimkan
    // Jika tidak ada maka akan dikembalikan ke halaman index.php
    if(!isset($_GET['id'])){
        header("location:../index.php");
        exit;
    }

    require 'function.php';

    // Mengambil id dari url

    $id = $_GET['id'];

    // Melakukan query dengan parameter id yang diambil dari url
    $book = query("SELECT * FROM buku WHERE kode_buku = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<style>

    /* My Fonts */
    @font-face{
        font-family: Montserrat;
        src: url(../assets/fonts/Montserrat/Montserrat-Ligtht.ttf);  
    }
    @font-face{
        font-family: Roboto;
        src: url(../assets/fonts/Montserrat/Roboto/Roboto-Light.ttf);  
    }
    *{
        font-family: Roboto;
    }
    .judul{
        font-size: 32px;
        margin-top : -5px;
    }
    .container{
        margin-top : 20px;
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.5);
        padding-top : 10px;
    }
    .row{
        padding-bottom: 10px;
    }
    img{
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.5);
    }
</style>
    <title>Latihan5c</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col gambar">
                <img src="../assets/img/<?= $book["cover"]; ?>" alt="">
            </div>
            <div class="col s8 keterangan">
                <p class="judul"><?= $book["judul"]; ?></p>
                <table>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td><?= $book["pengarang"]; ?></td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>:</td>
                        <td><?= $book["penerbit"]; ?></td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td><?= $book["tahun"]; ?></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td><?= $book["kategori"]; ?></td>
                    </tr>
                </table>
                <br>
                <a href="../index.php" class="waves-effect waves-light btn kembali">Kembali</a>
            </div>
        </div>
    </div>

     <!--JavaScript at end of body for optimized loading-->
     <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>