<?php
include("header.php");
include_once '../controller/postController.php';
?>
<div class="container">
    <div class="row">


        <div class="col-md-12">
            <h4>Global Feed Posts</h4>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>

                    <th>Username</th>
                    <th>Message</th>
                    <th>Post date</th>
                    <th>Details</th>

                    </thead>
                    <tbody>

                    <?php
                    foreach ($posts
                    as
                    $post): ?>
                    <tr>
                        <td><?php echo $userController->getName($post['post_user'])['username'] ?></td>
                        <td><?php echo $post['message'] ?></td>
                        <td><?php echo $post['post_date'] ?></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="See details"><a href="detailsUser.php?id=<?php echo $post['post_user']?>" class="btn btn-info" type="button">User Details</a></p></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>

                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
</body>
</html>