<?php
include "connection_db.php";

class  MLMShop extends Connection{

    public function getOrdersForUser(){
        $email=$_SESSION['login']['email'];
        $sql="select * from orders where email='$email' order by id desc";
        return $this->db->query($sql);
    }

    public function doDelivered($id){
        $sql="update orders set status =1 where id='$id'";
        $this->db->query($sql);
        header("location:order.php");
    }
    public function getOrdersForAdmin(){
        $sql="select * from orders order by id desc";
        return $this->db->query($sql);
    }
    public function getOrderItems($order_id){
        $sql="select * from order_items where order_id='$order_id'";
        return $this->db->query($sql);

    }

    public function doCheckout($phone,$address){
        $name=$_SESSION['login']['user_name'];
        $email=$_SESSION['login']['email'];

        $od_sql="insert into orders (user_name, email, phone, address, order_at) 
                      values ('$name','$email','$phone','$address',now())";
        $this->db->query($od_sql);

        $order_id=$this->db->lastInsertId();
        foreach($_SESSION['cart'] as $id=>$qty){
            $old_posts="select * from posts where id='$id'";
            $old_posts_row=$this->db->query($old_posts);
            foreach($old_posts_row as $r){
                $item_name=$r['item_name'];
                $price=$r['price'];
                $sql="insert into order_items (item_name,price,qty,order_id) values ('$item_name','$price','$qty','$order_id')";
                $this->db->query($sql);
            }

        }
        unset($_SESSION['cart']);
        header("location:thank.php");

    }
    public function getPostForCart($id){
        $sql="select * from posts where id='$id'";
        return $this->db->query($sql);
    }

    public function getPostsByCategory($cat_id){
        $sql="select posts.*,users.user_name, category.cat_name from posts left join
 category on category.id=posts.category_id left join 
 users on users.id=posts.id where category_id='$cat_id'
 order by id desc";
        return $this->db->query($sql);
    }

    public function getCategory(){
        $sql="select * from category";
        return $this->db->query($sql);
    }
   public function getAllPosts(){
           $sql="select posts.*,users.user_name, category.cat_name from posts left join category on category.id=posts.category_id left join users on users.id=posts.id order by id desc";
           return $this->db->query($sql);
   }
    public function getPostsBySearch($q){
        $sql="select posts.*,users.user_name, category.cat_name from posts left join
 category on category.id=posts.category_id left join 
 users on users.id=posts.id where item_name LIKE '%$q%'
 order by id desc";
        return $this->db->query($sql);
    }
}

