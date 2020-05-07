<?php
    require 'function.php';

    if(isset($_POST["register"])){
        if(registrasi($_POST) > 0){
            echo "<script>
                    alert('Registrasi Berhasil!');
                    document.location.href = 'login.php';
                </script>";
        } else {
            echo "<script>
                    alert('Registrasi Gagal !');
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
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td> : </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td> : </td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>