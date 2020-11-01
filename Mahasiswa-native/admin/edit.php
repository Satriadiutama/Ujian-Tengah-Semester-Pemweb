<?php
include "../koneksi.php";
if (isset($_GET['id'])){
  $tampilmhs = mysqli_query($conf, "SELECT * FROM mhs WHERE id_mhs ='$_GET[id]'");
  $mhs = mysqli_fetch_array ($tampilmhs);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data</title>
  <meta charset="utf-8">
  <form action="user_act.php" method="post" enctype="multipart/form-data">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit Data</h2>
  <p>Silahkan mengedit data Mahasiswa pada form yang sudah disediakan dibawah ini</p>
  <form action="edit-fungsi.php" method="POST" class="needs-validation" novalidate>
    <div class="form-group">
      <label for="nama">Nama :</label>
      <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap Anda" name="nm_mhs" value="<?php echo $mhs['nm_mhs']; ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Nama harus di isi</div>
    </div>
    <div class="form-group">
      <label for="npm">NPM:</label>
      <input type="number" class="form-control" id="npm" placeholder="NPM Tanpa titik" name="npm" value="<?php echo $mhs['npm']; ?>"required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">NPM harus berisi angka dan tidak boleh kosong.</div>
    </div>
    <label for="jk">Jenis Kelamin :</label>
    <div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="jk" value="Laki-Laki" <?php if(!(strcmp(htmlentities($mhs['jk'],ENT_COMPAT,'utf-8'),"Laki-Laki"))) {echo "checked=\"checked\"";}?>>Laki-Laki
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="jk" value="Perempuan" <?php if(!(strcmp(htmlentities($mhs['jk'],ENT_COMPAT,'utf-8'),"Perempuan"))) {echo "checked=\"checked\"";}?>>Perempuan
  </label>
</div>
    <div class="form-group">
  <label for="sel1">Kelas :</label>
  <select class="form-control" id="sel1" name="id_kelas" required>
  <?php 
    $tampil = mysqli_query($conf, "SELECT * FROM kelas ORDER BY kelas");
    while ($w = mysqli_fetch_array($tampil)){
      if($mhs['id_kelas'] == $w['id_kelas']){
        echo "<option value=$w[id_kelas] selected>$w[kelas]</option>";
      }else {
        echo "<option value=$w[id_kelas]>$w[kelas]</option>";
      }
    }
  ?>
  </select>
  <div class="form-group">
      <label for="email">Email :</label>
      <input type="email" class="form-control" id="email" placeholder="Email Aktif Anda" name="email" value="<?php echo $mhs['email']; ?>" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Format Email salah dan Email harus di isi</div>
    </div>

    <div class="form-group">
				<label>Foto :</label>
				<input type="file" name="foto" required="required">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
			</div>
</div>
    <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
    <button type="button" class="btn btn-secondary" onclick="self.history.back()">Cancel</button>
    <input type="hidden" name="id_mhs" value="<?php echo $mhs['id_mhs']; ?>">
  </form>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>
