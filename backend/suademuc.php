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
    <title>Sửa đề mục bài viết</title>

</head>
 <?php
   include '../config/connect.php';
 

    // print_r($arraymenu);

    // die;
    
    ?>
    <!-- body -->
    <form method="POST" action="xuly/update_title.php"  >
        
    <div class="main-news">
        <p class="news-ac">Sửa đề mục</p>
        <div class="body-small">
            <h1 class="top-body">
             </h1>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    <div class="content-left">
                        <div class="big-main">
                                <div class="form-group">
                                    <?php
                                    $id = $_GET['id'];
                                    $sql1 = "SELECT *FROM theloai WHERE id=$id";
                                    $result1=mysqli_query($conn,$sql1);
                                    $row1 = mysqli_fetch_assoc($result1)
                                    ?>
                                       <label for="Id đề mục">ID mục</label>
                                       <input name="id_menu" type="text" class="form-control content-input" value="<?php echo $row1['id'] ; ?>">
                                  <label for="Tên đề mục">Tên đề mục</label>
                                  <input name="title_menu" type="text" class="form-control content-input" value="<?php echo $row1['title_menu'] ; ?>">
                                </div>
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Submit</button>
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
