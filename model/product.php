<?php
include_once('database/database.php');
class productModel
{
    private $dbObj;
    public function __construct()
    {
        $this->dbObj = new DBConnect();
        $this->dbObj->CreateConnection();
    }

    public function addProduct($uploadFilePath)
    {
        $escap_name = mysqli_real_escape_string($this->dbObj->con, $_POST['name']);
        $escap_description = mysqli_real_escape_string($this->dbObj->con, $_POST['description'] );
        $escap_path = mysqli_real_escape_string($this->dbObj->con, $uploadFilePath);
        
        $sql = "INSERT INTO eyemaze_ecommerce.products (`product_name`, `product_description`, `price`,`product_image`,`status`)
        VALUES ('" . $escap_name  . "','" . $escap_description . "'," . $_POST['price'] . ",'" . $escap_path . "',1)";
        return $this->dbObj->query_exe($sql);
    }
  
    public function updateProduct()
    {
    }
    public function deleteProduct()
    {
        $sql = "DELETE FROM eyemaze_ecommerce.products WHERE `idproducts` = ".$_GET['id']."";
        return $this->dbObj->query_exe($sql);
    }
    public function fetchProduct()
    {
        $sql = "SELECT * FROM eyemaze_ecommerce.products";
        return $this->dbObj->fetch_all($sql);

    }
}
