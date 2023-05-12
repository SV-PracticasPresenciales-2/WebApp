<?php
require_once '../model/post.php';


class PostUserController
{

    private post $post;

    public function __construct()
    {
        $this->post = new post(0, 0, " ", "", 0);
    }

    public function getPostFromUser($id)
    {
        return $this->post->getPostFromUser($id);

    }

}
$controller = new PostUserController();
if (isset($_GET["id"])){
    $posts = $controller -> getPostFromUser($_GET["id"]);

}


