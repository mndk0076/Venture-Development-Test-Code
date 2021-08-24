<?php

// Normally I would hide these variables in dotenv
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "database";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}