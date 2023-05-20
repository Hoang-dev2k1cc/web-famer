
<?php
session_start();

?>
<?php
include '../../config/connect.php';
$post_name=$_POST['post_name'];
$menu_id=$_POST['menu_id'];
$title_menu = $_POST['title_menu'];
$intro = $_POST['intro-content'];
$content=$_POST['content'];
$arrAnh = $_FILES["post_Image"];
$date=Date('Y-m-d');
$Iusername = $_SESSION['name'];
	$arrName = $_FILES["post_Image"]["name"];
	$arrType = $_FILES["post_Image"]["type"];
	$arrTmp_name = $_FILES["post_Image"]["tmp_name"];
	$arrError = $_FILES["post_Image"]["error"];
	$arrSize = $_FILES["post_Image"]["size"];
	$arrImg = "";
	
			if ($arrType[0] == "image/jpeg" || $arrType[0] == "image/png" || $arrType[0] == "image/gif") {
				move_uploaded_file($arrTmp_name[0], "../../img/" . $arrName[0]);
				$arrImg .= "$arrName[0]";
				
			}else { echo "File tải lên không đúng định dạng ảnh.";die;};

$sql="INSERT INTO tin(post_name,intro_content,content,image,title_menu,menu_id,user_name,date) VALUES  (N'$post_name',N'$intro',N'$content',N'$arrImg',N'$title_menu',N'$menu_id',N'$Iusername',N'$date') "; 
mysqli_query($conn, $sql);
header('location:../backend.php')
?>