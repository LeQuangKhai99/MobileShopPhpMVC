<form method="post" enctype="multipart/form-data" action="<?php echo constant("path")?>manage/postUpdateProduct/<?php echo $data['product'][0]['id'];?>" style="width: 80%; margin: auto">
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
    $data1 = $data['product'];
    ?>
    <div class="form-group">
        <label>Name</label>
        <input  value="<?php echo $data1[0]['name'] ?>" required name="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label>Product Type</label>
        <select name="type" class="form-control">
            <?php
            for ($i = 0; $i<count($data['listCate']); $i++) {

                ?>
                <option <?php if ($data1[0]['cateid'] == $data['listCate'][$i]['id']) echo "selected"?> value="<?php echo $data['listCate'][$i]['id']?>"><?php echo $data['listCate'][$i]['name']?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Mô Tả</label>
        <textarea id="editor1" required name="des" type="text" class="form-control"><?php echo $data1[0]['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Giá Gốc</label>
        <input value="<?php echo $data1[0]['price'] ?>" min="0" required name="unit" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label>Giá Khuyến Mại</label>
        <input value="<?php echo $data1[0]['promotionprice'] ?>" min="0" required name="promotion" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <br>
        <img style="width: 100px; height: 100px" src="<?php echo constant("path")?>public/image/product/<?php echo $data1[0]['image'] ?>" alt="">
        <input name="img" type="file" class="form-control">
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
                <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="<?php echo constant("path")?>manage/delProductCmt/<?php echo $data['listComment'][$i]['id']; ?>" class="cmt-date"><i class="far fa-trash-alt"></i> Xóa</a>
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