<?php
include '../../config/connect.php';
$id=$_GET['id'];
$name_yk=$_POST['name_yk'];
$email_yk=$_POST['email_yk'];
$content_yk=$_POST['content_yk'];
$add_yk=$_POST['add_yk'];
$date=Date('Y-m-d');
$sql="INSERT INTO ykienbd(NoiDungYK,ngayYK,HoTenBD,DiaCHiBD,EmailBD,idTin) VALUES  (N'$content_yk',N'$date',N'$name_yk',N'$add_yk',N'$email_yk',N'$id') "; 
mysqli_query($conn, $sql);
header('location:../ykienBD.php?id='.$id);
?>