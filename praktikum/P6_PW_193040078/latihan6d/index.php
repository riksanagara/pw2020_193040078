<?php
  
    //   menghubungkan dengan file php lain
    require 'php/function.php';

    // melakukan query
    $book = query("SELECT * FROM buku");


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Latihan6d</title>

    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <div class="navbar">
        <div class="admin">
           <form action="php/admin.php">
               <button>Admin</button>
           </form>
        </div>
    </div>

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
    
</body>
</html>