<?php
    session_start();
    require 'function.php';
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit;
    }
    if(!isset($_SESSION['keranjang'])){
      header("Location: ../index.php");
      exit;
    }
    $user = $_SESSION['username'];

    if(isset($_POST["bayar"])){
     
      if(bayar($_POST) == 0){
        echo "<script>
        alert('Silahkan Lakukan Pembayaran!');
        document.location.href = 'kodebayar.php?bayar=1';
    </script>";
      }
    }
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


    <title>Pembayaran</title>
  </head>
  <body class="bg-light">

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
    
  <div class="container" style="margin-top: 100px;">
    <div class="card">
  <h5 class="card-header bg-dark text-white">Keranjang Belanja</h5>
  <div class="card-body">
      
 
  <table class="table table-responsive-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Cover</th>
      <th scope="col">Judul</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga Total</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 0; ?>
    <?php $total = 0; ?>
    <?php foreach($_SESSION['keranjang'] as $id => $jumlah) :?>
      <?php
        $books = query("SELECT * FROM buku WHERE kode_buku='$id'")[0];
        
        ?>
    <?php $no++; ?>
    <tr>
      <td><?=$no?></td>
      <td><img src="../assets/img/<?=$books['cover']?>" alt="<?=$books['judul']?>"></td>
      <td><?=$books['judul']?></td>
      <td>Rp. <?=number_format($books['harga'])?></td>
      <td><?=$jumlah?></td>
      <?php
        $jml = $books['harga']*$jumlah;
      ?>
      <td>Rp.<?=number_format($jml)?></td>
    </tr>
    <?php $total+=$jml?>
    <?php endforeach;?>
    <tr class="bg-dark text-white">
        <th colspan="5">Total</th>
        <td>Rp. <?=number_format($total)?></td>
    </tr>
  </tbody>
</table>
<form method="post">
    <?php
        $user = query("SELECT * FROM user WHERE username='$user'")[0];
    ?>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value="<?=$user['nama']?>">
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control-plaintext" id="alamat" name="alamat" value="<?=$user['alamat']?>">
  </div>
  <div class="form-group">
    <label for="jasa_kirim">Jasa Pengiriman</label>
    <select class="form-control w-auto" id="jasa_kirim" name="jasa_kirim">
      <option>--- Pilih Jasa Pengiriman ---</option>
      <?php 
        $kirim = query("SELECT * FROM pengiriman");
      ?>
      <?php foreach($kirim as $k) :?>
        <option value="<?=$k['id_pengiriman']?>">
            <?=$k['pengiriman']?> - 
            Rp. <?=number_format($k['tarif'])?>
        </option>
      <?php endforeach; ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="metode_bayar">Metode Pembayaran</label>
    <select class="form-control w-auto" id="metode_bayar" name="metode_bayar">
      <option>--- Pilih Metode Pembayaran ---</option>
      <?php 
        $bayar = query("SELECT * FROM bayar");
      ?>
      <?php foreach($bayar as $b) :?>
        <option value="<?=$b['id_bayar']?>">
            <?=$b['tempat_bayar']?> - 
            Rp. <?=number_format($b['biaya_admin'])?>
        </option>
      <?php endforeach; ?>
      
    </select>
    <?php
    $_SESSION['total']=$total+$k['tarif']+$b['biaya_admin']
    ?>
    </div>
    
    

  <button type="submit" class="btn btn-dark" name="bayar">Bayar</button>
</form>
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