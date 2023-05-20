<?php
	session_start(); 
 ?>
 <?php
include '../../config/connect.php';
?>
<?php
if(isset($_POST["update"]))
{
    $id = $_POST["id"];
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $sex = $_POST["sex"];
    $permission = $_POST["permission"];
    $sql2 = "UPDATE users SET username= N'$username',name= N'$name',password= N'$password',username= N'$username',Email= N'$email',GioiTinh= N'$sex',permission= N'$permission' WHERE id=$id";
    if (mysqli_query($conn, $sql2)) {
		
		echo "Record updated successfully";
		header('location:../backend.php?update');
	} else {
        echo "Error updating record: " . mysqli_error($conn);

    }    }
?>