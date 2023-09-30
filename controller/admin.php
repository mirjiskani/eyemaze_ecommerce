<?php

include('traits/upload.php');
include('model/Product.php');
class adminController
{
    use uploadImage;
    private $productModel;
    public function __construct()
    {
        $this->productModel = new productModel();
    }
    public function index()
    {
        include('views/admin/login.php');
    }
    public function dashboard()
    {
        include('views/admin/dashboard.php');
    }
    public function users()
    {
        include('views/admin/users.php');
    }
    public function orders()
    {
        include('views/admin/orders.php');
    }
    public function ordersDetails()
    {
        include('views/admin/dashboard.php');
    }
    public function products()
    {
        $result =  $this->productModel->fetchProduct();
        include('views/admin/products.php');
    }
    public function addproduct()
    {
        $queryReuslt = [];
        if (isset($_POST['submit'])) {
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/eyemaze_ecommerce/assets/images/" . strtotime(date("Y-m-d h:i:sa")) . '_';
            $filePath = BASEURL . 'assets/images/' . strtotime(date("Y-m-d h:i:sa")) . '_' . basename($_FILES["product_image"]["name"]);
            $result = $this->upload($target_dir);
            if ($result['status'] === 0) {
                $message = ["status" => 0, "message" => "Product failed to upload some thing went wrong in image uploading"];
                include('views/admin/addproduct.php');
            } else {
                $queryReuslt = $this->productModel->addProduct($filePath);
            }
            if ($queryReuslt) {
                $message = ["status" => 1, "message" => "Product added successfully"];
                include('views/admin/addproduct.php');
            } else {
                $message = ["status" => 0, "message" => "Product added fialed"];
                include('views/admin/addproduct.php');
            }
        } else {
            include('views/admin/addproduct.php');
        }
    }
    public function deleteProduct()
    {
        $queryReuslt = $this->productModel->deleteProduct();
        if ($queryReuslt) {
            $message = ["status" => 1, "message" => "Product deleted successfully"];
            header("Location: products");
        } else {
            $message = ["status" => 0, "message" => "Product deleted fialed"];
            header("Location: products");
        }
    }

    public function profile()
    {
        include('views/admin/dashboard.php');
    }
    public function settings()
    {
        include('views/admin/dashboard.php');
    }
    public function logout()
    {
        die("logout");
    }
}
