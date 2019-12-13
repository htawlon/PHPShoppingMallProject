<?php
include "user_auth.php";
include "admin-auth.php";
$id=$_GET['id'];
$item_name=$_GET['item_name'];
$price=$_GET['price'];
$category_id=$_GET['category_id'];
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
    <?php include "message.php";?>
    <div class="jumbotron">
        <h4><i class="glyphicon glyphicon-plus-sign"></i>New Posts</h4>
        <a class="pull-right" href="posts.php"><i class="glyphicon glyphicon-tags"></i>Posts</a>
    </div>

        <div class="col-sm-4 col-sm-offset-4">
         <form enctype="multipart/form-data" method="post" action="update_post.php">
             <input type="hidden" name="id" value="<?php echo $id; ?>">
             <div class="form-group">
               <label for="image">Image</label>
                 <input type="file" name="image" id="image">
             </div>
             <div class="form-group">
                 <label for="item_name">Item Name</label>
                 <input value="<?php echo $item_name ?>" type="text" name="item_name" id="item_name" class="form-control" required>
             </div>
             <div class="form-group">
               <label for="price">Price</label>
                 <input value="<?php echo $price ?>" type="number" name="price" id="price" class="form-control" required>
             </div>
             <div class="form-group">
               <label for="category_id">Category</label>
                 <select name="category_id" id="category_id" class="form-control" required>
                     <?php
                     include"post_config.php";
                     $post=new Post();
                     $cats=$post->getCategory();
                     foreach($cats as $c){
                         ?>
                         <option <?php if($category_id==$c['id']){echo "selected"; } ?> value="<?php echo $c['id'] ?>"><?php echo $c['cat_name']?></option>
                     <?php
                     }
                     ?>

                 </select>
             </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-primary btn-lg">Save</button>
             </div>
         </form>
        </div>

</div>
<script src="bts/js/jquery.js"></script>
<script src="bts/js/bootstrap.js"></script>
<script>
    $(function(){
        setTimeout(function(){
            $(".alert").fadeOut();
        }, 2000)

</script>
</body>
</html>



