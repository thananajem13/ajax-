<?php
include('db_config.php');
$states = $cities = array(); 

	// Fetch state name base on country id
	$query = "SELECT * FROM states WHERE country_id = 1";
	$result = $con->query($query);
	
	// if ($result->num_rows > 0) {
		// states.= '<option value="">Select State</option>'; 
		while ($row = $result->fetch_assoc()) {
			$states[] = array("id" => $row['id'],
			"state_name" => $row['state_name']
		);
		}   
		echo json_encode($states); 
 
?>