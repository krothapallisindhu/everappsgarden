<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class eag_ads_info {

    private $id;
    private $type;
    private $app_store_url;
    private $image_url;
    private $start_date;
    private $end_date;

    // set user's first name
    public function setID($aID) {
        $this->id = $aID;
    }

    // get user's first name
    public function getID() {
        return $this->id;
    }

    // set user's last name
    public function setType($aType) {
        $this->type = $aType;
    }

    // get user's last name
    public function getType() {
        return $this->type;
    }

    // set user's email address
    public function setAppStoreURL($aApp_store_url) {

        $this->app_store_url = $aApp_store_url;
    }

    //get user's email address
    public function getAppStoreURL() {

        return $this->app_store_url;
    }

    // set user's email address
    public function setImageURL($aImage_url) {

        $this->image_url = $aImage_url;
    }

    //get user's email address
    public function getImageURL() {

        return $this->image_url;
    }

    public function setStartDate($aApp_date) {

        $this->start_date = $aApp_date;
    }

    //get user's email address
    public function getStartDate() {

        return $this->start_date;
    }

    
     public function setEndDate($aApp_date) {

        $this->end_date = $aApp_date;
    }

    //get user's email address
    public function getEndDate() {

        return $this->end_date;
    }
  
}

?>
