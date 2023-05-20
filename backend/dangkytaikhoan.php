

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
	<title>REGISTER</title>
<body>
     <form action="xuly/register.php" method="POST">
     	<h2>ĐĂNG KÝ</h2>
     	<label>Tài khoản</label>
     	<input class="form-control"type="text"name="username" placeholder="Username"><br>
		 <label>Tên </label>
     	<input class="form-control" type="text"name="name" placeholder="name"><br>
     	<label>Mật khẩu</label>
       <input class="form-control" type="password" name="password" placeholder="Password"><br>
       <label>mail </label>
     	<input class="form-control" type="email"name="email" placeholder="email"><br>
       <label>Giới tính </label>
       <select name="sex">
        <option value="0">Nam</option>
        <option value="1">Nữ</option>
       </select><br>
     	
     	<button type="submit" name="register">Đăng ký</button>
     </form>
</div>
</body>
</html>
