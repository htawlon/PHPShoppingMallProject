<?php
include"user_auth.php";
include"admin-auth.php";
include"post_config.php";
$cat_name=$_POST['cat_name'];
$p=new post();
$p->newCategory($cat_name);
