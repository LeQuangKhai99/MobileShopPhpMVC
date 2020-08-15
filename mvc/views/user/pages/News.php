
    <div class="wrapper">
        <div class="container">
            <div class="block-heading">
                <h3 class="block-title">Tin tức mới nhất</h3>
            </div>
            <?php
            for ($i=0; $i < count($data['listPost']); $i++) { 
            ?>
            <div class="content-wrap" style="margin: 30px 0">
                <div class="post-wrap">
                    <div class="post-img">
                        <a href="detail.html">
                            <img class="img-block" src="<?php echo constant('path'); ?>Public/image/post/<?php echo $data['listPost'][$i]['img']; ?>">
                        </a>
                    </div>
                    <div class="post-txt-wrap">
                        <div class="post-txt-content">
                            <h2 class="post-txt-title">
                                <a href="<?php echo constant("path")?>Customer/NewsDetail/<?php echo $data['listPost'][$i]['id']?>"><?php echo $data['listPost'][$i]['title']; ?></a></h2>
                            <div class="post-meta" style="margin: 25px 0">
                                <div class="author"><span class="by">Viết bởi</span> <a>Admin</a></div>
                                <div class="date"><i class="fa fa-clock-o"></i><?php echo $data['listPost'][$i]['created_at']; ?></div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
    <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <?php 
                                $page = $data['pageIndex'];
                                $totalPage = $data['total'];
                                $next = $page + 1;
                                $pre = $page - 1;
                                $news = $data['id'];

                                $urlNext = constant("path").'Cutomer/News/'.$news.'/'.$next;
                                $urlPre = constant("path").'Cutomer/News/'.$news.'/'.$pre;

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