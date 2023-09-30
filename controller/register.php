<?php
include('model/user.php');
class registerController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new userModle();
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
                $message = ["status" => 1, "message" => "You have successfully registered"];
                include('views/register.php');
            } else {
                $message = ["status" => 0, "message" => "Registration fialed"];
                include('views/register.php');
            }
        } else {
            include('views/register.php');
        }
    }
}
