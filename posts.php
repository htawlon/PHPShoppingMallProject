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
    <link href="bts/css/bootstrap.css" rel="stylesheet">
    <title>MlM shopping / Posts</title>
</head>
<body>
<?php include "navbar.php";?>
<div class="container">
    <?php include "message.php"; ?>
    <div class="jumbotron">
        <h4><i class="glyphicon glyphicon-tags"></i>Posts</h4>
        <a class="pull-right" href="new_posts.php"><i class="glyphicon glyphicon-plus-sign"></i>new</a>
    </div>
    <?php
    include "post_config.php";
    $post=new Post();
    $posts=$post->getPosts();
    foreach ($posts as $p){
        ?>
        <div class="panel panel-default">
            <div class="panel panel-body">
               <div class="row">
                  <div class="col-xs-6 col-sm-2">
                     <p>Image</p>
                      <img src="post_images/<?php echo $p['image'] ?>" class="img-responsive">
                  </div>
                   <div class="col-xs-6 col-sm-2">
                       <p>Item Name</p>
                       <div><?php echo $p['item_name'] ?></div>
                   </div>
                   <div class="col-xs-6 col-sm-2">
                       <p style="color:grey">Price</p>
                       <div><?php echo $p['price'] ?></div>
                   </div>
                   <div class="col-xs-6 col-sm-2">
                       <p style="color:grey">Post User</p>
                       <div><?php echo $p['user_name'] ?></div>
                   </div>
                   <div class="col-xs-6 col-sm-2">
                       <p>Date</p>
                       <div><?php echo date("D m/Y h:i A", strtotime($p['post_at']))?></div>
                   </div>
                   <div>
                       <a href="edit_posts.php?id=<?php echo $p['id'] ?>&item_name=<?php echo $p['item_name'] ?>&price=<?php echo $p['price'] ?>&category_id=<?php echo $p['category_id'] ?>"><i class="glyphicon glyphicon-edit"></i></a>

                       <a data-toggle="modal" data-target="#d<?php echo $p['id'] ?>" href="#" class="text-danger"><i class="glyphicon glyphicon-remove-circle"></i></a>
                       <div  id="d<?php echo $p['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                           <div class="modal-dialog modal-sm" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                      <h3>Confirmation</h3>
                                   </div>
                                   <div class="modal-body text-center text-danger">


                                   <i class="glyphicon glyphicon-warning-sign"></i>
                                   <p>
                                       This will delete the item name of <b>"<?php echo $p['item_name'] ?>"</b>
                                   </p>
                                   </div>

                               <div class="modal-footer">
                                   <a href="delete_posts.php?id=<?php echo $p['id'] ?>">Agree</a>
                               </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script src="bts/js/jquery.js"></script>
<script src="bts/js/bootstrap.js"></script>
<script>
    $(function (){
        setTimeout(function(){
            $(".alert").fadeOut();
        },2000)
    })

</script>
</body>
</html>

