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
        $orderSql = "INSERT INTO eyemaze_ecommerce.orders (`userid`, `ispaid`, `paymentid`) VALUES (1,0,0)";
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
        $createPaymentSql = "INSERT INTO eyemaze_ecommerce.payments (`transectionid`, `amount`, `currency`,`status`,`date`,`cardholder`,`cardno`) VALUES ('" . $data['tid'] . "'," . $data['amount'] . ",'" . $data['currency'] . "','" . $data['status'] . "','" . $data['datetime'] . "','" . $data['card_holder_name'] . "','" . $data['cardno'] . "')";

        $paymentId = $this->dbObj->createGetId($createPaymentSql);
        $orderId  = $data['orderId'];
        $updateOrderStatus = "UPDATE eyemaze_ecommerce.orders SET `ispaid` = '" . $data['status'] . ", `paymentid`= " . $paymentId . " WHERE `idorders`=" . $orderId . "";
        return $this->dbObj->query_exe($updateOrderStatus);
    } // end of creating payment and updadating status 
}
