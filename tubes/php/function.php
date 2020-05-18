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



        // Upload Cover
        $cover = upload();
            if(!$cover){
                return false;
            }

        $judul = htmlspecialchars($data['judul']);
        $penulis = htmlspecialchars($data['penulis']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $tahun = htmlspecialchars($data['tahun']);
        $kategori = htmlspecialchars($data['kategori']);
        $harga = htmlspecialchars($data['harga']);
        $deskripsi = htmlspecialchars($data['kategori']);

        $query = "INSERT INTO buku
                VALUES
                ('', '$cover', '$judul' ,'$penulis', '$penerbit', '$tahun', '$kategori', '$harga', '$deskripsi')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // Upload file
    function upload(){
        $namaFile = $_FILES['cover']['name'];
        $ukuranFile = $_FILES['cover']['size'];
        $error = $_FILES['cover']['error'];
        $tmpName = $_FILES['cover']['tmp_name'];

        // Cek ada gambar atau tidak

        if($error === 4){
            echo"<sript>
                alert('Pilih cover buku!');
            </script>";
            return false;
        }

        // Hanya gambar yang boleh di upload
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo"<sript>
                alert('Yang anda upload bukan gambar!');
            </script>";
        }
        // Cek ukuran gambar
        if($ukuranFile > 2000000){
            echo"<sript>
                alert('Ukuran gambar terlalu besar!');
            </script>";
        }

        // lolos pengecekan
        // generate nama baru

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, '../assets/img/'. $namaFileBaru);

        return $namaFileBaru;

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

        $id = ($data['id']);
        $coverLama = htmlspecialchars($data['coverLama']);

        // pilih gambar baru atau tidak 
    
        if($_FILES['cover']['error'] === 4){
            $cover = $coverLama;
        }else{
            $cover = upload();
        }

        $judul = htmlspecialchars($data['judul']);
        $penulis = htmlspecialchars($data['penulis']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $tahun = htmlspecialchars($data['tahun']);
        $kategori = htmlspecialchars($data['kategori']);
        $harga = htmlspecialchars($data['harga']);
        $deskripsi = htmlspecialchars($data['deskripsi']);

        
        $queryubah = "UPDATE buku SET
                        cover = '$cover',
                        judul = '$judul',
                        pengarang = '$penulis',
                        penerbit = '$penerbit',
                        tahun = '$tahun',
                        kategori = '$kategori',
                        harga = '$harga',
                        deskripsi = '$deskripsi'

                        WHERE kode_buku = '$id' ";

        mysqli_query($conn, $queryubah);

        return mysqli_affected_rows($conn);
    }

    function registrasi($data){
        $conn = koneksi();
        $nama = htmlspecialchars($data['name']);
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

        $query_tambah = "INSERT INTO user VALUES('','$nama', '$username', '$password')";
        mysqli_query($conn, $query_tambah);

        return mysqli_affected_rows($conn);
    }
?>