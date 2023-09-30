<?php
include('model/Product.php');
class homeController
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new productModel();
    }
    public function index()
    {
        $result =  $this->productModel->fetchProduct();
        include('views/home.php');
    } // end of index page
}
