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

    // Hapus Data
    function hapus($id){
        $conn = koneksi();
        mysqli_query($conn, "DELETE FROM buku WHERE kode_buku = $id");

        return mysqli_affected_rows($conn);
    }

    // Ubah Data
    function ubah($data){
        $conn = koneksi();

        $id = ($data['kode_buku']);
        $cover = htmlspecialchars($data['cover']);
        $judul = htmlspecialchars($data['judul']);
        $penulis = htmlspecialchars($data['penulis']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $tahun = htmlspecialchars($data['tahun']);
        $kategori = htmlspecialchars($data['kategori']);
        
        $queryubah = "UPDATE buku
                        SET
                        cover = '$cover',
                        judul = '$judul',
                        pengarang = '$penulis',
                        penerbit = '$penerbit',
                        tahun = '$tahun',
                        kategori = '$kategori'

                        WHERE kode_buku = '$id' ";
        mysqli_query($conn, $queryubah);

        return mysqli_affected_rows($conn);
    }

    function registrasi($data){
        $conn = koneksi();
        $username = strtolower(stripcslashes($data['username']));
        $password = mysqli_real_escape_string($conn, $data['password']);

        // cek username
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo"<script>
                alert('username sudah digunakan');
            </script>";
            return false;
        }

        // enkripsi password

        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambah user baru

        $query_tambah = "INSERT INTO user VALUES('','$username','$password')";
        mysqli_query($conn, $query_tambah);

        return mysqli_affected_rows($conn);
    }
?>