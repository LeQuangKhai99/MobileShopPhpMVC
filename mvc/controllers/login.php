<?php
class Login extends Controller{
    public $user;
    public function __construct(){
        $this->user = $this->model('Users');
    }
    public function index(){
        $this->views('admin/Login_layout', [
            'page'=>'login'
        ]);
    }

    public function postLogin(){
        if(isset($_POST['login'])){
            $mail = $_POST['email'];
            $pass = md5($_POST['pass']);
            $listUser = $this->user->listUser();
            $listUser = json_decode($listUser, true);
            for ($i = 0; $i<count($listUser); $i++){
                if ($mail == $listUser[$i]['email'] && $pass == $listUser[$i]['pass']){
                    $_SESSION['user'] = $listUser[$i];
                    header('Location: '.constant("path").'Customer');
                }

            }
            $this->views('admin/Login_layout', [
                        'page'=>'login',
                        'err'=>'sai tài khoản hoạc mật khẩu!'
                    ]);
        }
    }


    public function register(){
        $this->views('admin/Login_layout', [
            'page'=>'register'
        ]);
    }

    public function postRegister(){
        
    }

    public function change(){
        $this->views('admin/Login_layout', [
            'page'=>'change'
        ]);
    }

    public function postChangePass(){
        if(isset($_POST['change'])){
            $mail = $_POST['email'];
            $pass = md5($_POST['pass']);
            $listUser = $this->user->listUser();
            $listUser = json_decode($listUser, true);
            for ($i = 0; $i<count($listUser); $i++){
                if ($mail == $listUser[$i]['email'] && $pass == $listUser[$i]['pass']){
                    if ($_POST['pass1'] != $_POST['pass2']) {
                        $this->views('admin/Login_layout', [
                            'page'=>'change',
                            'err'=>'Xác nhận mật khẩu mới không khớp!'
                        ]);
                    }
                    elseif(!preg_match("#[a-zA-Z0-9]+#",$_POST["pass1"])) {
                        $this->views('admin/Login_layout', [
                            'page'=>'change',
                            'err'=>'Mật khẩu phải là kí tự'
                        ]);
                    }
                    elseif(strlen($_POST["pass1"]) <= '2'){
                        $this->views('admin/Login_layout', [
                            'page'=>'change',
                            'err'=>'Độ dài mật khẩu phải lớn hơn 2 kí tự!'
                        ]);
                    }
                    else{
                        $this->user->Change($listUser[$i]['id'], $_POST["pass1"]);
                        $this->views('admin/Login_layout', [
                            'page'=>'login',
                            'success'=>'Đổi mật khẩu thành công!'
                        ]);
                    }
                }
                else{
                    $this->views('admin/Login_layout', [
                            'page'=>'change',
                            'err'=>'Tài khoản hoặc mật khẩu không chính xác!'
                        ]);
                }

            }
            
        }
    }

    public function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        header('Location: '.constant("path").'Customer');
    }
}
?>