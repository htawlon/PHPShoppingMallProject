<?php
include "user_congfig.php";
$email=$_POST['email'];
$password=$_POST['password'];

$user=new User();
$user->login($email, $password);
