 <?php
class ProductComment extends DB{
    public function listComment($id){
        $qr = 'select pc.id, pc.content, pc.created_at, u.name, u.id as id_user from product_comment as pc, users as u where u.id = pc.id_user and pc.id_product = '.$id.' order by pc.created_at DESC';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function addProductComment($id_user, $id_product, $content){
        $qr = 'insert into product_comment values(null, "'.$id_user.'", "'.$id_product.'", "'.$content.'", DEFAULT)';
        mysqli_query($this->conn, $qr);

    }

    public function delProductCommentByIdProduct($id){
        $qr = 'delete from product_comment where id_product = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function delProductCommentByIdUser($id){
        $qr = 'delete from product_comment where id_user = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function delProductComment($id){
        $qr = 'delete from product_comment where id = '.$id;
        mysqli_query($this->conn, $qr);
    }
}
?>