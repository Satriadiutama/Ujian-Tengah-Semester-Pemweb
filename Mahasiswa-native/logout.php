<?php
session_start();
session_destroy();
echo "<script type ='text/javascript'>alert('Anda telah Logout'); location.href=\"login.php\";</script>";
?>