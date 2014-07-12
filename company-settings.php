<?PHP
require_once("./dbaccess/membersite_config.php");
if (!$fgmembersite->CheckLogin()) {

    $fgmembersite->StartSession();
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

    <!-- Header Section --> 
    <?php include "./common-head.inc" ?>   

    <body>

        <!-- Header Section --> 
        <?php include "header.inc" ?>   


        <!--Left Navigation Starts Here-->
        <div class="row" style="padding-left: 15px;" >
            <div class="two columns" style="background: #4d4d4d;" >
                <ul class="nav-bar" >
                    <li style="width: 100%;" ><a href="admin-home.php"><b>Employees</b></a></li>
                    <li style="width: 100%;" ><a href="applications.php"><b>Applications</b></a></li>
                    <li style="width: 100%;" ><a href="advertisements.php"><b>Advertisements</b></a></li>
                    <li style="width: 100%;" class="active"><a href="company-settings.php"><b>Settings</b></a></li>
                </ul>
            </div>
            <div id='fg_membersite_content' align="center">

                </br> </br></br> </br>

                <p><a href='change-pwd.php'>Change password</a></p>
                <p><a href='logout.php'>Logout</a></p>
            </div>

        </div>
        <!--Left Navigation Ends Here-->

        <!--Content here-->


        <!--Footer Section --> 
        <?php include "footer.inc" ?>   



    </body>
</html>
