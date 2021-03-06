<?php
 session_start();
 require 'function.php';

// cek cookie

if(isset($_COOKIE['username']) && isset($_COOKIE['hash'])){
    $username = $_COOKIE['username'];
    $hash = $_COOKIE['hash']; 
    
    // ambil username dan password
    $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    // cek coookie dan username

    if($hash === hash('sha256', $row['id'], false)){
        $_SESSION['username'] = $row['username'];
        header("Location: admin.php");
        exit;
    }
}
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
                $_SESSION['level'] = $row['level'];

                // jika remenber dicentang
                if(isset($_POST['remember'])){
                    setcookie('username', $row['username'], time() + 60 * 60 * 24);
                    $hash = hash('sha256', $row['id']);
                    setcookie('hash', $hash, time() + 60 * 60 * 24);
                }
           
            if (hash('sha256', $row['id']) == $_SESSION['hash']){
                header("Location: admin.php");
                die;
            }
            header("Location: ../index.php");
            die;
            }
        }
        $error = true;
    }

    if(!isset($_SESSION['keranjang'])){
      $notif=0;
    }else{
      $notif=count($_SESSION['keranjang']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icon/favicon-16x16.png">
    <link rel="manifest" href="../assets/icon/site.webmanifest">
    <link rel="mask-icon" href="../assets/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">
    


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body class="bg-light">
    
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white;">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><img src="../assets/icon/favicon.ico" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        
          <li class="nav-item mx-2">
            <a href="keranjang.php" class="btn nav-link position-relative">
              <svg class="bi bi-bag" width="25" height="25" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 001 1h10a1 1 0 001-1V5zM1 4v10a2 2 0 002 2h10a2 2 0 002-2V4H1z" clip-rule="evenodd"/>
                <path d="M8 1.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z"/>
              </svg>
              <span class="badge badge-dark badge-pill mt-0 position-absolute"><?=$notif?></span>
            </a>
          </li>
          <li class="nav-item mx-2">
            <a href="login.php" class="btn btn-dark text-white nav-link px-4">
              Login
            </a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link btn btn-dark text-white px-4" href="registrasi.php">Daftar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  

  <!-- Form Login -->
  <section>
  <div class="container login">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-sm-12"> 
        <div class="card mb-3">
          <div class="card-header text-center bg-dark text-white">
            <h5>Login</h5>
          </div>
          <div class="card-body">
          <button type="button" class="badge badge-dark badge-pill float-right mb-4" data-toggle="popover" title="Login Info" data-content="Gunakan Username adm dan Password adm123 untuk login ke halaman admin"><svg class="bi bi-info-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16A8 8 0 108 0a8 8 0 000 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
</svg></button>
          
            <form action="" method="post">
              <?php if(isset($error)) : ?>
                <div class="alert alert-danger text-center" role="alert">
                  <p>Username atau Password Salah!</p>
                </div>
              <?php endif; ?>
              <div class="form-group mt-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                      </svg>
                    </span>
                  </div>
                  <!-- <label for="username">Username</label> -->
                  <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna">
                </div>
              </div>
              <div class="form-group mt-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <svg class="bi bi-lock-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <rect width="11" height="9" x="2.5" y="7" rx="2"/>
                        <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z" clip-rule="evenodd"/>
                      </svg>
                    </span>
                  </div>
                  <!-- <label for="exampleInputPassword1">Password</label> -->
                  <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
                </div>
              </div>
              <div class="form-group form-check mt-4">                  
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat Saya</label>
              </div>
              <button type="submit" class="btn btn-dark mt-2 btn-block mt-4" name="submit">Login</button>
            </form>
          </div>
          <p class="text-center pb-2">Belum punya akun ? daftar 
            <a href="registrasi.php">disini</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  </section>

  <footer class="bg-dark p-3 mt-5">
    <div class="container">
      <p class="text-center text-light">&copy; 2020 Riksa Ksusumah Nagara</p>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script>
    $(function () {
  $('[data-toggle="popover"]').popover()
})
  </script>
</body>
</html>