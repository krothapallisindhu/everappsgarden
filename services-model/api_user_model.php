<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');

class api_user_model {

    public function __construct() {
        
    }

    public function userExistenseCheck($name) {

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = "select * from  tb_users where name='{$name}'";
        
        $dictionaryArray = $dbhandler->executeSql($query);
        
        $dbhandler->closeConnection();
        
        return $dictionaryArray;
    }

    public function emailExistenseCheck($email) {

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = "select * from  tb_users where email='{$email}'";
        
        $dictionaryArray = $dbhandler->executeSql($query);
        
        $dbhandler->closeConnection();
        
        return $dictionaryArray;
    }

    //insert category
    public function insertRegistrationDetails($name, $type, $role, $email, $phone_number, $username, $password, $confirmcode) {

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = sprintf("insert into tb_users(name,type,role,email,phone_number,username,password,confirmcode) values('$name','$type','$role', '$email','$phone_number','$username','$password','$confirmcode')");

        $status = $dbhandler->executeStatement($query);
        
        $dbhandler->closeConnection();
        
        return $status;
    }

    public function getLoginDetails($username, $password, $type, $role) {

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = sprintf("Select * from tb_users where username='$username' and password='$password' and confirmcode='y' and type ='$type' and role ='$role'");

        $dictionaryArray = $dbhandler->executeSql($query);
        
        $dbhandler->closeConnection();
        
        return $dictionaryArray;
    }

    public function updateUserLocationDetails($lattitude, $longitude, $id_user) {

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        // Build database query
        $query = sprintf("update tb_users set  lattitude = '$lattitude',longitude='$longitude' WHERE id_user='$id_user'");
        
        $status = $dbhandler->executeStatement($query);

        $dbhandler->closeConnection();

        return $status;
    }
}

?>
