<?php require_once APPROOT . "/views/inc/Header.php"; ?>
<?php require_once APPROOT . "/views/inc/Nav.php"; ?>

<div class="container-fluid">
    <div class="contianer my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card p-5">
                <!-- register form stat -->
                    <h1 class="english text-info text-center mb-3">Create A Post</h1>
                    <form action="<?php echo URLROOT . 'post/create' ?>" method='post' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cat_id" class="english">Post Category</label>
                            <select class="form-control english" id="cat_id" name="cat_id">
                                <?php foreach($data['cats'] as $cat) : ?>
                                    <option value="<?php echo $cat->id; ?>" class="english"><?php echo $cat->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title" class="english">Title</label>
                            <input type="text" class="form-control english rounded-0 <?php echo !empty($data['title_err']) ? 'is-invalid' : ''; ?>" id="title" name="title">
                            <span class="text-danger english"><?php echo !empty($data['title_err']) ? $data['title_err'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="description" class="english">Post Description</label>
                            <textarea class="form-control rounded-0 <?php echo !empty($data['description_err']) ? 'is-invalid' : ''; ?>" id="description" name="description" rows="2"></textarea>
                            <span class="text-danger english"><?php echo !empty($data['description_err']) ? $data['description_err'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="file" class="english">File input</label>
                            <input type="file" class="form-control-file english bg-secondary text-white <?php echo !empty($data['file_err']) ? 'is-invalid' : ''; ?>" id="file" name="file">
                            <span class="text-danger english"><?php echo !empty($data['file_err']) ? $data['file_err'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="content" class="english">Post Content</label>
                            <textarea class="form-control rounded-0 <?php echo !empty($data['content_err']) ? 'is-invalid' : ''; ?>" id="content" name="content" rows="5"></textarea>
                            <span class="text-danger english"><?php echo !empty($data['content_err']) ? $data['content_err'] : ''; ?></span>
                        </div>
                        <div class="row justify-content-end no-gutters">
                            <div>
                                <button class="btn btn-outline-secondary english">Cancle</button>
                                <button class="btn btn-primary english">Post</button>
                            </div>
                        </div>
                    </form>
                <!-- register form end -->
            </div>

        </div>
    </div>
</div>


<?php require_once APPROOT . "/views/inc/Footer.php"; ?>
