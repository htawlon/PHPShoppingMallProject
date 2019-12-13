<?php
include "connection_db.php";
class User extends Connection{
    public function changepassword($c_password, $n_password, $n_password_again){
        $id=$_SESSION['login']['id'];
        $sql="select password from users where id='$id'";
        $old_row=$this->db->query($sql)->fetch( PDO::FETCH_ASSOC);
        $old_password=$old_row['password'];
        $current_password=sha1($c_password);
        if($old_password==$current_password){
            if($n_password==$n_password_again){
                $new_password=sha1($n_password);
                $new_sql="update users set password='$new_password' where id='$id'";
                $this->db->query($new_sql);
                $_SESSION['success']="This password have been updated.";
                header("location:setting.php");
            }else{
                $_SESSION['error']="The new password and new password again must match.";
                header("location:setting.php");
            }
        }else{
            $_SESSION['error']="This current password invalid";
            header("location:setting.php");
        }
    }

    public function login($email,$password){
        $old_sql="select * from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch( PDO::FETCH_ASSOC);
        if(!empty($old_row)){
        $old_password=$old_row['password'];
        $new_password=sha1($password);
        if($old_password==$new_password){
            $_SESSION['login']=$old_row;
            header("location: dashdboard.php");
        }else{
            $_SESSION['error']="Authentication failed";
            header("location:login.php");
        }

        }else{
            $_SESSION['error']="This selected email is invalid";
            header("location: login.php");
        }
    }
    public function register($name,$email,$password,$retype_password){

        //echo $name, $email, $password, $retype_password;

        $old_sql="select email from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(empty($old_row['email'])){

            if($password ==$retype_password){
                $enc_password=sha1($password);
            $sql="insert into users (user_name, email, password, create_at) values ('$name','$email','$enc_password',now())";
            $this->db->query($sql);
                $_SESSION['success']="The user account have been signup.";
                header("location: register.php");


            }else{

                $_SESSION['error']="The password and retype password must match";
                header("location: register.php");
            }
        }else{

            $_SESSION['error']="This selected email is exists";
            header("location:register.php");
        }

}
}