<?php
class User extends Controller
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }
    
    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] =='POST') {
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "confirm_password" => $_POST['confirm_password'],
                "name_err" => '',
                "email_err" => '',
                "password_err" => '',
                "confirm_password_err" => ''
            ];

            if(empty($data['name'])){
                $data['name_err'] = "Username must be supply!";
            }
            if(empty($data['email'])){
                $data['email_err'] = "Email must be supply!";
            }else{
                if($this->userModel->getUserByEmail($data['email'])){
                    $data['email_err'] = "Email is already taken";
                }
            }
            if(empty($data['password'])){
                $data['password_err'] = "Password must be supply!";
            }
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = "Confirm Password must be supply!";
            }else{
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = "Password do not match!";
                }
            }

            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err'])  && empty($data['confirm_password_err']) && isset($_POST['register'])){
                if($this->userModel->register($data['name'],$data['email'],$data['password'])){
                    flash('register_success','Register success, please login.');
                    $this->view("user/login");
                }else{
                    $this->view("user/register");
                }
            }else{
                $this->view("user/register",$data);
            }
        }else{
            $this->view("user/register");
        }

    }
    
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] =='POST') {
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "email_err" => '',
                "password_err" => ''
            ];

            if(empty($data['email'])){
                $data['email_err'] = "Email must be supply!";
            }
            if(empty($data['password'])){
                $data['password_err'] = "Password must be supply!";
            }

            if(empty($data['email_err']) && empty($data['password_err']) && isset($_POST['login'])){
                $rowUser = $this->userModel->getUserByEmail($data['email']);
                if($rowUser){
                    $hash_pass = $rowUser->password;
                    if(password_verify($data['password'] , $hash_pass)){
                        setUserSession($rowUser);
                        if(getUserSession()->name=='kyi lynn ko'){
                            redirect(URLROOT . 'admin/Home');
                        }else{
                            redirect(URLROOT . 'post/Home/1');
                        }
                    }else{
                        flash("login_fail","User Creditial Error!");
                        $this->view('user/login');
                    }
                }else{
                    $data['email_err'] = "Email Error!";
                }
                
            }else{
                $this->view("user/login",$data);
            }
        }else{
            $this->view("user/login");
        }
    }

    public function logout()
    {
        unsetUserSession();
        $this->view('home/index');
    }
}
?>