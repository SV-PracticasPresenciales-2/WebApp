<?php
include("header.php");
include_once '../controller/userController.php';
include_once '../controller/postUserController.php';

?>
<div class="container column justify-content-center mb-1">
    <div class="container-sm text-center justify-content-center w-25 mt-5">
        <div class="row justify-content-center mb-1">
            <h2>
                User Details:
            </h2>
            <table id="mytable" class="table table-bordred table-striped">

                <thead>

                <th>Username</th>
                <th>Biography</th>

                </thead>
                <tbody>
                        <tr>
                            <td><?php echo $user->getUsername(); ?></td>
                            <td><?php echo $user->getBiography(); ?></td>
                        </tr>
                </tbody>

            </table>
        </div>

    </div>

        <div class="row">


            <div class="col-md-12">
                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>

                        <th>Message</th>
                        <th>Likes</th>
                        <th>Post date</th>

                        </thead>
                        <tbody>

                        <?php
                        if ($posts != null) {
                        foreach ($posts as $post): ?>
                            <tr>
                                <td><?php echo $post['message'] ?></td>
                                <td><?php echo $post['likes'] ?></td>
                                <td><?php echo $post['post_date'] ?></td>
                            </tr>
                        <?php endforeach;
                        }
                        ?>
                        </tbody>

                    </table>

                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
</div>
</body>
</html>