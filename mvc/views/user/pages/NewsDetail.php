<?php
    $post = $data['post'][0];
?>
<div class="wrapper">
        <div class="container">
            <div class="detail-header">
                <h1 style="margin: 20px 0" class="post-title"><?php echo $post['title']; ?></h1>
                <div class="post-meta">
                    <div class="author">
                        <span class="meta-text">Viết bởi</span>
                        <a>Admin</a>
                    </div>
                    <div class="date">
                        <i class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;
                        <a><?php echo $post['created_at']?></a>
                    </div>
                </div>
            </div>
            <div style="margin: 40px 0">
                <img style="display: block; margin: auto;" src="<?php echo constant('path'); ?>Public/image/post/<?php echo $post['img']?>">
            </div>
            <div class="detail-content-wrap">
                <div style="width: 70%; margin: auto;">
                    <?php echo $post['content']?>
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

            <div class="info-cmt" id="list_cmt">

            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo constant("path")?>/public/user/js/custom_cmt_post.js"></script>