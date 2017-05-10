 <script>
	  $fb = new Facebook\Facebook([
  'app_id' => '1401796643196931',
  'app_secret' => 'c9fc2f16daa03d96e2c888116dd2ec13',
  'default_graph_version' => 'v2.9',
  ]);
</script>
<?php
//Get the enums from FackBook
use Facebook\Facebook;
use FacebookAds\Api;
$app_id = '1401796643196931';
$app_secret = 'c9fc2f16daa03d96e2c888116dd2ec13';
$access_token = 'EAAT67Tb3EAMBAN92uFMU194vLC9nrjiYe3vjMyVp0t5objeJd0GyRpZC0s4ZAlqS4tPUQNKu3iGltj8GH8mRok2w85OummlWj57Cs6eoKkZAzVZBnqPCTjo40cZBF8VfvOq7nLJy4o1UmY8UJnsU05xgnYvoFAPgZD';

	  // Initialize a new Session and instanciate an Api object
	  Api::init($app_id, $app_secret, $access_token);

	  // The Api object is now available through singleton
	  $api = Api::instance();

/* PHP SDK v5.0.0 */
/* make the API call */
$request = new FacebookRequest(
  $session,
  'GET',
  '/1401796643196931/authorized_adaccounts'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();
/* handle the result */
;?>


<script>
/* make the API call */
FB.api(
    "/1401796643196931/authorized_adaccounts",
    function (response) {
      if (response && !response.error) {
        <?php $response = $request->execute();
		  $graphObject = $response->getGraphObject();?>
      }
    }
);
</script>