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
?>
<div class="container ">
    <div class="banner">
        <div class="row banner-top">
         <div class="col-6 banner-top-1">
            <a href="">
                <span><i class="fa-duotone fa-timer"></i>time</span>
                <h2> Anh nông dân Cao Lan chế tạo máy bóc vỏ,thái sắn </h2>
                <h3>với mong muốn giảm bớt sức lao động</h3>
            </a>
         </div>
         <div class="col-6 banner-top-2">
            <a href="">
            <span>time</span>
            <h2> Bắc giang:Trại lợn trên 3 tỷ đồng </h2>
            <h3>với mong muốn</h3>
        </a>
         </div>
        </div>
        <div class="row banner-bottom">
<div class="col-4 banner-bottom-1">
    <a href="">
        <span><i class="fa-solid fa-timer"></i>time</span>
        <h2>Quảng Ngãi: Một nông dân cải tiến máy tuốt
            lúa thông thường thành máy tuốt lúa đa năng </h2>
        <h3>Anh Bùi Văn Thắng- Chủ tịch Hội Nông dân xã B</h3>
    </a>
</div>
<div class="col-4 banner-bottom-2">
    <a href="">
        <span>time</span>
        <h2> Hà Giang: Thoát nghèo nhờ biết sử dụng vốn vay</h2>
        <h3>Đó là gia đình anh Nguyễn Văn Sơn</h3>
    </a>
</div>
<div class="col-4 banner-bottom-3">
    <a href="">
        <span>time</span>
        <h2> Gia Lai: Có một tỷ phú trên đất mía</h2>
        <h3>Được mệnh danh là một tỷ phú trên đất mía</h3>
    </a>
</div>
        </div>
    </div>
    <div class="body">
        <div class="row">
            <div class="col col-9">
                <div class="intro-body">
                <?php
                foreach ($arraymenu as $key =>$value) {
                    if($key == 0){
                ?> 
                    <h3> <?php echo $value['title_menu'];?></h3>
                    <?php }
                } ?>
                    <span>
                        <img src="img/241397699_4785981058081263_8143154032850003995_n.png" alt="">
                    </span>
                </div>
                <div class="big-main">
                    <div class="main-body">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=1 LIMIT 0,1";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result)
                            ?>
                            <div class="col-6">
                                <img class="img_index" src=<?php echo '../img/'.$row["image"] ?>
                                    alt="">
                            </div>
                            <div class="col-6">
                                <p class="text-title">
                                    <a href=""><?php echo $row['post_name'];?> </a>
                                </p>
                                <p class="text-body"><?php echo $row['intro_content'];?>
                                </p>
                                <a href="form.php?id=<?php echo $row['id'] ?>" class="read"> <button class="btn btn-success"> Read more >> </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="small-body">
                        <div class="row">
                            <div class="col-6">
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=1  LIMIT 1,4";
                            $result=mysqli_query($conn,$sql);
                            while( $row = mysqli_fetch_assoc($result)){
                            ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img  src="<?php echo '../img/'.$row["image"] ?>"
                                            alt="">
                                    </div>
                                    <div class="col-9">
                                        <a href="form.php?id=<?php echo $row['id'] ?>"><?php echo $row["post_name"] ?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-6">
                                
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=1  LIMIT 5,8";
                            $result=mysqli_query($conn,$sql);
                            while( $row = mysqli_fetch_assoc($result)){
                            ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo '../img/'.$row["image"] ?>"
                                            alt="">
                                    </div>
                                    <div class="col-9">
                                        <a href="form.php?id=<?php echo $row['id'] ?>"><?php echo $row["post_name"] ?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-body">
                <?php
                foreach ($arraymenu as $key =>$value) {
                    if($key == 2){
                ?> 
                    <h3>Hướng dẫn và tư vấn <?php echo $value['title_menu'];?></h3>
                    <?php }
                } ?> 
                </div>
                <div class="big-main">
                    <div class="main-body">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=3 LIMIT 0,1";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result)
                            ?>
                            <div class="col-6">
                                <img class="img_index" src=<?php echo '../img/'.$row["image"] ?>
                                    alt="">
                            </div>
                            <div class="col-6">
                                <p class="text-title">
                                    <a href=""><?php echo $row['post_name'];?> </a>
                                </p>
                                <p class="text-body"><?php echo $row['intro_content'];?>
                                </p>
                                <a href="form.php?id=<?php echo $row['id'] ?>" class="read"> <button class="btn btn-success"> Read more >> </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="small-body">
                        <div class="row">
                            <div class="col-6">
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=3  LIMIT 1,4";
                            $result=mysqli_query($conn,$sql);
                            while( $row = mysqli_fetch_assoc($result)){
                            ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img  src="<?php echo '../img/'.$row["image"] ?>"
                                            alt="">
                                    </div>
                                    <div class="col-9">
                                        <a href="form.php?id=<?php echo $row['id'] ?>"><?php echo $row["post_name"] ?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-6">
                                
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=3  LIMIT 5,8";
                            $result=mysqli_query($conn,$sql);
                            while( $row = mysqli_fetch_assoc($result)){
                            ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo '../img/'.$row["image"] ?>"
                                            alt="">
                                    </div>
                                    <div class="col-9">
                                        <a href="form.php?id=<?php echo $row['id'] ?>"><?php echo $row["post_name"] ?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-body">
                <?php
                foreach ($arraymenu as $key =>$value) {
                    if($key == 3){
                ?> 
                    <h3>Hướng dẫn và tư vấn <?php echo $value['title_menu'];?></h3>
                    <?php }
                } ?>
                </div>
                <div class="big-main">
                    <div class="main-body">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=4 LIMIT 0,1";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result)
                            ?>
                            <div class="col-6">
                                <img class="img_index" src=<?php echo '../img/'.$row["image"] ?>
                                    alt="">
                            </div>
                            <div class="col-6">
                                <p class="text-title">
                                    <a href=""><?php echo $row['post_name'];?> </a>
                                </p>
                                <p class="text-body"><?php echo $row['intro_content'];?>
                                </p>
                                <a href="form.php?id=<?php echo $row['id'] ?>" class="read"> <button class="btn btn-success"> Read more >> </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="small-body">
                        <div class="row">
                            <div class="col-6">
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=4  LIMIT 1,4";
                            $result=mysqli_query($conn,$sql);
                            while( $row = mysqli_fetch_assoc($result)){
                            ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo '../img/'.$row["image"] ?>"
                                            alt="">
                                    </div>
                                    <div class="col-9">
                                        <a href="form.php?id=<?php echo $row['id'] ?>"><?php echo $row["post_name"] ?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-6">
                                
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=4  LIMIT 5,8";
                            $result=mysqli_query($conn,$sql);
                            while( $row = mysqli_fetch_assoc($result)){
                            ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo '../img/'.$row["image"] ?>"
                                            alt="">
                                    </div>
                                    <div class="col-9">
                                        <a href="form.php?id=<?php echo $row['id'] ?>"><?php echo $row["post_name"] ?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-body">
                <?php
                foreach ($arraymenu as $key =>$value) {
                    if($key == 4){
                ?> 
                    <h3> Hướng dẫn và tư vấn <?php echo $value['title_menu'];?></h3>
                    <?php }
                } ?>
                </div>
                <div class="big-main">
                    <div class="main-body">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=5 LIMIT 0,1";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result)
                            ?>
                            <div class="col-6">
                                <img class="img_index"src=<?php echo '../img/'.$row["image"] ?>
                                    alt="">
                            </div>
                            <div class="col-6">
                                <p class="text-title">
                                    <a href=""><?php echo $row['post_name'];?> </a>
                                </p>
                                <p class="text-body"><?php echo $row['intro_content'];?>
                                </p>
                                <a href="form.php?id=<?php echo $row['id'] ?>" class="read"> <button class="btn btn-success"> Read more >> </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="small-body">
                        <div class="row">
                            <div class="col-6">
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=5  LIMIT 1,4";
                            $result=mysqli_query($conn,$sql);
                            while( $row = mysqli_fetch_assoc($result)){
                            ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo '../img/'.$row["image"] ?>"
                                            alt="">
                                    </div>
                                    <div class="col-9">
                                        <a href="form.php?id=<?php echo $row['id'] ?>"><?php echo $row["post_name"] ?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-6">
                                
                            <?php
                            $sql = "SELECT * FROM `tin` WHERE menu_id=5  LIMIT 5,8";
                            $result=mysqli_query($conn,$sql);
                            while( $row = mysqli_fetch_assoc($result)){
                            ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img class="img_index" src="<?php echo '../img/'.$row["image"] ?>"
                                            alt="">
                                    </div>
                                    <div class="col-9">
                                        <a href="form.php?id=<?php echo $row['id'] ?>"><?php echo $row["post_name"] ?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
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
                    <img src="img/242207045_580741506503569_4109113269113207084_n.png" alt="">
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
                <div>
                    <img  style="margin-top: 10px;margin-left: 4px;" src="https://tpc.googlesyndication.com/simgad/2769543174239388020?sqp=4sqPyQQrQikqJwhfEAEdAAC0QiABKAEwCTgDQPCTCUgAUAFYAWBfcAJ4AcUBLbKdPg&rs=AOga4qkOp_o74G9VCkF5ZAWnfo8Z7Tak7A"
                    width="252px" alt="">
                </div>
            </div>
        </div>
    </div>
</div>