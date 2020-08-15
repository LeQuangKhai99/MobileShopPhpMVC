    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 80%; margin: 50px 10%;">
        <form method="post" action="<?php echo constant('path'); ?>Customer/updateCart">
            <table cellspacing="0" class="shop_table cart">
                <thead>
                    <tr>
                        <th class="product-thumbnail">Hình ảnh</th>
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-price">Giá sản phẩm</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Tổng tiền</th>
                        <th class="product-remove">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i<count($data['listCart']); $i++)
                    {
                        ?>
                        <tr class="cart_item">
                            <td class="product-thumbnail">
                                <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo constant('path'); ?>Public/image/product/<?php echo $data['listCart'][$i]['image']; ?>">
                            </td>

                            <td class="product-name">
                                <a href="single-product.html"><?php echo $data['listCart'][$i]['name']; ?></a>
                            </td>

                            <td class="product-price">
                                <?php echo number_format($data['listCart'][$i]['promotionprice']); ?>
                            </td>

                            <td class="product-quantity">
                                <div class="quantity buttons_added">
                                    <input type="number" class="input-text qty text" value="<?php echo $data['cart'][$i]['total']; ?>" name="quantity-<?php echo $i; ?>" min="0" max="10" step="1">
                                </div>
                            </td>
                            <?php 
                                $totalprice = $data['cart'][$i]['total'] * $data['listCart'][$i]['promotionprice'];
                             ?>
                            <td class="product-subtotal">
                                <span class="amount"><?php echo number_format($totalprice); ?></span>
                            </td>
                            <td class="product-remove">
                                <a onclick="return confirm('Bạn có chắc muốn xóa?')" title="Remove this item" class="remove" href="<?php echo constant('path'); ?>Customer/delCart/<?php echo $data['listCart'][$i]['id']; ?>">×</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <input type="submit" value="Update Cart" name="update" class="btn btn-danger">
            <a style="float: right;" href="<?php echo constant('path'); ?>Customer/checkOut/" name="proceed" class="btn btn-success">Check Out</a>
        </form>
            
    </div>

