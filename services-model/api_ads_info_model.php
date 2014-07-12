<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');

class  api_ads_info_model{

    public function __construct() {
        
    }

    public function getCabDetails() {
        
        $myCollection = new GenericCollection($appType);
        $databse = new DBHandler();

        $sql = sprintf("Select * from tb_cabs");
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

     public function getAdsDictionaryArray($appid) {

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();
       
        $query = sprintf("select apps.name,apps.certificate,ads.id,ads.app_id,ads.type,ads.Image_url,ads.start_date,ads.end_date from eag_apps_info apps Left Join eag_ads_info ads on apps.id=ads.app_id where apps.id='$appid'");

        //$query = sprintf("select * from eag_ads_info where app_id='$appid'");

        $resultedrows = $dbhandler->executeSql($query);
        
        $dbhandler->closeConnection();
        
        return $resultedrows;
    }

  
    public function getCabDictionaryArray() {
        
    }

}

?>