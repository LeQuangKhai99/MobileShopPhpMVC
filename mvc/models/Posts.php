<?php
class Posts extends DB{
    public function listPost(){
        $qr = 'select p.id, p.title,p.img, p.content, p.created_at, pc.name from post as p, post_category as pc where p.postcateid = pc.id';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function listPostByIdPostCate($id){
        $qr = 'select p.id, p.title,p.img, p.content, p.created_at, pc.name from post as p, post_category as pc where p.postcateid = pc.id and p.postcateid = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function listPostPaging($id, $pageIndex, $pageSize){
        $pageIndex = ($pageIndex) * $pageSize;
        $qr = 'select p.id, p.title,p.img, p.content, p.created_at, pc.name from post as p, post_category as pc where p.postcateid = pc.id and p.postcateid = '.$id.'  order by p.created_at DESC'.'
            LIMIT '.$pageIndex.', '.$pageSize;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function addPost($type_post, $title, $img, $content){
        $qr = "insert into post values(null, '".$type_post."', '".$title."', '".$img."', '".$content."', DEFAULT)";
        mysqli_query($this->conn, $qr);

    }

    public function delPost($id){
        $qr = 'delete from post where id = '.$id;
        mysqli_query($this->conn, $qr);

    }

    public function delPostByIdPostCate($id){
        $qr = 'delete from post where postcateid = '.$id;
        mysqli_query($this->conn, $qr);

    }

    public function updatePost($id, $type_post, $title, $img, $content){
        $qr = "update post set postcateid = '".$type_post."', title = '".$title."', img = '".$img."', content = '".$content."' where id = ".$id;
        mysqli_query($this->conn, $qr);
    }

    public function getPost($id){
        $qr = 'select * from post where id = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getPostByIdPostCate($id){
        $qr = 'select * from post where postcateid = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>