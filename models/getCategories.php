<?php
require_once "../config.php";

$sql = "SELECT * FROM CATEGORIES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$res[] = $row;
	}
} else {
	echo "0 results";
}
echo json_encode($res);