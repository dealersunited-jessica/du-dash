<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Campaign Test</title>

<!-- Bootstrap -->
<link href="../css/bootstrap.css" rel="stylesheet">

</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '282903702156922',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<?php
	require_once __DIR__ . '/vendor/autoload.php';
	
// use the namespace for Custom Audiences and Fields
use Facebook\Facebook;
use FacebookAds\Api;	
use FacebookAds\Object\CustomAudience;
use FacebookAds\Object\Fields\CustomAudienceFields;
use FacebookAds\Object\Values\CustomAudienceTypes;
use FacebookAds\Object\Values\CustomAudienceSubtypes;
	  
$app_id = '1401796643196931';
$app_secret = 'c9fc2f16daa03d96e2c888116dd2ec13';
$access_token = 'EAAT67Tb3EAMBAN92uFMU194vLC9nrjiYe3vjMyVp0t5objeJd0GyRpZC0s4ZAlqS4tPUQNKu3iGltj8GH8mRok2w85OummlWj57Cs6eoKkZAzVZBnqPCTjo40cZBF8VfvOq7nLJy4o1UmY8UJnsU05xgnYvoFAPgZD';

	  // Initialize a new Session and instanciate an Api object
	  Api::init($app_id, $app_secret, $access_token);

	  // The Api object is now available through singleton
	  $api = Api::instance();

//Account
$account_id = '862238397184124';
	
	
	//Get Custom Audience
	$custom_audience = new CustomAudience($account_id);
	print_r($custom_audience->getData(array(CustomAudienceFields::NAME)))

	

;?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../js/bootstrap.js"></script>
</body>
</html>
