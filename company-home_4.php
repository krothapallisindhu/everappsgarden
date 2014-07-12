<?PHP
require_once("./dbaccess/membersite_config.php");
require_once('dataobjects/Booking.php');
require_once('dataobjects/User.php');
require_once('website-model/fg_membersite.php');
require_once('website-model/ws_booking_model.php');
require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');
require_once("./dbaccess/ws_booking_model_config.php");
require_once("./dbaccess/ws_common_model_config.php");
require_once ('./dbaccess/formvalidator.php');

if (!$fgmembersite->CheckLogin()) {

    $fgmembersite->StartSession();
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
if (isset($_POST['submitted'])) {


    if ($wsbookingmodel->updateBookingRecord()) {
        $fgmembersite->RedirectToURL("company-home.php");
    }
}
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
                    <li style="width: 100%;" class="active"><a href="company-home.php"><b>Bookings</b></a></li>
                    <li style="width: 100%;"><a href="cabs.php"><b>Cabs</b></a></li>
                    <li style="width: 100%;"><a href="drivers.php"><b>Drivers</b></a></li>
                    <li style="width: 100%;"><a href="company-users.php"><b>Users</b></a></li>
                    <li style="width: 100%;"><a href="company-settings.php"><b>Settings</b></a></li>
                </ul>
            </div><!--Left Navigation Ends Here-->

            <!--Navigation details content start-->
            <div class="ten columns" >  

                <div class="ten columns" style="width:100%;height:auto;padding-left: 0px;padding-right: 0px;">  
                    <div class="ten columns" style="height:auto;border: 1px solid #2BA6CB;padding-top: 10px;padding-bottom: 10px;background: #2BA6CB;width:100%;height:auto;padding-left: 0px;padding-right: 0px;">
                        <div class="one columns" style="text-align: center;font-size: 12px;width:4%;padding-left: 0px;padding-right: 0px;">
                            <b>S.No</b>
                        </div>

                        <div class="one columns" style="text-align: center;font-size: 12px;width:12%;padding-left: 0px;padding-right: 5px;">
                            <b>From Address</b>
                        </div>
                        <div class="one columns" style="text-align: center;font-size: 12px;width:12%;padding-left: 0px;padding-right: 5px;">
                            <b>To Address</b>
                        </div>
                        <div class="one columns" style="text-align: center;font-size: 12px;width:10%;padding-left: 0px;padding-right: 5px;">
                            <b>Passengers</b>
                        </div>
                        <div class="one columns" style="text-align: center;font-size: 12px;width:7%;padding-left: 0px;padding-right: 5px;">
                            <b>Bags</b>
                        </div> 
                        <div class="one columns" style="text-align: center;font-size: 12px;width:15%;padding-left: 0px;padding-right: 5px;">
                            <b>Description</b>
                        </div> 
                        <div class="one columns" style="text-align: center;font-size: 12px;width:10%;padding-left: 0px;padding-right: 5px;">
                            <b>Date</b>
                        </div> 
                        <div class="one columns" style="text-align: center;font-size: 12px;width:9%;padding-left: 0px;padding-right: 5px;">
                            <b>Select</b>
                        </div> 
                        <div class="one columns" style="text-align: center;font-size: 12px;width:12%;padding-left: 0px;padding-right: 5px;">
                            <b>Approve</b>
                        </div>
                        <div class="one columns" style="font-size: 12px;text-align: center;width:6%;padding-left: 0px;padding-right: 5px;">
                            <b>Action</b>
                        </div>   
                    </div>   
                    <?php
                    $model = new FGMembersite();
                    $myCollection = $model->getEnquiryDetails('web');
                    //Getting data from dataobjects using php code
                    for ($i = 0; $i < $myCollection->getLenth(); $i++) {
                        $bookingDetails = $myCollection->getObject($i);
                        ?>

                        <div class="ten columns" style="height:auto;border-left: 1px solid #2BA6CB;padding-top: 10px;padding-bottom: 10px;border-right: 1px solid #2BA6CB;border-bottom: 1px solid #2BA6CB;width:100%;height:auto;padding-left: 0px;padding-right: 0px;">
                            <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:4%;padding-left: 0px;padding-right: 0px;">
                                <?php echo $bookingDetails->getBookingId() ?>
                            </div>

                            <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:12%;padding-left: 0px;padding-right: 5px;">
                                <?php echo $bookingDetails->getFromAddress() ?>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:12%;padding-left: 0px;padding-right: 5px;">
                                <?php echo $bookingDetails->getToAddress() ?>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:10%;padding-left: 0px;padding-right: 5px;">
                                <?php echo $bookingDetails->getPassengerNumber() ?>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:7%;padding-left: 0px;padding-right: 5px;">
                                <?php echo $bookingDetails->getLaugage() ?>
                            </div> 
                            <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:15%;padding-left: 0px;padding-right: 5px;">
                                <?php echo $bookingDetails->getDescription() ?>
                            </div> 
                            <div class="one columns" style="text-align: center;font-size: 12px;padding-top: 10px;width:10%;padding-left: 0px;padding-right: 5px;">
                                <?php echo $bookingDetails->getBookingDate() ?>
                            </div> 
                            <div class="one columns" style="text-align: center;font-size: 12px;width:9%;padding-left: 0px;padding-right: 5px;">
                                <form name="nameOfForm" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

                                    <?php
                                    $drivermodel = new FGMembersite();
                                    $myCollection = $drivermodel->getDriverDetails('web');
                                    //Getting data from dataobjects using php code
                                    for ($i = 0; $i < $myCollection->getLenth(); $i++) {
                                        $driverDetails = $myCollection->getObject($i);
                                        ?>

                                        <select style='width:65px'  onchange='this.form.submit();' name='driver_id'>
                                            <option> Select </option>
                                            <option value=<?php echo $driverDetails->getUserId() ?>><?php echo $driverDetails->getUserName() ?></option>
                                        </select>
                                        <?php
                                        //End of the for
                                    }
                                    ?>
                                </form>
                                <?php
                                if ($_GET) {
                                    $driver_id = $_GET['driver_id'];
                                    echo $driver_id;
                                }
                                ?>
                            </div> 
                            <div class="one columns" style="text-align: center;font-size: 12px;text-align: center;width:12%;padding-left: 0px;padding-right: 1px;">
                                <form id='addGroupRecord' action='<?php echo $wscommonmodel->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                                    <input type='hidden' name='submitted' id='submitted' value='1'/>              
                                    <div style='width: 50%;text-align: center;float: left'>

                                        <select name="booking_approved">
                                            <option value="Yes" selected="selected">Yes</option>
                                            <option value="No">No</option>
                                        </select> 
                                        <input type='hidden' name='booking_id' id='booking_id' value="<?php echo $bookingDetails->getBookingId(); ?>" maxlength="50" /><br/>                       
                                        <input type='hidden' name='driver_id' id='driver_id' value='<?php echo $_GET['driver_id']; ?>' max <inputlength="50" /><br>
                                    </div>   <div style="width: 50%;float:right"> <input type='submit' name='Submit' value='Submit' /></div>
                                </form>
                            </div>
                            <div class="one columns" style="text-align: center;font-size: 12px;text-align: center;width:6%;padding-left: 0px;padding-right: 1px;">                              
                                <a href="deletebooking.php?booking_id= <?php echo $bookingDetails->getBookingId() ?>"onClick="alert('Are you sure want to Delete??');
                                        return true;"> <img src="images/delete.png" style="width:25px;height:30px;" /></a>
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