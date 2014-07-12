<?PHP
require_once("./dbaccess/membersite_config.php");
if (isset($_GET['code'])) {
    if ($fgmembersite->ConfirmUser()) {
        $fgmembersite->RedirectToURL("thank-you-regd.php");
    }
}
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


        <!-- Form Code Start -->
  
       

        <!-- Form Code Start -->
        <div id='fg_membersite' align="center">
            <h2>Confirm registration</h2>
            <p>
                Please enter the confirmation code in the box below
            </p>
            <form id='confirm' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='get' accept-charset='UTF-8'>
                <div class='short_explanation'>* required fields</div>
                <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
                <div class='container'>
                    <label for='code' >Confirmation Code:* </label><br/>
                    <input type='text' name='code' id='code' maxlength="50" /><br/>
                    <span id='register_code_errorloc' class='error'></span>
                </div>
                <div class='container'>
                    <input type='submit' name='Submit' value='Submit' />
                </div>

            </form>
            <!-- client-side Form Validations:
            Uses the excellent form validation script from JavaScript-coder.com-->

            <script type='text/javascript'>
                // <![CDATA[

                var frmvalidator = new Validator("confirm");
                frmvalidator.EnableOnPageErrorDisplay();
                frmvalidator.EnableMsgsTogether();
                frmvalidator.addValidation("code", "req", "Please enter the confirmation code");

                // ]]>
            </script>
        </div>
        <!--
        Form Code End (see html-form-guide.com for more info.)
        -->

        <!--Footer Section --> 
        <?php include "footer.inc" ?>   

    </body>
</html>