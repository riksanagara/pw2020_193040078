<?php
  
    //   menghubungkan dengan file php lain
    require 'php/function.php';

    if(isset($_GET['cari'])){
        $keyword = $_GET['keyword'];
        $book = query("SELECT * FROM buku WHERE
                judul LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                pengarang LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' ");
    }else{
        $book = query("SELECT * FROM buku");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Latihan6e</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="navbar">
        <div class="admin">
           <a href="php/login.php"><button type="">Login</button></a>
        </div>
    </div>
    <div class="container">  
    <form action="" method="get">
        <input type="text" name="keyword" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>
    <?php if(empty($book)) : ?>
        <h1>Data Tidak Ditemukan !</h1>
    <?php else : ?>
    <div class="container">
    <?php foreach ($book as $books) : ?> 
    <div class="buku">
        <div class="gambar">
        <a href="php/detail.php?id=<?= $books['kode_buku']?>">
            <img src="assets/img/<?= $books['cover']?>">
        </a>
        </div> 
        <div class="link">                
        <p>                
            <a href="php/detail.php?id=<?= $books['kode_buku']?>">
                <?= $books['judul'] ?>
            </a>
        </p> 
        </div> 
    </div>                 
    <?php endforeach; ?>
    </div>
    <?php endif ?>
</body>
</html>