<?php
include_once('layouts/header.php')
?>

<body>
    <?php
    include_once('layouts/_navbar.php')
    ?>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 1) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> <?= $_SESSION['message'] ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 0) { ?>
                    <div class="alert alert-danger alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Danger!</strong> <?= $_SESSION['message'] ?>
                    </div>
                <?php } ?>
                <?php
                unset($_SESSION['status']);
                unset($_SESSION['message']);
                ?>
                <form action="<?= isset($this->uriSegments[FUNC]) ? 'placeOrder' : 'order/placeOrder' ?>" id="payment-form" method="post">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="name" required placeholder="John M. Doe">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="emailAddress" required name="email" placeholder="john@example.com">
                            <span id="errorEmailAddress"></span>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="customerAddress" required name="address" placeholder="542 W. 15th Street">
                            <span id="errorCustomerAddress"></span>

                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="customerCity" required name="city" placeholder="New York">
                            <span id="errorCustomerCity"></span>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" required name="state" placeholder="NY">

                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="customerZipcode" required name="zip" placeholder="10001">
                                    <span id="errorCustomerZipcode"></span>

                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="customerName" required name="cardname" placeholder="John More Doe">
                            <span id="errorCustomerName"></span>
                            <span id="errorCardNumber"></span>
                            <label for="ccnum">Credit card number</label>
                            <input type="number" class="creditCardNum" id="cardNumber" required name="cardnumber" min="18" placeholder="1111-2222-3333-4444">
                            <span id="errorCardNumber"></span>
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="cardExpMonth" required name="expmonth" placeholder="September">
                            <span id="errorCardExpMonth"></span>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="cardExpYear" required name="expyear" placeholder="2018">
                                    <span id="errorCardExpYear"></span>
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cardCVC" required name="cvv" placeholder="352">
                                    <span id="errorCardCvc"></span>
                                </div>
                            </div>
                        </div>
                        <label class="pl-4">
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                        <button id="payNow" value="Pay Now" class="btn"> Pay Now</button>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-25">
            <div class="cartDetail">
                <h4>Cart</h4>
                <hr>
                <?php
                $total = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $record) {
                        $total = $total + $record['price'] * $record['qty'];
                ?>
                        <p><a href="javascript:void(0)" style="text-decoration: none;"> <?= $record['name']; ?></a> <span class="price">$<?= $record['price'] * $record['qty']; ?></span></p>
                <?php
                    }
                }
                ?>
                <hr>
                <p>Total <span class="price" style="color:black"><b>$<?= $total ?></b></span></p>
            </div>
        </div>
    </div>

</body>
<script src="https://js.stripe.com/v2/"></script>
<script src="<?= BASEURL ?>assets/creditCardValidator.js"></script>
<script src="<?= BASEURL ?>assets/payment.js"></script>