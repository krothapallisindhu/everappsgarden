<?PHP
require_once("./dbaccess/membersite_config.php");
$fgmembersite->StartSession();

if (isset($_POST['submitted'])) {
    if ($fgmembersite->Login('web')) {
        
        if($fgmembersite->UserType()=="admin")
        {
            $fgmembersite->RedirectToURL("admin-home.php");
        } else {
                        
            $fgmembersite->RedirectToURL("company-home.php");
        }
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

        <!-- Form Code Start -->
        <div id='fg_membersite'  align="center" >
            <form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                <fieldset >
                    <legend>Admin Login</legend>

                    <input type='hidden' name='submitted' id='submitted' value='1'/>

                    <div class='short_explanation'>* required fields</div>

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
                        <label for='username' >User Name*:</label><br/>
                        <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
                        <span id='login_username_errorloc' class='error'></span>
                    </div>
                    <div class='container'>
                        <label for='password' >Password*:</label><br/>
                        <input type='password' name='password' id='password' maxlength="50" /><br/>
                        <span id='login_password_errorloc' class='error'></span>
                    </div>

                    <div class='container'>
                        <input type='submit' name='Submit' value='Login' />
                    </div>
                    <div class='container'>
                        <input type="button" value="Register" onclick="window.location.href = 'register.php';"> 
                    </div>
                   
                    <div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>
                </fieldset>
            </form>
            <!-- client-side Form Validations:
            Uses the excellent form validation script from JavaScript-coder.com-->

            <script type='text/javascript'>
                // <![CDATA[

                var frmvalidator = new Validator("login");
                frmvalidator.EnableOnPageErrorDisplay();
                frmvalidator.EnableMsgsTogether();

                frmvalidator.addValidation("username", "req", "Please provide your username");

                frmvalidator.addValidation("password", "req", "Please provide the password");

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