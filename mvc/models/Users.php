<?php
class Users extends DB{
    public function listUser(){
        $qr = 'SELECT * FROM Users';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function addUser($name, $email, $pass,$phone, $address, $level){
        $pass = md5($pass);
        $qr = 'insert into Users values(null, "'.$name.'", "'.$email.'", "'.$pass.'", "'.$phone.'", "'.$address.'", "'.$level.'")';
        mysqli_query($this->conn, $qr);
    }

    public function delUser($id){
        $qr = 'delete from Users where id = '.$id;
        mysqli_query($this->conn, $qr);

    }

    public function updateUser($id,$name, $email, $phone, $address, $level){
        $qr = 'update Users set name = "'.$name.'", email = "'.$email.'", phone = "'.$phone.'", address = "'.$address.'", level = "'.$level.'" where id = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function Change($id,$pass){
        $pass = md5($pass);
        $qr = 'update Users set pass = "'.$pass.'" where id = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function getUser($id){
        if($id == ''){
            $id = 1;
        }
        $qr = 'select * from Users where id = '.$id;

        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

}
?>