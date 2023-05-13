<?php
include("header.php");
include_once '../controller/postController.php';
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <div class="row justify-content-center mb-1">
        <h3>List posts
    </div>

</div>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <?php
    foreach ($posts
             as
             $post): ?>
        <div class="row justify-content-center mb-1">


            <div class="row justify-content-center mb-1">
                <div class="col">
                    Username:<?php echo $userController->getName($post['post_user'])['username'] ?></td>
                </div>
                <div class="col">
                    Mensaje:<?php echo $post['message'] ?></td>
                </div>
                <div class="col">
                    <a href="detailsUser.php?id=<?php echo $post['post_user']?>" class="btn btn-info" type="button">User Details</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>