<?php
$user=$_SESSION['login'];
if($user['role']==null){
    header("location:dashdboard.php");
    exit();
}