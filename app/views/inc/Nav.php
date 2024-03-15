<div class="container-fluid bg-dark">
    <nav class="container navbar navbar-expand-md navbar-light ">
        <a class="navbar-brand text-white english" href="<?php echo URLROOT;?>">
            <img class="ml-3" src="<?php echo  URLROOT.'/assests/imgs/logo.jpg'   ?>" width="40" height="40" alt="" class="rounded">
            <span class="english p-3">First Code</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <?php if(getUserSession()) : ?>
                    <?php if(getUserSession()->name=='kyi lynn ko'): ?>
                        <li class="nav-item ">
                            <a class="nav-link text-white english" href="<?php echo URLROOT . 'admin/home'; ?>">Admin Panel</a>
                        </li>
                    <?php else:?>
                        <?php ?>
                    <?php endif; ?>
                
                <?php endif;?>
                <li class="nav-item">
                    <a class="nav-link text-white english" href="#">Features</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white english" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php if(getUserSession() != false) : ?>
                            <?php echo getUserSession()->name; ?>
                        <?php else : ?>
                            Member
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu">
                        <?php if(getUserSession() != false) : ?>
                            <a class="dropdown-item english" href="<?php echo URLROOT . 'user/logout' ?>">Logout</a>
                        <?php else : ?>
                            <a class="dropdown-item english" href="<?php echo URLROOT . 'user/login' ?>">Login</a>
                            <a class="dropdown-item english" href="<?php echo URLROOT . 'user/register' ?>">Register</a>
                        <?php endif; ?>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white english" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Languages
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item english" href="#">PHP</a>
                        <a class="dropdown-item english" href="#">Python</a>
                        <a class="dropdown-item english" href="#">MEAN</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</div>