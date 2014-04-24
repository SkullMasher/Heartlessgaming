<?php require_once 'core/init.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Heartless Gaming</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/main.css">

		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 7]>
		    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	<div class="wrapper">
		<header>
			<div class="jumbotron">
				<div class="container">
					<h1>Heartless Gaming</h1><br>
					<small>Multigaming Community, Web services & Gaming server provider.</small>
						<nav>
							<ul>
								<li><a href="index.php"><button type="button" class="btn btn-default">Accueil</button></a></li>
							</ul>							
						</nav>
				</div>
			</div>
		</header>
<?php
	$user = new User();
	if (!$user->isLoggedIn()) {
		Redirect::to('index.php');
	} else {
		$data = $user->data();
	?>
	<!-- <a href="index.php">Home</a> | <a href="update.php">Update your information</a><br> -->
	<div class="profil">
		<ul>
			<li>Pseudo : <?php echo $data->username; ?></li>
			<li>Date d'inscription : <?php echo $data->joined; ?> </li>
			<li>Adresse mail : <?php echo $data->mail; ?></li>
			<li><a href="update.php">Update details</a></li>
			<li><a href="changepassword.php">Change password</a></li>
		</ul>
	</div>
<?php
	}
?>
	<div class="push"></div>
	</div>

	<footer>
			<p><a href="#">Contact</a></p>
			<p><a href="#">Partenaires</a></p>
	</footer>
		<!-- Initializer -->

		<!--	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	-->
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			// (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			// function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			// e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			// e.src='//www.google-analytics.com/analytics.js';
			// r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			// ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>
	</body>
</html>
