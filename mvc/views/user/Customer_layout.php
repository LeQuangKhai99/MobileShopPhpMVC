
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo constant("path")?>/public/user/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo constant("path")?>/public/user/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo constant("path")?>/public/user/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo constant("path")?>/public/user/style.css">
    <link rel="stylesheet" href="<?php echo constant("path")?>/public/user/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo constant("path")?>/public/user/css/style.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?php echo constant("path")?>public/templateEditor/ckeditor/ckeditor.js"></script>
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <?php if(isset($_SESSION['user'])){?>
                                <?php if($_SESSION['user']['level'] == 1){?>
                                    <li><a><i class="fa fa-user"></i> Xin chào: <?php echo $_SESSION['user']['name']; ?></a></li>
                                    <li><a href="<?php echo constant("path")?>Manage"><i class="fa fa-user"></i> Quản lý</a></li>
                                    <li><a href="<?php echo constant("path")?>Login/logout"><i class="fa fa-user"></i> Đăng xuất</a></li>
                                <?php } else{ ?>
                                    <li><a href="/cap-nhat-thong-tin-ca-nhan"><i class="fa fa-user"></i> Xin chào: <?php echo $_SESSION['user']['name']; ?></a></li>
                                    <li><a href="<?php echo constant("path")?>Login/logout"><i class="fa fa-user"></i> Đăng xuất</a></li>
                                <?php }
                            } else{?>    
                                <li><a href="<?php echo constant("path")?>Login/login"><i class="fa fa-user"></i> Đăng nhập</a></li>
                                <li><a href="<?php echo constant("path")?>Login/Register"><i class="fa fa-user"></i>Đăng kí</a></li>
                            <?php } ?>    
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                    	<form method="post" action="<?php echo constant("path")?>Customer/Search" class = "form-inline my-2 my-lg-0">
                    		<input id="search" name="key" class="form-control mr-sm-2" type="search" placeholder="Search">
                            <button id="btn" class="btn btn-success" type="submit">Search</button>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="<?php echo constant('path') ?>"><img src="<?php echo constant("path")?>/public/user/img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="<?php echo constant("path")?>Customer/Cart">Cart - <span class="cart-amunt"><?php echo number_format($data['totalPrice']); ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $data['totalProduct']; ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="main-menu" href="<?php echo constant("path")?>">Trang Chủ</a></li>
			            <li class="dropdown">
			                <a class="main-menu dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">Loại Sản Phẩm
			                    <span class="caret"></span>
			                </a>
			                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php for ($i=0; $i < count($data['listCate']); $i++) { 
                                 ?>
			                    <li><a href="<?php echo constant('path') ?>Customer/Cate/<?php echo $data['listCate'][$i]['id'] ?>"><?php echo $data['listCate'][$i]['name']; ?></a></li>
			                    <?php } ?>
			                </ul>
			            </li>

				        <li><a class="main-menu" href="<?php echo constant("path")?>Customer/Contact">Liên Hệ</a></li>
                        <?php
                            for ($i=0; $i < count($data['listPostCate']); $i++) { 
                        ?>
                            <li><a class="main-menu" href="<?php echo constant("path")?>Customer/News/<?php echo $data['listPostCate'][$i]['id']; ?>"><?php echo $data['listPostCate'][$i]['name']; ?></a></li>
                        <?php 
                        }
                        ?>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    	<?php
		require_once "./mvc/views/user/pages/".$data['page'].".php";
		?>
    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="<?php echo constant("path")?>/public/user/js/owl.carousel.min.js"></script>
    <script src="<?php echo constant("path")?>/public/user/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="<?php echo constant("path")?>/public/user/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="<?php echo constant("path")?>/public/user/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="<?php echo constant("path")?>/public/user/js/bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo constant("path")?>/public/user/js/script.slider.js"></script>
	<script>
        var btn_search = document.getElementById("btn");
        var inp_search = document.getElementById("search");
        btn_search.addEventListener("click", function (e) {
            if (inp_search.value == "") {
                alert("Hãy nhập nội dung tìm kiếm!");
                e.preventDefault();
            }
        });
    </script>
  </body>
</html>