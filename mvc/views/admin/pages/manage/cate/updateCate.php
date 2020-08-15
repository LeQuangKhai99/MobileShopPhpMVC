<form method="post" enctype="multipart/form-data" action="<?php echo constant("path")?>manage/postUpdateCate/<?php echo $data['cate'][0]['id']?>" style="width: 50%; margin: auto">
    <?php
    if (isset($data['err'])){
        echo '<div id="thongbao" class="alert alert-danger" role="alert">
                                          '.$data["err"].'
                                        </div>';
    }
    if (isset($data['success'])){
        echo '<div id="thongbao" class="alert alert-success" role="alert">
                                          '.$data["success"].'
                                        </div>';
    }
    ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input value="<?php echo $data['cate'][0]['name']?>" required name="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Image</label>
        <br>
        <img style="width: 100px; height: 100px; margin: 10px 0" src="<?php echo constant("path")?>public/image/cate/<?php echo $data['cate'][0]['image'] ?>" alt="">
        <input name="img" type="file" class="form-control">
    </div>
    <button name="update" type="submit" class="btn btn-primary">Submit</button>
</form>