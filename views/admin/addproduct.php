<?= include('header.php') ?>
<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <h1> Product Detail</h1>
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
        <form action="<?= isset($this->uriSegments[FUNC]) ? 'addproduct' : 'admin/addproduct' ?>" method="POST" enctype="multipart/form-data">
            <div class="formbold-input-flex">
                <div>
                    <input type="text" name="name" id="firstname" placeholder="Product Name" class="formbold-form-input" />
                    <label for="firstname" class="formbold-form-label"> Product Name </label>
                </div>
                <div>
                    <input type="number" name="price" id="lastname" placeholder="Product Price" class="formbold-form-input" />
                    <label for="lastname" class="formbold-form-label"> Price</label>
                </div>
            </div>
            <div class="formbold-textarea">
                <textarea rows="6" name="description" id="message" placeholder="Product description." class="formbold-form-input"></textarea>
                <label for="message" class="formbold-form-label"> Description </label>
            </div>

            <div class="input-file">
                <label for="upload" class="formbold-input-label">
                    Product Image
                    <input type="file" name="product_image" id="upload">
                </label>
            </div>

            <button type="submit" name="submit" class="formbold-btn">
                Submit
            </button>
        </form>
    </div>
</div>
<?= include('footer.php') ?>