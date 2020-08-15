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
                        <th>ID khách hàng</th>
                        <th>Ship name</th>
                        <th>Ship phone</th>
                        <th>Ship address</th>
                        <th>Tổng tiền</th>
                        <th>Ngày mua</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbbody>
                        <?php
                        if (isset($data['listOrder'])){
                        for ($i = 0; $i<count($data['listOrder']); $i++) {
                            ?>
                            <tr>
                                <th><?php echo $data['listOrder'][$i]['id'] ?></th>
                                <th><?php echo $data['listOrder'][$i]['iduser'] ?></th>
                                <th><?php echo $data['listOrder'][$i]['shipname'] ?></th>
                                <th><?php echo $data['listOrder'][$i]['shipphone'] ?></th>
                                <th><?php echo $data['listOrder'][$i]['shipaddress'] ?></th>
                                <th><?php echo number_format($data['listOrder'][$i]['totalprice']) ?></th>
                                <th><?php echo $data['listOrder'][$i]['createdat'] ?></th>
                                <th onclick="updateOrder(<?php echo $data['listOrder'][$i]['id']; ?>, <?php echo $data['listOrder'][$i]['status']; ?>)" style="width: 130px; text-align: center;">
                                    <?php if($data['listOrder'][$i]['status'] == 1){ ?>
                                        <button type="button" class="btn btn-success">Đã giao</button>
                                    <?php }else{ ?>
                                        <button type="button" class="btn btn-danger">Chưa giao</button>
                                    <?php } ?>
                                </th>
                                <th style="text-align: center">
                                    <a href="<?php echo constant("path")?>manage/delOrder/<?php echo $data['listOrder'][$i]['id']?>" style="margin-left: 10px" onclick="return confirm('Bạn có chắc muốn xóa?')" type="button"
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
<script type="text/javascript" src="<?php echo constant("path")?>/public/admin/js/custom.js"></script>