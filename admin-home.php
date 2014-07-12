<?PHP
require_once("./dbaccess/membersite_config.php");
require_once('dataobjects/User.php');
require_once('website-model/fg_membersite.php');
require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');
require_once('website-model/ws_user_model.php');

/* if (!$fgmembersite->CheckLogin()) {

  $fgmembersite->StartSession();
  $fgmembersite->RedirectToURL("login.php");
  exit;
  } */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

    <!-- Header Section --> 
    <?php include "./common-head.inc" ?>   

    <body>

        <!-- Header Section --> 
        <?php include "header.inc" ?>   


        <!--Body middle content start-->
        <div class="row" style="padding-left: 15px;" >

            <!--Left Navigation Starts Here-->
            <div class="two columns" style="background: #4d4d4d;" >
                <ul class="nav-bar"  >
                    <li style="width: 100%;" class="active"><a href="admin-home.php"><b>Employees</b></a></li>
                    <li style="width: 100%;" ><a href="admin-applications.php"><b>Applications</b></a></li>
                    <li style="width: 100%;" ><a href="admin-advertisements.php"><b>Advertisements</b></a></li>
                    <li style="width: 100%;" ><a href="admin-adsday.php"><b>Ads/Day</b></a></li>
                    <li style="width: 100%;"><a href="admin-company-settings.php"><b>Settings</b></a></li>

                </ul>
            </div><!--Left Navigation Ends Here-->
            <div class="row" style="padding-left: 15px;padding-right: 10px;" >
                <div class="ten columns" >  
                    <div class="ten columns" style="width:100%;height:auto;padding-left: 0px;padding-right: 0px;">  
                        <div class="ten columns" style="height:auto;border: 1px solid #2BA6CB;padding-top: 10px;padding-bottom: 10px;background: #2BA6CB;width:100%;height:auto;padding-left: 0px;padding-right: 0px;">
                            <div class="one columns" style="text-align: center;font-size: 12px;width:7%;padding-left: 0px;padding-right: 0px;">
                                <b>User Id</b>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;width:12%;padding-left: 0px;padding-right: 5px;">
                                <b>Name</b>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;width:12%;padding-left: 0px;padding-right: 5px;">
                                <b>Phone Number</b>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;width:10%;padding-left: 0px;padding-right: 5px;">
                                <b>User Name</b>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;width:10%;padding-left: 0px;padding-right: 5px;">
                                <b>Latitude</b>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;width:10%;padding-left: 0px;padding-right: 5px;">
                                <b>Longitude</b>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;width:25%;padding-left: 0px;padding-right: 5px;">
                                <b>Confirm Code</b>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;width:12%;padding-left: 0px;padding-right: 5px;">
                                <b>Action</b>
                            </div>    
                        </div>   
                        <?php
                        $model = new ws_user_model();
                        $myCollection = $model->getCompanyObjectsArray();
                        //Getting data from dataobjects using php code
                        for ($i = 0; $i < $myCollection->getLenth(); $i++) {

                            $userDetails = $myCollection->getObject($i);
                            ?>

                            <div class="ten columns" style="height:auto;border-left: 1px solid #2BA6CB;padding-top: 10px;padding-bottom: 10px;border-right: 1px solid #2BA6CB;border-bottom: 1px solid #2BA6CB;width:100%;height:auto;padding-left: 0px;padding-right: 0px;">
                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:7%;padding-left: 0px;padding-right: 0px;">
                                    <?php echo $userDetails->getUserId() ?>
                                </div>
                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:12%;padding-left: 0px;padding-right: 5px;">
                                    <?php echo $userDetails->getName() ?>
                                </div>

                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:12%;padding-left: 0px;padding-right: 5px;">
                                    <?php echo $userDetails->getPhoneNumber() ?>
                                </div>
                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:10%;padding-left: 0px;padding-right: 5px;">
                                    <?php echo $userDetails->getUserName() ?>
                                </div>

                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:10%;padding-left: 0px;padding-right: 5px;">
                                    <?php echo $userDetails->getLattitude() ?>
                                </div>
                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:10%;padding-left: 0px;padding-right: 5px;">

                                    <?php echo $userDetails->getLongitude() ?>
                                </div>
                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:25%;padding-left: 0px;padding-right: 5px;">
                                    <?php echo $userDetails->getConfirmCode() ?>
                                </div>
                                <div class="one columns" style="text-align: center;font-size: 12px;width:12%;padding-left: 0px;padding-right: 5px;">
                                    <a id="userlocation" href="admin-home_map.php?id_user=<?php echo $userDetails->getUserId() ?>&lattitude=<?php echo $userDetails->getLattitude() ?>&longitude=<?php echo $userDetails->getLongitude() ?>" ><img src="images/map.png" style="width:30px;height:30px;"/></a>    
                                    <a href="Edituser.php?id_user=<?php echo $userDetails->getUserId() ?>" > <img src="images/edit.png" style="width:25px;height:30px;"/></a>
                                    <a href="deleteuser.php?id_user= <?php echo $userDetails->getUserId() ?>"onClick="alert('Are you sure want to Delete??');
                                                return true;"><img src="images/delete.png" style="width:25px;height:30px;" /></a>
                                </div>   
                            </div>

                            <?php
                            //End of the for
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div><!--Body middle content end-->


        <!--Footer Section --> 
        <?php include "footer.inc" ?>   


    </body>
</html>