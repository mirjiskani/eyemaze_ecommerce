<?php

require('model/order.php');
// Include STRIPE PHP Library
require_once('stripe-php/init.php');
class orderController
{
    private $orderModel;
    private $uriSegments;
    private $stripe;


    public function __construct()
    {
        $this->orderModel = new orderModel();
        $this->uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        //  $this->stripe =new \Stripe\StripeClient('sk_test_BQokikJOvBiI2HlWgH4olfQ2'); ;

    }
    public function checkout()
    {
        include('views/checkout.php');
    }
    public function placeOrder()
    {
        if (isset($_SESSION['cart']) && isset($_POST['orderPlaced'])) {
            $orderId = $this->orderModel->createOrder();
            $token = $_POST['stripeToken'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            $cardHolderName = $_POST['cardname'];
            $card_no = $_POST['cardnumber'];
            $card_cvc = $_POST['cvv'];
            $card_exp_month = $_POST['expmonth'];
            $card_exp_year = $_POST['expyear'];


            // set API Key
            $stripe = array(
                "SecretKey" => "sk_test_51Nw3QzEIWDW8VKN7MpyHWATymsyQW49LRyT7Jvj8UH75brydGP81c9sRLsmLUXKm8OvXGMGGyrRmDS4WKvvOCBWD00ypuOjukn",
            );

            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey($stripe['SecretKey']);

            // Add customer to stripe 
            $customer = \Stripe\Customer::create(array(
                'email' => $email,
                'source'  => $token,
                'name' => $name,
                'description' => 'Placing order from eyemaze ecommerce'
            ));

            $totalPrice = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $record) {
                    $price = (float)$record['price'] * (int)$record['qty'];
                    $totalPrice = $totalPrice + $price;
                }
            }
            // Convert price to cents 
            $currency = "usd";

            // Charge a credit or a debit card 
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => (float)$totalPrice,
                'currency' => $currency,
                'description' => 'Placing order from eyemaze ecommerce',
                'metadata' => array(
                    'order_id' => $orderId
                )
            ));

            // Retrieve charge details 
            $chargeJson = $charge->jsonSerialize();

            // Check whether the charge is successful 
            if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {

                // Order details 
                $payment_status = $chargeJson['status'];
                $data = array(
                    'tid' => $chargeJson['id'],
                    'amount' => $chargeJson['amount'],
                    'currency' => $chargeJson['currency'],
                    'status' => $chargeJson['status'],
                    'datetime' => date("Y-m-d H:i:s"),
                    'card_holder_name' => $cardHolderName,
                    'cardno' => $card_no,
                    'orderId' => $orderId
                );
                $this->orderModel->createPyamentDetailUpdateOrderStatus($data);
                // If the order is successful 
                if ($payment_status == 'succeeded') {
                    unset($_SESSION['cart']);
                    $_SESSION["status"] = 1;
                    $_SESSION["message"] = "Your Payment has been Successful! Order placed will contact you in in working hours.";

                    header("Location:" . BASEURL . "order/checkout");
                } else {
                    $_SESSION["status"] = 0;
                    $_SESSION["message"] = "Your Payment failed.";

                    header("Location:" . BASEURL . "order/checkout");
                }
            } else {
                $_SESSION["status"] = 0;
                $_SESSION["message"] = "Transaction has been failed!";
                header("Location:" . BASEURL . "order/checkout");
            }
        } else {
            $_SESSION["status"] = 0;
            $_SESSION["message"] = "No item found in your cart please purchase one item at least";
            header("Location:" . BASEURL . "order/checkout");
        }
    } //place Order 
}
