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

    if(isset($_POST['tambah'])) {
        if(tambah($_POST) > 0) {
            echo "<script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'admin.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'admin.php';
                </script>";
         }
    }
    $kategori = query("SELECT DISTINCT kategori FROM buku ORDER BY kategori");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    
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

    <!-- Form Tambah -->
    <section>
    <div class="container tambah">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-sm-12"> 
        <div class="card mb-3">
          <div class="card-header text-center bg-dark text-white">
            <h5>Tambah Data Buku</h5>
          </div>
          <div class="card-body p-5">
            <form action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
              <label for="cover">Cover</label>        
            <div class="custom-file" id="cover">
  <input type="file" class="custom-file-input" id="customFile" name="cover">
  <label class="custom-file-label" for="customFile">Pilih Berkas</label>
</div>
  </div>
            <div class="form-group">
    <label for="judul">Judul Buku</label>
    <input type="text" class="form-control" id="judul" name="judul">
  </div>
  <div class="form-group">
    <label for="penulis">Penulis</label>
    <input type="text" class="form-control" id="penulis" name="penulis">
  </div>
  <div class="form-group">
    <label for="penerbit">Penerbit</label>
    <input type="text" class="form-control" id="penerbit" name="penerbit">
  </div>
  <div class="form-group">
    <label for="tahun">Tahun</label>
    <input type="text" class="form-control" id="tahun" name="tahun">
  </div>
  <div class="form-group">
    <label for="kategori">Kategori</label>
    <select class="form-control" id="kategori" name="kategori">
      <option>--- Pilih Kategori ---</option>
      <?php foreach ($kategori as $kategories) :?>
        <option value="<?=$kategories['kategori']?>"><?=$kategories['kategori']?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="harga">Harga</label>
    <input type="text" class="form-control" id="harga" name="harga">
  </div>
  <div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-dark float-right" name="tambah">Tambah Data</button>
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
  <script>
    $('#customFile').on('change', function(){
      // nama file
      var fileName = $(this).val().replace('C:\\fakepath\\',"");
      // mengganti nama file
      
      $(this).next('.custom-file-label').html(fileName);
    })
  </script>

</body>
</html>