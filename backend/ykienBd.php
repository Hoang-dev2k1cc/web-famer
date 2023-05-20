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
    <title>Qunnr lý bài viết</title>

</head>
<body>
    <?php
    session_start();
   include '../config/connect.php';
 $id=$_GET['id'];
    
    ?>
    <!-- body -->
    <form method="POST" action="xuly/idea.php?id=<?php echo $id?>" enctype="multipart/form-data" >
        
    <div class="main-news">
        <h1 class="news-ac">Ý kiến của bạn</h1>
        <div class="body-small">
            <h1 class="top-body">
             </h1>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    <div class="content-left">
                        <div class="big-main">
                                <div class="form-group">
                                  <label for="">Họ tên</label>
                                  <input name="name_yk" type="text" class="form-control content-input" placeholder="Nhập tên Họ và tên của bạn vào">
                                </div>
                                <label for="">Địa chỉ</label>
                                <input name="add_yk" type="text" class="form-control content-input" placeholder="Nhập địa chỉ của bạn vào">
                                <label for="">Email</label>
                                <input name="email_yk" type="text" class="form-control content-input" placeholder="Nhập tên mail của bạn vào">
                                  <div class="form-group">
                                  <label >nội dung ý kiến của bạn</label>
                                  <textarea name="content_yk"></textarea>
                                      <script>
                                          CKEDITOR.replace( 'content_yk' );
                                      </script>
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
<?php
 

?>