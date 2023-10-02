<?php
require('layouts/header.php');
?>

<body>
    <?php include('layouts/_navbar.php'); ?>
    <div class="row productListing" style="padding: 180px !important;padding-top: 17px !important; margin-left:20px;">
        <?php if (!empty($result)) : ?>
            <?php foreach ($result as $record) : ?>
                <div class="card">
                    <img src="<?= $record['product_image'] ?>" width="300" height="300">
                    <input type="hidden" class="idproducts" name="idproducts" value="<?= $record['idproducts']; ?>">
                    <h4><?= $record['product_name'] ?></h4>
                    <input type="hidden" class="productName" name="product_name" value="<?= $record['product_name']; ?>">
                    <p class="price">$<?= $record['price'] ?></p>
                    <input type="hidden" class="productPrice" name="price" value="<?= $record['price'] ?>">
                    <p class="prodDescription"><?= $record['product_description'] ?></p>
                    <input type="hidden" class="productDescription" name="description" value="<?= $record['product_description'] ?>">
                    <div><label> QTY : </label><input class="qtyInput" name="qty" type="number" min="0" name="qty" value=""></div>
                    <input type="hidden" class="productPrice" name="productImage" value="<?= $record['product_image'] ?>">
                    <p><button class="addToCart">Add to Cart</button></p>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <div class="card">
                <p>NO products found.</p>
            </div>
        <?php endif ?>
    </div>

</body>
<?php
require('layouts/footer.php');

?>