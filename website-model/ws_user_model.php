<?PHP

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('GenericClasses/GenericCollectionClass.php');
require_once('dbaccess/DBHandler.php');
require_once('constants.php');
require_once ('dbaccess/formvalidator.php');

class ws_user_model {

    var $tablename;
    var $error_message;

    public function __construct() {

        $this->tablename = BOOKING_TABLE;
    }

  
//-------Main Operations ----------------------
    public function updateBookingRecord() {

        if (!isset($_POST['submitted'])) {
            return false;
        }

        $formvars = array();

        if (!$this->validateRegistrationSubmission()) {
            return false;
        }

        $this->collectRegistrationSubmission($formvars);

        if (!$this->saveToDatabase($formvars)) {
            return false;
        }
        return true;
    }

    public function validateRegistrationSubmission() {

        $wscommonmodel = new ws_common_model();

//This is a hidden input field. Humans won't fill this field.
        if (!empty($_POST[$wscommonmodel->GetSpamTrapInputName()])) {
//The proper error is not given intentionally
            $this->setErrorMessage("Automated submission prevention: case 2 failed");
            return false;
        }

        $validator = new FormValidator();
        $validator->addValidation("booking_id", "req", "Please select any booking");
        $validator->addValidation("driver_id", "req", "Please fill DriverId");
        $validator->addValidation("booking_approved", "req", "Please fill your approvness");
        if (!$validator->ValidateForm()) {
            $error = '';
            $error_hash = $validator->GetErrors();
            foreach ($error_hash as $inpname => $inp_err) {
                $error .= $inpname . ':' . $inp_err . "\n";
            }
            $this->setErrorMessage($error);
            return false;
        }
        return true;
    }

    public function collectRegistrationSubmission(&$formvars) {

        $wscommonmodel = new ws_common_model();
        $formvars['booking_id'] = $wscommonmodel->Sanitize($_POST['booking_id']);
        $formvars['driver_id'] = $wscommonmodel->Sanitize($_POST['driver_id']);
        $formvars['booking_approved'] = $wscommonmodel->Sanitize($_POST['booking_approved']);
    }

    public function saveToDatabase(&$formvars) {

        /* if (!$this->DBLogin()) {
          $this->anandleError("Database login failed!");
          return false;
          } */



        if (!$this->ensuretable()) {
            return false;
        }


        /* if (!$this->IsFieldUnique($formvars, 'email')) {
          $this->HandleError("This email is already registered");
          return false;
          }

          if (!$this->IsFieldUnique($formvars, 'username')) {
          $this->HandleError("This UserName is already used. Please try another username");
          return false;
          } */



        if (!$this->insertIntoDB($formvars)) {
            $this->setErrorMessage("Inserting to Database failed!");
            return false;
        }


        return true;
    }

    public function ensureTable() {

        $dbhandler = new DBHandler();
        $dbhandler->openConnection();


        $result = mysql_query("SHOW COLUMNS FROM $this->tablename");


        $dbhandler->closeConnection();

        if (!$result || mysql_num_rows($result) <= 0) {
            return $this->createTable();
        }
        return true;
    }

    public function createTable() {

        $dbhandler = new DBHandler();
        $dbhandler->openConnection();

        $qry = "Create Table $this->tablename (" .
                "booking_id INT NOT NULL AUTO_INCREMENT ," .
                "driver_id INT NOT NULL ," .
                "cab_id INT NOT NULL ," .
                "from_address VARCHAR(200) NOT NULL ," .
                "to_address VARCHAR(200) NOT NULL ," .
                "passenger_number INT NOT NULL ," .
                "laugage INT NOT NULL ," .
                "description VARCHAR(200) NOT NULL ," .
                "booking_date VARCHAR(200) NOT NULL ," .
                "approved VARCHAR(7) NOT NULL ," .
                "PRIMARY KEY ( booking_id )," .
                "FOREIGN KEY ( driver_id ) REFERENCES eag_users (id_user)," .
                "FOREIGN KEY ( cab_id ) REFERENCES tb_cabs (cab_id)" .
                ")";


        if (!$dbhandler->executeStatement($qry)) {
            $this->setErrorMessage("Error creating the table \nquery was\n $qry");
            return false;
        }

        $dbhandler->closeConnection();

        return true;
    }

    function insertIntoDB(&$formvars) {

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();


        $wscommonmodel = new ws_common_model();
        $booking_id = $wscommonmodel->SanitizeForSQL($formvars['booking_id']);
        $driver_id = $wscommonmodel->SanitizeForSQL($formvars['driver_id']);
        $booking_approved = $wscommonmodel->SanitizeForSQL($formvars['booking_approved']);
        $insert_query = sprintf("UPDATE " . $this->tablename . " SET driver_id='$driver_id', approved='$booking_approved' WHERE booking_id='$booking_id'");

        $dbhandler->executeStatement($insert_query);

        $dbhandler->closeConnection();

        return $booking_approved;
    }

    /* Getting driver details */

    public function getDriverObjectsArray() {

        $myCollection = new GenericCollection();

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = sprintf("select * from eag_users where confirmcode='y' and type ='company' and role ='driver'");

        $resultedrows = $dbhandler->executeStatement($query);

        //Convert the database result to dataobjects and add to collection object
        $i = 0;
        while ($row = mysql_fetch_assoc($resultedrows)) {

            //Creating dataobject from the database result
            $driverDetails = new User();
            $driverDetails->setUserId($row['id_user']);
            $driverDetails->setName($row['name']);
            $driverDetails->setType($row['type']);
            $driverDetails->setPhoneNumber($row['phone_number']);
            $driverDetails->setUserName($row['username']);
            $driverDetails->setLattitude($row['lattitude']);
            $driverDetails->setLongitude($row['longitude']);
            $driverDetails->setConfirmCode($row['confirmcode']);
            //Adding data object to collection object
            $myCollection->addObject($i, $driverDetails);
            $i = $i + 1;
        }

        $dbhandler->closeConnection();

        return $myCollection;
    }

    /* Getting driver details */

    public function getUserObjectsArray() {

        $myCollection = new GenericCollection();

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();

        $query = sprintf("select * from eag_users where confirmcode='y' and type ='user' and role ='user'");

        $resultedrows = $dbhandler->executeStatement($query);

        //Convert the database result to dataobjects and add to collection object
        $i = 0;
        while ($row = mysql_fetch_assoc($resultedrows)) {

            //Creating dataobject from the database result
            $driverDetails = new User();
            $driverDetails->setUserId($row['id_user']);
            $driverDetails->setName($row['name']);
            $driverDetails->setType($row['type']);
            $driverDetails->setPhoneNumber($row['phone_number']);
            $driverDetails->setUserName($row['username']);
            $driverDetails->setLattitude($row['lattitude']);
            $driverDetails->setLongitude($row['longitude']);
            $driverDetails->setConfirmCode($row['confirmcode']);
            //Adding data object to collection object
            $myCollection->addObject($i, $driverDetails);
            $i = $i + 1;
        }

        $dbhandler->closeConnection();

        return $myCollection;
    }

    public function getCompanyObjectsArray() {
        
        $myCollection = new GenericCollection();

        $dbhandler = new DBHandler();

        $dbhandler->openConnection();


        $query = sprintf("select * from eag_users where confirmcode='y' and type ='company' and role ='admin'");

        $resultedrows = $dbhandler->executeStatement($query);

        //Convert the database result to dataobjects and add to collection object
        $i = 0;
        while ($row = mysql_fetch_assoc($resultedrows)) {

            //Creating dataobject from the database result
            $userDetails = new User();
            $userDetails->setUserId($row['id_user']);
            $userDetails->setName($row['name']);
            $userDetails->setType($row['type']);
            $userDetails->setPhoneNumber($row['phone_number']);
            $userDetails->setUserName($row['username']);
            $userDetails->setLattitude($row['lattitude']);
            $userDetails->setLongitude($row['longitude']);
            $userDetails->setConfirmCode($row['confirmcode']);
            //Adding data object to collection object
            $myCollection->addObject($i, $userDetails);
            $i = $i + 1;
        }

        return $myCollection;
    }

}
