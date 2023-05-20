

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
    <link rel="stylesheet" href="css/signup.css">
</head>
<div class="container">
	<title>Sửa tài khoản</title>
<body>
     <form action="xuly/update_user.php" method="POST">
     	<h2>SỬA THÔNG TIN</h2>
         <?php
         include '../config/connect.php';
                    $id = $_GET['id'];
                    $sql = "SELECT *FROM users WHERE id=$id";
                    $result=mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result)
                    ?>
                    <input type="hidden" class="form-control content-input"type="text"name="id"  value="<?php echo $row['id']; ?>"> 
     	<label>Tài khoản</label>
        <input class="form-control"type="text"name="username" value="<?php echo $row['username']; ?>"><br>
        <label>Tên </label>
     	<input class="form-control" type="text"name="name" value="<?php echo $row['name']; ?>"><br>
     	<label>Mật khẩu</label>
       <input class="form-control" type="text" name="password" value="<?php echo $row['password']; ?>"><br>
       <label>mail </label>
     	<input class="form-control" type="email"name="email" value="<?php echo $row['Email']; ?>"><br>
       <label>Giới tính </label>
       <select name="sex">
        <option value="0">Nam</option>
        <option value="1">Nữ</option>
       </select>
       <label>Quyền </label>
       <select name="permission">
        <option value="0">admin</option>
        <option value="1">user</option>
       </select><br>
     	
     	<button type="submit" name="update">Xác nhận</button>
     </form>
</div>
</body>
</html>
