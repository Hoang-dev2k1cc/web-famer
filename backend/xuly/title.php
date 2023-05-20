<?php
session_start();

?>
<?php
include '../../config/connect.php';
$title_menu=$_POST['title_menu'];
$parent_id=$_POST['id'];
$sql="insert into theloai(title_menu,parent_id) value(N'$title_menu',N'$parent_id');";
mysqli_query($conn, $sql);
echo    'thanh cong';
?>