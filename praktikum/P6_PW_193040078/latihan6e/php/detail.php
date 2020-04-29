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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Latihan6a</title>
    <link rel="stylesheet" href="../css/detail.css">
</head>
<body>
    <div class="navbar">
        <div class="admin">
           <form action="../php/admin.php">
               <button>Admin</button>
           </form>
        </div>
    </div>
    <div class="container">
    <div class="box">
    <div class="gambar">
        <img src="../assets/img/<?= $book["cover"]; ?>" alt="">
    </div>
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
            <td>Kategori</td>
            <td>:</td>
            <td><?= $book["kategori"]; ?></td>
        </tr>
    </table>
    <a href="../index.php" class="tombol"><button>Kembali</button></a>
    </div>
    </div>

</body>
</html>