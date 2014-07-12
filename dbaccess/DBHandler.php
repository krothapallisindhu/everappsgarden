<?PHP

require_once('constants.php');

class DBHandler {

    private $connection;
    private $hostname;
    private $username;
    private $password;
    private $database;

    public function __construct() {

        $this->hostname = DATABASE_HOST;
        $this->username = DATABASE_USER;
        $this->password = DATABASE_PASSWORD;
        $this->database = DATABASE_NAME;
    }

    public function openConnection() {
        // Open database connection
        $this->connection = mysql_connect($this->hostname, $this->username, $this->password)
                or die(mysql_error());

        // Select target database
        mysql_select_db($this->database, $this->connection)
                or die(mysql_error());
    }

    public function closeConnection() {
        if (isset($this->connection)) {
            // Close database connection
            mysql_close($this->connection)
                    or die(mysql_error());
        }
    }

    public function executeStatement($statement) {
        
        // Execute database statement
        $resultedrows = mysql_query($statement, $this->connection)
                or die(mysql_error());


        // Return result
        return $resultedrows;
    }

    public function executeSql($sql) {
        // Execute database statement		
        $resultedrows = $this->executeStatement($sql);

        // Check number of rows returned
        if (mysql_num_rows($resultedrows) == 1) {
            // Fetch multiple rows from the result
            $dictionariesArray = array();
            while ($row = mysql_fetch_object($resultedrows)) {
                $dictionariesArray[] = $row;
            }
        } else {
            // Fetch multiple rows from the result
            $dictionariesArray = array();
            while ($row = mysql_fetch_object($resultedrows)) {
                $dictionariesArray[] = $row;
            }
        }

        // Close database cursor
        mysql_free_result($resultedrows);

        // Return dataset
        return $dictionariesArray;
    }

}

?>