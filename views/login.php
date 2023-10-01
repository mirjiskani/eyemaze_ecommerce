<?php
include_once('layouts/header.php')
?>

<body>
    <?php
    include_once('layouts/_navbar.php')
    ?>
    <div class="container">
        <h3>User Login</h3>
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
        <form action="<?= isset($this->uriSegments[FUNC]) ? 'doLogin' : 'login/doLogin' ?>" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Email...">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Password</label>
                </div>
                <div class="col-75">
                    <input type="password" id="password" name="password" placeholder="password">
                </div>
            </div>
            <div class="row form-buttons">
                <a href="<?= BASEURL . 'register' ?>">New User</a>
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
</body>
<?php
include_once('layouts/footer.php')
?>