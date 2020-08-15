<form method="post" enctype="multipart/form-data" action="<?php echo constant("path")?>manage/postAddProduct" style="width: 80%; margin: auto">
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
        <label>Product Type</label>
        <select name="type" class="form-control">
            <?php
            for ($i = 0; $i<count($data['listCate']); $i++) {
                ?>
                <option value="<?php echo $data['listCate'][$i]['id']?>"><?php echo $data['listCate'][$i]['name']?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Mô Tả</label>
        <textarea id="editor1" required name="des" type="text" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Giá Gốc</label>
        <input min="0" required name="unit" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label>Giá Khuyến Mại</label>
        <input min="0" required name="promotion" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input required name="img" type="file" class="form-control">
    </div>
    <button name="add" type="submit" class="btn btn-primary">Submit</button>
</form>
<script type="text/javascript">  
     CKEDITOR.replace( 'editor1');
</script>