<?php
require('session/sessionHelper.php');
class cartController
{
    private $obj;
    private $uriSegments;
    public function __construct()
    {
        $this->obj = new sessionHelper();
        $this->uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        // if (!function_exists($this->uriSegments[FUNC])) {
        //     header('location:' . BASEURL . 'error/notfound');
        // }
    }
    public function addToCart()
    {
        echo $this->obj->createSessionItems();
    }
    public function removeFromCart()
    {
        echo $this->obj->removeSessionItem();
    }
}
