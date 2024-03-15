<?php require_once APPROOT . "/views/inc/Header.php"; ?>
<?php require_once APPROOT . "/views/inc/Nav.php"; ?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-light p-5">
                <!-- register form stat -->
                    <h1 class="english text-info text-center mb-3">Register To Post</h1>
                    <form action="<?php echo URLROOT . 'user/register' ?>" method='post'>
                        <div class="form-group">
                            <label for="name" class="english">Username</label>
                            <input type="text" class="form-control english rounded-0 <?php echo !empty($data['name_err']) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Username">
                            <span class="text-danger english"><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="english">Email</label>
                            <input type="email" class="form-control english rounded-0 <?php echo !empty($data['email_err']) ? 'is-invalid' : ''; ?>" id="email" name="email"  placeholder="Email">
                            <span class="text-danger english"><?php echo !empty($data['email_err']) ? $data['email_err'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="english">Password</label>
                            <input type="password" class="form-control english rounded-0 <?php echo !empty($data['password_err']) ? 'is-invalid' : ''; ?>" id="password" name="password"  placeholder="password">
                            <span class="text-danger english"><?php echo !empty($data['password_err']) ? $data['password_err'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="english">Confirm Password</label>
                            <input type="password" class="form-control english rounded-0 <?php echo !empty($data['confirm_password_err']) ? 'is-invalid' : ''; ?>" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                            <span class="text-danger english"><?php echo !empty($data['confirm_password_err']) ? $data['confirm_password_err'] : ''; ?></span>
                        </div>
                        <div class="row justify-content-between no-gutters">
                            <a href="<?php echo URLROOT . 'user/login' ?>"class="english">Already Register, Please Login</a>
                            <div>
                                <button class="btn btn-outline-secondary english">Cancle</button>
                                <button class="btn btn-primary english">Register</button>
                            </div>
                        </div>
                    </form>
                <!-- register form end -->
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/Footer.php"; ?>
