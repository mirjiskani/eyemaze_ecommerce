<?php
require('model/user.php');
class loginController
{
    private $userModel;
    private $uriSegments;
    public function __construct()
    {
        $this->userModel = new userModle();
        $this->uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }

    public function index()
    {
        include('views/login.php');
    }
    public function doLogin()
    {

        if (isset($_POST['submit'])) {
            $user = $this->userModel->hasUser();
            if (!empty($user)) {
                $hash_passowrd =  $this->userModel->escaped_passowrd(password_hash($_POST['password'], PASSWORD_DEFAULT));

                $verify = password_verify($hash_passowrd, $user['password']);
                if ($verify) {
                    $_SESSION['userdata'] = $user;
                    $_SESSION["status"] = 1;
                    $_SESSION["message"] = "Logedin successfully";
                    header("Location:" . BASEURL . "");
                } else {

                    $_SESSION["status"] = 0;
                    $_SESSION["message"] = "Invalid credentials";
                    header("Location:" . BASEURL . "login");
                }
            } else {
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "User not exist with this email address.";
                header("Location:" . BASEURL . "login");
            }
        } else {
            header("Location:" . BASEURL . "login");
        }
    }
}
