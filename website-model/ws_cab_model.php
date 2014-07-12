<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');

class ws_cab_model {

    public function __construct() {
        
    }

    public function getCabDetails() {

        $myCollection = new GenericCollection();

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = sprintf("Select * from tb_cabs");

        $resultedrows = $dbhandler->executeStatement($query);
        //Convert the database result to dataobjects and add to collection object
        $i = 0;
        while ($row = mysql_fetch_assoc($resultedrows)) {

            //Creating dataobject from the database result
            $cabDetails = new Cab();
            $cabDetails->setCabId($row['cab_id']);
            $cabDetails->setCabName($row['cab_name']);
            $cabDetails->setCabModel($row['cab_model']);
            $cabDetails->setCabNumber($row['cab_number']);
            $cabDetails->setCabRegularLocations($row['cab_regular_locations']);
            $cabDetails->setLattitude($row['lattitude']);
            $cabDetails->setLongitude($row['longitude']);

            //Adding data object to collection object
            $myCollection->addObject($i, $cabDetails);
            $i = $i + 1;
        }

        $dbhandler->closeConnection();

        return $myCollection;
    }

    public function getCab($cab_id, $appType) {

        $myCollection = new GenericCollection($cab_id, $appType);
        $databse = new DBHandler();

        $sql = sprintf("Select * from tb_cabs Where cab_id='$cab_id'");
        if ($appType == 'api') {
            $result = $databse->executeSql($sql);
            return $result;
        } else {
            $result = $databse->executeStatement($sql);
//Convert the database result to dataobjects and add to collection object
            $i = 0;
            while ($row = mysql_fetch_assoc($result)) {

                //Creating dataobject from the database result
                $cabDetails = new Cab();
                $cabDetails->setCabId($row['cab_id']);
                $cabDetails->setCabName($row['cab_name']);
                $cabDetails->setCabModel($row['cab_model']);
                $cabDetails->setCabNumber($row['cab_number']);
                $cabDetails->setCabRegularLocations($row['cab_regular_locations']);
                $cabDetails->setLattitude($row['lattitude']);
                $cabDetails->setLongitude($row['longitude']);

                //Adding data object to collection object
                $myCollection->addObject($i, $cabDetails);
                $i = $i + 1;
            }

            return $myCollection;
        }
    }

    public function updateCabLocationDetails($lattitude, $longitude, $cab_id) {

        $database = new DBHandler();

        $database->openConnection();

// Build database query
        $sql = sprintf("update tb_cabs set  lattitude = '$lattitude',longitude='$longitude' WHERE cab_id='$cab_id'");
        $rowsCount = $database->executeDml($sql);

        $database->closeConnection();

        return $rowsCount;
    }

    public function getCabDictionaryArray() {
        
    }

}

?>