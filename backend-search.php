<?php
include('db_connection.php');

$link = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	
// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
//var_dump($term);
//function myfunction($v){
//	return $v;
//}
//$term = array_map('myfunction', $_REQUEST['term']);  
    // Attempt select query execution
    $sql = "SELECT * FROM oems WHERE make LIKE '" . $term . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
				$i = 0;
    			foreach ($result as $row)
    			{
        		echo "<label class='checkbox-inline form-check-label'><input type='checkbox' value ='". $row['model'] ."' id='". $row['model'] ."' name='model[".$i++."][" . $row['model'] . "]'>" . $row['model']. "</option><br /></label>";
    			}

                
				
		}
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }


// close connection
mysqli_close($link);
;?>