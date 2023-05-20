<!DOCTYPE html>
<html lang="en">
<head>
  <title>QUản lý</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- nguồn w3schools -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/m_user.css">
    <title>Quản lý tài khoản</title>
</head>
<body>

 <?php
include '../config/connect.php';
	
?>
<!-- xóa bài viết -->
<?php
	if (isset($_GET["id_delete"])) {
		$sql = "DELETE FROM users WHERE id = ".$_GET["id_delete"];
		mysqli_query($conn,$sql);
	}
  ?>
<div class="container">
  <h2>Quản lý tài khoản</h2>
      
  <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Tài khoản</th>
        <th>Mật khẩu</th>
        <th>Tên </th>
        <th>Email</th>
        <th>permisson</th>
        <th>Giới tính</th>
        <th>action</th>
      </tr>
<?php $sql = "SELECT * FROM users";
      $query = mysqli_query($conn, $sql);
      while ($data = mysqli_fetch_array($query)) {
    ?>
  <tr>
			<td><?php echo $data["id"]; ?></td>
			<td><?php echo $data["username"]; ?></td>
			<td><?php echo $data["password"]; ?></td>
      <td><?php echo $data["name"]; ?></td>
      <td><?php echo $data["Email"]; ?></td>
      <td><?php echo $data["permission"]; ?></td>
      <td><?php echo $data["GioiTinh"]; ?></td>

			<td>
				<a class="btn btn-danger"href="suataikhoan.php?id=<?php echo $data["id"]; ?>">Sửa</a>
				<a class="btn btn-warning"href="quanlytaikhoan.php?id_delete=<?php echo $data["id"]; ?>  &delete">Xóa</a>
			</td>
		</tr>
    <?php
      }
      ?>
</table>
<?php
if(isset ($_GET['delete'])){
  echo '<script language="javascript">alert("Thành công")</script>';
}
?>