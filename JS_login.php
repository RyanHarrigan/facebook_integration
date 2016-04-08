<?php 


?>

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
				console.log('You are now logged in, ');
				FB.api('/me',function(response){
					console.log(response.name);
				});
			}else{
				console.log('user denies');
			}
		});
	}
</script>

<button onclick="fbLogin();">login to FB!</button>