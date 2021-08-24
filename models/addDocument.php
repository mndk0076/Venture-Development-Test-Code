<?php

require_once "../config.php";

$category_id = $_GET['categoryid'];
$document_name = $_GET['document_name'];
$timestamp = date("Y-m-d H:i:s");

$sql = "INSERT INTO documents (category_id, name, created_at) VALUES ('$category_id', '$document_name', '$timestamp')";

if ($conn->query($sql) === TRUE) {
  echo "Record added successfully";
} else {
  echo "Error adding record: " . $conn->error;
}

$conn->close();
?>