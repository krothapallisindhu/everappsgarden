<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include ("json_response_handler.php");
require_once('constants.php');
require_once('services-model/UserModel.php');
require_once('services-model/BookingModel.php');
require_once('services-model/CabModel.php');
require_once('website-model/fg_membersite.php');

$aJsonResponseHander = new json_response_handler();

// Determining kind of action client wants to perform */
if (!isset($_GET[RESPONSE_ACTION_FLAG])) {

    $aJsonResponseHander->responseWithStatusAndMessage(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ACTION_NOT_FOUND_MESSAGE);
    return;
} else {

    $requestType = $_GET[RESPONSE_ACTION_FLAG];

    /* Calling corresponding action from corrosponding class */
    switch ($_GET[RESPONSE_ACTION_FLAG]) {

        case INSERT_BOOKING : {

                $aTaxiBookingController = new TaxiBookingController();
                $aTaxiBookingController->userBooking($aJsonResponseHander, $requestType);
            }
            break;
        case ADD_DRIVER_LOCATION :

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->addDriverLocation($aJsonResponseHander, $requestType);
            break;
        case ADD_CAB_LOCATION :

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->addCabLocation($aJsonResponseHander, $requestType);
            break;
        case UPDATE_CAB_LOCATION :

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->updateCabLocation($aJsonResponseHander, $requestType);
            break;
        case UPDATE_DRIVER_LOCATION :

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->updateDriverLocation($aJsonResponseHander, $requestType);
            break;
        case INSERT_USER:

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->userRegistration($aJsonResponseHander, $requestType);
            break;
        case CHECK_USER_LOGIN :

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->checkUserLogin($aJsonResponseHander, $requestType);
            break;
        case ADD_USER_LOCATION :

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->addUserLocation($aJsonResponseHander, $requestType);
            break;
        case UPDATE_USER_LOCATION :

            $aTaxiBookingController = new TaxiBookingController();
            $aTaxiBookingController->updateUserLocation($aJsonResponseHander, $requestType);
            break;
    }
}

class AdsViewController {

    public function driverRegistration($aJsonResponseHander, $requestType) {
        if (!isset($_GET[NAME])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, NAME_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[TYPE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, TYPE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_EMAIL])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_EMAIL_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[PHONE_NUMBER])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_PHONE_NUMBER_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_NAME])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_NAME_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_PASSWORD])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_PASSWORD_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[CONFIRM_CODE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CONFIRMCODE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }


        $registrationModel = new UserModel();
        $name = $_GET[NAME];
        $type = $_GET[TYPE];
        $email = $_GET[USER_EMAIL];
        $phone_number = $_GET[PHONE_NUMBER];
        $username = $_GET[USER_NAME];
        $password = $_GET[USER_PASSWORD];
        $confirmcode = $_GET[CONFIRM_CODE];


        $registerresult = $registrationModel->emailExistenseCheck($email);
        if ($registerresult) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, EMAIL_ALREADY_EXISTED_MESSAGE, $requestType);
            return;
        }
        $registerresult = $registrationModel->userExistenseCheck($username);
        if ($registerresult) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_ALREADY_EXISTED_MESSAGE, $requestType);
            return;
        } else {
            $registerresult = $registrationModel->insertRegistrationDetails($name, $type, $email, $phone_number, $username, $password, $confirmcode);
            if ($registerresult) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, ADD_USER_SUCCESS_MESSAGE, $requestType, $registerresult);
                return;
            } else {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ADD_USER_FAILURE_MESSAGE, $requestType);
                return;
            }
        }
    }

    public function userBooking($aJsonResponseHander, $requestType) {

        if (!isset($_GET[CAB_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        if (!isset($_GET[FROM_ADDRESS])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, FROM_ADDRESS_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[TO_ADDRESS])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, TO_ADDRESS_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[PASSENGER_NUMBER])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, PASSENGER_NUMBER_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[LAUGAGE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LAUGAGE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[DESCRIPTION])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, DESCRIPTION_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        if (!isset($_GET[BOOKING_DATE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, BOOKING_DATE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }


        $bookingModel = new BookingModel();
        $cab_id = $_GET[CAB_ID];
        $user_id = $_GET[USER_ID];
        $from_address = $_GET[FROM_ADDRESS];
        $to_address = $_GET[TO_ADDRESS];
        $passenger_number = $_GET[PASSENGER_NUMBER];
        $laugage = $_GET[LAUGAGE];
        $description = $_GET[DESCRIPTION];
        $booking_date = $_GET[BOOKING_DATE];

        $result = $bookingModel->insertBookingDetails($cab_id, $user_id, $from_address, $to_address, $passenger_number, $laugage, $description, $booking_date);
        if ($result) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, ADD_BOOKING_SUCCESS_MESSAGE, $requestType, $result);
            return;
        } else {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ADD_BOOKING_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

    public function checkDriverLogin($aJsonResponseHander, $requestType) {

        if (!isset($_GET[ROLE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ROLE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[TYPE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, TYPE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_NAME])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_NAME_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_PASSWORD])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_PASSWORD_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        $loginModel = new fg_membersite();
        $role = $_GET[ROLE];
        $type = $_GET[TYPE];
        $username = $_GET[USER_NAME];
        $password = $_GET[USER_PASSWORD];

        $logindetails = $loginModel->CheckLoginInDB($username, $password, $type, $role);

        $responseData = array('logindetails' => $logindetails);

        if ($responseData) {
            $aJsonResponseHander->responseWithStatusMessageActionAndResponseData(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, RESPONSE_STATUS_FLAG_SUCCESS_VALUE, $requestType, $responseData);
            return;
        } else {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, INVALID_LOGIN_MESSAGE, $requestType);
            return;
        }
    }

    public function addDriverLocation($aJsonResponseHander, $requestType) {

        if (!isset($_GET[LATITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LATITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[LANGITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        $locationModel = new UserModel();

        $lattitude = $_GET[LATITUDE];
        $longitude = $_GET[LANGITUDE];
        $userid = $_GET[USER_ID];

        $result = $locationModel->userExistenseCheck($userid);
        if ($result) {
            $result = $locationModel->updateLocationDetails($lattitude, $longitude, $userid);
            if ($result) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, UPDATE_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
                return;
            } else {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, UPDATE_LOCATION_FAILURE_MESSAGE, $requestType);
                return;
            }
        } else {
            $result = $locationModel->insertLocationDetails($userid, $lattitude, $longitude);
            if ($result) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, ADD_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
                return;
            } else
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ADD_LOCATION_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

    public function addCabLocation($aJsonResponseHander, $requestType) {
        if (!isset($_GET[CAB_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        if (!isset($_GET[CAB_NAME])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_NAME_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[CAB_MODEL])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_MODEL_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[CAB_NUMBER])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_NUMBER_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[CAB_REGULAR_LOCATIONS])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_REGULAR_LOCATIONS_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[LATITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LATITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[LANGITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }


        $locationModel = new CabModel();
        $cab_id = $_GET[CAB_ID];
        $lattitude = $_GET[LATITUDE];
        $longitude = $_GET[LANGITUDE];
        $cab_name = $_GET[CAB_NAME];
        $cab_model = $_GET[CAB_MODEL];
        $cab_number = $_GET[CAB_NUMBER];
        $cab_regular_locations = $_GET[CAB_REGULAR_LOCATIONS];
        $result = $locationModel->cabExistenseCheck($cab_id);
        if ($result) {

            $result = $locationModel->updateLocationDetails($lattitude, $longitude, $cab_id);
            if ($result) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, UPDATE_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
                return;
            } else {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, UPDATE_LOCATION_FAILURE_MESSAGE, $requestType);
                return;
            }
        } else {
            $result = $locationModel->insertCabLocationDetails($cab_id, $cab_name, $cab_model, $cab_number, $cab_regular_locations, $lattitude, $longitude);
            if ($result) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, ADD_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
                return;
            } else
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ADD_LOCATION_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

    public function updateCabLocation($aJsonResponseHander, $requestType) {
        if (!isset($_GET[CAB_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CAB_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[LATITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LATITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[LANGITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }


        $locationModel = new CabModel();
        $cab_id = $_GET[CAB_ID];
        $lattitude = $_GET[LATITUDE];
        $longitude = $_GET[LANGITUDE];
        $result = $locationModel->updateLocationDetails($lattitude, $longitude, $cab_id);
        if ($result) {
            if ($result) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, UPDATE_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
                return;
            } else {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, UPDATE_LOCATION_FAILURE_MESSAGE, $requestType);
                return;
            }
        }
    }

    public function userRegistration($aJsonResponseHander, $requestType) {
        if (!isset($_GET[NAME])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, NAME_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[TYPE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, TYPE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[ROLE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ROLE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_EMAIL])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_EMAIL_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[PHONE_NUMBER])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_PHONE_NUMBER_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_NAME])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_NAME_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_PASSWORD])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_PASSWORD_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[CONFIRM_CODE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, CONFIRMCODE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }


        $registrationModel = new UserModel();
        $name = $_GET[NAME];
        $type = $_GET[TYPE];
         $role = $_GET[ROLE];
        $email = $_GET[USER_EMAIL];
        $phone_number = $_GET[PHONE_NUMBER];
        $username = $_GET[USER_NAME];
        $password = $_GET[USER_PASSWORD];
        $confirmcode = $_GET[CONFIRM_CODE];

        $registerresult = $registrationModel->emailExistenseCheck($email);
        if ($registerresult) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, EMAIL_ALREADY_EXISTED_MESSAGE, $requestType);
            return;
        }
        $registerresult = $registrationModel->userExistenseCheck($username);
        if ($registerresult) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_ALREADY_EXISTED_MESSAGE, $requestType);
            return;
        } else {
            $registerresult = $registrationModel->insertRegistrationDetails($name, $type,$role, $email, $phone_number, $username, $password, $confirmcode);
            if ($registerresult) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, ADD_USER_SUCCESS_MESSAGE, $requestType, $registerresult);
                return;
            } else {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ADD_USER_FAILURE_MESSAGE, $requestType);
                return;
            }
        }
    }

    public function checkUserLogin($aJsonResponseHander, $requestType) {

        if (!isset($_GET[TYPE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, TYPE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

       if (!isset($_GET[ROLE])) {
         $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ROLE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
       return;
       }
        if (!isset($_GET[USER_NAME])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_NAME_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_PASSWORD])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_PASSWORD_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }



         $loginModel = new UserModel();
        $type = $_GET[TYPE];
        $role = $_GET[ROLE];
        $username = $_GET[USER_NAME];
        $password = $_GET[USER_PASSWORD];
       $pwdmd5 = md5($password);
       $user = $loginModel->getLoginDetails($username, $pwdmd5, $type, $role);
        $responseData = array('user' => $user );
        if ($responseData) {
            $aJsonResponseHander->responseWithStatusMessageActionAndResponseData(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, RESPONSE_STATUS_FLAG_SUCCESS_VALUE, $requestType, $responseData);
            return;
        } else {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, INVALID_LOGIN_MESSAGE, $requestType);
            return;
        }
    }

    public function addUserLocation($aJsonResponseHander, $requestType) {

        if (!isset($_GET[LATITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LATITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[LANGITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        $locationModel = new UserModel();

        $lattitude = $_GET[LATITUDE];
        $longitude = $_GET[LANGITUDE];
        $userid = $_GET[USER_ID];

        $result = $locationModel->userExistenseCheck($userid);
        if ($result) {

            $result = $locationModel->updateLocationDetails($lattitude, $longitude, $userid);
            if ($result) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, UPDATE_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
                return;
            } else {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, UPDATE_LOCATION_FAILURE_MESSAGE, $requestType);
                return;
            }
        } else {
            $result = $locationModel->insertLocationDetails($userid, $lattitude, $longitude);
            if ($result) {
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, ADD_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
                return;
            } else
                $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ADD_LOCATION_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

    public function updateUserLocation($aJsonResponseHander, $requestType) {

        if (!isset($_GET[LATITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LATITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[LANGITUDE])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }
        if (!isset($_GET[USER_ID])) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, USER_ID_PARAMETER_NOT_FOUND_MESSAGE, $requestType);
            return;
        }

        $locationModel = new UserModel();

        $lattitude = $_GET[LATITUDE];
        $longitude = $_GET[LANGITUDE];
        $userid = $_GET[USER_ID];

        $result = $locationModel->updateUserLocationDetails($lattitude, $longitude, $userid);
        if ($result) {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, UPDATE_LOCATION_SUCCESS_MESSAGE, $requestType, $result);
            return;
        } else {
            $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, UPDATE_LOCATION_FAILURE_MESSAGE, $requestType);
            return;
        }
    }

}

?> 