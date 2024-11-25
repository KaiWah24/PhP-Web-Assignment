<?php
 $servername = "localhost";
$username = "kaiwah";
$password = "123456";
$dbname = "kaiwah";

// Create connection
$dbc = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}
?>