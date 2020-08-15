<form method="post" enctype="multipart/form-data" action="<?php echo constant("path")?>manage/postAddPost" style="width: 80%; margin: auto">
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
    ?>
    <div class="form-group">
        <label>Loại bài viết</label>
        <select name="type" class="form-control">
            <?php
            for ($i = 0; $i<count($data['listPostCate']); $i++) {

                ?>
                <option value="<?php echo $data['listPostCate'][$i]['id']?>"><?php echo $data['listPostCate'][$i]['name']?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tiêu đề</label>
        <input required name="title" class="form-control">
    </div>
    <div class="form-group">
        <label>Hình ảnh</label>
        <input required name="img" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea id="editor1" required name="content" type="text" class="form-control"></textarea>
    </div>
    
    <button name="add" type="submit" class="btn btn-primary">Submit</button>
</form>

<script type="text/javascript">  
     CKEDITOR.replace( 'editor1' );  
</script>