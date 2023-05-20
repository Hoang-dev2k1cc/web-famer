<?php
	session_start(); 
 ?>
 <?php
include '../../config/connect.php';
?>
<?php
if(isset($_POST["update"]))
{
    $id_menu = $_POST["id_menu"];
    $title_menu = $_POST["title_menu"];
    $sql2 = "UPDATE theloai SET title_menu= N'$title_menu' WHERE id=$id_menu";
    if (mysqli_query($conn, $sql2)) {
		
		echo "Record updated successfully";
		header('location:../backend.php?update');
	} else {
        echo "Error updating record: " . mysqli_error($conn);

    }    }
?>