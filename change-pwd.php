<?PHP
require_once("./dbaccess/membersite_config.php");
if (!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

if (isset($_POST['submitted'])) {
    if ($fgmembersite->ChangePassword()) {
        $fgmembersite->RedirectToURL("changed-pwd.php");
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
  
        <link rel="STYLESHEET" type="text/css" href="stylesheets/pwdwidget.css" />
      
        <!--[if lt IE 9]>
          <link rel="stylesheet" href="stylesheets/ie.css">
        <![endif]-->

        <script src="javascripts/modernizr.foundation.js"></script>
      
        <script type='text/javascript' src='javascripts/gen_validatorv31.js'></script>
     
        <link rel="STYLESHEET" type="text/css" href="stylesheets/fg_membersite.css">
        <!-- IE Fix for HTML5 Tags -->
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
      
         <script src="javascripts/pwdwidget.js" type="text/javascript"></script>       
    </head>
    <body>

           <!-- Header Section --> 
        <?php include "header.inc" ?>   


  
        <!-- Form Code Start -->
        <div id='fg_membersite' align="center">
            <form id='changepwd' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                <fieldset >
                    <legend>Change Password</legend>

                    <input type='hidden' name='submitted' id='submitted' value='1'/>

                    <div class='short_explanation'>* required fields</div>

                    <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
                    <div class='container'>
                        <label for='oldpwd' >Old Password*:</label><br/>
                        <div class='pwdwidgetdiv' id='oldpwddiv' ></div><br/>
                        <noscript>
                            <input type='password' name='oldpwd' id='oldpwd' maxlength="50" />
                        </noscript>    
                        <span id='changepwd_oldpwd_errorloc' class='error'></span>
                    </div>

                    <div class='container'>
                        <label for='newpwd' >New Password*:</label><br/>
                        <div class='pwdwidgetdiv' id='newpwddiv' ></div>
                        <noscript>
                            <input type='password' name='newpwd' id='newpwd' maxlength="50" /><br/>
                        </noscript>
                        <span id='changepwd_newpwd_errorloc' class='error'></span>
                    </div>

                    <br/><br/><br/>
                    <div class='container'>
                        <input type='submit' name='Submit' value='Submit' />
                    </div>

                </fieldset>
            </form>
            <!-- client-side Form Validations:
            Uses the excellent form validation script from JavaScript-coder.com-->

            <script type='text/javascript'>
                // <![CDATA[
                var pwdwidget = new PasswordWidget('oldpwddiv', 'oldpwd');
                pwdwidget.enableGenerate = false;
                pwdwidget.enableShowStrength = false;
                pwdwidget.enableShowStrengthStr = false;
                pwdwidget.MakePWDWidget();

                var pwdwidget = new PasswordWidget('newpwddiv', 'newpwd');
                pwdwidget.MakePWDWidget();


                var frmvalidator = new Validator("changepwd");
                frmvalidator.EnableOnPageErrorDisplay();
                frmvalidator.EnableMsgsTogether();

                frmvalidator.addValidation("oldpwd", "req", "Please provide your old password");

                frmvalidator.addValidation("newpwd", "req", "Please provide your new password");

                // ]]>
            </script>

            <p>
                <a href='login-home.php'>Home</a>
            </p>

        </div>
        <!--
        Form Code End (see html-form-guide.com for more info.)
        -->

        <!--Footer Section --> 
        <?php include "footer.inc" ?>   

    </body>
</html>