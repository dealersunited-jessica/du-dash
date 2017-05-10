<?php
	include('db_connection.php');
	//require_once('DatabaseInterface.php');
	$make = $_GET["q"];
	$typesData = databaseInterface::getMakesTypes($make);
	return $typesData;

										
											//if (isset($_GET['chk_group[]'])) {
//												$optionArray = $_GET['chk_group[]'];
//												for ($i=0; $i<count($optionArray); $i++) {
//													echo $optionArray[$i]."<br />";
//												}
//											}
											

function getMakesTypes() {
		$query = "SELECT model FROM `oems` WHERE model='$model'";
		$result = mysqli_query($conn, $query) or die ("Couldn't execute query. ".mysqli_error($conn));
		$resultArray = array();
		while ($row = mysqli_fetch_assoc($result)) { 
			extract($row);
			$resultArray[] = $model;   
		}
		return json_encode($resultArray);
}
;?>