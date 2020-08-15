<?php
class Slide extends DB{
    public function listSlide(){
        $qr = 'select * from slide';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function addSlide($img, $link){
        $qr = 'insert into slide values(null, "'.$img.'", "'.$link.'")';
        mysqli_query($this->conn, $qr);

    }

    public function delSlide($id){
        $qr = 'delete from slide where id = '.$id;
        mysqli_query($this->conn, $qr);

    }

    public function updateSlide($id, $img, $link){
        $qr = 'update slide set image = "'.$img.'", link= "'.$link.'" where id = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function getSlide($id){
        $qr = 'select * from slide where id = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

}
?>