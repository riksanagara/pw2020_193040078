<?php

    require 'function.php';

    if(isset($_POST['tambah'])) {
        if(tambah($_POST) > 0) {
            echo "<script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'admin.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data Gagal Ditambahkan!');
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
    <link rel="stylesheet" href="../css/tambah.css">
</head>
<body>
<div class="container">
    <h3>Form Tambah Data Buku</h3>
    <form action="" method="POST">
        <ul style="list-style: none;">
            <li style="visibility: hidden;">
                <label for="id">Id : </label>
                <input type="text" name="id" id="id">
            </li>
            <li>
                <label for="cover">Cover : </label><br>
                <input type="text" name="cover" id="cover">
            </li>
            <li>
                <label for="judul">Judul : </label><br>
                <input type="text" name="judul" id="judul" required>
            </li>
            <li>
                <label for="penulis">Penulis : </label><br>
                <input type="text" name="penulis" id="penulis">
            </li>
            <li>
                <label for="penerbit">Penerbit : </label><br>
                <input type="text" name="penerbit" id="penerbit">
            </li>
            <li>
                <label for="Tahun">Tahun : </label><br>
                <input type="text" name="tahun" id="tahun">
            </li>
            <li>
                <label for="kategori">Kategori : </label><br>
                <select name="kategori" id="kategori">
                    <option value="">----- Pilih Kategori -----</option>
                    <option value="Komputer & Teknologi">Komputer & Teknologi</option>
                    <option value="Sejarah">Sejarah</option>
                    <option value="Kajian & Penelitian">Kajian & Penelitian</option>
                    <option value="Bisnis & Ekonomi">Bisnis & Ekonomi</option>
                    <option value="Pengembangan Diri">Pengembangan Diri</option>
                    <option value="Referensi">Referensi</option>
                    <option value="Sains">Sains</option>
                    <option value="Desain">Desain</option>
                    <option value="Lain-Lain">Lain - Lain</option>
                </select>
            </li>
        </ul>
        <button type="submit" name="tambah">Tambah Data</button>
        <button type="submit" name="kembali">Kembali</button>
    </form>
</div>
</body>
</html>