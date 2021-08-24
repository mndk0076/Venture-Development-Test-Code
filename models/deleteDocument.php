<?php

require_once "../config.php";

$document_id = $_GET['document_id'];

$sql = "DELETE FROM documents WHERE id='$document_id'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();