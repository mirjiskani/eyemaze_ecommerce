<?php  //$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'; 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item login">
        <a class="nav-link" href="login">Login</a>
      </li>
      <li class="nav-item">

        <a class="nav-link" href="javascript:void(0)">
          <?php
          $styl = '';
          $items = 0;
          $totalPrice = 0;
          if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $record) {
              $items = $items + $record['qty'];
            }
            $styl = 'style="display:block"';
          } else {
            $styl = 'style="display:none"';
          }
          ?>
          <span class='badge badge-warning fa-beat-fade fa-lg countSpan' <?= $styl ?> id='lblCartCount'> <?= $items ?> </span>
          <i class="fa-solid fa-cart-shopping fa-beat-fade fa-lg" id="cart" style="color: #0c9d37;"></i></a>
      </li>
    </ul>
    <div class="shopping-cart">
      <div class="shopping-cart-header">
        <i class="fa fa-shopping-cart cart-icon"><span class="badgeDropdown"> <?= $items ?></span>
        </i>
        </a>
        <div class="shopping-cart-total">
          <span class="lighter-text">Total:</span>
          <span class="main-color-text total">$461.15</span>
        </div>
      </div> <!--end shopping-cart-header -->

      <ul class="shopping-cart-items">
        <?php if (isset($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $key => $record) {
        ?>
            <li class="clearfix" id="itemLi_<?= $key ?>">
              <input type="hidden" name="idproducts" value="<?= $key ?>">
              <div class="removeCartItem">
                <a href="javascript:void(0)" class="deleteCartItem"><i class="fa-solid fa-circle-xmark" style="color: #ff0505;"></i></a>
              </div>
              <img src="<?= $record['image'] ?>" width="100" height="100" alt="item1" />
              <span class="item-name"><?= $record['name'] ?></span>
              <br />
              <span class="item-detail"><strong>Description: </strong> <?= $record['description'] ?></span>
              <br />
              <span class="item-price"><strong>Price: </strong> $<?= $record['price'] ?></span>
              <br />
              <span class="item-quantity"><strong>Quantity:</strong> <?= $record['qty'] ?></span>
            </li>

        <?php
          }
        }
        ?>
      </ul>

      <a href="#" class="button">Checkout <i class="fa fa-chevron-right"></i></a>
    </div> <!--end shopping-cart -->
  </div>
</nav>