<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php
            if (isset($data['err'])){
                echo '<div  id="thongbao" id="thongbao" class="alert alert-danger" role="alert">
                                          '.$data["err"].'
                                        </div>';
            }
            if (isset($data['success'])){
                echo '<div  id="thongbao" id="thongbao" class="alert alert-success" role="alert">
                                          '.$data["success"].'
                                        </div>';
            }
            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Loại sản phẩm</th>
                        <th>Giá Gốc</th>
                        <th>Khuyến Mãi</th>
                        <th>Hình ảnh</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbbody>
                        <?php
                        if (isset($data['listProduct'])){
                            $data = $data['listProduct'];
                            for ($i = 0; $i<count($data); $i++) {
                                ?>
                                <tr>
                                    <th><?php echo $data[$i]['id'] ?></th>
                                    <th><?php echo $data[$i]['name'] ?></th>
                                    <th><?php echo $data[$i]['type'] ?></th>
                                    <th><?php echo number_format($data[$i]['price']) ?></th>
                                    <th><?php echo number_format($data[$i]['promotionprice']) ?></th>
                                    <th><img style="width: 100px; height: 100px;" src="<?php echo constant("path")?>public/image/product/<?php echo $data[$i]['image'];?>"></th>
                                    <th style="display: flex;text-align: center">
                                        <a href="<?php echo constant("path")?>manage/getUpdateProduct/<?php echo $data[$i]['id']?>" type="button" class="btn btn-success">Cập Nhật</a>
                                        <a href="<?php echo constant("path")?>manage/delProduct/<?php echo $data[$i]['id']?>" style="margin-left: 10px" onclick="return confirm('Bạn có chắc muốn xóa?')" type="button"
                                           class="btn btn-danger">Xóa
                                        </a>
                                    </th>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbbody>
                </table>
            </div>
        </div>
    </div>

</div>