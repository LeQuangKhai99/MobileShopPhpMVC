<?php
class PostCates extends DB{
    public function listPostCate(){
        $qr = 'select * from post_category';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function addPostCate($name){
        $qr = 'insert into post_category values(null, "'.$name.'")';
        mysqli_query($this->conn, $qr);

    }

    public function delPostCate($id){
        $qr = 'delete from post_category where id = '.$id;
        mysqli_query($this->conn, $qr);

    }

    public function updatePostCate($id, $name){
        $qr = 'update post_category set name = "'.$name.'" where id = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function getPostCate($id){
        $qr = 'select * from post_category where id = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>