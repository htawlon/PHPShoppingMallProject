<?php
include "config.php";

if(!isset($_SESSION['cart'])){
    header("location:index.php");
}
$ms= new MLMShop();

print_r($_SESSION['cart'])
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
   <link href="bts/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="jumbotron">
      <h4>Shopping Cart</h4>
  </div>
    <div class="row">
        <div class="col-sm-4">
          <?php
          if(isset($_SESSION['login'])){
              ?>
              <div class="panel panel-default">
              <div class="panel panel-heading"> Fill your required information.</div>
              <div class="panel-body">
                  <form method="post" action="checkout.php">
                      <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="tel" name="phone" id="phone" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="address">Address</label>
                          <textarea name="address" id="address" class="form-control" required></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block">Checkout</button>
                      </div>
                  </form>
              </div>
              </div>
            <?php
          }else{
              ?>
              <div class="alert alert-warning">
                  Please login <a href="login.php">Here</a>To continued your checkout.
              </div>
            <?php
          }
          ?>
        </div>
        <div class="col-sm-8">
           <div class="panel panel-default">
               <div class="panel panel-heading">Shopping Item</div>
               <div class="panel panel-body">
                   <table class="table">
                       <tr>
                           <th>Item Name</th>
                           <th>Price</th>
                           <th>Qty</th>
                           <th>Amount</th>
                       </tr>
                       <?php
                       $totalAmount=0;
                       foreach($_SESSION['cart'] as $id=>$qty){
                           $item=$ms->getPostForCart($id);
                           foreach ($item as $i){
                               $totalAmount +=$qty * $i['price'];
                               ?>
                               <tr>
                                   <td><?php  echo $i['item_name'] ?></td>
                                   <td> <?php echo $i['price'] ?></td>
                                   <td>
                                       <a href="decrease_cart.php?id=<?php echo $i['id']?>"><i class="glyphicon glyphicon-minus-sign"></i></a>
                                       <?php echo $qty; ?>
                                       <a href="increase_cart.php?id=<?php echo $i['id']?>"><i class="glyphicon glyphicon-plus-sign"></i></a>
                                   </td>
                                   <td><?php echo $qty * $i['price'] ?></td>
                               </tr>
                               <?php
                           }

                       }
                       ?>
                       <tr>
                           <td colspan="3" class="text-right">Total Amount</td>
                           <td><?php echo $totalAmount; ?></td>
                       </tr>

                   </table>
                   <a href="index.php" class="btn btn-info">
                       <i class="glyphicon glyphicon-backward"></i>
                       Continued Shopping </a>
                   <a href="clear-cart.php" class="btn btn-danger">Cancel</a>
               </div>
           </div>
        </div>
    </div>
</div>
<script src="bts/js/jquery.js"></script>
<script src="bts/js/bootstrap.js"></script>
</body>
</html>
