    <?php
        if (isset($_SESSION['bought'])) {
            echo "<script>alert('Đặt hàng thành công!Vui lòng chờ nhân viên gọi điện xác nhận')</script>";
            unset($_SESSION['bought']);
        }
    ?>
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<?php for ($i=0; $i < count($data['listSlide']); $i++) { ?>
					<li>
						<img src="<?php echo constant("path")?>public/image/slide/<?php echo $data["listSlide"][$i]["image"] ?>" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								<span class="primary">Giao hàng <strong>miễn phí</strong></span>
							</h2>
							
							<a class="caption button-radius" href="#"><span class="icon"></span>Mua ngay</a>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>Đổi trả trong 30 ngày</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Giao hàng miễn phí</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Thanh toán bảo mật</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Quà tặng hấp dẫn</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                        	<?php for ($i=0; $i < count($data['listProduct']); $i++) {  ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img style="width: 212px; height: 269px;" src="<?php echo constant("path")?>public/image/product/<?php
                                    echo $data['listProduct'][$i]['image'] ?>" alt="">
                                    <div class="product-hover">
                                        <a href="<?php echo constant("path")?>Customer/addCart/<?php echo $data['listProduct'][$i]['id']; ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['listProduct'][$i]['id']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['listProduct'][$i]['id']?>"><?php echo $data['listProduct'][$i]['name'] ?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins><?php echo number_format($data['listProduct'][$i]['promotionprice']) ?></ins> <del><?php echo number_format($data['listProduct'][$i]['price']) ?></del>
                                </div> 
                            </div>
                        	<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                        	<?php for ($i=0; $i < count($data['listCate']); $i++) {  ?>
                            <img style="width: 270px; height: 120px;" src="<?php echo constant("path")?>/public/image/cate/<?php echo $data['listCate'][$i]['image']; ?>" alt=""><?php } ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Khuyến mãi khủng</h2>
                        <?php for ($i=0; $i < count($data['bestSeller']); $i++) { ?>
                        <div class="single-wid-product">
                            <a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['bestSeller'][$i]['id']?>"><img src="<?php echo constant("path")?>/public/image/product/<?php echo $data['bestSeller'][$i]['image']; ?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['bestSeller'][$i]['id']?>"><?php echo $data['bestSeller'][$i]['name']; ?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?php echo number_format($data['bestSeller'][$i]['promotionprice']); ?></ins>
                                <del><?php echo number_format($data['bestSeller'][$i]['price']); ?></del>
                            </div>  
                        </div>   
                        <?php } ?>                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Sản phẩm giá rẻ</h2>
                        <?php for ($i=0; $i < count($data['cheap']); $i++) { ?>
                        <div class="single-wid-product">
                            <a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['cheap'][$i]['id']?>"><img src="<?php echo constant("path")?>public/image/product/<?php echo $data['cheap'][$i]['image']; ?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['cheap'][$i]['id']?>"><?php echo $data['cheap'][$i]['name']; ?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?php echo number_format($data['cheap'][$i]['promotionprice']); ?></ins>
                                <del><?php echo number_format($data['cheap'][$i]['price']); ?></del>
                            </div>  
                        </div>   
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Sản phẩm ngẫu nhiên</h2>
                        <?php for ($i=0; $i < count($data['random']); $i++) { ?>
                        <div class="single-wid-product">
                            <a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['random'][$i]['id']?>"><img src="<?php echo constant("path")?>/public/image/product/<?php echo $data['random'][$i]['image']; ?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['random'][$i]['id']?>"><?php echo $data['random'][$i]['name']; ?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?php echo number_format($data['random'][$i]['promotionprice']); ?></ins>
                                <del><?php echo number_format($data['random'][$i]['price']); ?></del>
                            </div>  
                        </div>   
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->