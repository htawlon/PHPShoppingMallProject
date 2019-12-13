<?php
include "user_auth.php";
include "admin-auth.php";
include "config.php";
$ms=new MLMShop();
$id=$_GET['id'];
$ms->doDelivered($id);