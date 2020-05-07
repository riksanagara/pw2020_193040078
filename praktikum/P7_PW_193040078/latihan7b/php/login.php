<?php
    session_start();
    require 'function.php';
    // melakukan pengecekan apakah user sudah melakukan login jika sudah redirect ke halaman admin
    if(isset($_SESSION['username'])){
        header("Location: admin.php");
        exit;
    }

    // login
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cek_user = mysqli_query(koneksi(), " SELECT * FROM user WHERE username = '$username'");
        // mencocokan username dan password
        if(mysqli_num_rows($cek_user) > 0){
            $row = mysqli_fetch_assoc($cek_user);
            if(password_verify($password, $row['password'])){
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['hash'] = hash('sha256', $row['id'], false);
            
            if (hash('sha256', $row['id'])==$_SESSION['hash']){
                header("Location: admin.php");
                die;
            }
            header("Location: login.php");
            die;
            }
        }
        $error = true;
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
    <form action="" method="post">
        <?php if(isset($error)) : ?>
            <p style="color : red; font-style: italic;">Username atau Password salah</p>
        <?php endif; ?>
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
        <div class="remember">
            <input type="checkbox">
            <label for="remember">Remember Me</label>
        </div>
        <button type="submit" name="submit">login</button>
    </form>
    <div class="registrasi">
            <p>Belum punya akun ? Registrasi</p><a href="registrasi.php">Disini</a>
    </div>
</body>
</html>