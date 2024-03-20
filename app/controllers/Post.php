<?php
class Post extends Controller{
    private $postModel;
    private $catModel;

    public function __construct()
    {
        $this->postModel = $this->model("PostModel");
        $this->catModel = $this->model("CategoryModel");
    }

    public function home($params = [])
    {
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        $data['cats'] = $this->catModel->getAllCategory();
        $data['posts'] = $this->postModel->getPostByCatId($params[0]);
        $this->view("admin/post/home",$data);
    }

    public function create()
    {
        $data = [
            'title' => '',
            'description' => '',
            'file' => '',
            'content' => '',
            'title_err' => '',
            'description_err' => '',
            'file_err' => '',
            'content_err' => '',
            'cats' => ''
        ];
        $data['cats'] = $this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $root = dirname(dirname(dirname(__FILE__)));
            $files = $_FILES['file'];

            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            // $data['file'] = $_POST['file'];
            $data['content'] = $_POST['content'];

            if(empty($data['title'])){
                $data['title_err'] = "Title must supply!";
            }
            if(empty($data['description'])){
                $data['description_err'] = "Description must supply!";
            }
            // if(empty($_FILES['file'])){
            //     $data['file_err'] = "File must supply!";
            // }
            if(empty($data['content'])){
                $data['content_err'] = "Content must supply!";
            }            

            if(empty($data['title_err']) && empty($data['description_err']) && empty($data['content_err']) && isset($_POST['post'])){
                if(!empty($files['name'])){
                    move_uploaded_file($files['tmp_name'] , $root . '/public/assets/uploads/' . $files['name']);
                    if($this->postModel->insertPost($_POST['cat_id'] , $data['title'] , $data['description'] , $files['name'] , $data['content'])){
                        flash('pis','Post Insert Successfully.');
                        redirect(URLROOT . "post/home/1");
                    }else{
                        $this->view("admin/post/create",$data);
                    }
                }else{
                    $this->view("admin/post/create",$data);
                }
            }else{
                $this->view('admin/post/create',$data);
            }
        }else{
            $this->view('admin/post/create',$data);
        }
    }

    public function show($params = [])
    {
        $post = $this->postModel->getPostById($params[0]);
        $this->view('admin/post/show',['post' => $post]);
    }

    public function edit($params = [])
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'title' => '',
                'description' => '',
                'file' => '',
                'content' => '',
                'title_err' => '',
                'description_err' => '',
                'file_err' => '',
                'content_err' => '',
                'cats' => ''
            ];
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $root = dirname(dirname(dirname(__FILE__)));
                $files = $_FILES['file'];
                $filename = $_FILES['file']['name'];

                $data['title'] = $_POST['title'];
                $data['description'] = $_POST['description'];
                $data['content'] = $_POST['content'];

                if(empty($data['title'])){
                    $data['title_err'] = "Title must supply!";
                }
                if(empty($data['description'])){
                    $data['description_err'] = "Description must supply!";
                }
                if(empty($data['content'])){
                    $data['content_err'] = "Content must supply!";
                }            

                if(empty($data['title_err']) && empty($data['description_err']) && empty($data['content_err']) && isset($_POST['edit'])){
                    if(!empty($files['name'])){
                        move_uploaded_file($files['tmp_name'] , $root . '/public/assets/uploads/' . $files['name']);
                    }else{
                        $filename = $_POST['old_file'];
                    }
                    $curId = getCurrentId();
                    deleteCurrentId();
                    if($this->postModel->updateData($curId, $_POST['cat_id'], $data['title'], $data['description'], $filename, $data['content'])){
                        flash("pes","Post Edit Success, Thank");
                        redirect(URLROOT . 'post/show/' . $curId);
                    }else{
                        flash("pef","Post Edit Fail, Try Again!");
                        redirect(URLROOT . 'post/edit/' . $curId);
                    }
                }else{
                    $curId = getCurrentId();
                    deleteCurrentId();
                    redirect(URLROOT . 'post/edit/' . $curId);


                }
        }else{
            setCurrentId($params[0]);
            $data['cats'] = $this->catModel->getAllCategory();
            $data['post'] = $this->postModel->getPostById($params[0]);
            $this->view('admin/post/edit',$data);
        }

    }

    public function delete($params = [])
    {
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        if($this->postModel->deletePost($params[0])){
            redirect(URLROOT . 'post/home/1');
        }else{
            flash('del_fail',"Post Delete Fail!");
            $data['cats'] = $this->catModel->getAllCategory();
            $data['posts'] = $this->postModel->getPostByCatId($params[0]);
            $this->view("admin/post/home",$data);
        }
    }
}
?>