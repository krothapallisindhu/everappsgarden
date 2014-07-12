<?PHP

require_once("./website-model/fg_membersite.php");
require_once("constants.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName(WEBSITE_NAME);

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('admin@everappsgarden.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(DATABASE_HOST,
        /* username */ DATABASE_USER,
        /* password */ DATABASE_PASSWORD,
        /* database name */ DATABASE_NAME,
        /* table name */ USERS_TABLE);

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('ETu3RnpZVvj5E4r');

?>