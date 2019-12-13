<?php
include "user_auth.php";

include "config.php";

$phone=$_POST['phone'];
$address=$_POST['address'];

$ms=new MLMShop();
$ms->doCheckout($phone, $address);

