<?php
require('model/user.php');
class registerController
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
        include('views/register.php');
    }
    public function doRegister()
    {

        if (isset($_POST['submit'])) {
            $result = $this->userModel->addUser();
            if ($result) {
                $_SESSION["status"] = 1;
                $_SESSION["message"] = "You have successfully registered";
                header("Location:" . BASEURL . "register");
            } else {
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "Registration fialed";
                header("Location:" . BASEURL . "register");
            }
        } else {
            include('views/register.php');
        }
    }
}
