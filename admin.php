<?php

// this line is redundant, see line 13
$username = $_POST['username'];

if(!isset($_SESSION['session']["logged_in"])) { 
  header("Location: login.php");
}

// WARNING - we are using $_GET here but $_POST below
// ERROR - did not close parenthesis
// i've fixed the ERROR
if (isset($_GET['username'])) 
{
  $username = filterinput($_POST['username']);
}

// this is bad practice for security reasons, all included files
// should be local and inaccessible by URL
// requires allow_url_include to be turned on in php.ini
include("http://242.32.23.4/inc/admin.inc.php");
if (isset($_GET['page_id'])) {
  // another bad security move, page_id can be changed by the user in the URL
  // resulting in some unwanted includes
  include('inc/inc' . $_GET['page_id'] . '.php');
  include('inc/inc-base.php');
}

function filterinput($variable)
{
    $variable = str_replace("'", "\'", $variable);
    // ERROR - the double quote below breaks the code
    // should be str_replace("'")
    // i've fixed the code
    $variable = str_replace("'", "\"", $variable);
    return $variable;
}

function getUserContent($username)
{
    // not a good security measure to have mysql credentials in a php file that is served to user
    // would be better to be in an included file that is not url accessible
    $con=mysqli_connect("locahost","dbuser","abc123","my_db");
    $result = mysqli_query($con,"SELECT user_content FROM users where username = ". $username);
    $row = mysqli_fetch_array($result);
    return $row['user_content'];
    mysqli_close($con);
}

echo "<h1>Welcome, ". $username ."</h1>";

echo getUserContent($username);

?>
