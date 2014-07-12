<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');

class api_booking_model {

    public function __construct() {
        
    }

  
    public function getBookingDictionaryArray() {
     
        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = sprintf("Select * from tb_booking where approved='y'");

        $dictionaryArray = $dbhandler->executeSql($query);

        $dbhandler->closeConnection();

        return $dictionaryArray;
    }

     public function insertBookingDetails($cab_id, $user_id,$from_address, $to_address,$passenger_number,$laugage,$description,$booking_date) {
       
        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = sprintf("insert into tb_booking(cab_id,id_user,from_address,to_address,passenger_number,laugage,description,booking_date) values('$cab_id', '$user_id','$from_address', '$to_address','$passenger_number','$laugage','$description','$booking_date')");

        $dmlstatus = $dbhandler->executeStatement($query);

        $dbhandler->closeConnection();

        return $dmlstatus;
    }

}

?>