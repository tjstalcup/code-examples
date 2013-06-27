<?php

$username = $_POST['username'];

if(!isset($_SESSION['session']["logged_in"])) { 
  header("Location: login.php");
}

if (isset($_GET['username'])
{
  $username = filterinput($_POST['username']);
}

include("http://242.32.23.4/inc/admin.inc.php");
if (isset($_GET['page_id'])) {
  include('inc/inc' . $_GET['page_id'] . '.php');
  include('inc/inc-base.php');
}

function filterinput($variable)
{
    $variable = str_replace("'", "\'", $variable);
    $variable = str_replace(""", "\"", $variable);
    return $variable;
}

function getUserContent($username)
{
    $con=mysqli_connect("locahost","dbuser","abc123","my_db");
    $result = mysqli_query($con,"SELECT user_content FROM users where username = ". $username);
    $row = mysqli_fetch_array($result);
    return $row['user_content'];
    mysqli_close($con);
}

echo "<h1>Welcome, ". $username ."</h1>";

echo getUserContent($username);

?>
