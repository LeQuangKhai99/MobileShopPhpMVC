<?php
class manage extends Controller{
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
        if (!isset($_SESSION['user'])){
            header('Location: '.constant("path").'Login');
        }
        if ($_SESSION['user']['level'] != 1){
            header('Location: '.constant("path").'Login');
        }
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
    public function index(){
        $listCate = $this->cate->listCate();
        $listCate = json_decode($listCate, true);
        $this->views('admin/Manage_layout', [
            'page'=>'index',
            'packet'=>'cate',
            'listCate'=>$listCate
        ]);
    }

    public function getAddCate(){
        $this->views('admin/Manage_layout', [
            'page'=>'addCate',
            'packet'=>'cate',
        ]);
    }

    static function createFileName(){
        // nối các mảng
        $arrChar = array_merge(range("A", "Z"), range("a", "z"), range(0, 9));
        // nối mảng thành 1 chuỗi
        $arrChar = implode($arrChar, "");

        // Thay đổi vị trí các kí tự trong chuỗi
        $arrChar = str_shuffle($arrChar);
        $result = substr($arrChar, 0, 5);

        return $result;
    }

    public function postAddCate(){
        
        if (isset($_POST['add'])){
            $data = $this->cate->checkIssetCate($_POST['name']);
            if ($data == true) {
                $this->views('admin/Manage_layout', [
                    'page'=>'addCate',
                    'packet'=>'cate',
                    'err'=>'Loại sản phẩm đã tồn tại!'
                ]);
            }
            else{
                $fileUpload = $_FILES["img"];
                if($fileUpload['name'] == null){
                    $this->views('admin/Manage_layout', [
                        'page'=>'addCate',
                        'packet'=>'cate',
                        'err'=>'Chưa chọn ảnh!'
                    ]);
                }
                else{
                    if ($_POST['name'] == '') {
                        $this->views('admin/Manage_layout', [
                            'page'=>'addCate',
                            'packet'=>'cate',
                            'err'=>'Chưa nhập tên!'
                        ]);
                    }
                    else{
                        
                        $fileStyle = explode("/", $fileUpload['type']);
                        $name = $this->createFileName();
                        $fileName = "../MobileShop/public/image/cate/".$name.".".$fileStyle[1];
                        @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                        $this->cate->addCate($_POST['name'], $name.".".$fileStyle[1]);
                        $this->views('admin/Manage_layout', [
                            'page'=>'addCate',
                            'packet'=>'cate',
                            'success'=>'Thêm thành công!'
                        ]);
                    }
                }
            }
        }
    }

    public function delCate($idCate){
        if (isset($idCate)){
            $listProducts = $this->product->getListProductByIdCate($idCate);
            $listProducts = json_decode($listProducts, true);
            for ($i=0; $i < count($listProducts); $i++) { 
                $this->product_comment->delProductCommentByIdProduct($listProducts[$i]['id']);
            }
            $this->product->delProductByIdCate($idCate);
            $this->cate->delCate($idCate);
            $listCate = $this->cate->listCate();
            $listCate = json_decode($listCate, true);
            $this->views('admin/Manage_layout', [
                'page'=>'index',
                'packet'=>'cate',
                'listCate'=>$listCate,
                'success'=>'Xóa thành công!'
            ]);
        }
    }

    public  function getUpdateCate($idCate = -1){
        $cate = $this->cate->getCate($idCate);
        $cate = json_decode($cate, true);
        if ($cate == null) {
            header('Location: '.constant("path"));
        }
        else{
            $this->views('admin/Manage_layout', [
                'page'=>'updateCate',
                'packet'=>'cate',
                'cate'=>$cate,
            ]);
        }
        
    }

    public function postUpdateCate($idCate){
        if (isset($idCate)){
            if (isset($_POST['update'])){
                $fileUpload = $_FILES["img"];
                $cate = $this->cate->getCate($idCate);
                $cate = json_decode($cate, true);
                
                if($cate[0]['name'] == $_POST['name']){
                    if ($fileUpload['name'] == null) {
                        $this->cate->updateCate($idCate, $_POST['name'], $cate[0]['image']);
                        $listCate = $this->cate->listCate();
                        $listCate = json_decode($listCate, true);
                        $this->views('admin/Manage_layout', [
                            'page'=>'index',
                            'packet'=>'cate',
                            'listCate'=>$listCate,
                            'success'=>'Cập Nhật thành công!'
                        ]);
                    }
                    else{
                        $fileStyle = explode("/", $fileUpload['type']);
                        $name = $this->createFileName();
                        $fileName = "../MobileShop/public/image/cate/".$name.".".$fileStyle[1];
                        @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                        $this->cate->updateCate($idCate, $_POST['name'], $name.".".$fileStyle[1]);
                        $listCate = $this->cate->listCate();
                        $listCate = json_decode($listCate, true);
                        $this->views('admin/Manage_layout', [
                            'page'=>'index',
                            'packet'=>'cate',
                            'listCate'=>$listCate,
                            'success'=>'Cập Nhật thành công!'
                        ]);
                    }
                }
                else{
                     $data = $this->cate->checkIssetCate($_POST['name']);
                     if ($data == true) {
                        
                        $this->views('admin/Manage_layout', [
                            'page'=>'updateCate',
                            'packet'=>'cate',
                            'cate'=>$cate,
                            'err'=>'Loại sản phẩm đã tồn tại!'
                        ]);
                     }
                     else{
                        if ($fileUpload['name'] == null) {
                            $this->cate->updateCate($idCate, $_POST['name'], $cate[0]['image']);
                            $listCate = $this->cate->listCate();
                            $listCate = json_decode($listCate, true);
                            $this->views('admin/Manage_layout', [
                                'page'=>'index',
                                'packet'=>'cate',
                                'listCate'=>$listCate,
                                'success'=>'Cập Nhật thành công!'
                            ]);
                        }
                        else{
                            $fileStyle = explode("/", $fileUpload['type']);
                            $name = $this->createFileName();
                            $fileName = "../MobileShop/public/image/cate/".$name.".".$fileStyle[1];
                            @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                            $this->cate->updateCate($idCate, $_POST['name'], $name.".".$fileStyle[1]);
                            $listCate = $this->cate->listCate();
                            $listCate = json_decode($listCate, true);
                            $this->views('admin/Manage_layout', [
                                'page'=>'index',
                                'packet'=>'cate',
                                'listCate'=>$listCate,
                                'success'=>'Cập Nhật thành công!'
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function listSlide(){
        $listSlide = $this->slide->listSlide();
        $listSlide = json_decode($listSlide, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listSlide',
            'packet'=>'slide',
            'listSlide'=>$listSlide
        ]);
    }

    public function delSlide($idSlide){
        if (isset($idSlide)){
            $slide = $this->slide->getSlide($idSlide);
            $slide = json_decode($slide, true);
            if ($slide == null) {
                header('Location: '.constant("path")."manage");
            }
            $this->slide->delSlide($idSlide);
            unlink("../MobileShop/public/image/slide/".$slide[0]['image']);
            $listSlide = $this->slide->listSlide();
            $listSlide = json_decode($listSlide, true);
            $this->views('admin/Manage_layout', [
                'page'=>'listSlide',
                'packet'=>'slide',
                'listSlide'=>$listSlide,
                'success'=>'Xóa thành công!'
            ]);
        }
    }

    public function getAddSlide(){
        $this->views('admin/Manage_layout', [
            'page'=>'addSlide',
            'packet'=>'slide',
        ]);
    }

    public function postAddSlide(){
        if (isset($_POST['add'])){
            $fileUpload = $_FILES["img"];
            if ($fileUpload['name'] == null) {
                $this->views('admin/Manage_layout', [
                    'page'=>'addSlide',
                    'packet'=>'slide',
                    'err'=>'Chưa chọn ảnh!'
                ]);
            }
            else{
                if ($_POST['link'] == '') {
                    $this->views('admin/Manage_layout', [
                        'page'=>'addSlide',
                        'packet'=>'slide',
                        'err'=>'Chưa nhập link!'
                    ]);
                }
                else{
                    $fileStyle = explode("/", $fileUpload['type']);
                    $name = $this->createFileName();
                    $fileName = "../MobileShop/public/image/slide/".$name.".".$fileStyle[1];
                    @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                    $this->slide->addSlide($name.".".$fileStyle[1], $_POST['link']);
                    $this->views('admin/Manage_layout', [
                        'page'=>'addSlide',
                        'packet'=>'slide',
                        'success'=>'Thêm thành công!'
                    ]);
                }
            }
        }
    }

    public  function getUpdateSlide($idSlide = -1){
        $slide = $this->slide->getSlide($idSlide);
        $slide = json_decode($slide, true);
        if ($slide == null) {
            header('Location: '.constant("path"));
        }
        else{
            $this->views('admin/Manage_layout', [
                'page'=>'updateSlide',
                'packet'=>'slide',
                'slide'=>$slide,
            ]);
        }
    }
    public function postUpdateSlide($idSlide){
        if (isset($idSlide)){
            $slide = $this->slide->getSlide($idSlide);
            $slide = json_decode($slide, true);
            if (isset($_POST['update'])){
                $fileUpload = $_FILES["img"];
                if ($fileUpload['name'] == null) {
                    $this->slide->updateSlide($idSlide, $slide[0]['image'], $_POST['link']);
                    $listSlide = $this->slide->listSlide();
                    $listSlide = json_decode($listSlide, true);
                    $this->views('admin/Manage_layout', [
                        'page'=>'listSlide',
                        'packet'=>'slide',
                        'listSlide'=>$listSlide,
                        'success'=>'Cập Nhật thành công!'
                    ]);
                }
                else{
                    $fileStyle = explode("/", $fileUpload['type']);
                    $name = $this->createFileName();
                    $fileName = "../MobileShop/public/image/slide/".$name.".".$fileStyle[1];
                    @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                    $this->slide->updateSlide($idSlide, $name.".".$fileStyle[1], $_POST['link']);
                    $listSlide = $this->slide->listSlide();
                    $listSlide = json_decode($listSlide, true);
                    $this->views('admin/Manage_layout', [
                        'page'=>'listSlide',
                        'packet'=>'slide',
                        'listSlide'=>$listSlide,
                        'success'=>'Cập Nhật thành công!'
                    ]);
                }
            }
        }
    }

    public  function listProduct(){
        $listProducts = $this->product->listProduct();
        $listProducts = json_decode($listProducts, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listProduct',
            'packet'=>'product',
            'listProduct'=>$listProducts
        ]);
    }

    public function delProduct($id){
        if (isset($id)){
            $this->product_comment->delProductCommentByIdProduct($id);
            $this->orderdetail->delOrderDetailByIdProduct($id);
            $this->product->delProduct($id);
            $listProducts = $this->product->listProduct();
            $listProducts = json_decode($listProducts, true);
            $this->views('admin/Manage_layout', [
                'page'=>'listProduct',
                'packet'=>'product',
                'listProduct'=>$listProducts,
                'success'=>'Xóa Thành CÔng!'
            ]);
        }
    }

    public function getAddProduct(){
        $listCate = $this->cate->listCate();
        $listCate = json_decode($listCate, true);
        $this->views('admin/Manage_layout', [
            'page'=>'addProduct',
            'packet'=>'product',
            'listCate'=>$listCate
        ]);
    }

    public function postAddProduct(){
        $listCate = $this->cate->listCate();
        $listCate = json_decode($listCate, true);
        if (isset($_POST['add'])){
            if(strlen(trim($_POST['name'])) != 0 && strlen(trim($_POST['des'])) != 0){
                $pd = $this->product->checkIssetName($_POST['name']);
                $pd = json_decode($pd, true);
                if ($pd == null) {
                    $fileUpload = $_FILES["img"];
                    $fileStyle = explode("/", $fileUpload['type']);
                    $name = $this->createFileName();
                    $fileName = "../MobileShop/public/image/product/".$name.".".$fileStyle[1];
                    @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                    $this->product->addProduct($_POST['name'], $_POST['type'], $_POST['des'] ,$_POST['unit'], $_POST['promotion'],$name.".".$fileStyle[1]);
                    $listCate = $this->cate->listCate();
                    $listCate = json_decode($listCate, true);
                    $this->views('admin/Manage_layout', [
                        'page'=>'addProduct',
                        'packet'=>'product',
                        'listCate'=>$listCate,
                        'success'=>"Thêm thành công!"
                    ]);
                }
                else{
                    $this->views('admin/Manage_layout', [
                        'page'=>'addProduct',
                        'packet'=>'product',
                        'listCate'=>$listCate,
                        'err'=>"Tên sản phẩm đã tồn tại!"
                    ]);
                }
            }
            else{
                $this->views('admin/Manage_layout', [
                        'page'=>'addProduct',
                        'packet'=>'product',
                        'listCate'=>$listCate,
                        'err'=>"Chưa nhập đủ nội dung"
                    ]);
            }
        }
    }

    public function getUpdateProduct($id){
        $_SESSION['idProduct'] = $id;

        $listComment = $this->product_comment->listComment($id);
        $listComment = json_decode($listComment, true);

        $product = $this->product->getProduct($id);
        $product = json_decode($product, true);
        $listCate = $this->cate->listCate();
        $listCate = json_decode($listCate, true);

        if ($product == null) {
            header('Location: '.constant("path"));
        }
        else{
            $this->views('admin/Manage_layout', [
                'page'=>'updateProduct',
                'packet'=>'product',
                'listCate'=>$listCate,
                'product'=>$product,
                'listComment'=>$listComment
            ]);
        }  
    }
    public function postUpdateProduct($id){
        if (isset($id)){
            if (isset($_POST['update'])){
                $product = $this->product->getProduct($id);
                $product = json_decode($product, true);
                if(strlen(trim($_POST['name'])) != 0 && strlen(trim($_POST['des'])) != 0){

                    $product2 = $this->product->checkIsChangeName($product[0]['id'], $_POST['name']);
                    $product2 = json_decode($product2, true);

                    // Nếu tên thay đổi
                    if ($product2 == null) {
                        $product3 = $this->product->checkIssetName($_POST['name']);
                        $product3 = json_decode($product3, true);
                        if ($product3 == null) {
                            $fileUpload = $_FILES["img"];
                            if ($fileUpload['name'] == null) {
                                $this->product->updateProduct($id, $_POST['name'], $_POST['type'], $_POST['des'] ,$_POST['unit'], $_POST['promotion'],$product[0]['image']);
                                $listProducts = $this->product->listProduct();
                                $listProducts = json_decode($listProducts, true);
                                $this->views('admin/Manage_layout', [
                                    'page'=>'listProduct',
                                    'packet'=>'product',
                                    'listProduct'=>$listProducts,
                                    'success'=>'Cập nhật thành công!'
                                ]);
                            }
                            else{
                                $fileStyle = explode("/", $fileUpload['type']);
                                $name = $this->createFileName();
                                $fileName = "../MobileShop/public/image/product/".$name.".".$fileStyle[1];
                                @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                                $this->product->updateProduct($id, $_POST['name'], $_POST['type'], $_POST['des'] ,$_POST['unit'], $_POST['promotion'],$name.".".$fileStyle[1]);
                                $listProducts = $this->product->listProduct();
                                $listProducts = json_decode($listProducts, true);
                                $this->views('admin/Manage_layout', [
                                    'page'=>'listProduct',
                                    'packet'=>'product',
                                    'listProduct'=>$listProducts,
                                    'success'=>'Cập nhật thành công!'
                                ]);
                            }
                        }
                        else{
                            $listCate = $this->cate->listCate();
                            $listCate = json_decode($listCate, true);

                            $this->views('admin/Manage_layout', [
                                'page'=>'updateProduct',
                                'packet'=>'product',
                                'listCate'=>$listCate,
                                'product'=>$product,
                                'err'=>'Tên sản phẩm đã tồn tại'
                            ]);
                        }
                    }
                    else{
                        $fileUpload = $_FILES["img"];
                        if ($fileUpload['name'] == null) {
                            $this->product->updateProduct($id, $_POST['name'], $_POST['type'], $_POST['des'] ,$_POST['unit'], $_POST['promotion'],$product[0]['image']);
                            $listProducts = $this->product->listProduct();
                            $listProducts = json_decode($listProducts, true);
                            $this->views('admin/Manage_layout', [
                                'page'=>'listProduct',
                                'packet'=>'product',
                                'listProduct'=>$listProducts,
                                'success'=>'Cập nhật thành công!'
                            ]);
                        }
                        else{
                            $fileStyle = explode("/", $fileUpload['type']);
                            $name = $this->createFileName();
                            $fileName = "../MobileShop/public/image/product/".$name.".".$fileStyle[1];
                            @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                            $this->product->updateProduct($id, $_POST['name'], $_POST['type'], $_POST['des'] ,$_POST['unit'], $_POST['promotion'],$name.".".$fileStyle[1]);
                            $listProducts = $this->product->listProduct();
                            $listProducts = json_decode($listProducts, true);
                            $this->views('admin/Manage_layout', [
                                'page'=>'listProduct',
                                'packet'=>'product',
                                'listProduct'=>$listProducts,
                                'success'=>'Cập nhật thành công!'
                            ]);
                        }
                    }
                }
                else{
                    $listCate = $this->cate->listCate();
                    $listCate = json_decode($listCate, true);

                    $this->views('admin/Manage_layout', [
                        'page'=>'updateProduct',
                        'packet'=>'product',
                        'listCate'=>$listCate,
                        'product'=>$product,
                        'err'=>'Chưa nhập đủ nội dung!'
                    ]);
                }
            }
        }
    }


    public function listFeedback(){
        $listFeedback = $this->feedback->listFeedback();
        $listFeedback = json_decode($listFeedback, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listFeedback',
            'packet'=>'feedback',
            'listFeedback'=>$listFeedback             
        ]);
    }

    public function delFeedback($id){
        if (isset($id)){
            $this->feedback->delFeedback($id);
            $listFeedback = $this->feedback->listFeedback();
            $listFeedback = json_decode($listFeedback, true);
            $this->views('admin/Manage_layout', [
                'page'=>'listFeedback',
                'packet'=>'feedback',
                'listFeedback'=>$listFeedback,
                'success'=>'Xóa Thành CÔng!'
            ]);
        }
    }

    public function listUser(){
        $listUser = $this->user->listUser();
        $listUser = json_decode($listUser, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listUser',
            'packet'=>'user',
            'listUser'=>$listUser          
        ]);
    }

    public function delUser($id){
        if (isset($id)){
            $this->product_comment->delProductCommentByIdUser($id);
            $this->post_comment->delPostCommentByIdUser($id);
            $this->orderdetail->delOrderDetailByIdUser($id);
            $this->order->delOrderByIdUser($id);
            $this->user->delUser($id);
            $listUser = $this->user->listUser();
            $listUser = json_decode($listUser, true);
            $this->views('admin/Manage_layout', [
                'page'=>'listUser',
                'packet'=>'user',
                'listUser'=>$listUser,
                'success'=>'Xóa Thành CÔng!'
            ]);
        }
    }

    public function getAddUser(){
        $this->views('admin/Manage_layout', [
            'page'=>'addUser',
            'packet'=>'user',
        ]);
    }

    public function postAddUser(){
        if (isset($_POST['add'])){
                $this->user->addUser($_POST['name'],$_POST['email'],$_POST['pass'],$_POST['phone'],$_POST['address'],$_POST['level']);
                $listUser = $this->user->listUser();
                $listUser = json_decode($listUser, true);
                $this->views('admin/Manage_layout', [
                    'page'=>'listUser',
                    'packet'=>'user',
                    'listUser'=>$listUser,
                    'success'=>'Thêm Thành CÔng!'
                ]);
        }
    }

    public function getUpdateUser($id){
        $user = $this->user->getUser($id);
        $user = json_decode($user, true);
        $listUser = $this->user->listUser();
        $listUser = json_decode($listUser, true);

        if ($user == null) {
            header('Location: '.constant("path"));
        }
        else{
            $this->views('admin/Manage_layout', [
                'page'=>'updateUser',
                'packet'=>'user',
                'user'=>$user,
            ]);
        }
    }

    public function postUpdateUser($id){
        if (isset($id)){
            if (isset($_POST['update'])){
                $this->user->updateUser($id, $_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['level']);
                $listUser = $this->user->listUser();
                $listUser = json_decode($listUser, true);
                $this->views('admin/Manage_layout', [
                    'page'=>'listUser',
                    'listUser'=>$listUser,
                    'packet'=>'user'
                ]);
            }
        }
    }

    public function listOrder(){
        $listOrder = $this->order->listOrder();
        $listOrder = json_decode($listOrder, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listOrder',
            'packet'=>'order',
            'listOrder'=>$listOrder     
        ]);
    }

    public function getListOrder(){
        $listOrder = $this->order->listOrder();
        print_r($listOrder);
    }

    public function delOrder($id){
        if (isset($id)){
            $this->orderdetail->delOrderDetailByIdOrder($id);
            $this->order->delOrder($id);
            $listOrder = $this->order->listOrder();
            $listOrder = json_decode($listOrder, true);
            $this->views('admin/Manage_layout', [
                'page'=>'listOrder',
                'packet'=>'order',
                'listOrder'=>$listOrder,
                'success'=>'Xóa Thành CÔng!'    
            ]);
        }
    }

    public function listOrderDetail(){
        $listOrderDetail = $this->orderdetail->listOrderDetail();
        $listOrderDetail = json_decode($listOrderDetail, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listOrderDetail',
            'packet'=>'orderdetail',
            'listOrderDetail'=>$listOrderDetail  
        ]);
    }

    public function listPostCate(){
        $listPostCate = $this->postCate->listPostCate();
        $listPostCate= json_decode($listPostCate, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listPostCate',
            'packet'=>'postcate',
            'listPostCate'=>$listPostCate 
        ]);
    }

    public function getAddPostCate(){
        $this->views('admin/Manage_layout', [
            'page'=>'addPostCate',
            'packet'=>'postcate'
        ]);
    }

    public function postAddPostCate(){
        if (isset($_POST['add'])) {
            if (strlen(trim($_POST['name'])) != 0) {
                $this->postCate->addPostCate($_POST['name']);

                $listPostCate = $this->postCate->listPostCate();
                $listPostCate = json_decode($listPostCate, true);

                $this->views('admin/Manage_layout', [
                    'page'=>'listPostCate',
                    'packet'=>'postcate',
                    'listPostCate'=>$listPostCate,
                    'success'=>'Thêm thành công'
                ]);
            }
            else{
                $this->views('admin/Manage_layout', [
                    'page'=>'addPostCate',
                    'packet'=>'postcate',
                    'err'=>'Chưa nhập đủ nội dung'
                ]);
            }
        }
    }

    public function getUpdatePostCate($id){
        $pc = $this->postCate->getPostCate($id);
        $pc = json_decode($pc, true);
        if ($pc == null) {
            header('Location: '.constant("path"));
        }
        else{
            $this->views('admin/Manage_layout', [
                'page'=>'updatePostCate',
                'packet'=>'postcate',
                'pc'=>$pc
            ]);
        }
    }

    public function postUpdatePostCate($id){
        if (isset($_POST['update'])) {
            if (strlen(trim($_POST['name'])) != 0) {
                $this->postCate->updatePostCate($id, $_POST['name']);

                $listPostCate = $this->postCate->listPostCate();
                $listPostCate = json_decode($listPostCate, true);

                $this->views('admin/Manage_layout', [
                    'page'=>'listPostCate',
                    'packet'=>'postcate',
                    'listPostCate'=>$listPostCate,
                    'success'=>'Cập nhật thành công'
                ]);
            }
            else{
                $pc = $this->postCate->getPostCate($id);
                $pc = json_decode($pc, true);
                $this->views('admin/Manage_layout', [
                    'page'=>'updatePostCate',
                    'packet'=>'postcate',
                    'pc'=>$pc,
                    'err'=>'Chưa nhập đủ nội dung'
                ]);
            }
        }
    }

    public function delPostCate($id){
        $listPost = $this->post->getPostByIdPostCate($id);
        $listPost = json_decode($listPost, true);

        for ($i=0; $i < count($listPost); $i++) { 
            $this->post_comment->delPostCommentByIdPost($listPost[$i]['id']);
        }

        $this->post->delPostByIdPostCate($id);

        $this->postCate->delPostCate($id);

        $listPostCate = $this->postCate->listPostCate();
        $listPostCate = json_decode($listPostCate, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listPostCate',
            'packet'=>'postcate',
            'listPostCate'=>$listPostCate,
            'listPostCate'=>$listPostCate,
            'success'=>'Xóa thành công'
        ]);
    }

    public function listPost(){
        $listPost = $this->post->listPost();
        $listPost= json_decode($listPost, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listPost',
            'packet'=>'post',
            'listPost'=>$listPost
        ]);
    }

    public function getAddPost(){
        $listPostCate = $this->postCate->listPostCate();
        $listPostCate = json_decode($listPostCate, true);
        $this->views('admin/Manage_layout', [
            'page'=>'addPost',
            'packet'=>'post',
            'listPostCate'=>$listPostCate
        ]);
    }

    public function postAddPost(){
        if (isset($_POST['add'])) {
            $listPostCate = $this->postCate->listPostCate();
            $listPostCate = json_decode($listPostCate, true);
            if (strlen(trim($_POST['title'])) != 0 && strlen(trim($_POST['content'])) != 0) {

                $fileUpload = $_FILES["img"];
                $fileStyle = explode("/", $fileUpload['type']);
                $name = $this->createFileName();
                $fileName = "../MobileShop/public/image/post/".$name.".".$fileStyle[1];
                @move_uploaded_file($fileUpload['tmp_name'], $fileName);

                $this->post->addPost($_POST['type'], $_POST['title'], $name.".".$fileStyle[1], $_POST['content']);

                $this->views('admin/Manage_layout', [
                    'page'=>'addPost',
                    'packet'=>'post',
                    'listPostCate'=>$listPostCate,
                    'success'=>'Thêm bài viết thành công!'
                ]);
            }
            else{
                $this->views('admin/Manage_layout', [
                    'page'=>'addPost',
                    'packet'=>'post',
                    'listPostCate'=>$listPostCate,
                    'err'=>'Chưa nhập đủ nội dung'
                ]);
            }
        }
    }

    public function delPost($id){
        $this->post_comment->delPostCommentByIdPost($id);
        $this->post->delPost($id);

        $listPost = $this->post->listPost();
        $listPost= json_decode($listPost, true);
        $this->views('admin/Manage_layout', [
            'page'=>'listPost',
            'packet'=>'post',
            'listPost'=>$listPost,
            'success'=>'Xóa bài viết thành công!'
        ]);
    }

    public function getUpdatePost($id){
        $_SESSION['idPost'] = $id;

        $listComment = $this->post_comment->listComment($id);
        $listComment = json_decode($listComment, true);

        $listPostCate = $this->postCate->listPostCate();
        $listPostCate= json_decode($listPostCate, true);

        $p = $this->post->getPost($id);
        $p = json_decode($p, true);

        if ($p == null) {
            header('Location: '.constant("path"));
        }
        else{
            $this->views('admin/Manage_layout', [
                'page'=>'updatePost',
                'packet'=>'post',
                'p'=>$p,
                'listPostCate'=>$listPostCate,
                'listComment'=>$listComment
            ]);
        }
    }

    public function postUpdatePost($id){
        if (isset($_POST['update'])) {
            $p = $this->post->getPost($id);
            $p = json_decode($p, true);
            if(strlen(trim($_POST['title'])) != 0 && strlen(trim($_POST['content'])) != 0)
            {
                $fileUpload = $_FILES["img"];
                if ($fileUpload['name'] == null) {
                    $this->post->updatePost($id, $_POST['type'], $_POST['title'], $p[0]['img'], $_POST['content']);
                    $listPost = $this->post->listPost();
                    $listPost= json_decode($listPost, true);
                    $this->views('admin/Manage_layout', [
                        'page'=>'listPost',
                        'packet'=>'post',
                        'listPost'=>$listPost,
                        'success'=>'Cập nhật thành công1!'
                    ]);
                }
                else{
                    $fileStyle = explode("/", $fileUpload['type']);
                    $name = $this->createFileName();
                    $fileName = "../MobileShop/public/image/post/".$name.".".$fileStyle[1];
                    @move_uploaded_file($fileUpload['tmp_name'], $fileName);
                    $this->post->updatePost($id, $_POST['type'], $_POST['title'], $name.".".$fileStyle[1], $_POST['content']);
                    $listPost = $this->post->listPost();
                    $listPost= json_decode($listPost, true);
                    $this->views('admin/Manage_layout', [
                        'page'=>'listPost',
                        'packet'=>'post',
                        'listPost'=>$listPost,
                        'success'=>'Cập nhật thành công2!'
                    ]);
                }
            }
            else{
                $listComment = $this->post_comment->listComment($id);
                $listComment = json_decode($listComment, true);

                $listPostCate = $this->postCate->listPostCate();
                $listPostCate= json_decode($listPostCate, true);

                $this->views('admin/Manage_layout', [
                    'page'=>'updatePost',
                    'packet'=>'post',
                    'p'=>$p,
                    'listPostCate'=>$listPostCate,
                    'listComment'=>$listComment,
                    'err'=>'Chưa nhập đủ nội dung!'
                ]);
            }

        }
    }

    public function delPostCmt($id){
        $this->post_comment->delPostComment($id);

        $listComment = $this->post_comment->listComment($_SESSION['idPost']);
        $listComment = json_decode($listComment, true);

        $listPostCate = $this->postCate->listPostCate();
        $listPostCate= json_decode($listPostCate, true);

        $p = $this->post->getPost($_SESSION['idPost']);
        $p = json_decode($p, true);

        if ($p == null) {
            header('Location: '.constant("path"));
        }
        else{
            $this->views('admin/Manage_layout', [
                'page'=>'updatePost',
                'packet'=>'post',
                'p'=>$p,
                'listPostCate'=>$listPostCate,
                'listComment'=>$listComment,
                'success'=>'Xóa bình luận thành công!'
            ]);
        }
    }

    public function delProductCmt($id){
        $this->product_comment->delProductComment($id);

        $listComment = $this->product_comment->listComment($_SESSION['idProduct']);
        $listComment = json_decode($listComment, true);

        $product = $this->product->getProduct($_SESSION['idProduct']);
        $product = json_decode($product, true);
        $listCate = $this->cate->listCate();
        $listCate = json_decode($listCate, true);

        if ($product == null) {
            header('Location: '.constant("path"));
        }
        else{
            $this->views('admin/Manage_layout', [
                'page'=>'updateProduct',
                'packet'=>'product',
                'listCate'=>$listCate,
                'product'=>$product,
                'listComment'=>$listComment,
                'success'=>'Xóa bình luận thành công!'
            ]);
        }
    }

    public function updateOrder($id){
        $this->order->updateOrder($id, $_POST['data']);
    }

}
?>