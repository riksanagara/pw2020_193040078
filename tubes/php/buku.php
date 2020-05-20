<?php 

if(isset($_GET['cari'])){
        $keyword = $_GET['keyword'];
        $book = query("SELECT * FROM buku WHERE
                judul LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                pengarang LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' ");
    }else{
        $book = query("SELECT * FROM buku");
    }
  ?>  


<form action="" method="get">
                    <div class="form-group col-lg-6 m-auto py-3">
                      <div class="input-group">
                        <input type="text" class="form-control" name="keyword" id="keyword" autofocus>
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
<a href="tambah.php" class="btn btn-dark my-3 btn-block">Tambah Data</a>

<div id="container">
    <?php if(empty($book)):?>
    <div class="alert alert-dark text-center" role="alert">
          Data tidak ditemukan!
        </div>
    <?php else : ?>
				<?php foreach($book as $books) :?>
					<div class="card mb-3 pb-3">
  <div class="row no-gutters">
    <div class="col-md-3">
      <img src="../assets/img/<?=$books['cover']?>" class="card-img" alt="..." >
    </div>
    <div class="col-md-9">
      <div class="card-body">
			<table class="table">
  <tr>
		<td>Judul</td>
		<td><?=$books['judul']?></td>
	</tr>
	<tr>
		<td>Penulis</td>
		<td><?=$books['pengarang']?></td>
	</tr>
	<tr>
		<td>Penerbit</td>
		<td><?=$books['penerbit']?></td>
	</tr>
	<tr>
		<td>Tahun</td>
		<td><?=$books['tahun']?></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td><?=$books['kategori']?></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td class="uang"><?=$books['harga']?></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td><?=$books['deskripsi']?></td>
	</tr>
</table>

<a href="hapus.php?id=<?= $books['kode_buku'] ?>"onclick="return confirm('Hapus Data ?')" class="float-right btn">
<svg class="bi bi-trash" width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
</svg>
</a>

<a href="ubah.php?id=<?= $books['kode_buku']?>" class="float-right btn">
<svg class="bi bi-pencil-square" width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
</svg>
</a>

      </div>
    </div>
  </div>
</div>
        <?php endforeach; ?>
        <?php endif; ?>
        </div>
<script src="../js/buku.js"></script>