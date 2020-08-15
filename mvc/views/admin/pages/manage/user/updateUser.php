<form method="post" enctype="multipart/form-data" action="<?php echo constant("path")?>manage/postUpdateUser/<?php echo $data['user'][0]['id'] ?>" style="width: 50%; margin: auto">
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
        <label>Name</label>
        <input required name="name" type="text" value="<?php echo $data['user'][0]['name'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input required name="email" type="email" value="<?php echo $data['user'][0]['email'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Số điện thoại</label>
        <input required name="phone" type="text" value="<?php echo $data['user'][0]['phone'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Địa chỉ</label>
        <input required name="address" type="text" value="<?php echo $data['user'][0]['address'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Chức vụ</label>
        <select name="level" class="form-control">
            <?php if($data['user'][0]['level'] == 1){ ?>
                <option selected="selected" value="1">Admin</option>
                <option value="0">User</option>
            <?php }else{ ?>
                <option value="1">Admin</option>
                <option selected="selected" value="0">User</option>
            <?php } ?>    
        </select>
    </div>
    <button name="update" type="submit" class="btn btn-primary">Submit</button>
</form>