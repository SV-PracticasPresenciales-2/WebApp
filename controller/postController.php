<?php
require_once 'model/post.php';


class postController
{
    private post $post;
    public function __construct()
    {
        $this->post= new post(0, 0, " ", "", 0);
    }

    public function listPosts()
    {
        $posts = $this->post->messages();
        include 'view/listPosts.php';
        //return $posts;
    }

}





//$controller = new postController();
//$posts = $controller->listPosts();