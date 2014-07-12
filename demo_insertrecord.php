<?PHP
require_once("./dbaccess/taxibooking_config.php");
require_once("./dbaccess/membersite_config.php");
require_once("./dbaccess/ws_common_model_config.php");
$fgmembersite->StartSession();

if (isset($_POST['submitted'])) {
    
    if ($wsbookingmodel->addBookingRecord()) {
               
                
        $fgmembersite->RedirectToURL("demo_insertrecord.php");

    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
  
    <?php include "./common-head.inc"?>
  
    <body>

       <!-- Header Section --> 
        <?php include "header.inc" ?>   
       


        <!-- Registration Code Start -->
        <div class="row" align="center" >
            <div class="twelve columns">

                <div id='fg_membersite'>
                    <form id='addGroupRecord' action='<?php echo $wscommonmodel->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                        <fieldset >
                            <legend>Group</legend>

                            <input type='hidden' name='submitted' id='submitted' value='1'/>

                            <div class='short_explanation'>* required fields</div>
                            <input type='text'  class='spmhidip' name='<?php echo $wscommonmodel->GetSpamTrapInputName(); ?>' />
                            <div><span class='error'><?php echo $wsbookingmodel->getErrorMessage(); ?></span></div>
                          
                            <div class='container'>
                                <label for='name' >Your Full Name*: </label><br/>
                                <input type='text' name='name' id='name' value='<?php echo $wscommonmodel->SafeDisplay('name') ?>' maxlength="50" /><br/>
                                <span id='register_name_errorloc' class='error'></span>
                            </div>
                          
                          <div class='container'>
                                <label for='email' >Email Address*:</label><br/>
                                <input type='text' name='email' id='email' value='<?php echo $wscommonmodel->SafeDisplay('email') ?>' maxlength="50" /><br/>
                                <span id='register_email_errorloc' class='error'></span>
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

                        var frmvalidator = new Validator("addGroupRecord");
                        frmvalidator.EnableOnPageErrorDisplay();
                        frmvalidator.EnableMsgsTogether();
                        frmvalidator.addValidation("name", "req", "Please provide your name");

                        frmvalidator.addValidation("email", "req", "Please provide your description");

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