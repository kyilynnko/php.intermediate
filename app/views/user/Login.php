<?php require_once APPROOT . "/views/inc/Header.php"; ?>
<?php require_once APPROOT . "/views/inc/Nav.php"; ?>


<div class="container-fluid">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-light p-5">
                <!-- login form stat -->
                    <?php flash('register_success'); ?>
                    <?php flash('login_fail'); ?>
                    <h1 class="english text-info text-center mb-3">Login To Post</h1>
                    <form  action="<?php echo URLROOT . 'user/login' ?>" method='post'>
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
                        <div class="row justify-content-between no-gutters">
                            <a href="<?php echo URLROOT . 'user/register' ?>"class="english">Not a user yet!, Please Register</a>
                            <div>
                                <button class="btn btn-outline-secondary english">Cancle</button>
                                <button class="btn btn-primary english">Login</button>
                            </div>
                        </div>
                    </form>
                <!-- login form end -->
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/Footer.php"; ?>
