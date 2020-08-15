<form method="post" enctype="multipart/form-data" action="<?php echo constant("path")?>manage/postAddUser" style="width: 50%; margin: auto">
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
    <div class="form-group">
        <label>Email</label>
        <input required name="email" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <input min="0" required name="pass" type="password" class="form-control">
    </div>
    <div class="form-group">
        <label>Số điện thoại</label>
        <input min="0" required name="phone" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label>Địa chỉ</label>
        <input required name="address" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label>Chức vụ</label>
        <select name="level" class="form-control">
            <option value="1">Admin</option>
            <option value="0">User</option>
        </select>
    </div>
    <button name="add" type="submit" class="btn btn-primary">Submit</button>
</form>