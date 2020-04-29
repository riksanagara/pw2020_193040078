<?php

    require 'function.php';

    $id = $_GET['id'];
    $book = query("SELECT * FROM buku WHERE kode_buku = $id")[0];
    $kategori = query("SELECT DISTINCT kategori FROM buku ORDER BY kategori");

    if(isset($_POST['ubah'])) {
        if(ubah($_POST) > 0) {
            echo "<script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'admin.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data Gagal Diubah!');
                    document.location.href = 'admin.php';
                </script>";
         }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/ubah.css">
</head>
<body>
<div class="container">
    <h3>Form Ubah Data Buku</h3>
    <form action="" method="POST">

        <ul style="list-style: none;">
            <li>
                <input type="hidden" name="id" id="id" value="<?= $book['kode_buku'] ?>">
            </li>
            <li>
                <label for="cover">Cover : </label><br>
                <input type="text" name="cover" id="cover" value="<?= $book['cover']?>">
            </li>
            <li>
                <label for="judul">Judul : </label><br>
                <input type="text" name="judul" id="judul" required value="<?= $book['judul']?>">
            </li>
            <li>
                <label for="penulis">Penulis : </label><br>
                <input type="text" name="penulis" id="penulis" value="<?= $book['pengarang']?>">
            </li>
            <li>
                <label for="penerbit">Penerbit : </label><br>
                <input type="text" name="penerbit" id="penerbit" value="<?= $book['penerbit']?>">
            </li>
            <li>
                <label for="Tahun">Tahun : </label><br>
                <input type="text" name="tahun" id="tahun" value="<?= $book['tahun']?>">
            </li>
            <li>
                <label for="kategori">Kategori : </label><br>
                <select name="kategori" id="kategori">
                    <option value ="<?=$book['kategori']?>" selected="selected"><?=$book['kategori']?></option>
                    <?php foreach($kategori as $kategories) :?>
                        <option value="<?= $kategories['kategori']?>"><?= $kategories['kategori']?></option>
                    <?php endforeach; ?>
                </select>
            </li>
        </ul>
        <button type="submit" name="ubah">Ubah Data</button>
        <button type="submit" name="kembali">Kembali</button>
    </form>
</div>
</body>
</html>