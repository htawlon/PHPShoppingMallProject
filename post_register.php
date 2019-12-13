<?php
include "user_congfig.php";
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$retype_password=$_POST['retype_password'];

$user=new User();
$user->register($name,$email,$password,$retype_password);