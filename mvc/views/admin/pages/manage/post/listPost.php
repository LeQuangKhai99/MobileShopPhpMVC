<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
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
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Loại bài viết</th>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>
                        <th>Ngày viết</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbbody>
                        <?php
                        if (isset($data['listPost'])){
                        for ($i = 0; $i<count($data['listPost']); $i++) {
                            ?>
                            <tr>
                                <th><?php echo $data['listPost'][$i]['id'] ?></th>
                                <th><?php echo $data['listPost'][$i]['name'] ?></th>
                                <th style="width: 300px"><?php echo $data['listPost'][$i]['title'] ?></th>
                                <th><img style="width: 100px; height: 100px;" src="<?php echo constant("path")?>public/image/post/<?php echo  $data['listPost'][$i]['img']?>"></th>
                                <th style="width: 100px"><?php echo $data['listPost'][$i]['created_at'] ?></th>
                                <th style="text-align: center">
                                    <a href="<?php echo constant("path")?>manage/getUpdatePost/<?php echo $data['listPost'][$i]['id']?>" type="button" class="btn btn-success">Cập Nhật</a>
                                    <a href="<?php echo constant("path")?>manage/delPost/<?php echo $data['listPost'][$i]['id']?>" style="margin-left: 10px" onclick="return confirm('Bạn có chắc muốn xóa?')" type="button"
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