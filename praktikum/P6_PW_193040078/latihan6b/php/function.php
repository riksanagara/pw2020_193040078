<?php

    // function untuk melalakukan koneksi ke database
    function koneksi(){
        $conn = mysqli_connect("localhost", "root","") or die("koneksi ke DB gagal");
        mysqli_select_db($conn, "tubes_193040078") or die("Database salah!");

        return $conn;
    }

    // function untuk melakukan query ke database
    function query($sql){
        $conn = koneksi();
        $result = mysqli_query($conn, "$sql");

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    //Tambah Data
    function tambah($data){
        $conn = koneksi();


        $cover = htmlspecialchars($data['cover']);
        $judul = htmlspecialchars($data['judul']);
        $penulis = htmlspecialchars($data['penulis']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $tahun = htmlspecialchars($data['tahun']);
        $kategori = htmlspecialchars($data['kategori']);

        $query = "INSERT INTO buku
                VALUES
                ('', '$cover', '$judul' ,'$penulis', '$penerbit', '$tahun', '$kategori')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>