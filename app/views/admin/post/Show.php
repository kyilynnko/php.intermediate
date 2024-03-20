<?php require_once APPROOT . "/views/inc/Header.php"; ?>
<?php require_once APPROOT . "/views/inc/Nav.php"; ?>

<div class="container-fluid">
    <div class="contianer  my-5">
        <?php flash('pes'); ?>
        <div class="col-md-8 offset-md-2 mb-3">
            <div class="row no-gutters justify-content-between ">
                <a href="<?php echo URLROOT . 'post/home/' . $data['post']->cat_id; ?>" class="btn btn-primary"><- Back</a>
                <a href="<?php echo URLROOT . 'post/edit/' . $data['post']->id; ?>" class="btn btn-primary">Edit</a>
            </div>
        </div>
        <div class="col-md-8 offset-md-2">
            <div class="card ">
                <div class="card-header">
                    <h6 class="english"><?php echo $data['post']->title; ?></h6>
                </div>
                <div class="card-body">
                    <img src="<?php echo URLROOT . 'assets/uploads/' . $data['post']->image; ?>" alt="">
                    <p>
                        <?php echo $data ['post']->content; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once APPROOT . "/views/inc/Footer.php"; ?>
