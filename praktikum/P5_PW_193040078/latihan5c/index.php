<?php
  
    //   menghubungkan dengan file php lain
    require 'php/function.php';

    // melakukan query
    $book = query("SELECT * FROM buku");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>

        /* My Fonts */
        @font-face{
            font-family: Montserrat;
            src: url(assets/fonts/Montserrat/Montserrat-Ligtht.ttf);  
        }
        @font-face{
            font-family: Roboto;
            src: url(assets/fonts/Montserrat/Roboto/Roboto-Light.ttf);  
        }
        *{
            font-family:Roboto;
        }
        .card-image{
            min-height: 250px;
            position: relative;
        }
        .card-content{
            min-height:120px;
        }

        .carousel{
            height: 600px;
        }
        p a{
            color: black;
        }
        p a:hover{
            text-decoration: underline;
        }

        .card-image a:hover::after{
            content : '';
            display: block;
            width : 100%;
            height : 100%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            bottom: 0;
        }
        .container{
            margin-top : -120px;
        }
    </style>

    <title>Latihan5c</title>
</head>
<style>

</style>
<body>
    
    <div class="container">
        <div class="row">
            <div class="carousel">
                <?php foreach ($book as $books) : ?>
                <div class="carousel-item">
                    <div class="col">
                    <div class="card">
                        <div class="card-image">
                            <a href="php/detail.php?id=<?= $books['kode_buku']?>">
                                <img src="assets/img/<?= $books['cover']?>">
                            </a> 
                        </div>
                        <div class="card-content">
                            <p>
                                <a href="php/detail.php?id=<?= $books['kode_buku']?>">
                                    <?= $books['judul'] ?>
                                </a>
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
     <!--JavaScript at end of body for optimized loading-->
     <script type="text/javascript" src="js/materialize.min.js"></script>
     <script>
         const buku = document.querySelectorAll(".carousel");
         M.Carousel.init(buku);
     </script>

</body>
</html>