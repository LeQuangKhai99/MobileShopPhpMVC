<?php
class App{
    protected $controller = "Customer";
    protected $action = "index";
    protected $params = [];
    function __construct(){
        //Array ( [0] => Home [1] => SayHi [2] => c [3] => c [4] => c )
        $arr = $this->UrlProcess();
        if(!isset($arr)){
            $arr[0] = 'Customer';
        }
        // Xử Lý Controller
        // Nếu tồn tại controller thì sẽ hiển thị trang tương ứng
        // ko thì sẽ hiểm thị mặc định trang Home
        if(file_exists('./mvc/controllers/'.$arr[0].'.php')){
            $this->controller = $arr[0];
        }
        unset($arr[0]);
        require_once('./mvc/controllers/'.$this->controller.'.php');
        // Tạo mới 1 đối tượng controller
        // ví dụ: customer = new customer
        $this->controller = new $this->controller;
        // Xử lý action
        if(isset($arr[1])){
            // Nếu tồn tại action trong controller
            if(method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
            }
        }
        unset($arr[1]);
        

        // Xử lý params
        // nếu $arr tồn tại thì gán cho params = arr
        $this->params = $arr ? array_values($arr) : [];

        // Hàm gồm 2 tham số
        // tham số thứ nhất là 1 mảng gồm đối tượng lớp vừa đc tạo mới và hàm cần chạy
        // tham số thứ 2 là tham số của hàm
        call_user_func_array([$this->controller, $this->action], $this->params);

    }

    function UrlProcess(){
        if(isset($_GET['url'])){
            // Loại bỏ khoảng trắng trên thanh url
            // filter_var(trim($_GET['url'], '/'));
            return explode('/', filter_var(trim($_GET['url'])));
            
        }
    }
}
?>