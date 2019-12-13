<?php
session_start();
$id=$_GET['item'];
$_SESSION['cart']['$id']++;
header("location:index.php");
