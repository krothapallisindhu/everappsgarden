<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include ('Models/app_info_model.php');
include ("json_response_handler.php");
require_once('constants.php');

$aJsonResponseHander = new json_response_handler;

/* Determining kind of action client wants to perform */
if (!isset($_GET[RESPONSE_ACTION_FLAG])) {
    $aJsonResponseHander->responseWithStatusAndMessage(RESPONSE_STATUS_FLAG_FAILURE_VALUE, ACTION_NOT_FOUND_MESSAGE);
    return;
} else {
    
    $requestType = $_GET[RESPONSE_ACTION_FLAG];

    if (!isset($_GET[APP_NAME])) {
        $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, APP_INFO_NAME_NOT_FOUND_MESSAGE, $requestType);
        return;
    }

    $appname = $_GET[APP_NAME];

    $model = new app_info_model();

    $result = $model->getAppDetails(APP_TYPE_WEB_SERVICE,$appname);
    
    if ($result) {

        $aJsonResponseHander->responseWithStatusMessageActionAndResponseData(RESPONSE_STATUS_FLAG_SUCCESS_VALUE, RESPONSE_STATUS_FLAG_SUCCESS_VALUE, $requestType, $result);
        return;
    } else {

        $aJsonResponseHander->responseWithStatusMessageAndAction(RESPONSE_STATUS_FLAG_FAILURE_VALUE, RESPONSE_STATUS_FLAG_FAILURE_VALUE, $requestType);
        return;
    }
}
?>
