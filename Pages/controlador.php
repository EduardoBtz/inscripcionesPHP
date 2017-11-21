<?php
/**
 * Created by PhpStorm.
 * User: miguelbanda
 * Date: 14/11/17
 * Time: 16:52
 */
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root123');
define('DB_DATABASE', 'inscripciones');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

session_start();

//if($_GET["REQUEST_METHOD"] == "GET") {
// username and password sent from form

$myusername = mysqli_real_escape_string($db,$_GET['userName']);
$mypassword = mysqli_real_escape_string($db,$_GET['pass']);

$sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count == 1) {
    header("location: Navigation.html");
}else {
    header("location: loginFail.html");
}
//}

?>