<?php
	require_once 'core/init.php';

	// $userInsert = DB::getInstance()->insert( 'users', array(
	// 	'username' 	=> 'Death',
	// 	'password' 	=> 'lodr',
	// 	'name'		=> "I'am death" 
	// ));

	// if ($userInsert) {
	// 	echo "OK, query valid.";
	// } else {
	// 	echo "Neko was not accepted into the database.";
	// }

	// if (!$user->count()) {
	// 	echo "No user";
	// } else {
	// 	foreach ($user->result() as $user) {
	// 		echo $user->username, ', is a stupid cunt. This is his password : ' . $user->password . '<br>';
	// 	}
	// }

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Heartless | FTP Admin</title>
		<meta name="description" content="test class php ftp proftpd server prod heartlessgaming">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/style.css">

		<script src="js/vendor/modernizr-2.6.2.min.js"></script>
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
				'password_curent'	=> array(
					'required'	=> true,
					'min'		=> 6
				),
				'password_new'		=> array(
					'required'	=> true,
					'min'		=> 6
				),
				'password_new_again'=> array(
					'required'	=> true,
					'matches'	=> 'password_new'
				)
			));
			if ($validation->passed()) {

				if (Hash::make(Input::get('password_curent'), $user->data()->salt) !== $user->data()->password) {
					echo "your curent password is wrong";
				} else {
					$salt = Hash::salt(32);
					$user->update(array(
						'password'	=> Hash::make(Input::get('password_new'), $salt),
						'salt'		=> $salt
					));

					Session::flash('home', 'Password successfuly changed.');
					Redirect::to('index.php');
				}

			} else {
				// Echo the error of the uzer
				foreach ($validation->errors() as $error) {
					echo $error . "<br>";
				}
			}
		}
	}


?>
 			
		<form action="" method="post">
			<div class="field">
				<label for="username">Curent password</label>
				<input type="password" name="password_curent" id="password_curent" >
			</div>
			<div class="field">
				<label for="password">New password</label>
				<input type="password" name="password_new" id="password_new" >
			</div>
			<div class="field">
				<label for="password_again" >New password again</label>
				<input type="password" name="password_new_again" id="password_new_again" >
			</div>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			<input type="submit" value="Register">
		</form>

		<hr>


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
