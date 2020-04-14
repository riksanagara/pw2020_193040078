<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "");

    // Memilih database
    mysqli_select_db($conn, "tubes_193040078");

    // query menagmbil objek dari tabel didalam database
    $result = mysqli_query($conn, "SELECT * FROM BUKU");

?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Latihan5a</title>
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
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><img src="assets/img/<?= $row["cover"]?>"></td>
                <td><?= $row["judul"]?></td>
                <td><?= $row["pengarang"]?></td>
                <td><?= $row["penerbit"]?></td>
                <td><?= $row["tahun"]?></td>
                <td><?= $row["kategori"]?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

     <!--JavaScript at end of body for optimized loading-->
     <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>