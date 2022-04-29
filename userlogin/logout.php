
<?php

require_once "config.php";

// Initialize the session
session_start();

date_default_timezone_set('Asia/Calcutta');
$datetime=date('Y-m-d H:i:s');


$usql="UPDATE track_log_user SET logout_timestamp='$datetime' WHERE username ='$_SESSION[username]'";
if (mysqli_query($link,$usql)){
    echo "sucess";
}
else{
echo "error" . $usql . mysqli_error($link);
}

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");

exit;
?>