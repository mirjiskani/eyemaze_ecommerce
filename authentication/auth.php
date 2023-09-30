<?php
class auth
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function isLogedIn()
    {
        if (isset($_SESSION['isLoged']) && !$_SESSION['isLoged']) {
            die("User Loged In");
        } else {
            return false;
        }
    }
}//end of auth class
