<?php 

    require 'function.php';

    $id = $_GET['id'];

    if(hapus($id) > 0) {
        echo "<script>
            alert('Data Berhasil Hapus!');
            document.location.href = 'admin.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Hapus!');
            document.location.href = 'admin.php';
        </script>";
    }

?>