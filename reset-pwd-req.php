<?PHP
require_once("./dbaccess/membersite_config.php");
$fgmembersite->StartSession();

$emailsent = false;
if (isset($_POST['submitted'])) {
    if ($fgmembersite->EmailResetPasswordLink()) {
        
        $fgmembersite->RedirectToURL("reset-pwd-link-sent.php");
        exit;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
      
        <meta charset="utf-8" />

        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width" />

        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>

        <title>Welcome to Taxi Booking</title>

        <link rel="STYLESHEET" type="text/css" href="stylesheets/fg_membersite.css" />

        <!-- Included CSS Files -->
        <link rel="stylesheet" href="stylesheets/foundation.css">

        <link rel="stylesheet" href="stylesheets/app.css">

        <script type='text/javascript' src='javascripts/gen_validatorv31.js'></script>

        <link rel="STYLESHEET" type="text/css" href="stylesheets/pwdwidget.css" />

        <script src="javascripts/pwdwidget.js" type="text/javascript"></script>      

        <script src="javascripts/modernizr.foundation.js"></script>

        <!--[if lt IE 9]>
            <link rel="stylesheet" href="stylesheets/ie.css">
        <![endif]-->


        <!-- IE Fix for HTML5 Tags -->
            <!--[if lt IE 9]>
             <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->   

        
    </head>
    <body>
        
        
        <!-- Header Section --> 
        <?php include "header.inc" ?>   


        <!-- Form Code Start -->
        <div id='fg_membersite' align = "center">
            <form id='resetreq' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                <fieldset >
                    <legend>Reset Password</legend>

                    <input type='hidden' name='submitted' id='submitted' value='1'/>

                    <div class='short_explanation'>* required fields</div>

                    <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
                    <div class='container'>
                        <label for='username' >Your Email*:</label><br/>
                        <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
                        <span id='resetreq_email_errorloc' class='error'></span>
                    </div>
                    <div class='short_explanation'>A link to reset your password will be sent to the email address</div>
                    <div class='container'>
                        <input type='submit' name='Submit' value='Submit' />
                    </div>

                </fieldset>
            </form>
            <!-- client-side Form Validations:
            Uses the excellent form validation script from JavaScript-coder.com-->

            <script type='text/javascript'>
                // <![CDATA[

                var frmvalidator = new Validator("resetreq");
                frmvalidator.EnableOnPageErrorDisplay();
                frmvalidator.EnableMsgsTogether();

                frmvalidator.addValidation("email", "req", "Please provide the email address used to sign-up");
                frmvalidator.addValidation("email", "email", "Please provide the email address used to sign-up");

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