<?php require_once APPROOT . "/views/inc/Header.php"; ?>
<?php require_once APPROOT . "/views/inc/Nav.php"; ?>

<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-md-3">
            <!-- SideBar start -->
            <div class="card rounded-0">
                <div class="card-header">
                    <h2>Category</h2>
                </div>
                <div class="card-block">
                    <!-- SideBar Menu start -->
                    <ul class="list-group">
                            <?php foreach($data['cats'] as $cat) : ?>
                                <li class="list-group-item rounded-0 d-flex justify-content-between">
                                    <span class="english"><?php echo $cat->name; ?></span>
                                    <span>
                                        <a href="<?php echo URLROOT . 'category/edit/' . $cat->id; ?>" class="english">
                                            <i class="fa fa-edit text-warning"></i>
                                        </a>
                                        <a href="<?php echo URLROOT . 'category/delete/' . $cat->id; ?>" class="english">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </span>
                                </li>
                            <?php endforeach ; ?>
                    </ul>
                    <!-- SideBar Menu end -->
                </div>
            </div>
            <!-- SideBar end -->
        </div>
        <div class="col-md-5 offset-md-2 my-5">
                <!-- login form stat -->
                    <?php flash('register_success'); ?>
                    <?php flash('login_fail'); ?>
                    <h1 class="english text-info text-center mb-3">Edit Category</h1>
                    <form  action="<?php echo URLROOT . 'category/edit' ?>" method='post' class="table-bordered p-5">
                        <div class="form-group">
                            <label for="name" class="english">Category Name</label>
                            <input type="text" class="form-control english rounded-0 <?php echo !empty($data['name_err']) ? 'is-invalid' : ''; ?>" 
                            id="name" name="name"  placeholder="Category Name" value="<?php echo $data['currentCat']->name; ?>">
                            <span class="text-danger english"><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
                        </div>
                        <div class="row justify-content-end no-gutters">
                            <div>
                                <button class="btn btn-outline-secondary english">Cancle</button>
                                <button class="btn btn-primary english">Update</button>
                            </div>
                        </div>
                    </form>
                <!-- login form end -->
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/Footer.php"; ?>
