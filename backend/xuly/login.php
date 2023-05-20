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
if(isset($_POST["login"])){
$username = $_POST['username'];
$password= $_POST['password'];
    $sql = "SELECT * FROM users where username = '$username' and password = '$password' ";
    $query = mysqli_query($conn,$sql);
	$num_rows = mysqli_num_rows($query);
    if ($num_rows==0) {
    }else{	
		header('Location: ../backend.php');
	
	}
}else{
	echo 'Khong co data';
}
while ( $data = mysqli_fetch_array($query) ) {
	$_SESSION['id'] = $data["id"];
	$_SESSION['username'] = $data["username"];
	$_SESSION['name'] = $data["name"];
	$_SESSION["password"] = $data["password"];
	$_SESSION["permission"] = $data["permission"];
}
?>
