<?php
include "../koneksi.php";
if (isset($_POST['tambah'])){
    $insertSql = mysqli_query ($conf, "INSERT into mhs(nm_mhs, npm, jk, id_kelas, email, gambar) values ('$_POST[nm_mhs]','$_POST[npm]', '$_POST[jk]','$_POST[id_kelas]', '$_POST[gambar]','$_POST[email]')");
    if ($insertSql){
        echo "<script type ='text/javascript'>alert('Data berhasil disimpan !'); location.href=\"home.php\";</script>";
    }
}

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:index.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$kontak','$alamat','$xx')");
		header("location:index.php?alert=berhasil");
	}else{
		header("location:index.php?alert=gagak_ukuran");
	}
}

?>