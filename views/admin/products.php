<?= include('header.php') ?>
<div class="prodAddBtn">
    <a href="addproduct">Add Product</a>
</div>
<h3>Products Listing</h3>
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
<table id="listingTable">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php if (!empty($result)) : ?>
        <?php foreach ($result as $record) : ?>
            <?php
            $status = ['In Active', 'Active']
            ?>
            <tr>
                <td><?= $record['product_name'] ?></td>
                <td><?= $record['product_description'] ?></td>
                <td><?= $record['price'] ?></td>
                <td><img src="<?= $record['product_image'] ?>" alt="Girl in a jacket" width="50" height="50"></td>
                <td><?= $status[$record['status']] ?></td>
                <td class="actionTd"><button class="btn btn-primary">Update</button><a href="deleteProduct?id=<?= $record['idproducts']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach ?>
    <?php else : ?>
        <tr>
            <td colspan="6">No products</td>
        </tr>
    <?php endif ?>


</table>

<?= include('footer.php') ?>