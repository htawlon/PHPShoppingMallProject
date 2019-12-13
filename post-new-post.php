<?php
include "user_auth.php";
include "admin-auth.php";
include "post_config.php";

$image=$_FILES['image'];
$item_name=$_POST['item_name'];
$price=$_POST['price'];
$category_id=$_POST['category_id'];

$post=new Post();
$post->newPost($image,$item_name, $price, $category_id);

