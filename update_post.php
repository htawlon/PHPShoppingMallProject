<?php
include "user_auth.php";
include "admin-auth.php";
include "post_config.php";

$id=$_POST['id'];
$item_name=$_POST['item_name'];
$image=$_FILES['image'];
$price=$_POST['price'];
$category_id=$_POST['category_id'];

$p=new Post();
$p->updatePost($id,$item_name,$image,$price,$category_id);

