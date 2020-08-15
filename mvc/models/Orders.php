<?php
class Orders extends DB{
    public function listOrder(){
        $qr = 'SELECT * from orders';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function delOrder($id){
        $qr = 'Delete from orders where id = '.$id;
        $rows = mysqli_query($this->conn, $qr);
    }

    public function delOrderByIdUser($id){
        $qr = 'Delete from orders where iduser = '.$id;
        $rows = mysqli_query($this->conn, $qr);
    }

    public function addOrder($iduser, $name, $phone, $address, $totalprice, $note){
        $now = date("Y-m-d h:i:sa");
        $qr = 'insert into orders values(null, "'.$iduser.'", "'.$name.'", "'.$phone.'", "'.$address.'", "'.$now.'", "'.$totalprice.'", "'.$note.'", false)';
        mysqli_query($this->conn, $qr);
    }

    public function updateOrder($id, $status){
        $qr = 'update orders set status = '.$status.' where id = '.$id;
        mysqli_query($this->conn, $qr);
    }


}
?>