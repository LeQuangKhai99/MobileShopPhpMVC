<form method="post" enctype="multipart/form-data" action="<?php echo constant("path")?>manage/postAddPostCate" style="width: 50%; margin: auto">
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
        <label>Name</label>
        <input required name="name" type="text" class="form-control">
    </div>
    <button name="add" type="submit" class="btn btn-primary">Submit</button>
</form>