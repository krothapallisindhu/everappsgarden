<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User {

    private $id_user;
    private $name;
    private $type;
    private $role;
    private $email;
    private $phone_number;
    private $username;
    private $password;
    private $lattitude;
    private $longitude;
    private $confirmcode;

    public function setUserId($id_user) {
        $this->id_user = $id_user;
    }

    public function getUserId() {
        return $this->id_user;
    }

//set user's id
    public function setName($name) {
        $this->name = $name;
    }

// get user's first name
    public function getName() {
        return $this->name;
    }

    //set user's id
    public function setType($type) {
        $this->type = $type;
    }

// get user's first name
    public function getType() {
        return $this->type;
    }

    public function setRole($role) {
        $this->role = $role;
    }

// get user's first name
    public function getRole() {
        return $this->role;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

// get user's first name
    public function getEmail() {
        return $this->email;
    }

    public function setPhoneNumber($phone_number) {
        $this->phone_number = $phone_number;
    }

// get user's first name
    public function getPhoneNumber() {
        return $this->phone_number;
    }

    public function setUserName($username) {
        $this->username = $username;
    }

// get user's first name
    public function getUserName() {
        return $this->username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

// get user's first name
    public function getPassword() {
        return $this->password;
    }

    public function setConfirmCode($confirmcode) {
        $this->confirmcode = $confirmcode;
    }

// get user's first name
    public function getConfirmCode() {
        return $this->confirmcode;
    }

    public function setLattitude($lattitude) {
        $this->lattitude = $lattitude;
    }

// get user's first name
    public function getLattitude() {
        return $this->lattitude;
    }

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

// get user's first name
    public function getLongitude() {
        return $this->longitude;
    }

}

?>
