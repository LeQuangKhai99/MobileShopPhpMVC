<form method="post" enctype="multipart/form-data" action="<?php echo constant("path")?>manage/postUpdatePost/<?php echo $data['p'][0]['id'];?>" style="width: 80%; margin: auto">
    <?php
    if (isset($data['err'])){
        echo '<div  id="thongbao" class="alert alert-danger" role="alert">
                                          '.$data["err"].'
                                        </div>';
    }
    if (isset($data['success'])){
        echo '<div  id="thongbao" class="alert alert-success" role="alert">
                                          '.$data["success"].'
                                        </div>';
    }
    $data1 = $data['p'];
    ?>
    <div class="form-group">
        <label>Loại bài viết</label>
        <select name="type" class="form-control">
            <?php
            for ($i = 0; $i<count($data['listPostCate']); $i++) {

                ?>
                <option <?php if ($data1[0]['postcateid'] == $data['listPostCate'][$i]['id']) echo "selected"?> value="<?php echo $data['listPostCate'][$i]['id']?>"><?php echo $data['listPostCate'][$i]['name']?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tiêu đề</label>
        <input value="<?php echo $data1[0]['title'] ?>" required name="title" class="form-control">
    </div>
    <div class="form-group">
        <label>Hình ảnh</label>
        <br>
        <img style="width: 100px; height: 100px" src="<?php echo constant("path")?>public/image/post/<?php echo $data1[0]['img'] ?>" alt="">
        <input name="img" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea id="editor1" required name="content" type="text" class="form-control"><?php echo $data1[0]['content'] ?></textarea>
    </div>
    
    <button name="update" type="submit" class="btn btn-primary">Submit</button>
    <div class="info-cmt" style="margin: 40px 0">
        <?php 
        for ($i=0; $i < count($data['listComment']); $i++) { 
        ?>
        <div class="cmt-ask" style="margin: 15px 0">
            <div class="info-user">
                <img class="avt" src="http://thuthuatphanmem.vn/uploads/2018/09/11/hinh-anh-dep-38_044131523.jpg">
                <div class="username"><?php echo $data['listComment'][$i]['name']; ?></div>
            </div>
            <div class="info-cmt-ask">
                <?php echo $data['listComment'][$i]['content']; ?>

            </div>
            <div class="interact">
                <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="<?php echo constant("path")?>manage/delPostCmt/<?php echo $data['listComment'][$i]['id']; ?>" class="cmt-date"><i class="far fa-trash-alt"></i> Xóa</a>
                <span class="cmt-date"><b class="dot">●</b> <?php echo $data['listComment'][$i]['created_at']; ?></span>
            </div>
        </div>
        <?php 
        }
        ?>
        
    </div>
</form>

<script type="text/javascript">  
     CKEDITOR.replace( 'editor1' );  
</script>