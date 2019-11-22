


<!DOCTYPE html>
<html>
    <head>
        <title>Chinhtkt</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="http://localhost/chinhvuonga/public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/chinhvuonga/public/frontend/css/bootstrap.min.css">
        <script  src="http://localhost/chinhvuonga/public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="http://localhost/chinhvuonga/public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="http://localhost/chinhvuonga/public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="http://localhost/chinhvuonga/public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="http://localhost/chinhvuonga/public/frontend/css/style.css">
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if(isset($_SESSION['name_user'])) : ?>
                                        <li> Welcome : <?php echo $_SESSION['name_user'] ?></li>
                                        <li>
                                            <a href="thoat.php"><i class="fa fa-user"></i> Logout</a>
                                        </li>
                                           
                                            
                                            
                                                
                                           
                                


                                    <?php else: ?>
                                    <li>
                                            <a href="dang-nhap.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                                        </li>
                                        <li>
                                            <a href="dang-ky.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                                        </li>

                                <?php endif ; ?>
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">    
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                            <img src="<?php echo base_url() ?>public/frontend/images/laptop.png" style="width:161px",height="38px">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    
                                </div>
                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->
            <!--MENUNAV-->
            <div id="menunav" style="background-color:#000000">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php" style="background-color:#000000"><i class="fa fa-database" aria-hidden="true" style="background-color:#ffffff"></i>  Home page</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>    
                                <a href="about-us.php" style="background-color:#000000"></i>Contact us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->
                        <!--Shopping-->
                        <ul class="pull-right"id="main-shopping" >

                            <li>
                                <a href="gio-hang.php" style="background-color:#0080ff"><i class="fa fa-shopping-basket"style="background-color:#0080ff" ></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            <div id="maincontent">
                <div class="container"> 
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title" style="background-color:#0080ff"><i class="fa fa-list" style="background-color:#0080ff" ></i>  Category</h3>
                            <!--ul>
                                <li>
                                    <a href="">Máy tính  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">Máy giặt  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">Đồ điện  <span class="badge pull-right">14</span></a>
                                </li>
                                <li>
                                    <a href=""> Thiết bị văn phòng  <span class="badge pull-right">14</span> </a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                            </ul-->
                            <ul>
                            <?php foreach ($category as $item) :?>
                           <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li> 
                        <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-upload" aria-hidden="true"></i>  New Product </h3>
                            <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach ($productNew  as $item):  ?>
                                 <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> <?php  echo $item['name']?></p >
                                            <b class="price"><?php echo $item['price']?>Đ</b><br>

                                    
                                        </div>
                                    </a>
                                </li>

                            <?php endforeach ?>
                               
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                   