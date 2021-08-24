<?php
require_once "../config.php";

$category_id = '1';
if(isset($_GET['categoryid']) != 0){
	$category_id = 'category_id=' . $_GET['categoryid'];
}else{
	$category_id = '1';
}

$sql = "SELECT * FROM DOCUMENTS WHERE " . $category_id;
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