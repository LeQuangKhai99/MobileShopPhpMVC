
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm liên quan</h2>
                        <?php for($i = 0; $i < count($data['relate']); $i++){ ?>
                            <div class="thubmnail-recent">
                                <img src="<?php echo constant('path')?>public/image/product/<?php echo $data['relate'][$i]['image']?>" class="recent-thumb" alt="">
                                <h2><a href="<?php echo constant("path")?>Customer/Detail/<?php echo $data['relate'][$i]['id']?>"><?php echo $data['relate'][$i]['name']?></a></h2>
                                <div class="product-sidebar-price">
                                    <ins><?php echo number_format($data['relate'][$i]['promotionprice'])?></ins> <del><?php echo number_format($data['relate'][$i]['price'])?></del>
                                </div>                             
                            </div>
                        <?php } ?>
                    </div>
                    
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a>Home</a>
                            <a><?php echo $data['cate'][0]['name']?></a>
                            <a><?php echo $data['pd'][0]['name']?></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img style="width: 200px; height: 245px;" src="<?php echo constant("path")?>public/image/product/<?php echo $data['pd'][0]['image'] ?>" alt="">
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $data['pd'][0]['name']?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo number_format($data['pd'][0]['promotionprice'])?></ins> <del><?php echo number_format($data['pd'][0]['price'])?></del>
                                    </div>    
                                    <a href="<?php echo constant("path")?>Customer/addCart/<?php echo $data['pd'][0]['id']?>" style="margin-bottom: 40px" class="add_to_cart_button" type="button" >Add to cart</a>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>                    
                </div>
                
            </div>
            <div style="width: 80%; margin: auto;">
                    <div role="tabpanel">
                        <ul class="product-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <p><?php echo $data['pd'][0]['description']?></p>
                            </div>                 
                        </div>                
                    </div>
                    
                    <hr>
    <div class="pb-cmnt-container container">
                <?php
                    if (isset($_SESSION['user'])) {
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <textarea id="comment_body" placeholder="Write your comment here!" class="pb-cmnt-textarea"></textarea>
                                <form class="form-inline custom-cmt">
                                    <div class="btn-group">
                                        <button class="btn" type="button"><span
                                                class="fa fa-picture-o fa-lg"></span></button>
                                        <button class="btn" type="button"><span
                                                class="fa fa-video-camera fa-lg"></span></button>
                                        <button class="btn" type="button"><span
                                                class="fa fa-microphone fa-lg"></span></button>
                                        <button class="btn" type="button"><span
                                                class="fa fa-music fa-lg"></span></button>
                                    </div>
                                    <button onclick="addCmt()" class="btn btn-primary" type="button">Bình luận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                }
                else{
                ?>
                <h4>Hãy đăng nhập để bình luận</h4>
                <?php
                }
                ?>
            </div>

            <div id="list_cmt" class="info-cmt container">
               
            </div>  
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo constant("path")?>/public/user/js/custom_cmt_product.js"></script>