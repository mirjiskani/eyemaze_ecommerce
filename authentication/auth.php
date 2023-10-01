<?php
class auth
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function isUserLogedIn()
    {
        if (isset($_SESSION['userdata'])) {
            if ($_SESSION['userdata']['role'] == '2') {
                return true;
            } else {
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "You should get customer login";
                header('location:' . BASEURL . 'login');
            }
        } else {
            $_SESSION["status"] = 0;
            $_SESSION["message"] = "You have invalid credentials or please do login before access";
            header('location:' . BASEURL . 'login');
        }
    }
    public function isAdminLogedIn()
    {

        if (isset($_SESSION['adminuser'])) {
            if ($_SESSION['adminuser']['role'] == '1') {
                return true;
            } else {
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "You should get administrator login to access page.";
                header('location:' . BASEURL . 'admin');
            }
        } else {
            $_SESSION["status"] = 0;
            $_SESSION["message"] = "You have invalid credentials or please do login before access";
            header('location:' . BASEURL . 'admin');
        }
    }
}//end of auth class
