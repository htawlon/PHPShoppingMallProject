<?php
include "user_auth.php";
include "admin-auth.php";
include "config.php";
$ms=new MLMShop();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MLM Shopping Order</title>
    <link href="bts/css/bootstrap.css" rel="stylesheet">
    <link href="fount.css" rel="stylesheet">

</head>
<body>
<?php include "navbar.php"; ?>
<div class="container">
    <?php  include "message.php"?>
    <h4><i class="glyphicon glyphicon-qrcode"></i>Order</h4>
    <?php
    $orders=$ms->getOrdersForAdmin();
    foreach($orders as $o){
        ?>
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4" style="border-right: 1px solid">
                        <p>
                            <i class="glyphicon glyphicon-user"></i>
                            <?php echo $o['user_name'] ?>
                        </p>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>
                            <?php echo $o['email'] ?>
                        </p>
                        <p>
                            <i class="glyphicon glyphicon-phone"></i>
                            <?php echo $o['phone'] ?>
                        </p>
                        <p>
                            <i class="glyphicon glyphicon-map-marker"></i>
                            <?php echo $o['address'] ?>
                        </p>
                        <p>
                            <i class="glyphicon glyphicon-time"></i>
                            <?php echo date("D(d) m/Y h:i A",strtotime($o['order_at'])); ?>
                        </p>
                        <p>
                            <?php
                            if($o['status']){
                                ?>
                                <span class="text-success">
                                    <i class="glyphicon glyphicon-check"></i>
                                    Finished Delivering
                                </span>
                                <?php
                            }else{
                                ?>
                                <span class="text-warning">
                                    <i class="glyphicon glyphicon-warning-sign"></i>
                                    Waiting fo Delivered
                                </span>
                                <a href="do_delivered.php?id=<?php echo $o['id'] ?>">
                                   <i class="glyphicon glyphicon-circle-arrow-down"></i>
                                </a>
                                <?php
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-sm-8">
                        <table class="table">
                            <tr>
                                <th>Item Name</th>
                                <th>Price(MMK)</th>
                                <th>Qty</th>
                                <th>Amount(MMK)</th>
                            </tr>
                            <?php
                            $totalAmount=0;
                            $items=$ms->getOrderItems($o['id']);
                            foreach($items as $i){
                                $totalAmount +=$i['id'] * $i['price']
                              ?>
                                <tr>
                                    <td><?php echo $i['item_name'] ?></td>
                                    <td><?php echo $i['price'] ?></td>
                                    <td><?php echo $i['qty'] ?></td>
                                    <td><?php echo $i['qty'] * $i['price'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="3" class="text-right">Total Amount</td>
                                <td><?php echo $totalAmount; ?></td>
                            </tr>
                        </table>
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
</body>
</html>