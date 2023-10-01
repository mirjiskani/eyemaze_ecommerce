<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="<?= BASEURL ?>assets/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .container {
            left: 50%;
            top: 50%;
            margin-left: -20%;
            position: absolute;
            margin-top: -15%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Admin Login</h3>
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
        <?php }?>
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['message']);
        ?>
        <form action="<?= isset($this->uriSegments[FUNC]) ? 'doLogin' : '' . BASEURL . 'admin/doLogin' ?>" id="form_login" method="post">
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
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
</body>

</html>