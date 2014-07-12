<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('components/DataObjectsArrayClass.php');
require_once('dataobjects/eag_apps_info.php');
require_once('dbaccess/DBHandler.php');
require_once('constants.php');

class ws_apps_info_model {
    /* Constructor to initailze default values when the object is created */

    public function __construct() {
        
    }

    /* Login Check method verifies whether username and password present in database or not */

    public function getAppDetails($aAppType, $aAppname) {

        $db = new DBHandler;
        //$query = "SELECT * FROM apps_info;";

        $query = "SELECT * FROM " . APP_INFO_TABLE_NAME . " WHERE " . APP_NAME . "='{$aAppname}'";

        $result = $db->executeSql($query);

        if ($aAppType == APP_TYPE_WEB_APP) {
            $dataObjectsArray = new DataObjectsArray();
            //Write the logic to convert result in to bean objects
            //Convert the database result to dataobjects and add to collection object
            $i = 0;
            while ($row = mysql_fetch_assoc($result)) {

                //Creating dataobject from the database result
                $app_details = new app_info();
                $app_details->setAppInfoListID($row['app_id']);
                $app_details->setAppInfoname($row['app_name']);
                $app_details->setAppInfoUrlDevlopment($row['app_dev_url']);
                $app_details->setAppInfoUrlLive($row['app_live_url']);
                $app_details->setAppVersion($row['app_version']);

                //Adding data object to collection object
                $dataObjectsArray->addObject($i, $app_details);
                $i = $i + 1;
            }


            return $dataObjectsArray;
        } else {

            return $result;
        }
    }

    public function getAppsList() {

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        //$query = "SELECT * FROM apps_info;";
        $query = "SELECT * FROM " . APP_INFO_TABLE_NAME . ";";

        $resultedrows = $dbhandler->executeStatement($query);

        $dataObjectsArray = new DataObjectsArray();

        //Write the logic to convert result in to bean objects
        //Convert the database result to dataobjects and add to collection object
        $i = 0;
        while ($row = mysql_fetch_array($resultedrows)) {

            //Creating dataobject from the database result
            $app_details = new eag_apps_info();
            $app_details->setID($row['id']);
            $app_details->setName($row['name']);
            $app_details->setPlatform($row['platform']);
            $app_details->setCertificate($row['certificate']);
            $app_details->setDescr($row['descr']);
            $app_details->setVersion($row['version']);
            $app_details->setDevURL($row['dev_url']);
            $app_details->setLiveURL($row['live_url']);

            //Adding data object to collection object
            $dataObjectsArray->addObject($i, $app_details);
            $i = $i + 1;
        }

        $dbhandler->closeConnection();
        
        return $dataObjectsArray;
    }

    public function updateAppDetails($aAppType) {
        
    }

    public function addNewAppDetails($aAppType) {
        
    }

    public function deleteAppDetails($aAppType) {
        
    }

}

?>
