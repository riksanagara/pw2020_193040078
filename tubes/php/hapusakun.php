<?php 
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit;
    }
    if($_SESSION['level']!='admin'){
        header("Location: ../index.php");
        exit;
      }
    require 'function.php';

    $id = $_GET['id'];

    if(hapusakun($id) > 0) {
        echo "<script>
            alert('Akun Berhasil Hapus!');
            document.location.href = 'admin.php';
        </script>";
    } else {
        echo "<script>
            alert('Akun Gagal Hapus!');
            document.location.href = 'admin.php';
        </script>";
    }

?>