<?php
include "../koneksi.php";
session_start();
$tampil = mysqli_query ($conf, "SELECT * FROM mhs, kelas WHERE kelas.id_kelas = mhs.id_kelas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Data Mahasiswa</h2>
  <p>Selamat Datang <b><?php echo $_SESSION['nama'];?></b> Silahkan Mengelola Data Mahasiswa di bawah ini : </p>  
  <p><a href="tambah.php"<button type="button" class="btn btn-outline-primary">Tambah Data</button></a></p>          
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Email</th>
        <th>Foto</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        while($r = mysqli_fetch_array($tampil)){
            echo " <tr>
            <td>$no</td>
              <td>$r[nm_mhs]</td>
              <td>$r[npm]</td>
              <td>$r[jk]</td>
              <td>$r[kelas]</td>
              <td>$r[email]</td>
              <td>$r[gambar]</td>
              <td>
              
              <a href='edit.php?id=$r[id_mhs]'<button type='button' class='btn btn-success btn-sm'>Edit</button></a>
              <a href='hapus.php?id=$r[id_mhs]'<button type='button' class='btn btn-danger btn-sm'>Hapus</button></a>
              </td>
            </tr>";
            $no++;
        }
        ?>
    </tbody>
  </table>
  <p><a href="../logout.php"<button type="button" class="btn btn-outline-secondary">Logout</button></a></p>
</div>

</body>
</html>
