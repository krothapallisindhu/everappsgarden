<?PHP
require_once("./dbaccess/membersite_config.php");
if (isset($_POST['submitted'])) {

    if ($fgmembersite->RegisterUser()) {
        
        $fgmembersite->RedirectToURL("thank-you.php");
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
       


        <!-- Registration Code Start -->
        <div class="row" align="center" >
            <div class="twelve columns">

                <div id='fg_membersite'>
                    <form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                        <fieldset >
                            <legend>Admin Registration</legend>

                            <input type='hidden' name='submitted' id='submitted' value='1'/>

                            <div class='short_explanation'>* required fields</div>
                            <input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

                            <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
                            <div class='container'>
                                <label for='name' >Your Full Name*: </label><br/>
                                <input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" /><br/>
                                <span id='register_name_errorloc' class='error'></span>
                            </div>
                            <div class='container'>
                                <label for='email' >Email Address*:</label><br/>
                                <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
                                <span id='register_email_errorloc' class='error'></span>
                            </div>
                            <div class='container'>
                                <label for='username' >UserName*:</label><br/>
                                <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
                                <span id='register_username_errorloc' class='error'></span>
                            </div>
                            <div class='container' style='height:80px;'>
                                <label for='password' >Password*:</label><br/>
                                <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                                <noscript>
                                    <input type='password' name='password' id='password' maxlength="50" />
                                </noscript>    
                                <div id='register_password_errorloc' class='error' style='clear:both'></div>
                            </div>

                            <div class='container'>
                                <input type='submit' name='Submit' value='Submit' />
                            </div>

                        </fieldset>
                    </form>
                    <!-- client-side Form Validations:
                    Uses the excellent form validation script from JavaScript-coder.com-->

                    <script type='text/javascript'>
                        // <![CDATA[
                        var pwdwidget = new PasswordWidget('thepwddiv', 'password');
                        pwdwidget.MakePWDWidget();

                        var frmvalidator = new Validator("register");
                        frmvalidator.EnableOnPageErrorDisplay();
                        frmvalidator.EnableMsgsTogether();
                        frmvalidator.addValidation("name", "req", "Please provide your name");

                        frmvalidator.addValidation("email", "req", "Please provide your email address");

                        frmvalidator.addValidation("email", "email", "Please provide a valid email address");

                        frmvalidator.addValidation("username", "req", "Please provide a username");

                        frmvalidator.addValidation("password", "req", "Please provide a password");

                        // ]]>
                    </script>
                </div>
            </div>
            <!--
            Registration Code End (see html-form-guide.com for more info.)
            -->


            <!--Footer Section --> 
            <?php include "footer.inc" ?>   
    

    </body>
</html>