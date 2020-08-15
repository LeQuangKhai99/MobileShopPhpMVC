<?php
class Cart extends DB{
    public $cartContent = array();

    public function __construct()
    {
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            // id phần tử giỏ hàng
            $_SESSION['id'] = 0;
        }
    }

    public function contents(){
        $cart = $_SESSION['cart'];
        return json_encode($cart);
    }

    public function addCart($id){
        $index = -1;
        // kiểm tra sản phẩm đã có trong giỏ hàng chưa
        for($i = 0; $i < count($_SESSION['cart']); $i++){
            if ($_SESSION['cart'][$i]['id'] == $id){
                $index = $i;
            }
        }
        // nếu chưa có thì thêm 1 sản phẩm mới vào giỏ hàng gắn mặc định số lượng sản phẩm là 1
        // tăng id phần tử của giỏ hàng lên 1
        if ($index == -1){
            $_SESSION['cart'][$_SESSION['id']]['id'] = $id;
            $_SESSION['cart'][$_SESSION['id']]['total'] = 1;
            $_SESSION['id']+=1;
        }
        // nếu có rồi thì tăng số lượng lên 1
        else{
            $_SESSION['cart'][$index]['total'] += 1;
        }
    }

    public function delCart($id)
    {
        $data = $_SESSION['cart'];

        // kiểm tra xem sản phẩm muốn xóa có trong giỏ hàng ko
        for($i = 0; $i < count($data); $i++){
            // nếu có
            if($data[$i]['id'] == $id){
                $temp = array();
                // xóa sản phẩm trong giỏ hàng
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    // giảm id phần tử tiếp theo của giỏ hàng đi 1
                    if ($_SESSION['cart'][$i]['id'] == $id) {
                        $_SESSION['id'] -= 1;
                    }
                    else{
                        // lấy dữ liệu các phần tử còn lại của giỏ hàng sau khi xóa
                        $temp[] = $_SESSION['cart'][$i];
                    }
                }
                // gán cho giỏ hàng dữ liệu sản phẩm sau khi xóa
                $_SESSION['cart'] = $temp;
                
                return 1;
            }
        }
        // nếu ko có 
        return 0;
    }

}
?>