<?php
class OrderDetails extends DB{
    public function listOrderDetail(){
        $qr = 'SELECT  odt.orderid, odt.quantity, pd.name FROM orderdetail as odt, product as pd where odt.productid = pd.id';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function delOrderDetailByIdOrder($id){
        $qr = 'Delete from orderdetail where orderid = '.$id;
        $rows = mysqli_query($this->conn, $qr);
    }

    public function delOrderDetailByIdProduct($id){
        $qr = 'Delete from orderdetail where productid = '.$id;
        $rows = mysqli_query($this->conn, $qr);
    }

    public function delOrderDetailByIdUser($id){
        $qr = 'DELETE from orderdetail WHERE orderdetail.orderid IN( SELECT orders.id FROM orders WHERE orders.iduser = "'.$id.'" )';
        mysqli_query($this->conn, $qr);
    }

    public function addOrderDetail($orderid, $productid, $quantity){
        $qr = 'insert into orderdetail values("'.$orderid.'", "'.$productid.'", "'.$quantity.'")';
        mysqli_query($this->conn, $qr);
    }
}
?>