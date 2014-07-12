<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Booking {

    private $booking_id;
    private $name;
    private $cab_name;
    private $from_address;
    private $to_address;
    private $passenger_number;
    private $laugage;
    private $description;
    private $booking_date;

    public function setBookingId($booking_id) {
        $this->booking_id = $booking_id;
    }
    public function getBookingId() {
        return $this->booking_id;
    }

    public function setUserName($name) {
        $this->name = $name;
    }

// get user's first name
    public function getUserName() {
        return $this->name;
    }

//set user's id
    public function setCabName($cab_name) {
        $this->cab_name = $cab_name;
    }

// get user's first name
    public function getCabName() {
        return $this->cab_name;
    }

    //set user's id
    public function setFromAddress($from_address) {
        $this->from_address = $from_address;
    }

// get user's first name
    public function getFromAddress() {
        return $this->from_address;
    }

    public function setToAddress($to_address) {
        $this->to_address = $to_address;
    }

// get user's first name
    public function getToAddress() {
        return $this->to_address;
    }

    public function setPassengerNumber($passenger_number) {
        $this->passenger_number = $passenger_number;
    }

// get user's first name
    public function getPassengerNumber() {
        return $this->passenger_number;
    }

    public function setLaugage($laugage) {
        $this->laugage = $laugage;
    }

// get user's first name
    public function getLaugage() {
        return $this->laugage;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

// get user's first name
    public function getDescription() {
        return $this->description;
    }

    public function setBookingDate($booking_date) {
        $this->booking_date = $booking_date;
    }

// get user's first name
    public function getBookingDate() {
        return $this->booking_date;
    }

}

?>
