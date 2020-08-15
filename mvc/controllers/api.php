<?php
class api extends Controller{
    public $cate;
    public $slide;
    public $product;
    public $feedback;
    public $user;
    public $order;
    public $orderdetail;
    public $postCate;
    public $post;
    public $post_comment;
    public $product_comment;

    public function __construct(){
        
        $this->cate = $this->model('Cates');
        $this->slide = $this->model('Slide');
        $this->product = $this->model('Products');
        $this->feedback = $this->model('Feedbacks');
        $this->user = $this->model('Users');
        $this->order = $this->model('Orders');
        $this->orderdetail = $this->model('OrderDetails');
        $this->postCate = $this->model('PostCates');
        $this->post = $this->model('Posts');
        $this->post_comment = $this->model('PostComment');
        $this->product_comment = $this->model('ProductComment');
    }

    public function listCate(){
        $listCate = $this->cate->listCate();
        echo $listCate;
    }

    public function listProduct(){
        $listProduct = $this->product->listProduct();
        echo $listProduct;
    }

    public function addProduct(){
        $this->product->addProduct($_POST['name'], $_POST['type'], $_POST['des'] ,$_POST['unit'], $_POST['promotion'],$_POST['img']);
    }

    public function delProduct(){
        $this->product->delProduct($_POST['id']);
    }

    public function updateProduct(){
        $this->product->updateProduct($_POST['id'], $_POST['name'], $_POST['type'], $_POST['des'] ,$_POST['unit'], $_POST['promotion'],$_POST['img']);
    }
    

}
?>