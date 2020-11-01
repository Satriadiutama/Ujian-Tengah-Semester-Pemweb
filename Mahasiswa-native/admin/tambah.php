<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Data</title>
  <meta charset="utf-8">
  <form action="user_act.php" method="post" enctype="multipart/form-data">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" enctype="multipart/form-data">>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tambah Data</h2>
  <p>Silahkan menambah data Mahasiswa pada form yang sudah disediakan dibawah ini</p>
  <form action="tambah-fungsi.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
    <div class="form-group">
      <label for="nama">Nama :</label>
      <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap Anda" name="nm_mhs" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Nama harus di isi</div>
    </div>
    <div class="form-group">
      <label for="npm">NPM:</label>
      <input type="number" class="form-control" id="npm" placeholder="NPM Tanpa titik" name="npm" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">NPM harus berisi angka dan tidak boleh kosong.</div>
    </div>
    <label for="jk">Jenis Kelamin :</label>
    <div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="jk" value="Laki-Laki" checked>Laki-Laki
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="jk" value="Perempuan">Perempuan
  </label>
</div>
    <div class="form-group">
  <label for="sel1">Kelas :</label>
  <select class="form-control" id="sel1" name="id_kelas" required>
    <option value="">--Pilih Kelas--</option>
    <?php
    include "../koneksi.php";
    $tampilkelas = mysqli_query($conf, "SELECT * FROM kelas");
    while ($kls=mysqli_fetch_array($tampilkelas)){
        echo "<option value=$kls[id_kelas]>$kls[kelas]</option>";
    }
    ?>
    
    
  </select>
  <div class="form-group">
      <label for="email">Email :</label>
      <input type="email" class="form-control" id="email" placeholder="Email Aktif Anda" name="email" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Format Email salah dan Email harus di isi</div>
    </div>
    <div class="form-group">
				<label>Foto :</label>
				<input type="file" name="gambar" required="required">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
			</div>
</div>
    <button align="center"type="submit" class="btn btn-primary" name="tambah">Simpan</button>
    <button type="button" class="btn btn-secondary" onclick="self.history.back()">Cancel</button>
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
