<?php

    //menghubungkan dengan file php lainnya
    require 'function.php';
    //melakukan query
    $book = query('SELECT * FROM buku');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan6a</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

    <div class="navbar">
        <div class="admin">
           <form action="../index.php">
               <button>Kembali</button>
           </form>
        </div>
    </div>
    
    <div class="container">
    <table>
        <tr>
            <th>#</th>
            <th>Opsi</th>
            <th>Cover</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Kategori</th>
        </tr>
        
        <?php $i = 1; ?>
        <?php foreach($book as $books) :?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <a href=""><button>Ubah</button></a>
                    <a href=""><button>Hapus</button></a>
                </td>
                <td><img src="../assets/img/<?= $books['cover'];?>" alt=""></td>
                <td><?= $books['judul'];?></td>
                <td><?= $books['pengarang'];?></td>
                <td><?= $books['penerbit'];?></td>
                <td><?= $books['tahun'];?></td>
                <td><?= $books['kategori'];?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>        
</body>
</html>