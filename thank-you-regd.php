<?PHP
require_once("./dbaccess/membersite_config.php");
$fgmembersite->StartSession();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
  <meta charset="utf-8" />

        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width" />

        <title>Welcome to Taxi Booking</title>

        <!-- Included CSS Files -->
        <link rel="stylesheet" href="stylesheets/foundation.css">
        <link rel="stylesheet" href="stylesheets/app.css">

        <!--[if lt IE 9]>
          <link rel="stylesheet" href="stylesheets/ie.css">
        <![endif]-->

        <script src="javascripts/modernizr.foundation.js"></script>
       
        <link rel="STYLESHEET" type="text/css" href="stylesheets/fg_membersite.css">
        <!-- IE Fix for HTML5 Tags -->
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        </head>
    <body>
   <!-- Header Section --> 
        <?php include "header.inc" ?>   
   
        <!--
        Contact us Code End (see html-form-guide.com for more info.)
        -->

        <!-- Form Code Start -->

        <div id='fg_membersite_content' align="center">
            <h2>Thanks for registering!</h2>
            Your registration is now complete.
            <p>
                <a href='login.php'>Click here to login</a>
            </p>
        </div>
        
        <!--Footer Section --> 
        <?php include "footer.inc" ?>   


    </body>
</html>