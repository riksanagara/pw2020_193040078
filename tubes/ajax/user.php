

<?php 
require '../php/function.php';
  $keyword = $_GET['keyword'];
  $user = query("SELECT * FROM user WHERE
nama LIKE '%$keyword%' OR
username LIKE '%$keyword%' OR
level LIKE '%$keyword%' OR
alamat LIKE '%$keyword%' 
");

  

 

?>  




<table class="table table-responsive-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Level</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <div class="user" id="user">
  <tbody>
    <?php if(empty($user)) :?>
      <td colspan="6">
      <div class="alert alert-dark text-center" role="alert">
          Data tidak ditemukan!
        </div>
      </td>
      <?php else : ?>
    <?php $no = 1?>
    <?php foreach($user as $users) :?>
    <tr>
      <td><?=$no?></td>
      <td><?=$users['username']?></td>
      <td><?=$users['level']?></td>
      <td><?=$users['nama']?></td>
      <td><?=$users['alamat']?></td>
      <td>
      <a href="hapusakun.php?id=<?= $users['id_user'] ?>"onclick="return confirm('Hapus Akun ?')" class="float-right btn">
<svg class="bi bi-trash" width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
</svg>
</a>

<a href="ubahakun.php?id=<?= $users['id_user']?>" class="float-right btn">
<svg class="bi bi-pencil-square" width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
</svg>
</a>
      </td>

    </tr>
    <?php $no++?>
    <?php endforeach ?>
    <?php endif; ?>
  </tbody>
  </div>
</table>