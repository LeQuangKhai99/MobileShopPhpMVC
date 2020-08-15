    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2><?php echo $data['cate'][0]['name']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php for ($i=0; $i < count($data['listpd']); $i++) {  ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img style="width: 263px; height: 302px" src="<?php echo constant('path'); ?>public/image/product/<?php echo $data['listpd'][$i]['image']; ?>" alt="">
                        </div>
                        <h2><a href="<?php echo constant('path'); ?>Customer/Detail/<?php echo $data['listpd'][$i]['id']; ?>"><?php echo $data['listpd'][$i]['name']; ?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo number_format($data['listpd'][$i]['promotionprice']); ?></ins> <del><?php echo number_format($data['listpd'][$i]['price']); ?></del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="<?php echo constant('path'); ?>Customer/addCart/<?php echo $data['listpd'][$i]['id']; ?>">Add to cart</a>
                        </div>                       
                    </div>
                </div>
                <?php } ?>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <?php 
                                $page = $data['pageIndex'];
                                $totalPage = ceil($data['total'][0]['sl']/$data['pageSize']);
                                $next = $page + 1;
                                $pre = $page - 1;
                                $cate = $data['cate'][0]['id'];

                                $urlNext = constant("path").'Cutomer/Cate/'.$cate.'/'.$next;
                                $urlPre = constant("path").'Cutomer/Cate/'.$cate.'/'.$pre;

                                if ($totalPage == 0) {
                                    $totalPage = 1;
                                }
                            ?>
                            <?php if ($totalPage == 1)
                            {?>

                                <li class="page-item"><a class="active page-link" href="#"><?php echo $page; ?></a></li>
                            <?php }
                            else
                            {
                                if (((int)$totalPage - 1) != $page)
                                {
         
                                    if ($page == 0)
                                    { ?>
                                        <li class="page-item"><a class="page-link active" href="#"><?php echo $page; ?></a></li>
                                        <li class="page-item"><a class="page-link" href="<?php echo $urlNext ?>">Next</a></li>
                                    <?php }
                                    else
                                    { ?>
                                        <li class="page-item"><a class="page-link" href="<?php echo $urlPre ?>">Previous</a></li>
                                        <li class="page-item"><a class="active page-link" href="#"><?php echo $page; ?></a></li>
                                        <li class="page-item"><a class="page-link" href="<?php echo $urlNext ?>">Next</a></li>
                                    <?php }
                                }
                                else
                                { ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $urlPre ?>">Previous</a></li>
                                    <li class="page-item"><a class="active page-link" href="#"><?php echo $page; ?></a></li>
                                <?php }
                            }?>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>