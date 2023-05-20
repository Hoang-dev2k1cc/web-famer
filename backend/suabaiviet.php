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
    <link rel="stylesheet" href="css/dangbai.css">
    <title>Sửa bài viết</title>
</head>
<body>
<?php
	session_start(); 
 ?>
  <?php
  include '../config/connect.php';
  $id=$_GET['id'];
  $sql="SELECT * FROM tin WHERE id ='$id'";
  
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)) 
    {
  ?>
    <form method="POST" action="xuly/update.php"  enctype="multipart/form-data"> 
        
    <div class="main-news">
        <p class="news-ac">Sửa bài viết mới</p>
        <div class="body-small">
            <h1 class="top-body">
                Sửa bài viết của bạn</br>
             </h1>
            <div class="row">
                <div class="col-6">
                    <div class="content-left">
                        <div class="big-main">
                        <p>Ảnh bìa bài viết của bạn</p>
                        <img src="<?php echo '../img/'.$row["image"] ?>">
                            <div class="upload">
                                <input type="file" name="post_Image[]">Tải ảnh lên</input>
                                <span>(Tải ảnh vừa đủ thôi)</span>
                            </div>
                        
                                <div class="form-group">
                                  <label>Tên bài viết</label>
                                  <input value = "<?php echo $row['id'] ?>" type="hidden"  name="id" class="form-control content-input">
                                  <input value = "<?php echo $row['post_name'] ?> "  name="post_name"type="text" class="form-control content-input">
                                </div>
                                <div class="form-group">
                                    
                                    <label >Thứ tự kiểu bài viết</label>
                                    <select name="menu_id" id="">
                                <?php
                                $sql1 = "select * from  theloai " ;
                                $result1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_all($result1,MYSQLI_ASSOC); 
                                $arraymenu= array();
                                foreach($row1 as $value){
                                    if($value['parent_id'] == -1){
                                       $arraymenu[]=$value;
                                    }
                                
                                }
                                foreach($arraymenu as $key=> $value1){
                                    foreach($row1 as $value2){
                                        if($value1['id'] == $value2['parent_id']){
                                            foreach($row1 as $value3){
                                                if($value2['id'] == $value3['parent_id']){
                                                    $value2['submenu'][]=$value3;
                                                }
                                                
                                            }
                                            $arraymenu[$key]['submenu'][]=$value2;
                                        }
                                    }
                                }
                                foreach ($arraymenu as $value) {
                                ?>
                                <option value="<?php echo $value['id']?>"><?php echo $value['title_menu'] ?></option>
                                <?php if (!empty($value['submenu'])) {
                                    foreach( $value['submenu'] as $value2){
                                        echo ' <option value="'.$value2['id'].'"> -'.$value2['title_menu'].' </option>';
                                        if(!empty($value2['submenu'])){
                                            foreach($value2['submenu'] as $value3){
                                                echo ' <option value="'.$value3['id'].'"> --'.$value3['title_menu'].' </option>';
                                            }
                                        }
                                    }
                                   
                                    }
                                ?>
                                <?php }?>
                                </select><br>
                                <label for="">Thể loại</label>
                                <select name="title_menu" id="">
                                <?php
                                foreach ($arraymenu as $value) {
                                ?>
                                <option value="<?php echo $value['title_menu']?>"><?php echo $value['title_menu'] ?></option>
                                <?php if (!empty($value['submenu'])) {
                                    foreach( $value['submenu'] as $value2){
                                        echo ' <option value="'.$value2['title_menu'].'"> -'.$value2['title_menu'].' </option>';
                                        if(!empty($value2['submenu'])){
                                            foreach($value2['submenu'] as $value3){
                                                echo ' <option value="'.$value3['title_menu'].'"> --'.$value3['title_menu'].' </option>';
                                            }
                                        }
                                    }
                                   
                                    }
                                ?>
                                <?php }?>
                                </select><br>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Lời mở đầu</label>
                                  <textarea name="intro-content"  value=""><?php echo $row['intro_content'] ?></textarea>
                                      <script>
                                          CKEDITOR.replace( 'intro-content' );
                                      </script>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Nội dung bài viết</label>
                                  <textarea name="content"  value=""><?php echo $row['content'] ?></textarea>
                                      <script>
                                          CKEDITOR.replace( 'content' );
                                      </script>
                                  </div>
                                <input type="submit" name="update"  value="submit"class="btn btn-primary">
                        </div>
                    </div>
                </div>
               
            </div>

        </div>
        <?php
    }
  }
        ?>
</form>
    <!-- end body -->
</body>
</html>
