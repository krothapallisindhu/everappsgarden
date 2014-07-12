<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class eag_apps_info {

    private $id;
    private $name;
    private $platform;
    private $certificate;
    private $dev_url;
    private $live_url;
    private $descr;
    private $version;

    // set user's first name
    public function setID($aApp_id) {
        $this->id = $aApp_id;
    }

    // get user's first name
    public function getID() {
        return $this->id;
    }

    // set user's last name
    public function setName($aApp_name) {
        $this->name = $aApp_name;
    }

    // get user's last name
    public function getName() {
        return $this->name;
    }

    // set user's email address
    public function setDevURL($aApp_url_development) {

        $this->dev_url = $aApp_url_development;
    }

    //get user's email address
    public function getDevURL() {

        return $this->dev_url;
    }

    // set user's email address
    public function setLiveURL($aApp_url_live) {

        $this->live_url = $aApp_url_live;
    }

    //get user's email address
    public function getLiveURL() {

        return $this->live_url;
    }

    public function setDescr($aApp_description) {

        $this->descr = $aApp_description;
    }

    //get user's email address
    public function getDescr() {

        return $this->descr;
    }

    public function setVersion($aApp_version) {

        $this->version = $aApp_version;
    }

    //get user's email address
    public function getVersion() {

        return $this->version;
    }

    public function setPlatform($aPlatform) {

        $this->platform = $aPlatform;
    }

    //get user's email address
    public function getPlatform() {

        return $this->platform;
    }

    public function setCertificate($aCertificate) {

        $this->certificate = $aCertificate;
    }

    //get user's email address
    public function getCertificate() {

        return $this->certificate;
    }

}

?>
