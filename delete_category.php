<?php
include"user_auth.php";
include"admin-auth.php";
include"post_config.php";

$id=$_GET['id'];
$p=new Post();
$p->deleteCategory($id);