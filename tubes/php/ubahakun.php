<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}if($_SESSION['level']!='admin'){
  header("Location: ../index.php");
  exit;
}

    require 'function.php';

    $id = $_GET['id'];
    $user = query("SELECT * FROM user WHERE id_user = '$id'")[0];
    $level = query("SELECT DISTINCT level FROM user ORDER BY level");

    if(isset($_POST['ubah'])) {
        if(ubahakun($_POST) > 0) {
            echo "<script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'admin.php';
                </script>";
        } 
        else {
            echo "<script>
                    alert('Akun  Gagal Diubah!');
                    document.location.href = 'admin.php';
                </script>";
         }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>

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
            <a class="nav-link mx-2" href="admin.php">Dashboard</a>
          </li>
          <li class="nav-item mx-2">
            <a href="logout.php" class="btn btn-dark text-white nav-link px-4">
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<section>
    <div class="container ubah">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-sm-12"> 
        <div class="card mb-3">
          <div class="card-header text-center bg-dark text-white">
            <h5>Ubah Akun</h5>
          </div>
          <div class="card-body p-5">
            <form action="" method="post">
            <input type="text" hidden name="id" value="<?=$id?>">
            
            <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?=$user['username']?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?=$user['username']?>">
  </div>
  <div class="form-group">
    <label for="level">level</label>
    <select class="form-control" id="level" name="level">
      <option selected value="<?=$user['level']?>"><?=$user['level']?></option>
      <?php foreach ($level as $levels) :?>
        <option value="<?=$levels['level']?>"><?=$levels['level']?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat" rows="3" value=""><?=$user['alamat']?></textarea>
  </div>

  <button type="submit" class="btn btn-dark float-right" name="ubah">Ubah Data</button>
  <a href="admin.php" class="btn btn-dark float-right mr-4">Kembali</a>

              
            </form>
          </div>
         
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

   
  


</body>
</html>