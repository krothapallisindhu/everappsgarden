<?PHP
require_once("./dbaccess/membersite_config.php");
require_once('dataobjects/eag_ads_info.php');
require_once('website-model/fg_membersite.php');
require_once('components/DataObjectsArrayClass.php');
require_once('dbaccess/DBHandler.php');
require_once('website-model/ws_ads_info_model.php');

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
                                <b>Id</b>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;width:12%;padding-left: 0px;padding-right: 5px;">
                                <b>Type</b>
                            </div>
                         
                        </div>   
                        <?php
                        $model = new ws_ads_info_model();
                        $myCollection = $model->getAdsList();
                        //Getting data from dataobjects using php code
                        for ($i = 0; $i < $myCollection->getLenth(); $i++) {

                            $eagadsinfodetails = $myCollection->getObject($i);
                            ?>

                            <div class="ten columns" style="height:auto;border-left: 1px solid #2BA6CB;padding-top: 10px;padding-bottom: 10px;border-right: 1px solid #2BA6CB;border-bottom: 1px solid #2BA6CB;width:100%;height:auto;padding-left: 0px;padding-right: 0px;">
                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:7%;padding-left: 0px;padding-right: 0px;">
                                    <?php echo $eagadsinfodetails->getID() ?>
                                </div>
                                <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:12%;padding-left: 0px;padding-right: 5px;">
                                    <?php echo $eagadsinfodetails->getType() ?>
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