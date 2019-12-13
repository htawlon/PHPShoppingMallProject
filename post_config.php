<?php
include"connection_db.php";
class Post extends Connection {

    public function updatePost($id, $item_name,$image,$price,$category_id){
    if(!empty($image['name'])){
    $old_sql="select image from posts where id='$id'";
    $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
    $old_image=$old_row['image'];
    unlink("post_images/$old_image");
    $img_name=date("d-m-y-h-i-s")."-".$image['name'];
    $tmp_name=$image['tmp_name'];

    move_uploaded_file($tmp_name,"post_images/$img_name");
        $sql="update posts set image='$img_name',item_name='$item_name', price='$price', category_id='$category_id' where id='$id'";


    }else{

        $sql="update posts set item_name='$item_name', price='$price', category_id='$category_id' where id='$id'";
    }
    $this->db->query($sql);
    $_SESSION['success']="The selected post have been updated.";
    header("location:posts.php");
    }

    public function deletePost($id){

        $old_sql="select image from posts where id='$id'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        $image=$old_row['image'];
        unlink("post_images/$image");
        $sql="delete from posts where id='$id'";
        $this->db->query($sql);
        $_SESSION['success']="This selected post have been deleted";
        header("location:posts.php");
    }

    public function getPosts(){
        $sql="select posts.*,users.user_name, category.cat_name from posts left join category on category.id=posts.category_id left join users on users.id=posts.id order by id desc";
        return $this->db->query($sql);
    }

    public function newPost($image,$item_name,$price,$category_id){
        $img_name= date("d-m-y-h-i-s")."-".$image['name'];
        $img_tmp=$image['tmp_name'];
        $user_id=$_SESSION['login']['id'];
        $sql="insert into posts (item_name, price, image, category_id, user_id, post_at) values ('$item_name','$price','$img_name','$category_id','$user_id',now())";
        $this->db->query($sql);
        move_uploaded_file($img_tmp,"post_images/$img_name");
        $_SESSION['success']="The post have been saved.";
        header("location:new_posts.php");

    }

    public function updateCategory($id,$cat_name){

        $sql="update category set cat_name='$cat_name' where id=$id";
        $this->db->query($sql);
        $_SESSION['success']="this selected category have been updated.";
        header("location:categories.php");
    }

    public function deleteCategory($id){
        $sql="delete from category where id='$id'";
        $this->db->query($sql);
        $_SESSION['success']="The Selected category have been delete";
        header("location: categories.php");
    }

    public function getCategory(){
        $sql="select * from category";
        return $this->db->query($sql);
    }

  public function newCategory($cat_name){
    $old_sql="select * from category where cat_name='$cat_name'";
    $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);

    if(empty($old_row)){
        $sql="insert into category (cat_name) values ('$cat_name')";
        $this->db->query($sql);
        $_SESSION['success']="The category have been created.";
        header("location: categories.php");

    }else{
        $_SESSION['error']="the category name is exists.";
        header("location: categories.php");
    }
}
}
