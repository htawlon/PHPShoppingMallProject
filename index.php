<?php
include "config.php";
$mlm=new MLMShop();

$totalQty=0;
if(isset($_SESSION['cart'])){

    foreach($_SESSION['cart'] as $id=>$qty){
        $totalQty +=$qty;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mawlamyine Store</title>
    <link href="bts/css/bootstrap.css" rel="stylesheet">
    <style>
        .btnAddCart{
            padding: 20px;
            background: #265a88;
            color: #ffffff;
            border-radius: 50px;
            position: absolute;
            top:100px;
            right: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="page-header">

        <div class="row">
            <div class="col-sm-6">
                <a href="index.php">Mawlamyine Store</a>
            </div>
            <div class="col-sm-3">
                <form method="get" action="index.php">
                    <div class="form-group">
                        <input class="form-control" type="search" name="q" required placeholder="search">
                    </div>
                </form>
            </div>
            <div class="col-sm-1">
              <a href="shopping_cart.php">
                  <i class="glyphicon glyphicon-shopping-cart"></i>
                  <span class="badge"><?php echo $totalQty; ?></span>
              </a>
            </div>

            <div class="col-sm-2">
                <?php
                if(isset($_SESSION['login'])){
                    ?>
                    <a href="dashdboard.php"><i class="glyphicon glyphicon-user"></i><?php echo $_SESSION['login']['user_name'] ?></a>
                    <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
                    <?php
                }else{
                    ?>
                    <a href="login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php include "menu.php"?>
    <div class="row">
        <?php
        if(!empty($_GET['cat_id'])){
          $cat_id=$_GET['cat_id'];
          $posts=$mlm->getPostsByCategory($cat_id);
        }elseif(!empty($_GET['q'])){
            $q=$_GET['q'];
            $posts=$mlm->getPostsBySearch($q);

        }else{
            $posts=$mlm->getAllPosts();
        }


        foreach ($posts as $p):
        ?>
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
             <img src="post_images/<?php echo $p['image'] ?>">
                <h5 class="text-center"><?php echo $p['item_name'] ?></h5>
                <p class="text-center text-danger"><small> $ <?php echo $p['price'] ?> </small></p>
                <div>
                    <small>
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                            <?php echo $p['user_name']?>
                        </span>,
                        <span>
                            <i class="glyphicon glyphicon-tag"></i>
                            <?php echo $p['cat_name'] ?>
                        </span>
                        <span>
                            <i class="glyphicon glyphicon-time"></i>
                            <?php echo date("D(d) m/Y h:i A ", strtotime($p['post_at']))?>
                        </span>
                    </small>
                </div>
                <a class="btnAddCart" href="add_to_cart.php?item=<?php echo $p['id']?>">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <i class="glyphicon glyphicon-plus-sign"></i>
                </a>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>


<script src="bts/js/jquery.js"></script>
 <script src="bts/js/bootstrap.js"></script>
</body>
</html>