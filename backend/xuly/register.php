<?php
session_start();
?>
<?php
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
//Kết nối tới database
include '../../config/connect.php';
//Lấy dữ liệu nhập vào

$username = $_POST['username'];
$password= $_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];
$sex = $_POST['sex'];
$date=Date('Y-m-d');
    $sql = " INSERT INTO `users`(`username`, `password`, `name`, `permission`, `Ngaydangky`, `GioiTinh`, `Email`) VALUES ('$username','$password','$name','1','$date','$sex','$email')";
    mysqli_query($conn,$sql);
		header('Location: ../backend.php');

