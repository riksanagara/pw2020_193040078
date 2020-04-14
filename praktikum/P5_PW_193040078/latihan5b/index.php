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
        src: url(../assets/fonts/Montserrat/Montserrat-Ligtht.ttf);  
    }
    @font-face{
        font-family: Roboto;
        src: url(../assets/fonts/Montserrat/Roboto/Roboto-Light.ttf);  
    }
    .container{
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.5);
        padding: 10px;
    }
</style>
    <title>Latihan5b</title>
</head>

<body>

    <div class="container">
        <table cellspacing = 0 cellpadding = 10 border = 1>
            <tr>
                <th>Cover</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kategori</th>
            </tr>
            <?php foreach($book as $books) : ?>
            <tr>
                <td><img src="assets/img/<?= $books["cover"]?>"></td>
                <td><?= $books["judul"]?></td>
                <td><?= $books["pengarang"]?></td>
                <td><?= $books["penerbit"]?></td>
                <td><?= $books["tahun"]?></td>
                <td><?= $books["kategori"]?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      

</body>
</html>