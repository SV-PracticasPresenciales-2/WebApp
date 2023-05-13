<?php
require_once '../model/post.php';
include_once '../controller/userController.php';


class postController
{
    private post $post;
    public function __construct()
    {
        $this->post= new post(0, 0, " ", "", 0);
    }

    public function listPosts()
    {
        return $this->post->messages();
        //include '../view/listPosts.php';
        //return $posts;
    }

}
$userController = new userController();
$controller = new postController();
$posts = $controller->listPosts();