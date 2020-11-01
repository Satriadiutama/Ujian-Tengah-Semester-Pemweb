<?php
include "koneksi.php";
session_start();
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conf, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
    if (mysqli_num_rows($query)!== 0){
       $get = mysqli_fetch_array($query);
       $level = $get['level'];
       $nama = $get['nm_admin'];
       $_SESSION['nama'] = $nama;
       
       if ($level == "admin"){
           echo "<script type ='text/javascript'>alert('Selamat datang Anda adalah Seorang $level'); location.href=\"admin/home.php\";</script>";
       } elseif ($level == "user"){
           echo "<script type ='text/javascript'>alert('Selamat datang Anda adalah Seorang $level'); location.href=\"user/home.php\";</script>";
       }
    } else {
        echo "<script type ='text/javascript'>alert('Login gagal di karenakan Username atau Password salah'); location.href=\"login.php\";</script>";
    }
} else {
    echo "<script type ='text/javascript'>alert('Anda tidak diperkenankan memasuki halaman ini !'); location.href=\"login.php\";</script>";
}
?>