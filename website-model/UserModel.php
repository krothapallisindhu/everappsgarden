<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');

class UserModel {

    public function __construct() {
        
    }

    public function userExistenseCheck($name) {
        
        $db = new DBHandler;
        $query = "select * from  tb_users where name='{$name}'";
        $result = $db->executeStatement($query);
        return mysql_num_rows($result);
    }
    public function emailExistenseCheck($email) {
      
        $db = new DBHandler;
        $query = "select * from  tb_users where email='{$email}'";
        $result = $db->executeStatement($query);
        return mysql_num_rows($result);
    }
    //insert category
    public function insertRegistrationDetails($name, $type,$role, $email,$phone_number,$username,$password,$confirmcode) {
       
        $database = new DBHandler();

        $database->openConnection();

        $sql = sprintf("insert into tb_users(name,type,role,email,phone_number,username,password,confirmcode) values('$name','$type','$role', '$email','$phone_number','$username','$password','$confirmcode')");

        $rowsCount = $database->executeDml($sql);

        $database->closeConnection();

        return $rowsCount;
    }
    public function getLoginDetails($username, $password, $type, $role) {

        $databse = new DBHandler();

        $sql = sprintf("Select * from tb_users where username='$username' and password='$password' and confirmcode='y' and type ='$type' and role ='$role'");

        $result = $databse->executeSql($sql);

        return $result;
    }
    public function updateUserLocationDetails($lattitude, $longitude, $id_user) {
      
        $database = new DBHandler();

        $database->openConnection();

        // Build database query
        $sql = sprintf("update tb_users set  lattitude = '$lattitude',longitude='$longitude' WHERE id_user='$id_user'");
        $rowsCount = $database->executeDml($sql);

        $database->closeConnection();

        return $rowsCount;
    }

}


?>
