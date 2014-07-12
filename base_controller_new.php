<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ("json_response_handler.php");
require_once('constants.php');
require_once('services-model/api_ads_info_model.php');

$aJsonResponseHander = new json_response_handler();

// Determining kind of action client wants to perform */

$requestType = $_POST[RESPONSE_ACTION_FLAG];

/* Calling corresponding action from corrosponding class */
switch ($_POST[RESPONSE_ACTION_FLAG]) {

    case GET_APP_ADS : {

            $aAdsViewController = new AdsViewController();
            $aAdsViewController->getAppAds($aJsonResponseHander, $requestType);
        }
        break;
    case CHECK_USER_LOGIN : {

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->checkUserLogin($aJsonResponseHander, $requestType);
        }
        break;

    case UPDATE_CAB_LOCATION : {

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->updateCabLocation($aJsonResponseHander, $requestType);
        }
        break;
    case UPDATE_USER_LOCATION : {

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->updateUserLocation($aJsonResponseHander, $requestType);
        }
        break;

    case INSERT_BOOKING : {

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->userBooking($aJsonResponseHander, $requestType);
        }
        break;
    case INSERT_DRIVER_LOCATION : {

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->addDriverLocation($aJsonResponseHander, $requestType);
        }
        break;
    case ADD_CAB_LOCATION : {

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->addCabLocation($aJsonResponseHander, $requestType);
        }
        break;

    case INSERT_USER_REGISTRATION : {

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->userRegistration($aJsonResponseHander, $requestType);
        }
        break;
    case INSERT_USER_LOCATION : {

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->addUserLocation($aJsonResponseHander, $requestType);
        }
        break;
}

class AdsViewController {

    public function getAppAds($aJsonResponseHander, $requestType) {

        if (!isset($_POST[APP_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, APP_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        $apiadsinfomodel = new api_ads_info_model();
        $appid = $_POST[APP_ID];

        $adsdictionaryarray = $apiadsinfomodel->getAdsDictionaryArray($appid);

        if ($adsdictionaryarray) {

            $responseData = array('Ads' => $adsdictionaryarray);
            $aJsonResponseHander->responseWithStatusMessageActionAndResponseData(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, RESPONSE_STATUS_FLAG_SUCCESS_VALUE, $requestType, $responseData);

            return;
        } else {
            
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ADS_REQUEST_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

    public function checkUserLogin($aJsonResponseHander, $requestType) {

        if (!isset($_POST[TYPE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, TYPE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        if (!isset($_POST[ROLE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ROLE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[USER_NAME])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_NAME_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[USER_PASSWORD])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_PASSWORD_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        $apiusermodel = new api_user_model();

        $type = $_POST[TYPE];
        $username = $_POST[USER_NAME];
        $password = $_POST[USER_PASSWORD];
        $role = $_POST[ROLE];
        $pwdmd5 = md5($password);

        $dictionaryArray = $apiusermodel->getLoginDetails($username, $password, $type, $role);

        // Check number of rows returned
        if (count($dictionaryArray) >= 1) {

            if ($role == 'driver') {

                $apibookingmodel = new api_booking_model();

                $jobsDictionaryArray = $apibookingmodel->getBookingDictionaryArray();

                $responseData = array('Users' => $dictionaryArray, 'Jobs' => $jobsDictionaryArray);
            } else {

                $responseData = array('Users' => $dictionaryArray);
            }

            $aJsonResponseHander->responseWithStatusMessageActionAndResponseData(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, RESPONSE_STATUS_FLAG_SUCCESS_VALUE, $requestType, $responseData);
            return;
        } else {

            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, INVALID_LOGIN_MESSAGE, $requestType);
            return;
        }
    }

    public function updateCabLocation($aJsonResponseHander, $requestType) {

        if (!isset($_POST[USER_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[LATITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LATITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[LANGITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        $locationModel = new api_user_model();
        $user_id = $_POST[USER_ID];
        $lattitude = $_POST[LATITUDE];
        $longitude = $_POST[LANGITUDE];

        $dmlstatus = $locationModel->updateUserLocationDetails($lattitude, $longitude, $user_id);

        if ($dmlstatus) {

            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, UPDATE_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
            return;
        } else {

            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, UPDATE_LOCATION_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

    public function updateUserLocation($aJsonResponseHander, $requestType) {

        if (!isset($_POST[USER_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[LATITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LATITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[LANGITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        $locationModel = new api_user_model();
        $user_id = $_POST[USER_ID];
        $lattitude = $_POST[LATITUDE];
        $longitude = $_POST[LANGITUDE];

        $dmlstatus = $locationModel->updateUserLocationDetails($lattitude, $longitude, $user_id);

        if ($dmlstatus) {

            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, UPDATE_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
            return;
        } else {

            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, UPDATE_LOCATION_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

    public function userBooking($aJsonResponseHander, $requestType) {

        if (!isset($_POST[CAB_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[USER_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        if (!isset($_POST[FROM_ADDRESS])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, FROM_ADDRESS_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[TO_ADDRESS])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, TO_ADDRESS_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[PASSENGER_NUMBER])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, PASSENGER_NUMBER_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[LAUGAGE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LAUGAGE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_POST[DESCRIPTION])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, DESCRIPTION_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        if (!isset($_POST[BOOKING_DATE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, BOOKING_DATE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }


        $apibookingmodel = new api_booking_model();
        $cab_id = $_POST[CAB_ID];
        $user_id = $_POST[USER_ID];
        $from_address = $_POST[FROM_ADDRESS];
        $to_address = $_POST[TO_ADDRESS];
        $passenger_number = $_POST[PASSENGER_NUMBER];
        $laugage = $_POST[LAUGAGE];
        $description = $_POST[DESCRIPTION];
        $booking_date = $_POST[BOOKING_DATE];

        $dmlstatus = $apibookingmodel->insertBookingDetails($cab_id, $user_id, $from_address, $to_address, $passenger_number, $laugage, $description, $booking_date);
        if ($dmlstatus) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, ADD_BOOKING_SUCCESS_MESSAGE, $requestType, $result);
            return;
        } else {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ADD_BOOKING_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

}

?>