<?php
	session_start(); 
 ?>
 <?php
include '../../config/connect.php';
?>
<?php
if(isset($_POST["update"]))
{
	$id=$_POST['id'];
	$title=$_POST['title_menu'];
	$post_name = $_POST["post_name"];
	$Category=$_POST["menu_id"];
    $intro = $_POST["intro-content"];
	$content = $_POST["content"];
	$arrAnh = $_FILES["post_Image"]; 
	$arrName = $_FILES["post_Image"]["name"];
	$arrType = $_FILES["post_Image"]["type"];
	$arrTmp_name = $_FILES["post_Image"]["tmp_name"];
	$arrError = $_FILES["post_Image"]["error"];
	$arrSize = $_FILES["post_Image"]["size"];
	$arrImg = "";

	
	if(!empty($_FILES["post_Image"]["name"][0])){
	if ($arrType[0] == "image/jpeg" || $arrType[0] == "image/png" || $arrType[0] == "image/gif") {
			move_uploaded_file($arrTmp_name[0], "../../img/" . $arrName[0]);
			$arrImg .= "$arrName[0]";
			
		}else { echo "File tải lên không đúng định dạng ảnh.";die;};

		$sql = "UPDATE tin SET image = '$arrImg',post_name = '$post_name',menu_id = '$Category', intro_content= '$intro',content = '$content',title_menu='$title' WHERE id=$id";
	
	}else{
		$sql = "UPDATE tin SET post_name = '$post_name',menu_id = '$Category', intro_content= '$intro',content = '$content',title_menu='$title' WHERE id=$id";
	}
		
	if (mysqli_query($conn, $sql)) {
		
		echo "Record updated successfully";
		header('location:../backend.php?update');
	} 
	else {
		echo "Error updating record: " . mysqli_error($conn);
	}
}
?>