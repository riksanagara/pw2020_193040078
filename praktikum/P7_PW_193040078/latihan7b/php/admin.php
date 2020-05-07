<?php

    //menghubungkan dengan file php lainnya
    require 'function.php';
    //melakukan query

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan6e</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="navbar">
        <div class="admin">
           <a href="logout.php"><button>Logout</button></a>
        </div>
    </div>
     
    <div class="container">
    <a href="tambah.php"><button>Tambah Data</button></a>
    <table>
        <form action="" method="get">
            <input type="text" name="keyword" autofocus>
            <button type="submit" name="cari">Cari</button>
        </form>
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
        <?php if(empty($book)) :?>
        <tr>
            <td colspan="8">
                <h1>Data tidak ditemukan!</h1>
            </td>
        </tr>
        <?php else : ?>
        <?php $i = 1; ?>
        <?php foreach($book as $books) :?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $books['kode_buku'] ?>"><button>Ubah</button></a>
                    <a href="hapus.php?id=<?= $books['kode_buku'] ?>"onclick="return confirm('Hapus Data ?')"><button>Hapus</button></a>
                </td>
                <td><img src="../assets/img/<?= $books['cover'];?>" alt=""></td>
                <td><?= $books['judul'];?></td>
                <td><?= $books['pengarang'];?></td>
                <td><?= $books['penerbit'];?></td>
                <td><?= $books['tahun'];?></td>
                <td><?= $books['kategori'];?></td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
    </div>

</body>
</html>