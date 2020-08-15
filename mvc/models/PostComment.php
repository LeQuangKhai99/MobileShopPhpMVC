 <?php
class PostComment extends DB{
    public function listComment($id){
        $qr = 'select pc.id, pc.content, pc.created_at, u.name from post_comment as pc, users as u where u.id = pc.id_user and pc.id_post = '.$id.' order by pc.created_at DESC';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function addPostComment($id_user, $id_post, $content){
        $qr = 'insert into post_comment values(null, "'.$id_user.'", "'.$id_post.'", "'.$content.'", DEFAULT)';
        mysqli_query($this->conn, $qr);

    }

    public function delPostCommentByIdPost($id){
        $qr = 'delete from post_comment where id_post = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function delPostCommentByIdUser($id){
        $qr = 'delete from post_comment where id_user = '.$id;
        mysqli_query($this->conn, $qr);
    }

    public function delPostComment($id){
        $qr = 'delete from post_comment where id = '.$id;
        mysqli_query($this->conn, $qr);
    }

}
?>