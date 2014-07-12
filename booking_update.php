<?PHP
require_once("./dbaccess/membersite_config.php");
require_once('dataobjects/Booking.php');
require_once('dataobjects/User.php');
require_once('website-model/fg_membersite.php');
require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');
require_once("./dbaccess/ws_booking_model_config.php");
require_once("./dbaccess/ws_common_model_config.php");
require_once ('./dbaccess/formvalidator.php');
require_once('./website-model/ws_booking_model.php');
if (!$fgmembersite->CheckLogin()) {

    $fgmembersite->StartSession();
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
if (isset($_POST['submitted'])) {


    if ($wsbookingmodel->updateBookingRecord()) {

        $fgmembersite->RedirectToURL("thank-you.php");
       
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

               <h2>Thanks for updating!</h2>
               User will receive booking confirmation mail

                </div>

            </div>
        </div>
        </div><!--Body middle content end-->


        <!--Footer Section --> 
        <?php include "footer.inc" ?>   


    </body>
</html>