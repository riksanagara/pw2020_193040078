<?php
  session_start();
    //   menghubungkan dengan file php lain
    require 'function.php';

    if(isset($_GET['cari'])){
        $keyword = $_GET['keyword'];
        $book = query("SELECT * FROM buku WHERE
                judul LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                pengarang LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' ");
    }else{
        $book = query("SELECT * FROM buku ORDER BY kode_buku DESC");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Book Store</title>

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
        <li class="nav-item dropdown position-static text-center">
        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="bi bi-search" width="25" height="25" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                              <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                            </svg>
        </a>
        <div class="dropdown-menu w-100" aria-labelledby="navbarDropdownMenuLink">
        
                  <form action="" method="get">
                    <div class="form-group col-lg-6 m-auto py-3">
                      <div class="input-group">
                        <input type="text" class="form-control" name="keyword" autofocus id="keyword">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary btn-dark text-white" type="submit" name="cari" id="tombol-cari">
                            <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                              <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                            </svg>          
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              
      </li>
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
            <a class="nav-link btn btn-dark text-white px-4" href="php/registrasi.php">Daftar</a>
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


  <section id="container">
    <div class="container lainnya">
      <?php if(empty($book)) : ?>
        <div class="alert alert-dark text-center" role="alert">
          Data tidak ditemukan!
        </div>
      <?php else : ?>
       <div class="row">
        <?php foreach ($book as $books) : ?>
          <div class="col-lg-3 mb-4">
          <div class="card ">
  <div class="d-flex align-items-center mx-auto position-relative" style="min-height: 388px;">
        
      <img src="../assets/img/<?=$books['cover'];?>" class="card-img-top" alt="<?=$books['judul']?>">
    

  </div>
  
  <div class="card-body" style="min-height: 130px;">
    <div class="judul" style="min-height: 60px;">
    <p class="card-text">
    <a href="detail.php?id=<?=$books['kode_buku']?>" class=".text-decoration-none text-dark"><?=$books['judul']?></a>
    </p>
    </div>
    <div class="harga d-flex justify-content-end mt-auto">
    <p class="card-text">
      <a href="beli.php?id=<?=$books['kode_buku']?>" class="btn btn-dark">
      Beli Rp. <?=number_format($books['harga'])?>
      </a>
    </p>
    </div>

  </div>
</div>
</div>
        <?php endforeach; ?>
        </div>
      <?php endif ?>
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
  <script src="../js/lainnya.js"></script>
</body>
</html>