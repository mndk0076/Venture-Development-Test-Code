<?php

require_once "../config.php";

$document_id = $_GET['document_id'];
$document_name = $_GET['document_name'];
$timestamp = date("Y-m-d H:i:s");

$sql = "UPDATE documents SET name='$document_name', updated_at='$timestamp' WHERE id='$document_id'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();