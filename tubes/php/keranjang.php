<?php
  session_start();
  
  require 'function.php';
  
  if(!isset($_SESSION['keranjang'])){
    $notif=0;
  }else{
    $notif=count($_SESSION['keranjang']);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icon/favicon-16x16.png">
    <link rel="manifest" href="../assets/icon/site.webmanifest">
    <link rel="mask-icon" href="../assets/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">

    <title>Keranjang</title>
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

    <div class="container" style="margin-top: 100px;">
    <div class="card">
  <h5 class="card-header bg-dark text-white">Keranjang Belanja</h5>
  <div class="card-body">
  <?php if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])):?>
    <tbody>
      <tr>
        <td colspan="7">
        <div class="alert alert-dark text-center" role="alert">
  Tidak ada buku didalam keranjang!
</div>
        </td>
      </tr>
    </tbody>
  <?php else :?>
  <table class="table table-responsive-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Cover</th>
      <th scope="col">Judul</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga Total</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 0; ?>
    <?php foreach($_SESSION['keranjang'] as $id => $jumlah) :?>
      <?php
        $book = mysqli_query(koneksi(), "SELECT * FROM buku WHERE kode_buku='$id'");
        $books = $book->fetch_assoc();
        ?>
    <?php $no++; ?>
    <tr>
      <td><?=$no?></td>
      <td><img src="../assets/img/<?=$books['cover']?>" alt="<?=$books['judul']?>"></td>
      <td><?=$books['judul']?></td>
      <td>Rp. <?=number_format($books['harga'])?></td>
      <td><?=$jumlah?></td>
      <td>Rp.<?=number_format($books['harga']*$jumlah)?></td>
      <td>
        <a href="hapuskeranjang.php?id=<?=$books['kode_buku']?>" class="text-dark">
        <svg class="bi bi-trash" width="25" height="25" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
</svg>
        </a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<a href="pembayaran.php" class="btn btn-dark">Pembayaran</a>
    <?php endif; ?>
  </div>
</div>

    </div>
    <footer class="bg-dark p-3 mt-5">
    <div class="container">
      <p class="text-center text-light">&copy; 2020 Riksa Ksusumah Nagara</p>
    </div>
  </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>