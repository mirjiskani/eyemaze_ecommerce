<?php
include('session/sessionHelper.php');
class cartController
{
    private $obj;
    public function __construct()
    {
        $this->obj = new sessionHelper();
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
