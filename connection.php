<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "crmms";
$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>