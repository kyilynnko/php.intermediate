<?php require_once APPROOT . "/views/inc/Header.php"; ?>
<?php require_once APPROOT . "/views/inc/Nav.php"; ?>

<?php echo $data;?>
<div class="container-fluid">
    <div class="container my-2">
        <?php flash('del_fail'); ?>
        <a href="<?php echo URLROOT . 'post/create'; ?>" class = "btn btn-primary mb-2 english">Create</a>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <?php foreach($data['cats'] as $cat) : ?>
                        <li class="list-group-item rounded-0">
                            <a href="<?php echo URLROOT . 'post/home/' . $cat->id;?>"><?php echo $cat->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-8">
                <!-- Post card start -->
                <?php foreach($data['posts'] as $post) : ?>
                    <div class="card rounded-0 mb-3">
                        <div class="card-header rounded-0 bg-dark text-white rounded-0">
                            <h6><?php echo $post->title; ?></h6>
                        </div>
                        <div class="card-block p-2">
                            <p><?php echo $post->description; ?></p>
                            <div class="row justify-content-end no-gutters">
                                <a href="<?php echo URLROOT . 'post/show/' . $post->id; ?>" class="english btn btn-success btn-sm text-white">Detail</a>
                                <a href="<?php echo URLROOT . 'post/edit/' . $post->id; ?>"  class="english btn btn-warning btn-sm text-white ml-2">Edit</a>
                                <a href="<?php echo URLROOT . 'post/delete/' . $post->id; ?>"  class="english btn btn-danger btn-sm text-white ml-2">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Post card end -->
            </div>
        </div>
    </div>
</div>




<?php require_once APPROOT . "/views/inc/Footer.php"; ?>