<?php
session_start();
class Connection{
    public $db;
    public function __construct(){

        try{
            $this->db=new PDO("mysql:host=localhost;dbname=mlm_shopping3","root","root");

        }catch(PDOException $e){
            die("Connection failed to database server.");
        }
    }
}

