<?php
require '../php/function.php';
$keyword = $_GET['keyword'];
$book = query("SELECT * FROM buku WHERE
judul LIKE '%$keyword%' OR
penerbit LIKE '%$keyword%' OR
pengarang LIKE '%$keyword%' OR
tahun LIKE '%$keyword%' OR
kategori LIKE '%$keyword%' 
ORDER BY kode_buku DESC");
?>
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