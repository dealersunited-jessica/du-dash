<?php


 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "oems";


 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

 
	 	//get some makes
		$sql =  "SELECT DISTINCT make FROM `oems` ORDER BY `make` ASC";
	 	 $makes = $conn->query($sql);
		//echo "number of rows: " . $makes->num_rows;
			// output data of each row
		$Displaymake = '';
			while($row = $makes->fetch_assoc()) {
				$make = $row["make"];
				$Displaymake .= "<label class='form-radio-label radio-inline'><input type='radio' value ='". $make ."' id='". $make ."' name='make'>" . $make. "</option><br /></label>";
			}

		//$models = $conn->query("SELECT model, make FROM `oems` WHERE make = '$make' ORDER BY `model` DESC");
//		$model = mysqli_fetch_array($models);
		//echo $model['model'];
		//$model = 'model';
//		$models = $conn->query("SELECT $model FROM `oems` WHERE make = '".$make."' ORDER BY `model` DESC");
//		$model = mysqli_fetch_object($models)->$model; 
				
//trying to echo models
$result = mysqli_query($conn,"SELECT model, make FROM `oems` WHERE model = '$make'");
$Displaymodel = '';
while($row = mysqli_fetch_array($result)) {
	$model = $row["model"];
	$Displaymodel .= "<div class='form-check form-check-inline'><label class='form-check-label'><input type='check' value ='". $model ."' id='make'>" . $model. "</option><br /></label></div>";
}


	
		$conn->close();


?>