
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- nguồn w3schools -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../libraries/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap-grid.css">
    <!-- jQuery library -->
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
   <link rel="stylesheet" href="../libraries/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="../libraries/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap-utilities.css">
    <link rel="stylesheet" href="../libraries/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../libraries/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../libraries/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../libraries/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap-grid.rtl.css">
    <link rel="stylesheet" href="../libraries/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="../libraries/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.js">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="https://tse4.mm.bing.net/th?id=OIP.3iQZeVuG_rq1v6okLrmCkAAAAA&amp;pid=Api&amp;P=0&amp;w=149&amp;h=152">
    <title>Web nông nghiệp</title>
</head>
<!-- header -->
<header>
<?php
session_start(); 
include '../config/connect.php';
$sql = "select * from  theloai " ;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);

$arraymenu= array();
foreach($row as $value){
    if($value['parent_id'] == -1){
       $arraymenu[]=$value;
    }
}
foreach($arraymenu as $key=> $value1){
    foreach($row as $value2){
        if($value1['id'] == $value2['parent_id']){
             $arraymenu[$key]['submenu'][]=$value2;
            foreach($row as $value3){
                if($value2['id'] == $value3['parent_id']){
                    $value2['submenu'][]=$value3;
                } 
            }
           
        }
    }
}
echo "<pre>";
var_dump($arraymenu);
echo "<?pre>";die;
?>
    <div class="container">
        <div class="logo">
           <a href="index.php"><img src="https://webnongnghiep.com/wp-content/uploads/2020/07/webnongnghiep-logo.png" alt="logo"></a> 
        </div>
    </div>
    <div class="taskbar-header" id="myHeader">
        <div class="container">
            <ul >
                <li class="active">
                    <a href="index.php" >
                      <i  class="fas fa-home "></i>
                    </a>
                </li>
                <?php 
                foreach($arraymenu as $value){
                 ?> 
                <li>
                    <a href="body.php?menu_id=<?php echo $value["id"]; ?>">
                      <?php echo $value['title_menu'];?>
                    </a><i class="fa-solid fa-angle-down"></i>
                    <?php
                    if(!empty($value['submenu'])){
                        ?>
                         <div class="dropdown__animal">
                        <ul>
                        <?php
                        foreach($value['submenu'] as $value2){
                            ?>
                            <li><a href="body.php?menu_id=<?php echo $value2["id"]; ?>">
                            <?php echo $value2['title_menu']  ;?></a>
                        
                        <?php
                        if(!empty($value2['submenu'])){
                            ?>
                         <div class="dropdown__animal-1">
                        <ul>
                        <?php
                        foreach($value2['submenu'] as $value3){
                            ?>
                            <li><a href="body.php?menu_id=<?php echo $value3["id"]; ?>"><?php echo $value3['title_menu'] ?> </a></li>
                            <?php
                        }
                        ?>
                        </ul>
                        </div>
                        <?php
                        }
                        ?>
                        </li>
                            <?php
                        }
                         ?>
                          </ul>
                        </div>
                        <?php
                    }
                    ?>
                </li>
                <?php
                }
                ?>    
        </div>
    </div>
</header>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    console.log(sticky)
    
  } else {
    header.classList.remove("sticky");
  }
 
}

</script>