
<?php
    /*
     Allows the user to both create new records and edit existing records
     $      */
    
    // connect to the database
    include("Constants.php");
    
    // creates the new/edit record form
    // since this form is used multiple times in this file, I have made it a function that is easily reusable
    function renderForm($cab_name='',$cab_model='',$cab_number='', $cab_regular_locations = '',$lattitude='',$longitude='',$cab_id = '')
 { 
        
        ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
   
<form name="f1" method="post" onSubmit="return validateForm();" action="" >
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
<!--td width="31px" height="25" bgcolor="#EC6921">&nbsp;</td-->
<td height="25" height="25" colspan="2" bgcolor="#68B92E" class="form_heading"><font color="#FCFBFB">Edit Cab Details</td>
</tr>

<?php if ($cab_id != '') { ?>
<input type="hidden" name="cab_id" value="<?php echo $cab_id; ?>" />

<?php } ?>

<tr><td bgcolor="#FFFFFF" height="28" class="form_txt">Name: </td>
<td bgcolor="#FFFFFF"><input type="text" name="cab_name"
value="<?php echo $cab_name; ?>" /></td><br/>
</tr>

<tr><td bgcolor="#FFFFFF" height="28" class="form_txt">Model:</td>
<td bgcolor="#FFFFFF"><input type="text" name="type"
value="<?php echo $cab_model; ?>" /></td><br/>
</tr>

<tr><td bgcolor="#FFFFFF" height="28" class="form_txt">Regular Locations:</td>
<td bgcolor="#FFFFFF"><input type="text" name="technology"
value="<?php echo $cab_regular_locations; ?>" /></td><br/>
</tr>

<tr><td bgcolor="#FFFFFF" height="28" class="form_txt">Latitude: </td>
<td bgcolor="#FFFFFF"><input type="text" name="exp"
value="<?php echo $lattitude; ?>" /></td><br/>
</tr>

<tr><td bgcolor="#FFFFFF" height="28" class="form_txt">Longitude: </td>
<td bgcolor="#FFFFFF"><input type="text" name="email"
value="<?php echo $longitude; ?>" /></td><br/>
</tr>


<tr><td><input type="submit" name="submit" style="background-color:#68B92E" value="Submit" /></td></tr>

</table></form></sup>
</body>
</html>


<?php }
    
    
    
    /*
     
     EDIT USER
     
     */
    // if the 'id' variable is set in the URL, we know that we need to edit a record
    if (isset($_GET['empid']))
    {
        $res=$_GET['empid'];
        
        // if the form's submit button is clicked, we need to process the form
        if (isset($_POST['submit']))
        {
            // make sure the 'id' in the URL is valid
            if (is_numeric($res))
            {
                // get variables from the URL/form
                $empid = $res;
                $username = htmlentities($_POST['username'], ENT_QUOTES);
                $type = htmlentities($_POST['type'], ENT_QUOTES);
                $technology= htmlentities($_POST['technology'], ENT_QUOTES);
                $exp= htmlentities($_POST['exp'], ENT_QUOTES);
                $email= htmlentities($_POST['email'], ENT_QUOTES);
                $password= htmlentities($_POST['password'], ENT_QUOTES);
                
                $date= htmlentities($_POST['date_join'], ENT_QUOTES);
//                $company= htmlentities($_POST['company'], ENT_QUOTES);
                
                
                // check that firstname and lastname are both not empty
                if ($username == '' ||$type==''|| $technology == '' || $exp=='' ||$em=''||
                    $password=='' || $date=='')
                {
                    // if they are empty, show an error message and display the form
                    $error = 'ERROR: Please fill in all required fields!';
                    renderForm($username,$type,$technology,$exp,$email,$password,$date,
                               $empid);
                }
                else
                {
                    // if everything is fine, update the record in the database
                    if ($stmt = $mysqli->prepare("update tb_cabs SET username='$username',type='$type',technology='$technology',exp='$exp',email='$email',password='$password',date_join='$date' where empid='$empid'"))
                        
                    {
                        $stmt->execute();
                        $stmt->close();
                    }
                    // show an error message if the query has an error
                    else
                    {
                        echo "ERROR: could not prepare SQL statement.";
                    }
                    

			echo '<script type="text/javascript">
        window.location.href="UserListViewController.php";
        </script>';
                    // redirect the user once the form is updated
                    //header("Location: UserListViewController.php");
                }
            }
            // if the 'id' variable is not valid, show an error message
            else
            {
                echo "Error!";
            }
        }
        // if the form hasn't been submitted yet, get the info from the database and show the form
        else
        {
            // make sure the 'id' value is valid
            if (is_numeric($_GET['cab_id']) && $_GET['cab_id'] > 0)
            {
                // get 'id' from URL
                $empid = $_GET['cab_id'];
                
                // get the recod from the database
                if($stmt = $mysqli->prepare("SELECT * FROM tb_cabs WHERE cab_id=$cab_id"))
                {
                    
                    $stmt->execute();
                    
                    $stmt->bind_result($ecab_id, $cab_name,$type,$technology,$exp,$email,$password,$date,$company);
                    $stmt->fetch();
                    
                    // show the form
                    renderForm($username,$type,$technology,$exp,$email,$password,$date,$company, NULL, $empid);
                    
                    $stmt->close();
                }
                // show an error if the query has an error
                else
                {
                    echo "Error: could not prepare SQL statement";
                }
            }
            // if the 'id' value is not valid, redirect the user back to the view.php page
            else
            {
				echo '<script type="text/javascript">
        window.location.href="UserListViewController.php";
        </script>';
                

//header("Location: UserListViewController.php");
            }
        }
    }
    
    
    
    /*
     
     NEW RECORD
     
     */
    // if the 'id' variable is not set in the URL, we must be creating a new record
    else
    {
        // if the form's submit button is clicked, we need to process the form
        if (isset($_POST['submit']))
        {
            $cab_name = htmlentities($_POST['cab_name'], ENT_QUOTES);
            $cab_model= htmlentities($_POST['cab_model'], ENT_QUOTES);
             $cab_number= htmlentities($_POST['cab_number'], ENT_QUOTES);
            $cab_regular_locations= htmlentities($_POST['cab_regular_locations'], ENT_QUOTES);
            $lattitude= htmlentities($_POST['cab_lattitude'], ENT_QUOTES);
            $longitude = htmlentities($_POST['cab_longitude'], ENT_QUOTES);
            
            // check that firstname and lastname are both not empty
            if ($cab_name == '' || $cab_model == '' || $cab_number == '' || $cab_regular_locations == '' || $lattitude=='' || $longitude==''  )
            {
                // if they are empty, show an error message and display the form
                $error = 'ERROR: Please fill in all required fields!';
                renderForm($cab_name, $cab_model, $cab_number,$cab_regular_locations,$lattitude,$longitude);
            }
            else
            {
                // insert the new record into the database
                if ($stmt = $mysqli->prepare("INSERT tb_cabs (cab_name,cab_model,cab_number,cab_regular_locations,lattitude,longitude) VALUES (?, ?, ?, ? , ? , ? )"))
                {
                    $stmt->bind_param("ss", $cab_name, $cab_model,$cab_number,$cab_regular_locations,$lattitude,$longitude);
                    $stmt->execute();
                    $stmt->close();
                }
                // show an error if the query has an error
                else
                {
                    echo "ERROR: Could not prepare SQL statement.";
                }
                
                // redirec the user
                header("Location: view.php");
            }
            
        }
        // if the form hasn't been submitted yet, show the form
        else
        {
            renderForm();
        }
    }
    
    // close the mysqli connection
    
    ?>
