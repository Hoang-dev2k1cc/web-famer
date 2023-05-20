<!DOCTYPE html>
<html lang="en">

<head>
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
    <link rel="stylesheet" href="css/post.css">
    <title>Thêm đề mục</title>

</head>
 <?php
   include '../config/connect.php';
 
   $sql = "select * from  theloai " ;
   $result = mysqli_query($conn, $sql);
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
               foreach($row as $value3){
                   if($value2['id'] == $value3['parent_id']){
                       $value2['submenu'][]=$value3;
                   }
                   
               }
               $arraymenu[$key]['submenu'][]=$value2;
           }
       }
   }
 
    // print_r($arraymenu);

    // die;
    
    ?>
    <!-- body -->
    <form method="POST" action="xuly/title.php" enctype="multipart/form-data" >
        
    <div class="main-news">
        <p class="news-ac">Thêm đề mục mới</p>
        <div class="body-small">
            <h1 class="top-body">
             </h1>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    <div class="content-left">
                        <div class="big-main">
                                <label for="">Kiểu bài viết</label>
                                <select name="id" id="">
                                <?php
                                foreach ($arraymenu as $value) {
                                ?>
                                <option value="<?php echo $value['id']?>"><?php echo $value['title_menu'] ?></option>
                                <?php if (!empty($value['submenu'])) {
                                    foreach( $value['submenu'] as $value2){
                                        echo ' <option value="'.$value2['id'].'"> -'.$value2['title_menu'].' </option>';
                                    }
                                   
                                    }
                                ?>
                                <?php }?>
                                </select><br>
                                <div class="form-group">
                                  <label for="Tên bài viêt">Tên đề mụct</label>
                                  <input name="title_menu" type="text" class="form-control content-input" placeholder="Nhập tên bài viết của bạn vào">
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
               
            </div>

        </div>
    </div>
</form>
    <!-- end body -->
    <div class="row container">



</body>
</html>
<?php

?>