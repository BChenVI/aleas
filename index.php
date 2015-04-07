<?php
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	session_start();
	
	require "facebook-php-sdk-v4-4.0-dev/autoload.php";
	
	const APPID = "1431368163839906";
	const APPSECRET = "721d4968d5955f3f3cc9717e587f3184";
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FaceRequest;
	use Facebook\GraphUser;
	
	FacebookSession::setDefaultApplication( APPID, APPSECRET);
	
	$helper = new FacebookRedirectLoginHelper('https://aleas.herokuapp.com/');
		
	//SI les variables de ssion existent et que  $_SESSION['fb_token'] existe
	//alors je veux créer mon utilisateur à partir de cette session
	if( isset($_SESSION) && isset($_SESSION['fb_token']))
	{
		$session = new FacebookSession ($_SESSION['fb_token']);
	}
	//sinon j'affiche le lien de connection
	else
	{
		$session = $helper->getSessionFromRedirect();
	}

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
		  appId      : '<?php echo APPID; ?>' ,
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
	<br>
	
	<pre>
		<?php
		
			if(session)
			{
				$_SESSION['fb_token'] = (string) $session->getAccessToken();
				
				$request_user = new FacebookRequest($session,"GET","/me");
				$request_user_execited = $request_user->execute();
				$user = $request_user_execited->getGraphObject(GraphUser::ClassName());
				
				echo "bonjour" .$user->getName();
				var_dump($_SESSION['user']);
			}else
			{
				$loginUrl = $helper->getLoginUrl();
				echo "<a href='".$loginUrl."'>Se connecter</a>";
			}
		?>
	
	</pre>
	

	
</body>

</html> 