<?php
class auth
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function isUserLogedIn($request)
    {
        if (isset($_SESSION['userdata'])) {
            if ($_SESSION['userdata']['role'] === 2) {
                header('location:' . $request . '');
            } else {
                header('location:' . BASEURL . 'login');
            }
        } else {
            return false;
        }
    }
    public function isAdminLogedIn($request)
    {
        if (isset($_SESSION['userdata'])) {
            if ($_SESSION['userdata']['role'] === 1) {
                header('location:' . $request . '');
            } else {
                header('location:' . BASEURL . 'admin');
            }
        } else {
            return false;
        }
    }
}//end of auth class
