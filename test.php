<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Campaign Creation</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  </head>
  <body>

 <h1>Test Audience Creation</h1>
 
 
 <script>
	  $fb = new Facebook\Facebook([
  'app_id' => '1401796643196931',
  'app_secret' => 'c9fc2f16daa03d96e2c888116dd2ec13',
  'default_graph_version' => 'v2.9',
  ]);
</script>
  <?php
	require_once __DIR__ . '/vendor/autoload.php';


//Get the enums from FackBook
use Facebook\Facebook;
use FacebookAds\Api;
use FacebookAds\Object\CustomAudience;
use FacebookAds\Object\Fields\CustomAudienceFields;
use FacebookAds\Object\Values\CustomAudienceSubtypes;
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Fields\AdAccountFields;


	  
$app_id = '1401796643196931';
$app_secret = 'c9fc2f16daa03d96e2c888116dd2ec13';
$access_token = 'EAAT67Tb3EAMBAN92uFMU194vLC9nrjiYe3vjMyVp0t5objeJd0GyRpZC0s4ZAlqS4tPUQNKu3iGltj8GH8mRok2w85OummlWj57Cs6eoKkZAzVZBnqPCTjo40cZBF8VfvOq7nLJy4o1UmY8UJnsU05xgnYvoFAPgZD';

	  // Initialize a new Session and instanciate an Api object
	  Api::init($app_id, $app_secret, $access_token);

	  // The Api object is now available through singleton
	  $api = Api::instance();
	
	  
	  //Get some variables
	  $account_values = array(
		// "oems" => array(
//		  		"models" => array(
//		  			"model" => $_POST["model"]
//		  		)
//		  ),
		  	"days" => array(
		  			"lengths" => array(
		  					"1" => "15",
		  					"2" => "30",
		  					"3" => "45", 
		  					"4" => "60", 
		  					"5" => "90",
		  					"6" => "180")
		  )
	  	);
	  	 //var_dump($account_values["oems"]["models"]["model"]);
	  print_r($_POST["model"]);
		foreach($account_values as $key => $value) {
				
				$myarray = $account_values["days"];
					$keys = array_keys($myarray);
					for($i = 0; $i < count($myarray); $i++) {
							foreach($account_values["days"][$keys[$i]] as $key => $value) {
								$day = $value;
							
						
				//$myarray2 = $account_values["oems"]["models"]["model"];
//					$keys = array_keys($myarray2);
//					for($i = 0; $i < count($myarray2); $i++) {
//							foreach($myarray2[$keys[$i]] as $key => $value) {
//								$model = $value;
//							}
//					}
							
	  			$custom_audience = new CustomAudience(null, 'act_'.$_POST["account"].'');
				$custom_audience->setData(array(
				  CustomAudienceFields::PIXEL_ID => $_POST["pixel"],
				CustomAudienceFields::NAME => 'Retargeting - '.$_POST["make"].' - '.$_POST["model"].' '
					.$_POST["make"].' ('.$day.' Days)',
				  CustomAudienceFields::SUBTYPE => CustomAudienceSubtypes::WEBSITE,
				  CustomAudienceFields::RULE => array(
						'url' => array('i_contains' => $_POST["model"], 'regex_match' => $_POST["model"]),
					),
				  CustomAudienceFields::PREFILL => true,
				  CustomAudienceFields::RETENTION_DAYS => $day,
		));
		//$custom_audience->create();
		
		}
					}
					}
	
		
	  
		
		
						
		echo "<br />";			
	
				
	   echo "<h4>Custom Audience Created</h4>";
	  //show output
	  $account = new AdAccount('act_'.$_POST["account"].'');
	  $audiences = $account->getCustomAudiences();
	  $array = ($custom_audience->getData(array(CustomAudienceFields::PIXEL_ID)));
	  	
	  	//print_r($custom_audience->getData(array(CustomAudienceFields::NAME => '')));
	  //echo "<br/>";
	  //print_r($array);
			
	  foreach($array as $key => $value) 
		 if (!is_array($value) && $key == 'pixel_id') {
			 $pixel = $array['pixel_id'];
			 $name = $array['name'];
		 	echo "Account ID - " . $_POST["account"]."<br />";
			echo "Name - " . $array['name']."<br />";
			echo "Pixel ID - " . $array['pixel_id']."<br />";
	  	}
	  	else if(is_array($value) && $value = 'rule')
		{
			$myarray = $array['rule'];
				$keys = array_keys($myarray);
				for($i = 0; $i < count($myarray); $i++) {
					echo $keys[$i] . " -<br /><ul>";
					foreach($myarray[$keys[$i]] as $key => $value) {
						echo "<li>" . $key . " : " . $value . "</li>";
					}
					echo "</ul>";
				}
		}
	  else {
		  
	  }
	  
	  echo "<br />";
	  
	  //Display all accounts
	  echo "<h4>All Audiences</h4>";
	  $account = new AdAccount('act_'.$_POST["account"].'');
$audiences = $account->getCustomAudiences();
$audiencesObjects = $audiences->getObjects();

foreach($audiencesObjects as $audienceObj) {
    $data = $audienceObj->read(['name', 'rule'])->getData();
		echo "Account ID - " . $_POST["account"]."<br />";
			echo "Name - " . $data['name']."<br />";
			$myarray = $array['rule'];
				$keys = array_keys($myarray);
				for($i = 0; $i < count($myarray); $i++) {
					echo $keys[$i] . " -<br /><ul>";
					foreach($myarray[$keys[$i]] as $key => $value) {
						echo "<li>" . $key . " : " . $value . "</li>";
					}
					echo "</ul>";
				}
}
	  
	  //The code to use the audience in an AdSet was:
$targeting = array(
    'custom_audiences' => array(
        array(
            'id' => $custom_audience->{CustomAudienceFields::ID},
            'name' => $custom_audience->{CustomAudienceFields::NAME},
        )
    )
);
	  ;?>
	  
	  
  
  
  
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
  </body>
</html>