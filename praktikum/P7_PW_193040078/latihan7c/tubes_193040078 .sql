-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2020 pada 08.21
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_193040078`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(11) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(25) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `cover`, `judul`, `pengarang`, `penerbit`, `tahun`, `kategori`) VALUES
(1, '1.jpg', 'Stop Jadi Youtuber! Kalau Nggak Tau Cara Marketing', 'Jefferly Helianthusonfri', 'Elex Media Komputindo', 2020, 'Komputer & Teknologi'),
(2, '2.jpg', 'ORIDA: Oeang Republik Indonesia Daerah 1947 - 1949', 'Michell Suharli & Suwito Harsono', 'Gramedia Pustaka Utama', 2020, 'Sejarah'),
(3, '3.jpg', 'Etika Penulisan Karya Ilmiah', 'Gunawan Wiradi', 'Yayasan Pustaka Obor Indo', 2020, 'Kajian & Penelitian'),
(4, '4.jpg', 'Smart Leadership Being a Decision Maker #1', 'Made Kembar Sri Budhi & Paulus Kurniawan', 'Andi Offset', 2017, 'Bisnis & Ekonomi'),
(5, '5.jpg', 'Yang Belum Usai: Kenapa Manusia Punya Luka Batin?', 'Pijar Psikologi', 'Elex Media Komputindo', 2020, 'Pengembangan Diri'),
(6, '6.jpg', 'National Geographic Atlas Perang Dunia II', 'Neil Kagan & Setphen Hyslop', 'Kepustakaan Populer Grame', 2020, 'Referensi'),
(7, '7.jpg', 'Kepunahan Keenam: Sebuah Sejarah Tak Alami', 'Elisabeth Kolbert', 'Gramedia Pustaka Utama', 2020, 'Sains'),
(8, '8.jpg', 'David Bach: The Latte Factor', 'David Bach', 'Mitra Pelita Internusa', 2019, 'Bisnis & Ekonomi'),
(9, '9.jpg', 'Koleksi Program Web Php', 'Yuniar Supardi & Irwan Kurniawan, S.KOM', 'Elex Media Komputindo', 2020, 'Komputer & Teknologi'),
(10, '10.jpg', 'Design&Detail-Interior World Class', 'Archiworld', 'Andi Offset', 2020, 'Desain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'riksa', '$2y$10$vaEpMr3ekrpAjkRMw/fTWOXI8Tu55E2tvKLsCeknfOxGxs5XfHcxa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
