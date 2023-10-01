<?php
class userController
{
    public function __construct()
    {
    }
    public function logout()
    {
        unset($_SESSION['userdata']);
        header('location:' . BASEURL . '');
    }
}
