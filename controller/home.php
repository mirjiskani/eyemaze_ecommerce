<?php
require('model/product.php');
class homeController
{
    private $productModel;
    private $uriSegments;

    public function __construct()
    {
        $this->productModel = new productModel();
        $this->uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }
    public function index()
    {
        $result =  $this->productModel->fetchProduct();
        include('views/home.php');
    } // end of index page
}
