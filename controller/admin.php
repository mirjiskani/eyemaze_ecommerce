<?php

require_once('traits/upload.php');
require_once('authentication/Auth.php');

class adminController
{
    use uploadImage;
    private $productModel;
    private $uriSegments;
    private $userModel;
    private $orderModel;
    private $checkAuthUser;
    // private $request;
    public function __construct()
    {
        // unset($_SESSION['adminuser']);
        $this->uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $this->checkAuthUser = new auth();
        // if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        //     $this->request .= "https://";
        // } else {
        //     $this->request .= "http://";
        //     // Append the host(domain name, ip) to the URL.   
        //     $this->request .= $_SERVER['HTTP_HOST'];
        //     // Append the requested resource location to the URL   
        //     $this->request .= $_SERVER['REQUEST_URI'];
        // }

    }
    public function doLogin()
    {
        require_once('model/user.php');
        $this->userModel = new userModle();
        if (isset($_POST['submit'])) {
            $user = $this->userModel->hasUser();
            if (!empty($user)) {
                $hash_passowrd =  $this->userModel->escaped_passowrd(password_hash($_POST['password'], PASSWORD_DEFAULT));

                $verify = password_verify($hash_passowrd, $user['password']);
                if ($verify) {
                    $_SESSION['adminuser'] = $user;
                    header("Location:" . BASEURL . "admin/dashboard");
                } else {

                    $_SESSION["status"] = 0;
                    $_SESSION["message"] = "Invalid credentials";
                    header("Location:" . BASEURL . "admin");
                }
            } else {
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "User not exist with this email address.";
                header("Location:" . BASEURL . "admin");
            }
        } else {
            header("Location:" . BASEURL . "admin");
        }
    } //end of do login
    public function index()
    {
        if (isset($_SESSION['adminuser'])) {
            if ($this->checkAuthUser->isAdminLogedIn()) {
                header('location:' . BASEURL . 'admin/dashboard');
            } else {
                include('views/admin/login.php');
            }
        } else {
            include('views/admin/login.php');
        }
    }
    public function dashboard()
    {
        $this->checkAuthUser->isAdminLogedIn();
        include('views/admin/dashboard.php');
    }
    public function users()
    {
        $this->checkAuthUser->isAdminLogedIn();
        require_once('model/user.php');
        $this->userModel = new userModle();
        $result = $this->userModel->fetchAll();
        include('views/admin/users.php');
    }
    public function orders()
    {
        $this->checkAuthUser->isAdminLogedIn();
        require_once('model/order.php');
        $this->orderModel = new orderModel();
        $result = $this->orderModel->fetchAll();
        include('views/admin/orders.php');
    }
    public function ordersDetails()
    {
        if (isset($_GET['id']) && isset($_GET['id']) != '') {
            $this->checkAuthUser->isAdminLogedIn();
            require_once('model/order.php');
            $this->orderModel = new orderModel();
            $result = $this->orderModel->fetchOrderDetail($_GET['id']);
            include('views/admin/orderdetail.php');
        } else {
            include('views/admin/error.php');
        }
    }
    public function products()
    {
        $this->checkAuthUser->isAdminLogedIn();
        require_once('model/Product.php');
        $this->productModel = new productModel();
        $result =  $this->productModel->fetchProduct();
        include('views/admin/products.php');
    }
    public function addproduct()
    {
        $this->checkAuthUser->isAdminLogedIn();
        require_once('model/Product.php');
        $this->productModel = new productModel();

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
                $_SESSION["status"] = 1;
                $_SESSION["message"] = "Product added successfully";
                header("Location:" . BASEURL . "admin/products");
            } else {
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "Product added fialed";
                header("Location:" . BASEURL . "admin/products");
            }
        } else {
            include('views/admin/addproduct.php');
        }
    }
    public function deleteProduct()
    {
        $this->checkAuthUser->isAdminLogedIn();
        require_once('model/Product.php');
        $this->productModel = new productModel();

        $queryReuslt = $this->productModel->deleteProduct();
        if ($queryReuslt) {
            $_SESSION["status"] = 1;
            $_SESSION["message"] = "Product deleted successfully";

            header("Location:" . BASEURL . "admin/products");
        } else {
            $_SESSION["status"] = 0;
            $_SESSION["message"] = "Product deleted fialed";

            header("Location:" . BASEURL . "admin/products");
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
        unset($_SESSION['adminuser']);
        header('location:' . BASEURL . 'admin');
    }
}
