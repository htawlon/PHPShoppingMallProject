<?php
include "user_auth.php";
include "admin-auth.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Mall </title>
    <link href="bts/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php  include "navbar.php";?>
<div class="container">
    <?php  include"message.php"?>
    <h4><i class="glyphicon glyphicon-link"></i>Categories</h4>
    <div class="row">
        <div class="col-sm-4">
         <div class="panel panel-default">
             <div class="panel panel-heading"> New Categories</div>
             <div class="panel panel-body">
                <form method="post" action="new-category.php">
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
             </div>
         </div>
        </div>
        <div class="col-sm-8">
         <div class="panel panel-default">
             <div class="panel panel-heading">Available</div>
             <div class="panel panel-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    include "post_config.php";
                    $post= new Post();
                    $cats= $post->getCategory();
                    foreach ($cats as $c){
                        ?>
                        <tr>
                            <td><?php echo $c['id'] ?></td>
                            <td><?php echo $c['cat_name'] ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#e<?php echo $c['id'] ?>" href="#"><i class="glyphicon glyphicon-edit"></i></a>
                                <!-- Modal -->
                                <div class="modal fade" id="e<?php echo $c['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <form method="post" action="update_category.php">
                                            <input type="hidden" name="id" value="<?php echo $c['id'] ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"> Edit category</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="cat_name">Category Name</label>
                                                        <input value="<?php  echo $c['cat_name']?>" type="text" name="cat_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                </form>


                                <a data-toggle="modal" data-target="#d<?php echo $c['id'] ?>" href="#" class="text-danger"><i class="glyphicon glyphicon-remove-circle"></i></a>
                                <div id="d<?php echo $c['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                           <div class="modal-header">Confirmation delete catergory.</div>
                                            <div class="modal-body text-center text-warning-sign">
                                                <i class="glyphicon glyphicon-warning-sign"></i>
                                                <p>
                                                    This will delete the category name of <strong>" <?php echo $c['cat_name']?>"</strong>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="delete_category.php?id=<?php echo $c['id'] ?>">Agree</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
             </div>
         </div>
        </div>
    </div>
</div>
<script src="bts/js/jquery.js"></script>
<script src="bts/js/bootstrap.js"></script>
<script>
    $(function(){
        setTimeout(function(){
            $(".alert").fadeOut();
        }, 2000)

    })
</script>
</body>
</html>
