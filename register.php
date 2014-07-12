<?PHP
require_once("./dbaccess/membersite_config.php");
$fgmembersite->StartSession();

if (isset($_POST['submitted'])) {

    if ($fgmembersite->RegisterUser()) {

        $fgmembersite->RedirectToURL("thank-you.php");
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

    <?php include "./common-head.inc" ?>
  
    <body>

        <!-- Header Section --> 
        <?php include "header.inc" ?>   



        <!-- Registration Code Start -->
        <div class="row" align="center" >
            <div class="twelve columns">

                <div id='fg_membersite'>
                    <form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                        <fieldset >
                            <legend>Registration</legend>

                            <input type='hidden' name='submitted' id='submitted' value='1'/>

                            <div class='short_explanation'>* required fields</div>
                            <input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />
                            <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

                            <!--User Type-->
                            <div class="container">
                                <label for='name' >Select User Type*: </label><br/>
                                <select name="type">
                                    <option value="company" selected="selected">Company</option>
                                    <option value="admin">Admin</option>
                                </select> 
                            </div>
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
                                <label for='phone_number' >Phone Number*:</label><br/>
                                <input type='text' name='phone_number' id='phone_number' value='<?php echo $fgmembersite->SafeDisplay('phone_number') ?>' maxlength="50" /><br/>
                                <span id='register_phone_nummber_errorloc' class='error'></span>
                            </div>

                            <div class='container'>
                                <label for='username' >User Name*:</label><br/>
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