<?php
include_once('layouts/header.php')
?>

<body>
    <?php
    include_once('layouts/_navbar.php')
    ?>
    <div class="container">
        <h3>Admin Login</h3>
        <form action="<?= BASEURL . 'admin/doLogin' ?>">
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
                <input type="button" value="Login">
            </div>
        </form>
    </div>
</body>
<?php
include_once('layouts/footer.php')
?>