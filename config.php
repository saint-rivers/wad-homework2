<?php

$servername = "localhost";

$username = "dayan"; 

$password = "password"; 

$dbname = "rupp"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}
