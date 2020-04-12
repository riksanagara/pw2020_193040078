<?php

$buku =
        [
            [
                "Cover" => "1.jpg",
                "Judul" => "Stop Jadi Youtuber! Kalau Nggak Tau Cara Marketingnya",
                "Pengarang" => "Jefferly Helianthusonfri",
                "Penerbit" => "Elex Media Komputindo",
                "Tahun" => "2020",
                "Kategori" => "Komputer & Teknologi",
            ],
            [
                "Cover" => "2.jpg",
                "Judul" => "ORIDA: Oeang Republik Indonesia Daerah 1947 - 1949",
                "Pengarang" => "Michell Suharli, Suwito Harsono",
                "Penerbit" => "Gramedia Pustaka Utama",
                "Tahun" => "2020",
                "Kategori" => "Sejarah",
            ],
            [
                "Cover" => "3.jpg",
                "Judul" => "Etika Penulisan Karya Ilmiah",
                "Pengarang" => "Gunawan Wiradi",
                "Penerbit" => "Yayasan Pustaka Obor Indonesia",
                "Tahun" => "2020",
                "Kategori" => "Kajian & Penelitian",
            ],
            [
                "Cover" => "4.jpg",
                "Judul" => "Smart Leadership Being a Decision Maker #1",
                "Pengarang" => "Made Kembar Sri Budhi, Paulus Kurniawan",
                "Penerbit" => "Andi Offset",
                "Tahun" => "2017",
                "Kategori" => "Bisnis & Ekonomi",
            ],
            [
                "Cover" => "5.jpg",
                "Judul" => "Yang Belum Usai: Kenapa Manusia Punya Luka Batin?",
                "Pengarang" => "Pijar Psikologi",
                "Penerbit" => "Elex Media Komputindo",
                "Tahun" => "2020",
                "Kategori" => "Pengembangan Diri",
            ],
            [
                "Cover" => "6.jpg",
                "Judul" => "National Geographic Atlas Perang Dunia II",
                "Pengarang" => "Neil Kagan & Stephen Hyslop",
                "Penerbit" => "Kepustakaan Populer Gramedia",
                "Tahun" => "2020",
                "Kategori" => "Referensi",
            ],
            [
                "Cover" => "7.jpg",
                "Judul" => "Kepunahan Keenam: Sebuah Sejarah Tak Alami",
                "Pengarang" => "Elisabeth Kolbert",
                "Penerbit" => "Gramedia Pustaka Utama",
                "Tahun" => "2020",
                "Kategori" => "Sains",
            ],
            [
                "Cover" => "8.jpg",
                "Judul" => "David Bach: The Latte Factor",
                "Pengarang" => "David Bach",
                "Penerbit" => "Bisnis & Ekonomi",
                "Tahun" => "2019",
                "Kategori" => "Bisnis & Ekonomi",
            ],
            [
                "Cover" => "9.jpg",
                "Judul" => "Koleksi Program Web Php",
                "Pengarang" => "YUNIAR SUPARDI & IRWAN KURNIAWAN, S.KOM.",
                "Penerbit" => "Elex Media Komputindo",
                "Tahun" => "2020",
                "Kategori" => "Komputer & Teknologi",
            ],
            [
                "Cover" => "10.jpg",
                "Judul" => "Design&Detail-Interior World Class",
                "Pengarang" => "Archiworld",
                "Penerbit" => "Andi Offset",
                "Tahun" => "2020",
                "Kategori" => "Desain",
            ]
            
        ]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
</head>
<style>

    tr{
        background-color : #e8824f;
    }
    td{
        background-color : #f2a870;
        text-align : center;
    }

</style>
<body>
    
    <table cellspacing = 0 cellpadding = 10 border = 1>
        <tr>
            <th>Cover</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Kategori</th>
        </tr>

        <?php foreach ($buku as $b) : ?>
            <tr>
                <td><img src="assets/img/<?= $b["Cover"]?>"></td>
                <td><?= $b["Judul"]?></td>
                <td><?= $b["Pengarang"]?></td>
                <td><?= $b["Penerbit"]?></td>
                <td><?= $b["Tahun"]?></td>
                <td><?= $b["Kategori"]?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>
</html>