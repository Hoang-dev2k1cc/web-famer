

<?php include '../config/connect.php';
           
           include 'header.php'?>
   <div class="container">
           <div class="body">
               <div class="row">
                   <div class="col-9">
                       <div class="top-body">
                       <?php
                       $user = $_GET['user'];
                       $sql1 = "select * from tin where user_name =N'$user'";
                       $result1=mysqli_query($conn , $sql1);
                       if(mysqli_num_rows($result1)>0){
                           $row1 = mysqli_fetch_assoc($result1)
                       ?>
                       <div class="top-body">
                           <a href="">Home</a>
                           <span>/</span>
                           
                           
                           <span><?php echo $row1['user_name'];?></span>
                       </div>
                       <div class="">
                           <h2 style="font-size: 26px;"><?php echo $row1['user_name'];?>   <img src="../img/c.png" alt=""></h2> 
                           <img src="../img/user.png" alt="">
                           <span>
                               <img src="img/241397699_4785981058081263_8143154032850003995_n.png" alt="">
                           </span>
   <?php }?>
                       </div>
                       <div class="big-main">
                           <?php
                          
                           if(isset($_GET["p_search"])){  
                               if(!isset($_GET['page'])){
                                   $pageNum=1;
                               }else{
                               $pageNum=$_GET['page'];
                               }
                               $pageRow=($pageNum - 1)*4;   
                               $P_Name = $_GET["search"]; 
                               $countSearch="SELECT COUNT(ID) FROM tin WHERE  post_name LIKE '%$P_Name%'";
                               $test2= mysqli_query($conn,$countSearch);
                               $retest2= mysqli_fetch_assoc($test2);
                               $page=$retest2['COUNT(ID)'];
                               $numPage=ceil($page / 4);
                               $sql = "SELECT * FROM tin WHERE Post_Name LIKE '%$P_Name%' LIMIT $pageRow,4" ;
                               $result = mysqli_query($conn, $sql);                  
                               $searchNext=$pageNum+1;
                               $searchPrev=$pageNum-1;
                             
                           }else{
                               if(!isset($_GET['page'])){
                                   $pageNum=1; 
                               }else{
                               $pageNum=$_GET['page'];
                               }
                               $pageRow=($pageNum - 1)*4;
                               $user = $_GET['user'];
                               $sqlpage="SELECT COUNT(id) FROM tin where user_name=N'$user' ";
                               $arraypage= mysqli_query($conn,$sqlpage);
                               $arrayfinalpage= mysqli_fetch_assoc($arraypage);
                               $countpage=$arrayfinalpage['COUNT(id)'];
                               $numPage=ceil($countpage / 4);                                                            
                               $sql = "select * from tin where user_name= N'$user'   LIMIT $pageRow,4 ";
                               $result = mysqli_query($conn, $sql);    
                               $pageNext=$pageNum+1;
                               $pagePrev=$pageNum-1;                             
                           }
                             if(mysqli_num_rows($result)>0){
                               while($row = mysqli_fetch_assoc($result)) 
                               { ?>
                               <div class="main-body">
                                   <p class="text-title">
                                       <a href="">
                                           <?php echo $row['post_name'] ?>
                                       </a>
                                   </p>
                                   <div class="icon-body">
                                       <span><i class="fas fa-user"></i></span>
                                       <a style="font-size:1rem" href="#" class="name"><?php echo $row['user_name'] ?></a>
                                       <span><i class="fas fa-folder"></i></span>
                                       <a href="#" style="font-size:1rem" class="text"><?php echo $row['title_menu'] ?></a>
                                       <span><i class="far fa-eye"></i></span>
                                       <span><?php echo $row['view'] ?></span>
                                       <span>time:</span>
                                       <span><?php echo date("d-m-Y ",strtotime($row['date'])) ; ?></span>
                                   </div>
                                   <div class="row">
                                       <div class="col-6">
                                       <img  class="img_body"src="<?php echo '../img/'.$row["image"] ?>">
                                       </div>
                                       <div class="col-6 text-body " style="margin-left: -84px;   margin-top: -17px;">
                                           <p class="text-body" >
                                               <?php echo $row['intro_content'] ?>
                                           </p><a href="form.php?id=<?php echo $row['id']?>">
                                           <button class="btn btn-success">Read more > ></button>
                                           </a>
                                       </div>
                                   </div>
                               </div>
                               <?php
                               }
                           }else {
                               echo "0 results";
                           }
                           ?>      
                       </div>
                       <div class="pagination" >
                       <?php 
                         if(!isset($_GET["p_search"])){  
                       ?>
                       <?php if($pageNum!=1){
                           ?>
                       <a href="<?php echo 'usersearch.php?user='.$user.'&page='.$pagePrev; ?>">«</a>
                       <?php  } ?>
                   <?php } else { 
                           ?>
                   <?php if($pageNum!=1){
                           ?>
                        <a href=" <?php echo 'usersearch.php?search='.$_GET["search"].'&p_search='.$_GET["p_search"].'&page='.$searchPrev; ?>">«</a> 
                       <?php  }
                           } ?>
                     
                           <?php
                           for($i=1;$i<=$numPage;$i++){
                               if(isset($_GET["p_search"])){ 
                               ?>
                           <a   <?php if($i==$pageNum){echo 'style="background:#60A50D;color:white;"';}else{echo '';} ?> href="<?php echo 'usersearch.php?search='.$_GET["search"].'&p_search='.$_GET["p_search"].'&page='.$i; ?>"> <?php echo $i; ?></a>  
                               <?php }else{
                                   ?>
                           <a   <?php if($i==$pageNum){echo 'style="background:#60A50D;color:white;"';}else{echo '';} ?> href="<?php echo 'usersearch.php?user='.$user.'&page='.$i; ?> " > <?php echo $i; ?></a>                  
                               <?php }
                            }?>
                              <?php 
                         if(!isset($_GET["p_search"])){  
                       ?>
                       <?php if($pageNum!=$numPage){
                   ?> <a href="<?php echo 'usersearch.php?user='.$user.'&page='.$pageNext; ?>">»</a>
                   <?php
                       }
                      ?>
                       <?php 
                   } else { ?>
                   <?php if($pageNum!=$numPage){
                   ?>  <a href=" <?php echo 'usersearch.php?user='.$user.'&search='.$_GET["search"].'&p_search='.$_GET["p_search"].'&page='.$searchNext; ?>">»</a> 
                   <?php
                       }
                      ?>
                   
                   <?php }?>
                           
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
                          <a href=""> <img  style="margin-top: 10px;margin-left: 4px;" src="https://tpc.googlesyndication.com/simgad/2769543174239388020?sqp=4sqPyQQrQikqJwhfEAEdAAC0QiABKAEwCTgDQPCTCUgAUAFYAWBfcAJ4AcUBLbKdPg&rs=AOga4qkOp_o74G9VCkF5ZAWnfo8Z7Tak7A"
                           width="252px" alt=""></a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <?php include 'footer.php'?>