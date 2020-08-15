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
                        <th>ID Order</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng sản phẩm</th>
                    </tr>
                    </thead>
                    <tbbody>
                        <?php
                        if (isset($data['listOrderDetail'])){
                        for ($i = 0; $i<count($data['listOrderDetail']); $i++) {
                            ?>
                            <tr>
                                <th><?php echo $data['listOrderDetail'][$i]['orderid'] ?></th>
                                <th><?php echo $data['listOrderDetail'][$i]['name'] ?></th>
                                <th><?php echo $data['listOrderDetail'][$i]['quantity'] ?></th>
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