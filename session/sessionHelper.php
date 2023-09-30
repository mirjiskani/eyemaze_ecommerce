<?php
class sessionHelper
{
    public function __construct()
    {
    }
    public function createSessionItems()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $data = array("name" => $_POST['productName'], 'description' => $_POST['productDescription'], 'price' => $_POST['productPrice'], 'qty' => $_POST['productQty'], 'image' => $_POST['productImage']);
            $_SESSION['cart'][$_POST['idproducts']] = $data;
            return json_encode($_SESSION);
        } else {
            if (isset($_SESSION['cart'][$_POST['idproducts']])) {
                $_SESSION['cart'][$_POST['idproducts']]['qty'] = $_POST['productQty'];
                return json_encode($_SESSION);
            } else {
                $data = array("name" => $_POST['productName'], 'description' => $_POST['productDescription'], 'price' => $_POST['productPrice'], 'qty' => $_POST['productQty'], 'image' => $_POST['productImage']);
                $_SESSION['cart'][$_POST['idproducts']] = $data;
                return json_encode($_SESSION);
            }
        }
    } //end of function createCartSession
    public function removeSessionItem()
    {
        unset($_SESSION['cart'][$_POST['idproducts']]);
        return json_encode($_SESSION);
    } //end of function removeFromCart
}
