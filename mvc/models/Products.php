<?php
class Products extends DB{
    public function listProduct(){
        $qr = 'SELECT product.id, product.name, category.name as type, product.price, product.promotionprice, product.image, product.description FROM product, category WHERE product.cateid = category.id order by product.id DESC';

        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function addProduct($name, $type, $des,$price, $promotion, $img){
        $qr = "insert into product values(null, '".$name."', '".$img."', '".$type."', '".$price."', '".$promotion."', '".$des."')";
        mysqli_query($this->conn, $qr);

    }

    public function delProduct($id){
        $qr = 'delete from product where id = '.$id;
        mysqli_query($this->conn, $qr);

    }

    public function delProductByIdCate($id){
        $qr = 'delete from product where cateid = '.$id;
        mysqli_query($this->conn, $qr);

    }

    public function updateProduct($id, $name, $type, $des,$unit, $promotion, $img){
        $qr = "update product set name = '".$name."', image = '".$img."', cateid = '".$type."', price = '".$unit."', promotionprice = '".$promotion."', description = '".$des."' where id = ".$id;
        mysqli_query($this->conn, $qr);
    }

    public function getProduct($id){
        $qr = 'select * from product where id = '.$id;

        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getCheapProduct(){
        $qr = 'SELECT * FROM product order by promotionprice  limit 3';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function get3ProductRelateByCateId($id, $idpd){
        if($id == ''){
            $id = 1;
        }
        $qr = 'SELECT * FROM product WHERE product.cateid = '.$id.' and product.id <> '.$idpd.'  LIMIT 3';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getNewProduct(){
        $qr = 'SELECT * FROM product order by id desc limit 8';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getBestSeller(){
        $qr = 'SELECT product.name,product.id, product.cateid, product.description, product.price, product.promotionprice, product.image, product.price - product.promotionprice as sale FROM product WHERE product.promotionprice > 0 ORDER BY sale DESC limit 3';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getSeller($pageIndex = 0){
        $pageIndex = (int)$pageIndex;
        if ($pageIndex <= 0) $pageIndex = 0;
        $pageIndex = ($pageIndex) * 8;
        $qr = "SELECT * FROM product  where  product.promotion_price > 0
            ORDER BY id DESC
            LIMIT ".$pageIndex.", 8";
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getProductByCate($id = 1, $pageIndex = 0, $pageSize){
        $pageIndex = (int)$pageIndex;
        $id = (int)$id;
        if ($id <= 0) $id = 1;
        if ($pageIndex < 0) $pageIndex = 0;
        $pageIndex = ($pageIndex) * $pageSize;
        $qr = 'SELECT * FROM product   where  product.cateid = '.$id.'
            ORDER BY id DESC
            LIMIT '.$pageIndex.', '.$pageSize;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getListProductByIdCate($id){
        $qr = 'SELECT * FROM product   where  product.cateid = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function checkIsset($id){
        $qr = 'SELECT * FROM product WHERE product.id = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function checkIssetName($name){
        $qr = 'SELECT * FROM product WHERE product.name = "'.$name.'"';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function checkIsChangeName($id, $name){
        $qr = 'SELECT * FROM product WHERE product.name = "'.$name.'" and product.id = "'.$id.'"';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getTotalProductByCate($id = 1){
        $id = (int)$id;
        if ($id <= 0) $id = 1;
        $qr = 'SELECT count(*) as sl FROM product   where  product.cateid = '.$id;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);

    }

    public function getRandom(){
        $qr = 'SELECT * FROM product ORDER BY RAND() LIMIT 3';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function search($key, $pageIndex = 0, $pageSize){
        if ($pageIndex <= 0) $pageIndex = 0;
        $pageIndex = ($pageIndex) * $pageSize;
        $qr = 'SELECT * FROM product where product.name like "%'.$key.'%"
            ORDER BY id DESC
            LIMIT '.$pageIndex.', '.$pageSize;
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);

    }

    public function countSearch($key, $pageIndex = 0){
        if ($pageIndex <= 0) $pageIndex = 0;
        $pageIndex = ($pageIndex) *1;
        $qr = 'SELECT count(*) as sl FROM product where product.name like "%'.$key.'%"';
        $rows = mysqli_query($this->conn, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);

    }

}
?>