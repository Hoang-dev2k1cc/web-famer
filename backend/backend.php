

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <!-- Latest compiled and minified CSS -->
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<header>
    <div class="tophead">
       
            <div class="row ">
                <div class="col-6">
                     <div class="sub-title">
        <h1>TRANG QUẢN TRỊ</h1>
    </div>
                </div>
                <?php 
session_start();
include '../config/connect.php';
include 'xuly/permission.php';
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
 ?>
                <div class="col-6">
                    <div class="main-funct">
                        <div class="main-login">
                            <a type="" class="" href="xuly/login.php"><?php echo $_SESSION['name']; ?></a>
                        </div>
                        <div class="main-register">
                            <a type="" class="" href="xuly/logout.php">Đăng
                                xuất</a>
                        </div>
                    </div>
                <?php
}else{
?>
<?php
}
?>
</header>
<div class="container">
    <div class="row">
        <div class="col-3 left-body">
            <h2>Thống kê</h2>
            <?php
                if (isset($_SESSION['permission']) == true) {
                    $permission = $_SESSION['permission'];
                if ($permission == '0') {
            ?>
            <ul >
               
               
                
                <li>
                     <a class="btn btn-success"href="backend.php?post">ĐĂNG BÀI VIẾT</a>
                </li>
                <li>
                    <a class="btn btn-success"href="backend.php?title">THÊM ĐỀ MỤC</a>
                </li>
                <li>
                    <a class="btn btn-success"href="backend.php?register">THÊM TÀI KHOẢN</a>
                </li>
                <li>
                     <a class="btn btn-success"href="backend.php?m_user">QUẢN LÝ TÀI KHOẢN </a> 
                </li>
                <li>
                    <a class="btn btn-success"href="backend.php?m_title">QUẢN LÝ ĐỀ MỤC</a>
                </li>
                <li>
                     <a class="btn btn-success"href="backend.php?m_post">QUẢN LÝ BÀI VIẾT </a> 
                </li>
                <li>
                     <a class="btn btn-success"href="backend.php?m_idea">QUẢN LÝ Ý KIẾN </a> 
                </li>
                <?php }else{
                    ?>
            <ul>
                <li>
                     <a class="btn btn-success"href="backend.php?post">ĐĂNG BÀI VIẾT</a>
                </li>
                
            </ul>
                    <?php
                }
            }?>
            </ul>
        </div>
       <div class="col-9">
       <?php
       if(isset($_GET['post'])){
         include 'dangbaiviet.php'; 
       }if(isset($_GET['m_post'])){
            include 'quanlybaiviet.php' ;
         }if(isset($_GET['m_title'])){
            include 'quanlydemuc.php' ;
         }if(isset($_GET['title'])){
            include 'themdemuc.php' ;
         }
         if(isset($_GET['register'])){
            include 'dangkytaikhoan.php' ;
         }
         if(isset($_GET['m_user'])){
            include 'quanlytaikhoan.php' ;
         }
         if(isset($_GET['m_idea'])){
            include 'quanlyYk.php' ;
         }
         ?>
       </div>
    </div>
        </div>
<?php
?>