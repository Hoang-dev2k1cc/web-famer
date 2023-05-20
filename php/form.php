
<body>
    <?php include 'header.php' ?>
    <!-- body -->
    <div class="container">
        <div class="body">
            <div class="row">
                <div class="col-9">
                    <div class="top-body">
                    <?php
                     $id = $_GET['id'];
                     $sql1="select * from tin where id=$id";
                     $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        $row1 = mysqli_fetch_assoc($result1)
                    ?>
                        <a href="index.php">Home</a>
                        <span>/</span>
                        <a href="body.php?menu_id=<?php echo $row1['menu_id']?>" style="color: green !important;text-decoration: none;">
                        <span ><?php echo $row1['title_menu']?></span>
                    </a>
                        <span>/</span>
                        <span><?php echo $row1['post_name']?></span>
                    <?php
                    }?>
                    </div>
                    <div class="big-main">
                        <div class="main-body">
                        <?php
                        $id = $_GET['id'];
                        $sql="select * from tin where id=$id";
                        
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>                        
                            <p class="text-title">
                                <a href=""><?php echo $row['post_name']?> </a>
                            </p>
                            <div class="icon-body">
                                <span><i class="fas fa-user"></i></span>
                                <a href="usersearch.php?user=<?php echo $row['user_name'] ?>" class="name"><?php echo $row['user_name']?></a>
                                <span><i class="fas fa-folder"></i></span>
                                <a href="#" class="text"><?php echo $row['title_menu']?></a>
                                <span><i class="far fa-eye"></i></span>
                                <span><?php echo $view=$row['view']?></span>
                                <span>time:</span>
                                    <span><?php echo date("d-m-Y ",strtotime($row['date'])) ; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="logo-social">
                        <button class="btn logo-facebook"><i
                                class="fab fa-facebook-f"></i><span>Facebook</span></button>
                        <button class="btn logo-twiter"><i
                                class="fab fa-twitter-square"></i><span>Twiter</span></button>
                        <button class="btn logo-linkedln"><i
                                class="fab fa-linkedin-in"></i><span>Linkedln</span></button>
                        <button class="btn logo-pinterest"><i
                                class="fab fa-pinterest"></i><span>Pinterest</span></button>
                    </div>
                    <div class="content-body">
                    <?php echo $row['content']?>
                    </div>
                    <?php 
                    }     
                    }
                    $up_sql = "UPDATE tin set view= '$view'+1 WHERE id = $id";
                    mysqli_query($conn, $up_sql); 
                       ?>
                    <div class="logo-social">
                        <button class="btn logo-facebook"><i
                                class="fab fa-facebook-f"></i><span>Facebook</span></button>
                        <button class="btn logo-twiter"><i
                                class="fab fa-twitter-square"></i><span>Twiter</span></button>
                        <button class="btn logo-linkedln"><i
                                class="fab fa-linkedin-in"></i><span>Linkedln</span></button>
                        <button class="btn logo-pinterest"><i
                                class="fab fa-pinterest"></i><span>Pinterest</span></button>
                                <a href="../backend/ykienBd.php?id=<?php echo $id?>" class="btn btn-info">Gửi ý kiến</a>
                    </div>
                </div>
                <div class="col-3">
                <div class="form-group search">
                        <form method="GET" action="body.php">
                        <input type="text" class="control" name="search" placeholder="Search">
                        <button class="click-search" type="submit" name="p_search" value="search"><i class="fas fa-search"></i></button>
                    </form>
                    </div>
                    <div class="intro-body-right">
                        <h4>Bài viết hay nhất</h4>
                    </div>
                    <div class="body-right">
                        <div class="main-body-right">
                            <div class="row">
                            <?php
                                $sql_h="SELECT *
                                FROM tin
                                ORDER BY view DESC
                                LIMIT 6";
                                $result_h = mysqli_query($conn, $sql_h);
                                 if(mysqli_num_rows($result_h)>0){
                                    while($row_h = mysqli_fetch_assoc($result_h)) 
                                    { ?>
                                <div class="col-4">
                                    <img src="<?php echo '../img/'.$row_h["image"] ?>"
                                        alt="">
                                </div>
                                <div class="col-8">
                                <a href="form.php?id=<?php echo $row_h['id']?>"><?php echo $row_h['post_name'] ?></a>
                                    <span><i class="far fa-bell"></i></span>
                                    <span><?php echo date("d-m-Y ",strtotime($row_h['date'])) ; ?></span>
                                    <span><i class="far fa-eye"></i></span>
                                    <span><?php echo $row_h['view'] ?></span>
                                    
                                </div>
                                <?php }
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>