<?php
class Customer extends Controller{
    public $cate;
    public $slide;
    public $product;
    public $contact;
    public $cart;
    public $order;
    public $orderdetail;
    public $postCate;
    public $product_comment;
    public $post;
    public $post_comment;

    public $listCate;
    public $listSlide;
    public $listProduct;
    public $bestSeller;
    public $random;
    public $cheap;
    public $listPostCate;

    public $totalProduct = 0;
    public $totalPrice = 0;

    public function __construct(){
        $this->cate = $this->model('Cates');
        $this->slide = $this->model('Slide');
        $this->product = $this->model('Products');
        $this->contact = $this->model('Feedbacks');
        $this->cart = $this->model('Cart');
        $this->order = $this->model('Orders');
        $this->orderdetail = $this->model('OrderDetails');
        $this->postCate = $this->model('PostCates');
        $this->product_comment = $this->model('ProductComment');
        $this->post = $this->model('Posts');
        $this->post_comment = $this->model('PostComment');


        $this->listCate = $this->cate->listCate();
        $this->listCate = json_decode($this->listCate, true);

        $this->listSlide = $this->slide->listSlide();
        $this->listSlide = json_decode($this->listSlide, true);

        $this->listProduct = $this->product->getNewProduct();
        $this->listProduct = json_decode($this->listProduct, true);

        $this->bestSeller = $this->product->getBestSeller();
        $this->bestSeller = json_decode($this->bestSeller, true);

        $this->random = $this->product->getRandom();
        $this->random = json_decode($this->random, true);

        $this->cheap = $this->product->getCheapProduct();
        $this->cheap = json_decode($this->cheap, true);

        $this->listPostCate = $this->postCate->listPostCate();
        $this->listPostCate = json_decode($this->listPostCate, true);

        $cart = $this->cart->contents();
        $cart = json_decode($cart, true);

        for ($i = 0; $i< count($cart); $i++){
            $this->totalProduct += $cart[$i]['total'];
            $x = $this->product-> getProduct($cart[$i]['id']);
            $x = json_decode($x, true);
            if (isset($x[0]) > 0){
                $this->totalPrice += $x[0]['promotionprice'] * $cart[$i]['total'];
            }
        }

    }
    public function index(){
        $this->views('user/Customer_layout', [
            'page'=>'index',
            'listCate'=>$this->listCate,
            'listSlide'=>$this->listSlide,
            'listProduct'=>$this->listProduct,
            'bestSeller'=>$this->bestSeller,
            'random'=>$this->random,
            'cheap'=>$this->cheap,
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate
        ]);
    }


    public function Contact(){
        
        $this->views('user/Customer_layout', [
            'page'=>'contact',
            'listCate'=>$this->listCate,
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate
        ]);
    }

    public function postContact(){
        $this->contact->addFeedback($_POST['Name'],$_POST['Phone'],$_POST['Email'],$_POST['Address'],$_POST['Content']);
        $this->views('user/Customer_layout', [
            'page'=>'contact',
            'listCate'=>$this->listCate,
            'success'=>'Cảm ơn quý khách đã góp ý!',
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate
        ]);
    }

    public function Detail($id){
        $pd = $this->product->getProduct($id);
        $pd = json_decode($pd, true);

        if ($pd == null) {
            header('Location: '.constant("path"));
        }
        $cate = $this->cate->getCate($pd[0]['cateid']);
        $cate = json_decode($cate, true);

        $relate = $this->product->get3ProductRelateByCateId($pd[0]['cateid'], $pd[0]['id']);
        $relate = json_decode($relate, true);

        $list_product_comment = $this->product_comment->listComment($id);
        $list_product_comment = json_decode($list_product_comment, true);
        $this->views('user/Customer_layout', [
            'page'=>'Detail',
            'listCate'=>$this->listCate,
            'pd'=>$pd,
            'cate'=>$cate,
            'relate'=>$relate,
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate,
            'listProductComment'=>$list_product_comment
        ]);
    }

    public function Cate($id = 1, $pageIndex = 0){
        $pageSize = 4;
        $listpd = $this->product->getProductByCate($id, $pageIndex, $pageSize);
        $listpd = json_decode($listpd, true);

        $total = $this->product->getTotalProductByCate($id);
        $total = json_decode($total, true);

        $cate = $this->cate->getCate($id);
        $cate = json_decode($cate, true);
        if ($total[0]['sl'] == 0 || count($listpd) <= 0) {
            header('Location: '.constant("path"));
        }
        $this->views('user/Customer_layout', [
            'page'=>'cate',
            'listCate'=>$this->listCate,
            'listpd'=>$listpd,
            'pageIndex'=>$pageIndex,
            'pageSize'=>$pageSize,
            'total'=>$total,
            'cate'=>$cate,
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate
        ]);
    }


    public function Search($key = '', $pageIndex = 0){
        $pageSize = 4;
        if (isset($_POST['key'])){
            header('Location: '.constant("path").'Customer/Search/'.$_POST['key']);
        }
        $listpd = $this->product->search($key, $pageIndex, $pageSize);
        $listpd = json_decode($listpd, true);

        $total = $this->product->countSearch($key, $pageIndex);
        $total = json_decode($total, true);
        $this->views('user/Customer_layout', [
            'page'=>'search',
            'listCate'=>$this->listCate,
            'listpd'=>$listpd,
            'pageIndex'=>$pageIndex,
            'total'=>$total,
            'key'=>$key,
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate,
            'pageSize'=>$pageSize
        ]);
    }

    public function Cart(){
        if (!isset($_SESSION['user'])) {
            header('Location: '.constant("path").'Login');
        }
        $cart = $this->cart->contents();
        $cart = json_decode($cart, true);
        $num = 0;
        $item = array();

        for ($i = 0; $i< count($cart); $i++){
            $num += $cart[$i]['total'];
            $x = $this->product-> getProduct($cart[$i]['id']);

            if (isset(json_decode($x, true)[0]) > 0){
                $item[] = json_decode($x, true)[0];
            }
        }

        $this->views('user/Customer_layout', [
            'page'=>'Cart',
            'listCate'=>$this->listCate,
            'listCart'=>$item,
            'num'=>$num,
            'cart'=>$cart,
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate
        ]);
    }

    public function addCart($id){
        if (!isset($_SESSION['user'])){
            header('Location: '.constant("path").'Login');
        }
        else{
            if(count(json_decode($this->product->checkIsset($id))) > 0){
                $cart = $this->cart->addCart($id);
                echo "<script>alert('Thêm 1 sản phẩm vào giỏ hàng')</script>";
                echo "<script>window.history.back()</script>";
            }
            else{
                echo "<script>alert('Sản phẩm không tồn tại')</script>";
                echo "<script>window.history.back()</script>";
            }
            
        }
    }

    

    public function delCart($id){
        if (!isset($_SESSION['user'])) {
            header('Location: '.constant("path"));
        }
        $cart = $this->cart->delCart($id);
        if($cart == 1){
            echo "<script>alert('Xóa 1 sản phẩm khỏi giỏ hàng')</script>";
            echo "<script>window.history.back()</script>";
        }
        else{
            echo "<script>alert('Sản phẩm không tồn tại giỏ hàng')</script>";
            echo "<script>window.history.back()</script>";
        }
    }


    public function updateCart(){
        if (!isset($_SESSION['user'])) {
            header('Location: '.constant("path"));
        }
        if (isset($_POST['update'])){
            // count($_POST) là đếm số lượng các input có name
            for ($i = 0; $i< count($_POST)-1; $i++){
                $index = 'quantity-'.$i;
                if ($_POST[$index] <= 0){
                    $this->delCart($_SESSION['cart'][$i]['id']);
                }
                else{
                    $_SESSION['cart'][$i]['total'] = $_POST[$index];
                }
            }
        }
        echo "<script>alert('Cập nhật giỏ hàng thành công!')</script>";
        echo "<script>window.history.back()</script>";
    }

    public function checkOut(){

        if (!isset($_SESSION['user'])) {
            header('Location: '.constant("path"));
        }
        else{
            if (count($_SESSION['cart']) <= 0) {
                echo "<script>alert('Chưa có sản phẩm nào trong giỏ hàng!')</script>";
                echo "<script>window.history.back()</script>";
            }
            else{
                $cart = $this->cart->contents();
                $cart = json_decode($cart, true);
                $num = 0;
                $item = array();

                for ($i = 0; $i< count($cart); $i++){
                    $num += $cart[$i]['total'];
                    $x = $this->product->getProduct($cart[$i]['id']);

                    if (isset(json_decode($x, true)[0]) > 0){
                        $item[] = json_decode($x, true)[0];
                    }
                }
                $this->views('user/Customer_layout', [
                    'page'=>'checkout',
                    'listCate'=>$this->listCate,
                    'totalProduct'=>$this->totalProduct,
                    'totalPrice'=>$this->totalPrice,
                    'listPostCate'=>$this->listPostCate
                ]);
            }
        }

    }
    public function postCheckOut(){
        if (isset($_POST['checkout'])) {
            $cart = $this->cart->contents();
            $cart = json_decode($cart, true);

            $this->order->addOrder($_SESSION['user']['id'], $_POST['name'], $_POST['phone'], $_POST['address'], $this->totalPrice, $_POST['note']);

            $listOrder = $this->order->listOrder();
            $listOrder = json_decode($listOrder, true);

            $index = $listOrder[count($listOrder)-1]['id'];

            for ($i = 0; $i< count($cart); $i++){
                $x = $this->product-> getProduct($cart[$i]['id']);

                $pd = json_decode($x, true);
                $pd = $pd[0];
                $this->orderdetail->addOrderDetail($index, $pd['id'], $cart[$i]['total']);
            }

            unset($_SESSION['cart']);
            unset($_SESSION['id']);

            $_SESSION['bought'] = true;
            header('Location: '.constant("path"));
        }
        
    }

    public function News($id, $pageIndex = 0){
        $pageSize = 4;
        $pageIndex= (int)$pageIndex;
        if ($pageIndex < 0) {
            $pageIndex = 0;
        }
        $listPost = $this->post->listPostPaging($id, $pageIndex, $pageSize);
        $listPost = json_decode($listPost, true);

        $list = $this->post->listPostByIdPostCate($id);
        $list = json_decode($list, true);

        $total = ceil(count($list)/$pageSize);
        if (count($listPost) <= 0) {
            header('Location: '.constant("path"));
        }
        $this->views('user/Customer_layout', [
            'page'=>'News',
            'listCate'=>$this->listCate,
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate,
            'listPost'=>$listPost,
            'total'=>$total,
            'pageIndex'=>$pageIndex,
            'id'=>$id
        ]);
    }

    public function NewsDetail($id){
        $post = $this->post->getPost($id);
        $post = json_decode($post, true);
        if ($post == null) {
            header('Location: '.constant("path"));
        }
        $this->views('user/Customer_layout', [
            'page'=>'NewsDetail',
            'listCate'=>$this->listCate,
            'totalProduct'=>$this->totalProduct,
            'totalPrice'=>$this->totalPrice,
            'listPostCate'=>$this->listPostCate,
            'post'=>$post
        ]);
    }

    public function listCommentProduct($id){
        $list_product_comment = $this->product_comment->listComment($id);
        print_r($list_product_comment);
    }

    public function addCmtProduct($id){
        if (isset($_SESSION['user'])) {
            $this->product_comment->addProductComment($_SESSION['user']['id'], $id, $_POST['data']);
        }

    }

    public function listCommentPost($id){
        $list_post_comment = $this->post_comment->listComment($id);
        print_r($list_post_comment);
    }

    public function addCmtPost($id){
        if (isset($_SESSION['user'])) {
            $this->post_comment->addPostComment($_SESSION['user']['id'], $id, $_POST['data']);
        }
    }
}
?>