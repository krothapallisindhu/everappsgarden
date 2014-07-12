<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Cab
{
    private $cab_id;
    private $cab_name;
    private $cab_model;
    private $cab_number;
    private $cab_regular_location;
    private $lattitude;
    private $longitude;
   

//set user's id
    public function setCabId($cab_id){
        $this->cab_id=$cab_id;
    }
    
// get user's first name
    public function getCabId() {
        return $this->cab_id;
    }
    
    //set user's id
    public function setCabName($cab_name){
        $this->cab_name=$cab_name;
    }
    
// get user's first name
    public function getCabName() {
        return $this->cab_name;
    }
 public function setCabModel($cab_model){
        $this->cab_model=$cab_model;
    }
    
// get user's first name
    public function getCabModel() {
        return $this->cab_model;
    }
    
 public function setCabNumber($cab_number){
        $this->cab_number=$cab_number;
    }
    
// get user's first name
    public function getCabNumber() {
        return $this->cab_number;
    }
    
 public function setCabRegularLocations($cab_regular_location){
        $this->cab_regular_location=$cab_regular_location;
    }
    
// get user's first name
    public function getCabRegularLocation() {
        return $this->cab_regular_location;
    }
    
 
 public function setLattitude($lattitude){
        $this->lattitude=$lattitude;
    }
    
// get user's first name
    public function getLattitude() {
        return $this->lattitude;
    }
    
 public function setLongitude($longitude){
        $this->longitude=$longitude;
    }
    
// get user's first name
    public function getLongitude() {
        return $this->longitude;
    }
}
?>
