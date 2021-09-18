<?php
// Include the database connection file
include('db_config.php');
$states = $cities = array();
if (isset($_POST['countryId']) && !empty($_POST['countryId'])) {

	// Fetch state name base on country id
	$query = "SELECT * FROM states WHERE country_id = ".$_POST['countryId'];
	$result = $con->query($query);
	
	// if ($result->num_rows > 0) {
		// states.= '<option value="">Select State</option>'; 
		while ($row = $result->fetch_assoc()) {
			$states[] = array("id" => $row['id'],
			"state_name" => $row['state_name']
		);
		}   
		echo json_encode($states); 

} elseif(isset($_POST['stateId']) && !empty($_POST['stateId'])) {

	// Fetch city name base on state id
	$query = "SELECT * FROM cities WHERE state_id = ".$_POST['stateId'];
	$result = $con->query($query);
  
		while ($row = $result->fetch_assoc()) {
			$cities[] = array("id" => $row['id'],
			"city_name" => $row['city_name']); 
		}
		echo json_encode($cities);
}
?>