<?php
class Cates extends DB{
    public function listCate(){
        $qr = 'select * from category';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function addcate($name, $img){
        $qr = 'insert into category values(null, "'.$name.'", "'.$img.'")';
        mysqli_query($this->conn, $qr);

    }

    public function delCate($id){
        $qr = 'delete from category where id = '.$id;
        mysqli_query($this->conn, $qr);

    }

    public function updateCate($id, $name, $img){
        $qr = 'update category set name = "'.$name.'", image = "'.$img.'" where id = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function getCate($id){
        $qr = 'select * from category where id = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getCateByName($name){
        $qr = 'select * from category where name = "'.$name.'"';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function checkIssetCate($name){
        $qr = 'select * from category where name = "'.$name.'"';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        if (count($arr) > 0) {
            return true;
        }
        return false;
    }
}
?>