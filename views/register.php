<?php
include_once('layouts/header.php')
?>

<body>
    <?php
    include_once('layouts/_navbar.php')
    ?>
    <div class="container">
        <h3>User Registration</h3>
        <?php if (isset($message) && $message['status'] === 1) { ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> <?= $message['message'] ?>
            </div>
        <?php } ?>
        <?php if (isset($message) && $message['status'] === 0) { ?>
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Danger!</strong> <?= $message['message'] ?>
            </div>
        <?php } ?>
        <form action="register/doRegister" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="fname">First Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" required name="firstname" placeholder="Your name..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Last Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" required name="lastname" placeholder="Your last name..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Email</label>
                </div>
                <div class="col-75">
                    <input type="email" id="lname" required name="email" placeholder="Your email..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Password</label>
                </div>
                <div class="col-75">
                    <input type="password" id="password" required name="password" placeholder="password">
                </div>
            </div>
            <div class="row form-buttons">
                <a href="<?= BASEURL . 'login' ?>">Already have account</a>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
<?php
include_once('layouts/footer.php')
?>