<?php
class Feedbacks extends DB{
    public function listFeedback(){
        $qr = 'select * from feedback';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function delFeedback($id){
        $qr = 'delete from Feedback where id = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function addFeedback($name, $phone, $mail, $address, $content){
        $qr = 'insert into Feedback values(null, "'.$name.'", "'.$phone.'", "'.$mail.'", "'.$address.'", "'.$content.'")';
        mysqli_query($this->conn, $qr);
    }
}
?>