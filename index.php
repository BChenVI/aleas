<?php
	error_reporting(E_ALL);
	ini_set
	require "facebook-php-sdk-v4-4.0-dev/autoload.php"
	
	const APPID = "1431368163839906"
	const APPSECRET = "721d4968d5955f3f3cc9717e587f3184"
	
	FacebookSession::setDefaultApplication( APPID, APPSECRET);
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Title of the document A</title>
	<meta name"description content="contenu de la page">
</head>

<body>
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId      : '<?php echo APPID; ?> ,
		  xfbml      : true,
		  version    : 'v2.3'
		});
	  };

	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/fr_FR/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<h1> TITRE 1 </h1>
	
	<div
	  class="fb-like"
	  data-share="true"
	  data-width="450"
	  data-show-faces="true">
	</div>
	
</body>

</html> 