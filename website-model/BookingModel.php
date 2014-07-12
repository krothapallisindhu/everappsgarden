<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');


class BookingModel {

    public function __construct() {
        
    }
    public function insertBookingDetails($cab_id, $user_id,$from_address, $to_address,$passenger_number,$laugage,$description,$booking_date) {
       
        $database = new DBHandler();

        $database->openConnection();

        $sql = sprintf("insert into tb_booking(cab_id,id_user,from_address,to_address,passenger_number,laugage,description,booking_date) values('$cab_id', '$user_id','$from_address', '$to_address','$passenger_number','$laugage','$description','$booking_date')");

        $rowsCount = $database->executeDml($sql);

        $database->closeConnection();

        return $rowsCount;
    }
   

}

?>