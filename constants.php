<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

defined('APP_TYPE') ? NULL : define('APP_TYPE', 'apptype');
defined('APP_TYPE_WEB_SERVICE') ? NULL : define('APP_TYPE_WEB_SERVICE', 'service');
defined('APP_TYPE_WEB_APP') ? NULL : define('APP_TYPE_WEB_APP', 'web');
defined('WEBSITE_NAME') ? NULL : define('WEBSITE_NAME', 'www.everappsgarden.com');
defined('ADMIN_EMAIL') ? NULL : define('ADMIN_EMAIL', 'admin@everappsgarden.com');


////////////////////////////////////////////////////////////////////////////////
// Define constants for database connectivty
////////////////////////////////////////////////////////////////////////////////
/*defined('DATABASE_HOST') ? NULL : define('DATABASE_HOST', 'localhost');
defined('DATABASE_NAME') ? NULL : define('DATABASE_NAME', 'everappsgarden');
defined('DATABASE_USER') ? NULL : define('DATABASE_USER', 'root');
defined('DATABASE_PASSWORD') ? NULL : define('DATABASE_PASSWORD', 'root');*/

defined('DATABASE_HOST') ? NULL : define('DATABASE_HOST', 'everappsgarden.db.10526077.hostedresource.com');
defined('DATABASE_NAME') ? NULL : define('DATABASE_NAME', 'everappsgarden');
defined('DATABASE_USER') ? NULL : define('DATABASE_USER', 'everappsgarden');
defined('DATABASE_PASSWORD') ? NULL : define('DATABASE_PASSWORD', 'Qwerty!23456');

defined('APP_INFO_TABLE_NAME') ? NULL : define('APP_INFO_TABLE_NAME', 'eag_apps_info');
defined('ADS_INFO_TABLE_NAME') ? NULL : define('ADS_INFO_TABLE_NAME', 'eag_ads_info');

defined('USERS_INFO_TABLE_NAME') ? NULL : define('USERS_INFO_TABLE_NAME', 'user_info');
defined('ITEMS_LIST_TABLE_NAME') ? NULL : define('ITEMS_LIST_TABLE_NAME', 'items_list');
defined('USERS_TABLE') ? NULL : define('USERS_TABLE', 'eag_users');
defined('BOOKING_TABLE') ? NULL : define('BOOKING_TABLE', 'tb_employees');


//Table parameters
defined('USERS_LIST_ID') ? NULL : define('USERS_LIST_ID', 'users_list_id');
defined('USERNAME') ? NULL : define('USERNAME', 'username');
defined('PASSWORD') ? NULL : define('PASSWORD', 'password');
defined('OLD_PASSWORD') ? NULL : define('OLD_PASSWORD', 'old_password');
defined('USER_TYPE') ? NULL : define('USER_TYPE', 'user_type');
defined('LATITUDE') ? NULL : define('LATITUDE', 'lattitude');
defined('LANGITUDE') ? NULL : define('LANGITUDE', 'longitude');
defined('ZIPCODE') ? NULL : define('ZIPCODE', 'zip');
defined('RESTAURANT_ID') ? NULL : define('RESTAURANT_ID', 'user_info_id');
defined('ITEM_ID') ? NULL : define('ITEM_ID', 'itemid');
defined('APP_NAME') ? NULL : define('APP_NAME', 'app_name');



////////////////////////////////////////////////////////////////////////////////
// Define constants for Response Flags
////////////////////////////////////////////////////////////////////////////////
defined('RESPONSE_STATUS_FLAG') ? NULL : define('RESPONSE_STATUS_FLAG', 'status');
defined('RESPONSE_MESSAGE_FLAG') ? NULL : define('RESPONSE_MESSAGE_FLAG', 'message');
defined('RESPONSE_ACTION_FLAG') ? NULL : define('RESPONSE_ACTION_FLAG', 'action');
defined('RESPONSE_DATA_FLAG') ? NULL : define('RESPONSE_DATA_FLAG', 'Responsedata');
defined('RESPONSE_STATUS_KEY_FLAG') ? NULL : define('RESPONSE_STATUS_KEY_FLAG', 'ResponseStatus');



////////////////////////////////////////////////////////////////////////////////
// Define constants for Response Value Constants
////////////////////////////////////////////////////////////////////////////////
defined('RESPONSE_STATUS_FLAG_SUCCESS_VALUE') ? NULL : define('RESPONSE_STATUS_FLAG_SUCCESS_VALUE', 'success');
defined('RESPONSE_STATUS_FLAG_FAILURE_VALUE') ? NULL : define('RESPONSE_STATUS_FLAG_FAILURE_VALUE', 'fail');


////////////////////////////////////////////////////////////////////////////////
// Define constants for Alert Messages
////////////////////////////////////////////////////////////////////////////////
defined('ACTION_NOT_FOUND_MESSAGE') ? NULL : define('ACTION_NOT_FOUND_MESSAGE', 'Action parameter not found in the request.');
defined('INVALID_ACTION_MESSAGE') ? NULL : define('INVALID_ACTION_MESSAGE', 'Invalid action method name.');
defined('USER_NAME_NOT_FOUND_MESSAGE') ? NULL : define('USER_NAME_NOT_FOUND_MESSAGE', 'Username was not found.');
defined('USER_TYPE_NOT_FOUND_MESSAGE') ? NULL : define('USER_TYPE_NOT_FOUND_MESSAGE', 'Usertype was not found.');
defined('PASSWORD_NOT_FOUND_MESSAGE') ? NULL : define('PASSWORD_NOT_FOUND_MESSAGE', 'Password was not found.');
defined('INVALID_LOGIN_MESSAGE') ? NULL : define('INVALID_LOGIN_MESSAGE', 'Username or Password is wrong.');
defined('ADD_USER_SUCCESS_MESSAGE') ? NULL : define('ADD_USER_SUCCESS_MESSAGE', 'Registration is successful, please login to access all the features.');
defined('ADD_USER_FAILURE_MESSAGE') ? NULL : define('ADD_USER_FAILURE_MESSAGE', 'Error while adding user, please try again.');
defined('USER_ALREADY_EXISTED_MESSAGE') ? NULL : define('USER_ALREADY_EXISTED_MESSAGE', 'User already existed, please try adding another user.');
defined('EMAIL_ALREADY_EXISTED_MESSAGE') ? NULL : define('EMAIL_ALREADY_EXISTED_MESSAGE', 'Email already existed, please try adding another email.');
defined('USER_NOT_EXISTED_MESSAGE') ? NULL : define('USER_NOT_EXISTED_MESSAGE', 'User is not existed, please try again.');
defined('OLD_PASSWORD_NOT_CORRECT_MESSAGE') ? NULL : define('OLD_PASSWORD_NOT_CORRECT_MESSAGE', 'Old password is incorrect, please try again.');
defined('MAIL_SENDING_FAILURE_MESSAGE') ? NULL : define('MAIL_SENDING_FAILURE_MESSAGE', 'Problem with sending mail, please try again.');
defined('PASSWORD_SENDING_SUCCESS_MESSAGE') ? NULL : define('PASSWORD_SENDING_SUCCESS_MESSAGE', 'Password sent to mail successfully, please verify the mail to know the password.');
defined('LATITUDE_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('LATITUDE_PARAMETER_NOT_FOUND_MESSAGE', 'Latitude parameter was not found in the request.');
defined('LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('LANGITUDE_PARAMETER_NOT_FOUND_MESSAGE', 'Langitude parameter was not found in the request.');
defined('RESTAURANTS_NOT_FOUND_MESSAGE') ? NULL : define('RESTAURANTS_NOT_FOUND_MESSAGE', 'Restaurants was not found.');
defined('RESTAURANTS_ERROR_MESSAGE') ? NULL : define('RESTAURANTS_ERROR_MESSAGE', 'Error while retrieving restaurants.');
defined('ZIPCODE_NOT_FOUND_MESSAGE') ? NULL : define('ZIPCODE_NOT_FOUND_MESSAGE', 'Zipcode was not found in the request.');
defined('RESTAURANT_ID_NOT_FOUND_MESSAGE') ? NULL : define('RESTAURANT_ID_NOT_FOUND_MESSAGE', 'Restuarant id was not found in the request.');
defined('ITEMS_NOT_FOUND_MESSAGE') ? NULL : define('ITEMS_NOT_FOUND_MESSAGE', 'Items was not found.');
defined('ITEM_ID_NOT_FOUND_MESSAGE') ? NULL : define('ITEM_ID_NOT_FOUND_MESSAGE', 'Item id was not found in the request.');
defined('ITEMS_DETAILS_NOT_FOUND_MESSAGE') ? NULL : define('ITEMS_DETAILS_NOT_FOUND_MESSAGE', 'Items details was not found.');
defined('APP_INFO_NAME_NOT_FOUND_MESSAGE') ? NULL : define('APP_INFO_NAME_NOT_FOUND_MESSAGE', 'app_name parameter was not found in the request.');
defined('ADD_LOCATION_SUCCESS_MESSAGE') ? NULL : define('ADD_LOCATION_SUCCESS_MESSAGE', 'Location registered successful');
defined('ADD_LOCATION_FAILURE_MESSAGE') ? NULL : define('ADD_LOCATION_FAILURE_MESSAGE', 'Error while adding location, please try again.');
defined('UPDATE_LOCATION_SUCCESS_MESSAGE') ? NULL : define('UPDATE_LOCATION_SUCCESS_MESSAGE', 'Location updated successful');
defined('UPDATE_LOCATION_SUCCESS_MESSAGE') ? NULL : define('UPDATE_LOCATION_SUCCESS_MESSAGE', 'Error while updating location, please try again.');
defined('ADD_BOOKING_SUCCESS_MESSAGE') ? NULL : define('ADD_BOOKING_SUCCESS_MESSAGE', 'Booking registered successful');
defined('ADD_BOOKING_FAILURE_MESSAGE') ? NULL : define('ADD_BOOKING_FAILURE_MESSAGE', 'Error while registering cab, please try again.');
defined('APP_ID') ? NULL : define('APP_ID', 'app_id');


defined('UPDATE_USER_SUCCESS_MESSAGE') ? NULL : define('UPDATE_USER_SUCCESS_MESSAGE', 'User details are successfully updated.');
defined('UPDATE_USER_PASSWORD_SUCCESS_MESSAGE') ? NULL : define('UPDATE_USER_PASSWORD_SUCCESS_MESSAGE', 'User password updated successfully.');
defined('UPDATE_USER_PASSWORD_FAILURE_MESSAGE') ? NULL : define('UPDATE_USER_PASSWORD_FAILURE_MESSAGE', 'Error while updating password.');

defined('UPDATE_USER_FAILURE_MESSAGE') ? NULL : define('UPDATE_USER_FAILURE_MESSAGE', 'Error while updating user details, please try again');
defined('DELETE_USER_SUCCESS_MESSAGE') ? NULL : define('DELETE_USER_SUCCESS_MESSAGE', 'User details deleted successfully.');
defined('DELETE_USER_FAILURE_MESSAGE') ? NULL : define('DELETE_USER_FAILURE_MESSAGE', 'Error while deleting user, please try again');
defined('DELETE_ALL_USERS_SUCCESS_MESSAGE') ? NULL : define('DELETE_ALL_USERS_SUCCESS_MESSAGE', 'All users deleted successfully.');
defined('DELETE_ALL_USERS_FAILURE_MESSAGE') ? NULL : define('DELETE_ALL_USERS_FAILURE_MESSAGE', 'Error while deleting all users, please try again');

////////////////////////////////////////////////////////////////////////////////
// Define constants for Actions Flags
////////////////////////////////////////////////////////////////////////////////
defined('LOGIN_ACTION_FLAG') ? NULL : define('LOGIN_ACTION_FLAG', 'userlogin');
defined('GET_USERS_LIST_ACTION_FLAG') ? NULL : define('GET_USERS_LIST_ACTION_FLAG', 'getuserslist');
defined('ADD_USER_ACTION_FLAG') ? NULL : define('ADD_USER_ACTION_FLAG', 'adduser');
defined('UPDATE_PASSWORD_ACTION_FLAG') ? NULL : define('UPDATE_PASSWORD_ACTION_FLAG', 'updatepassword');
defined('DELETE_USER_ACTION_FLAG') ? NULL : define('DELETE_USER_ACTION_FLAG', 'deleteuser');
defined('DELETE_ALL_USERS_ACTION_FLAG') ? NULL : define('DELETE_ALL_USERS_ACTION_FLAG', 'deleteallusers');
defined('GET_APPINFO_LIST_ACTION_FLAG') ? NULL : define('GET_APPINFO_LIST_ACTION_FLAG', 'getappinfo');
defined('INSERT_USER') ? NULL : define('INSERT_USER', 'userRegistration');
defined('CHECK_USER_LOGIN') ? NULL : define('CHECK_USER_LOGIN', 'checkUserLogin');
defined('GET_APP_ADS') ? NULL : define('GET_APP_ADS', 'getAppAds');
defined('ADD_DRIVER_LOCATION') ? NULL : define('ADD_DRIVER_LOCATION', 'addDriverLocation');
defined('ADD_CAB_LOCATION') ? NULL : define('ADD_CAB_LOCATION', 'addCabLocation');
defined('UPDATE_CAB_LOCATION') ? NULL : define('UPDATE_CAB_LOCATION', 'updateCabLocation');
defined('INSERT_USER_REGISTRATION') ? NULL : define('INSERT_USER_REGISTRATION', 'userRegistration');
defined('INSERT_USER_LOGIN') ? NULL : define('INSERT_USER_LOGIN', 'checkUserLogin');
defined('ADD_USER_LOCATION') ? NULL : define('ADD_USER_LOCATION', 'addUserLocation');
defined('UPDATE_USER_LOCATION') ? NULL : define('UPDATE_USER_LOCATION', 'updateUserLocation');
defined('UPDATE_DRIVER_LOCATION') ? NULL : define('UPDATE_DRIVER_LOCATION', 'updateDriverLocation');
defined('INSERT_BOOKING') ? NULL : define('INSERT_BOOKING', 'userBooking');

//Employee Service Table parameters
defined('USER_ID') ? NULL : define('USER_ID', 'id_user');
defined('NAME') ? NULL : define('NAME', 'name');
defined('TYPE') ? NULL : define('TYPE', 'type');
defined('ROLE') ? NULL : define('ROLE', 'role');
defined('USER_EMAIL') ? NULL : define('USER_EMAIL', 'email');
defined('PHONE_NUMBER') ? NULL : define('PHONE_NUMBER', 'phone_number');
defined('USER_NAME') ? NULL : define('USER_NAME', 'username');
defined('USER_PASSWORD') ? NULL : define('USER_PASSWORD', 'password');
defined('FROM_ADDRESS') ? NULL : define('FROM_ADDRESS', 'from_address');
defined('TO_ADDRESS') ? NULL : define('TO_ADDRESS', 'to_address');
defined('PASSENGER_NUMBER') ? NULL : define('PASSENGER_NUMBER', 'passenger_number');
defined('LAUGAGE') ? NULL : define('LAUGAGE', 'laugage');
defined('DESCRIPTION') ? NULL : define('DESCRIPTION', 'description');
defined('BOOKING_DATE') ? NULL : define('BOOKING_DATE', 'description');
defined('DESCRIPTION') ? NULL : define('DESCRIPTION', 'booking_date');
defined('CONFIRM_CODE') ? NULL : define('CONFIRM_CODE', 'confirmcode');
defined('CAB_ID') ? NULL : define('CAB_ID', 'cab_id');
defined('CAB_NAME') ? NULL : define('CAB_NAME', 'cab_name');
defined('CAB_MODEL') ? NULL : define('CAB_MODEL', 'cab_model');
defined('CAB_NUMBER') ? NULL : define('CAB_NUMBER', 'cab_number');
defined('CAB_REGULAR_LOCATIONS') ? NULL : define('CAB_REGULAR_LOCATIONS', 'cab_regular_locations');
defined('USER_ID_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('USER_ID_PARAMETER_NOT_FOUND_MESSAGE', 'User id parameter not found in the request.');
defined('NAME_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('NAME_PARAMETER_NOT_FOUND_MESSAGE', 'Name parameter not found in the request.');
defined('TYPE_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('TYPE_PARAMETER_NOT_FOUND_MESSAGE', 'UserType parameter not found in the request.');
defined('ROLE_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('ROLE_PARAMETER_NOT_FOUND_MESSAGE', 'Role parameter not found in the request.');
defined('USER_ROLE_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('USER_ROLE_PARAMETER_NOT_FOUND_MESSAGE', 'UserRole parameter not found in the request.');
defined('USER_EMAIL_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('USER_EMAIL_PARAMETER_NOT_FOUND_MESSAGE', 'UserEmail parameter not found in the request.');
defined('USER_PHONE_NUMBER_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('USER_PHONE_NUMBER_PARAMETER_NOT_FOUND_MESSAGE', 'PhoneNumber parameter not found in the request.');
defined('USER_NAME_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('USER_NAME_PARAMETER_NOT_FOUND_MESSAGE', 'UserName parameter not found in the request.');
defined('USER_PASSWORD_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('USER_PASSWORD_PARAMETER_NOT_FOUND_MESSAGE', 'Password parameter not found in the request.');
defined('CONFIRMCODE_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('CONFIRMCODE_PARAMETER_NOT_FOUND_MESSAGE', 'ConfirmCode parameter not found in the request.');
defined('CAB_ID_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('CAB_ID_PARAMETER_NOT_FOUND_MESSAGE', 'Cab id parameter not found in the request.');
defined('CAB_NAME_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('CAB_NAME_PARAMETER_NOT_FOUND_MESSAGE', 'Cab Name parameter not found in the request.');
defined('CAB_MODEL_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('CAB_MODEL_PARAMETER_NOT_FOUND_MESSAGE', 'Cab model parameter not found in the request.');
defined('CAB_NUMBER_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('CAB_NUMBER_PARAMETER_NOT_FOUND_MESSAGE', 'Cab number parameter not found in the request.');
defined('CAB_REGULAR_LOCATIONS_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('CAB_REGULAR_LOCATIONS_PARAMETER_NOT_FOUND_MESSAGE', 'Cab regular location parameter not found in the request.');
defined('APP_ID_PARAMETER_NOT_FOUND_MESSAGE') ? NULL : define('APP_ID_PARAMETER_NOT_FOUND_MESSAGE', 'App ID parameter not found in the request.');
defined('ADS_REQUEST_FAILURE_MESSAGE') ? NULL : define('ADS_REQUEST_FAILURE_MESSAGE', 'Error while fetching ads, please try again.');

?>
