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
<?php 
	$user = new User();

	if (!$user->isLoggedIn()) {
		Redirect::to('index.php');
	}

	if (Input::exists()) {
		if (Token::check(Input::get('token'))) {
			
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'mail'	=> array(
					'required'	=> true,
					'min'		=> 6,
					'max'		=> 50
				)
			));
			if ($validation->passed()) {
				try {
					$user->update(array(
						'mail'	=> Input::get('mail')
					));

					Session::flash('home', 'Your details have been updated.');
					Redirect::to('index.php');

				} catch(Exception $e) {
					die($e->getMessage());
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error . '<br>';
				}
			}
		}
	}
?>
		<a href="index.php">Home</a>
		<form action="" method="post">
			<div class="field">
				<label for="mail">Mail</label>
				<input type="text" name="mail" id="mail" value="<?php escape($user->data()->mail); ?>" autocomplete="off" >
			</div>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			<input type="submit" value="Update">
		</form>


		<!-- Boiler -->

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
