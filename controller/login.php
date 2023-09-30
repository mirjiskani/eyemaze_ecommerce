<?php
include('model/user.php');
class loginController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new userModle();
    }

    public function index()
    {
        include('views/login.php');
    }
    public function doLogin()
    {

        $user = $this->userModel->hasUser();
        if (!empty($user)) {
            $hash_passowrd = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $verify = password_verify($hash_passowrd, $user['password']);

            // Print the result depending if they match
            if ($verify) {
                $message = ["status" => 1, "message" => "Logedin successfully."];
                include('views/login.php');
            } else {
                $message = ["status" => 0, "message" => "Invalid credentials."];
                include('views/login.php');
            }
        } else {
            $message = ["status" => 0, "message" => "User not exist with this email address."];
            include('views/login.php');
        }
    }
}
