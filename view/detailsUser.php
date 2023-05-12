<?php
include("header.php");
include_once '../controller/userController.php';
//include_once '../controller/postUserController.php';
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <div class="row justify-content-center mb-1">
        <div class="col">
            Username:<?php echo $user->getUsername(); ?></td>
        </div>
        <div class="col">
            Biography:<?php echo $user->getBiography(); ?></td>
        </div>
    </div>
</div>
</body>
</html>
