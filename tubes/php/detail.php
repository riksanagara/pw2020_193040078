<?php
session_start();
    // Mengecek apakah ada id yang dikirimkan
    // Jika tidak ada maka akan dikembalikan ke halaman index.php
    if(!isset($_GET['id'])){
        header("location:../index.php");
        exit;
    }

    require 'function.php';

    // Mengambil id dari url

    $id = $_GET['id'];

    // Melakukan query dengan parameter id yang diambil dari url
    $book = query("SELECT * FROM buku WHERE kode_buku = $id")[0];

    if(!isset($_SESSION['keranjang'])){
      $notif=0;
    }else{
      $notif=count($_SESSION['keranjang']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title><?=$book['judul']?></title>
    
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
          <li class="nav-item mx-2 position-relative">
            <a href="keranjang.php" class="btn nav-link">
              <svg class="bi bi-bag" width="25" height="25" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 001 1h10a1 1 0 001-1V5zM1 4v10a2 2 0 002 2h10a2 2 0 002-2V4H1z" clip-rule="evenodd"/>
                <path d="M8 1.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z"/>
              </svg>
              <span class="badge badge-dark badge-pill mt-0 position-absolute"><?=$notif?></span>
            </a>
          </li>
         
          <?php if(!isset($_SESSION['username'])): ?>
          <li class="nav-item mx-2">
            <a href="login.php" class="btn btn-dark text-white nav-link px-4">
              Login
            </a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link btn btn-dark text-white px-4" href="registrasi.php">Daftar</a>
          </li>
          <?php else : ?>
            <?php if($_SESSION['level']=='admin') : ?>
              <li class="nav-item mx-2">
            <a href="admin.php" class="btn btn-dark text-white nav-link px-4">
              Admin
            </a>
          </li>
            <?php endif; ?>
            <li class="nav-item mx-2">
            <a href="logout.php" class="btn btn-dark text-white nav-link px-4">
              Logout
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Detail -->
<div class="container" style="margin-top: 100px;"> 
  <div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-3">
      <img src="../assets/img/<?=$book['cover']?>" class="card-img" alt="<?=$book['judul']?>">
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title"><?=$book['judul']?></h5>
        <div class="row">
          <div class="col">
          <p class="card-text"><?=$book['pengarang']?></p>
          </div>
          <div class="col">
          <p class="card-text"><?=$book['tahun']?></p>
          </div>
        </div>
        <p class="card-text"><?=$book['penerbit']?></p>
        <p class="card-text text-justify"><?=$book['deskripsi']?></p>
        <p class="card-text"></p>
        
        
        
    </div>
    <div class="row pb-3">
      <div class="col align-self-end">
        <div class="d-flex justify-content-end">
        <a href="beli.php?id=<?=$books['kode_buku']?>" class="btn btn-dark float-right px-4 py-2">Beli Rp. <?=number_format($book['harga'])?></a>
        <a href="../index.php" class="btn btn-dark float-right mx-4 px-4 py-2">Kembali</a>
        </div>
        </div>
        </div>
        
        
      </div>
      
  </div>
</div>
</div>

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