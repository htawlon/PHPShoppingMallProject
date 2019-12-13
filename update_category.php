<?php
include "user_auth.php";
include"admin-auth.php";
include"post_config.php";

$id=$_POST['id'];
$cat_name=$_POST['cat_name'];

$p=new Post();
$p->updateCategory($id,$cat_name);