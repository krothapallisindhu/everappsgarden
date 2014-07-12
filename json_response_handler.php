<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('constants.php');

class json_response_handler {

    /* This function is called when only status message is sent as reponse */
    public function responseWithStatusAndMessage($aStatusValue,$aMessageValue ) {

       $jsonResonse = array(RESPONSE_STATUS_FLAG => $aStatusValue, RESPONSE_MESSAGE_FLAG => $aMessageValue);
            
       header('Content-type: application/json');
            
       echo json_encode($jsonResonse);
       
    }
    
    /* This function is called when status message and action type is sent as reponse */
     public function responseWithStatusMessageAndAction($aStatusValue,$aMessageValue,$aActionType ) {

       $jsonResonse = array(RESPONSE_STATUS_KEY_FLAG=>array(RESPONSE_STATUS_FLAG => $aStatusValue, RESPONSE_MESSAGE_FLAG => $aMessageValue, RESPONSE_ACTION_FLAG=>$aActionType));
            
     // header('Content-type: application/json');
            
       echo json_encode($jsonResonse);
    } 
    
    /* This function is called when status message, action and response data is sent as reponse */
    public function responseWithStatusMessageActionAndResponseData($aStatusValue,$aMessageValue,$aActionType,$aResponseData ) {

        $jsonResonse = array(RESPONSE_STATUS_KEY_FLAG=>array(RESPONSE_STATUS_FLAG => $aStatusValue, RESPONSE_MESSAGE_FLAG => $aMessageValue, RESPONSE_ACTION_FLAG=>$aActionType),RESPONSE_DATA_FLAG=>$aResponseData);
                
      //header('Content-type: application/json');
            
       echo json_encode($jsonResonse);
       
    } 
    
    
    
}
?>
