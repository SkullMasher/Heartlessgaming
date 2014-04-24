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
		<link rel="stylesheet" href="css/galery.css">

		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 7]>
		    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	<div class="wrapper">

	<!-- Main jumbotron for a primary marketing message or call to action -->
		<header>
			<div class="jumbotron">
				<div class="container">
					<a href="index.php"><h1>Heartless Gaming</h1><br>
					<small>Multigaming Community, Web services & Gaming server provider.</small></a>
						<nav>
							<?php
								$user = new User();
								if ($user->isLoggedIn()) { ?>
										<?php if (Session::exists('home')) {echo '<div id="flash"><p>' . Session::flash('home') . '</p></div>';} ?>
									<ul>
										<li><?php if ($user->hasPermission('admin')) { echo "Admin : "; } ?><a href="profile.php"><?php echo escape($user->data()->username); ?> </a></li>
										<li><a href="logout.php"><button type="button" class="btn btn-success">Se déconnecter</button></a></li>
									</ul>
								<?php }	else { ?>
									<ul>
										<li><?php if (Session::exists('home')) {echo '<p>' . Session::flash('home') . '</p>';} ?></li>
										<li><button class="btn btn-default" data-toggle="modal" data-target="#modalRegister">Inscription</button></li><!-- Modal -->
										<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										        <h4 class="modal-title" id="modalRegisterLabel">Formulaire d'inscription :</h4>
										      </div>
										      <div class="modal-body">
												<form action="register.php" method="post" class="form-horizontal" role="form">
													<div class="form-group input-group input-group-lg">
														<span class="input-group-addon glyphicon glyphicon-user"></span>
														<input type="text" name="username" id="username" value="" class="form-control" placeholder="Username" autocomplete="off" >
													</div>
													<div class="form-group input-group input-group-lg">
														<span class="input-group-addon glyphicon glyphicon-user"></span>
														<input type="password" name="password" id="password" class="form-control" placeholder="Password">
													</div>
													<div class="form-group input-group input-group-lg">
														<span class="input-group-addon glyphicon glyphicon-user"></span>
														<input type="password" name="password_again" id="password_again" value="" class="form-control" placeholder="Password Again">
													</div>
													<div class="form-group input-group input-group-lg">
														<span class="input-group-addon glyphicon glyphicon-envelope"></span>
														<input type="text" name="mail" id="mail" value="" autocomplete="off" class="form-control" placeholder="Email">
													</div>
													<div class="form-group">
														<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
														<button type="submit" class="btn btn-default">Register</button>
													</div>
												</form>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
										      </div>
										    </div><!-- /.modal-content -->
										  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
										<li><button class="btn btn-success" data-toggle="modal" data-target="#modalLogin">Se connecter</button></li>
										<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										        <h4 class="modal-title" id="modalLoginLabel">Connection à votre compte</h4>
										      </div>
										      <div class="modal-body">
												<form action="login.php" method="post"class="form-horizontal" role="form">
													<div class="form-group input-group input-group-lg">
														<span class="input-group-addon glyphicon glyphicon-user"></span>
														<input type="text" class="form-control" name="username" id="username" placeholder="Username">
													</div>
													<div class="form-group input-group input-group-lg">
														<span class="input-group-addon glyphicon glyphicon-user"></span>
														<input type="password" class="form-control" name="password" id="password" placeholder="Password">
													</div>
													<div class="checkbox">
														<label for="remember">
														<input type="checkbox" name="remember" name="remember" id="remember"> Remember me
														</label>
													</div>
													<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
													<button type="submit" class="btn btn-success form-group">Submit</button>
												</form>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
										      </div>
										    </div><!-- /.modal-content -->
										  </div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									</ul>
								<?php
								} // End of User login manadgement
							?>
						</nav>
				</div>
			</div>
		</header>

		<div id="galery"> <p>GALERIE</p> </div>

		<section id="table-galery">
			<div id="navigation">
				<div class="box-nav">
					<p class="nav">Navigation</p>
				</div>
				<div class="category">
					<p>Catégories</p>
					<div class="buttons">
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
						<button type="button" class="btn btn-info">Games</button>
					</div>
					
				</div>
			</div>
			<div class="image">
				<div class="box-image">

					<div id="myCarousel" class="carousel slide">
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
							<li data-target="#myCarousel" data-slide-to="4"></li>
						</ol>
						<p class="fuckingBUG">Galerie des meilleurs moments heartless Gaming</p>

						<div class="carousel-inner">
							<div class="item active">
								<img src="img/slide1.jpg"/>
								<div class="container">
									<div class="carousel-caption">
										<p>Dernières images postées</p>
									</div>
								</div>
							</div>

							<div class="item">
								<img src="img/slide1.jpg"/>
								<div class="container">
									<div class="carousel-caption">
										<p>Dernières images postées</p>
									</div>
								</div>
							</div>

							<div class="item">
								<img src="img/slide1.jpg"/>
								<div class="container">
									<div class="carousel-caption">
										<p>Dernières images postées</p>
									</div>
								</div>
							</div>

							<div class="item">
								<img src="img/slide1.jpg"/>
								<div class="container">
									<div class="carousel-caption">
										<p>Dernières images postées</p>
									</div>
								</div>
							</div>

							<div class="item">
								<img src="img/slide1.jpg"/>
								<div class="container">
									<div class="carousel-caption">
										<p>Dernières images postées</p>
									</div>
								</div>
							</div>

							<div class="item">
								<img src="img/slide1.jpg"/>
								<div class="container">
									<div class="carousel-caption">
										<p>Dernières images postées</p>
									</div>
								</div>
							</div>

						</div>	

						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						</a>

						<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
	
					</div>	
				</div>

			</div>
		</section>
	
	<div class="push"></div>
	</div>

	<footer>
		<p><a href="#">Contact</a></p>
		<p><a href="#">Partenaires</a></p>
	</footer>

	<!-- Initializr script -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

		<script src="js/vendor/bootstrap.min.js"></script>

		<script src="js/main.js"></script>

		<!-- Google analytics
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		-->
	</body>
</html>