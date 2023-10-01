<?php

require_once ('traits/upload.php');
require_once ('model/Product.php');
require_once ('model/user.php');
require_once ('model/order.php');
class adminController
{
    use uploadImage;
    private $productModel;
    private $uriSegments;
    private $products = ['products', 'addproduct', 'deleteProduct'];
    private $users = ['doLogin', 'users'];
    private $orders = ['orders', 'ordersDetails'];
    private $userModel;
    private $orderModel;
    public function __construct()
    {
        $this->uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        if (in_array($this->uriSegments[FUNC], $this->products)) {
            $this->productModel = new productModel();
        }

        if (in_array($this->uriSegments[FUNC], $this->users)) {
            $this->userModel = new userModle();
        }

        if (in_array($this->uriSegments[FUNC], $this->orders)) {
            $this->orderModel = new orderModel();
        }
    }
    public function doLogin()
    {
        if (isset($_POST['submit'])) {
            $user = $this->userModel->hasUser();
            if (!empty($user)) {
                $hash_passowrd =  $this->userModel->escaped_passowrd(password_hash($_POST['password'], PASSWORD_DEFAULT));

                $verify = password_verify($hash_passowrd, $user['password']);
                if ($verify) {
                    $_SESSION['userdata'] = $user;
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
                $_SESSION["status"] = 1;
                $_SESSION["message"] = "Product added successfully";
                header("Location:" . BASEURL . " products");
            } else {
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "Product added fialed";
                header("Location:" . BASEURL . " products");
            }
        } else {
            include('views/admin/addproduct.php');
        }
    }
    public function deleteProduct()
    {
        $queryReuslt = $this->productModel->deleteProduct();
        if ($queryReuslt) {
            $_SESSION["status"] = 1;
            $_SESSION["message"] = "Product deleted successfully";

            header("Location:" . BASEURL . " products");
        } else {
            $_SESSION["status"] = 0;
            $_SESSION["message"] = "Product deleted fialed";

            header("Location:" . BASEURL . " products");
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
