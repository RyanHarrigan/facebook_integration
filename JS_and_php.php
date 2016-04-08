<?php 
namespace Facebook;

require_once __DIR__ . '/src/Facebook/autoload.php';

if (isset($_POST['accessToken'])){
	
//use Facebook\FacebookRequest;
//use Facebook\FacebookApp;

require_once __DIR__ . '/src/Facebook/autoload.php';
	
$session = new FacebookApp('{160909570747324}', '{8d76492221315fe6421bb95972046623}');

/* PHP SDK v5.0.0 */
/* make the API call */
$request = new FacebookRequest(
  $session,
	$_POST['accessToken'],
  'GET',
  '/{221087335084}/members'
);

$response = $request->execute();

$graphObject = $response->getGraphObject();
/* handle the result */

var_dump($graphObject);
}else{

?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '160909570747324',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
	 
	function fbLogin(){
		FB.login(function(response){
			if(response.authResponse){
				
				jQuery.ajax({
					type:'POST',
					url:'#',
					data: "accessToken=" + response.authResponse.accessToken
				});
				console.log('You are now logged in, ');
				FB.api('/me',function(response){
					console.log(response.name);
				});
			}else{
				console.log('user denies');
			}
		});
	}
	
	jQuery(document).ready(function(){
		
	});
</script>

<button onclick="fbLogin();">login to FB!</button>
</body>
<?php 
}
?>