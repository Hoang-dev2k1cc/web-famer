<?php
session_start();
if(isset($_SESSION['username'])) {
    session_destroy();
    header('location:../dangnhap_ad.php');
}
?>