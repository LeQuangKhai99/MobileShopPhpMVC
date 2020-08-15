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
                        <th>Link</th>
                        <th>Ảnh</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbbody>
                        <?php
                        if (isset($data['listSlide'])){
                        for ($i = 0; $i<count($data['listSlide']); $i++) {
                            ?>
                            <tr>
                                <th><?php echo $data['listSlide'][$i]['id'] ?></th>
                                <th><?php echo $data['listSlide'][$i]['link'] ?></th>
                                <th style="text-align: center;"><img style="width: 300px; height: 100px;" src="<?php echo constant("path")?>public/image/slide/<?php echo $data['listSlide'][$i]['image'];?>"></th>
                                <th style="text-align: center">
                                    <a href="<?php echo constant("path")?>manage/getUpdateSlide/<?php echo $data['listSlide'][$i]['id']?>" type="button" class="btn btn-success">Cập Nhật</a>
                                    <a href="<?php echo constant("path")?>manage/delSlide/<?php echo $data['listSlide'][$i]['id']?>" style="margin-left: 10px" onclick="return confirm('Bạn có chắc muốn xóa?')" type="button"
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