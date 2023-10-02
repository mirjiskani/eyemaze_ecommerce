<?php

require('database/database.php');
class orderModel
{
    private $dbObj;
    public function __construct()
    {
        $this->dbObj = new DBConnect();
        $this->dbObj->CreateConnection();
    }
    public function createOrder()
    {
        $userId = $_SESSION['userdata']['idusers'];
        $orderSql = "INSERT INTO eyemaze_ecommerce.orders (`userid`, `ispaid`, `paymentid`) VALUES (" . $userId . ",0,0)";
        $orderId = $this->dbObj->createGetId($orderSql);
        foreach ($_SESSION['cart'] as $key => $record) {
            $total = $record['price'] * $record['qty'];
            $orderDetailSql = "INSERT INTO eyemaze_ecommerce.orderdetail (`orderid`,`product_name`, `product_price`, `qty`,`total`,`product_id`) VALUES (" . $orderId . ",'" . mysqli_real_escape_string($this->dbObj->con, $record['name']) . "','" . $record['price'] . "'," . $record['qty'] . "," . $total . "," . $key . ")";
            $this->dbObj->query_exe($orderDetailSql);
        }
        return $orderId;
    }
    public function createPyamentDetailUpdateOrderStatus($data)
    {
        $createPaymentSql = "INSERT INTO eyemaze_ecommerce.payments (`transectionid`, `amount`, `currency`,`status`,`date`,`cardholder`,`cardno`,`address`,`city`,`state`,`country`) VALUES ('" . $data['tid'] . "'," . $data['amount'] . ",'" . $data['currency'] . "','" . $data['status'] . "','" . $data['datetime'] . "','" . $data['card_holder_name'] . "','" . $data['cardno'] . "','" . $data['address'] . "','" . $data['city'] . "','" . $data['state'] . "','" . $data['country'] . "')";

        $paymentId = $this->dbObj->createGetId($createPaymentSql);
        $orderId  = $data['orderId'];
        $updateOrderStatus = "UPDATE eyemaze_ecommerce.orders SET `ispaid` = '" . $data['status'] . "', `paymentid`= " . $paymentId . " WHERE `idorders`=" . $orderId . "";
        return $this->dbObj->query_exe($updateOrderStatus);
    } // end of creating payment and updadating status 
    public function fetchAll()
    {

        $sql = "SELECT * FROM eyemaze_ecommerce.orders
         LEFT JOIN eyemaze_ecommerce.users ON eyemaze_ecommerce.orders.userid=eyemaze_ecommerce.users.idusers
         LEFT JOIN eyemaze_ecommerce.payments ON eyemaze_ecommerce.orders.paymentid=eyemaze_ecommerce.payments.idpayment";
        return $this->dbObj->fetch_all($sql);
    } //end of fetch all
    public function fetchOrderDetail($oid)
    {
        $sql = "SELECT *,eyemaze_ecommerce.products.product_image FROM eyemaze_ecommerce.orders
        LEFT JOIN eyemaze_ecommerce.users ON eyemaze_ecommerce.orders.userid=eyemaze_ecommerce.users.idusers
        LEFT JOIN eyemaze_ecommerce.orderdetail ON eyemaze_ecommerce.orders.idorders=eyemaze_ecommerce.orderdetail.orderid
        LEFT JOIN eyemaze_ecommerce.payments ON eyemaze_ecommerce.orders.paymentid=eyemaze_ecommerce.payments.idpayment
        LEFT JOIN eyemaze_ecommerce.products ON  eyemaze_ecommerce.products.idproducts=eyemaze_ecommerce.orderdetail.product_id
        where eyemaze_ecommerce.orders.idorders = " . $oid;
        return $this->dbObj->fetch_all($sql);
    }
}
