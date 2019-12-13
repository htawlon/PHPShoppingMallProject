<?php
include "user_auth.php";
include "user_congfig.php";
$c_password=$_POST['current_password'];
$n_password=$_POST['new_password'];
$n_password_again=$_POST['new_password_again'];

$user=new User();
$user->changePassword($c_password, $n_password, $n_password_again);

