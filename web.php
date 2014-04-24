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
		<link rel="stylesheet" href="css/web.css">
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

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
									<ul>
										<li><?php if (Session::exists('home')) {echo '<p>' . Session::flash('home') . '</p>';} ?></li>
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

		<section id="container-web">
			<div id="menu-container">
				<div id="menu-web"><a href="web.php"><p>Web</p></a></div>
				<div id="menu-home"><a href="index.php"><p>Home</p></a></div>
				<div id="menu-game"><a href="game.php"><p>Games</p></a></div>
			</div>
				<section id="slide-web">
					<div class="heberg-container">	
							<div class="title-heberg">
								<p>Hébergement</p>
							</div>
							<div class="heberg-content">
								<div class="text-heberg">
									<p id="offre-heberg">5€/mois - SQL/FTP, backup hebdomadaire</p>
									<p>Vous souhaitez élaborer un projet web ?</p>
									<p>Je serai heureux d'analyser votre idée.</p>
								</div>
								<button class="btn btn-info heberg-button" data-toggle="modal" data-target="#Modal-projet">Décrire mon projet</button>
							<!-- Modal -->
							<div class="modal fade" id="Modal-projet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="	true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="myModalLabel">Description de mon projet</h4>
							      </div>
							      <div class="modal-body">
									<form class="form-horizontal" role="form">
										<div class="form-group input-group input-group-lg">
											<span class="input-group-addon glyphicon glyphicon-envelope"></span>
											<input type="text" class="form-control" placeholder="Email">
										</div>
										<div class="form-group input-group input-group-lg">
											<span class="input-group-addon glyphicon glyphicon-user"></span>
											<input type="text" class="form-control" placeholder="Prenom">
										</div>
										<div class="form-group input-group input-group-lg">
											<span class="input-group-addon glyphicon glyphicon-user"></span>
											<input type="text" class="form-control" placeholder="Nom">
										</div>
										<textarea class="form-control form-group" rows="5"></textarea>
										<button type="submit" class="btn btn-success form-group" name="modal-submit">Envoyer</button>
									</form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

						</div>
					</div>

					<!-- <div class="spacer"></div>	 -->

					<div class="migration-container">
							<div class="title-migration">
								<p>Migration</p>
							</div>
							<div class="migration-content">
								<div class="text-migration">
									<p id="offre-migration">40€ (Hors frais d'hébergement)</p>
									<p>Vous souhaitez migrer votre site sur cette structure ?</p>
									<p>Venez en discuter dès maintenant, support du site et migration comprise.</p>
								</div>
								<button class="btn btn-info migration-button" data-toggle="modal" data-target="#Modal-projet">Migrer mon site web</button>
							<!-- Modal -->
							<div class="modal fade" id="Modal-projet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="	true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="myModalLabel">Description de mon projet</h4>
							      </div>
							      <div class="modal-body">
									<form class="form-horizontal" role="form">
										<div class="form-group input-group input-group-lg">
											<span class="input-group-addon glyphicon glyphicon-envelope"></span>
											<input type="text" class="form-control" placeholder="Email">
										</div>
										<div class="form-group input-group input-group-lg">
											<span class="input-group-addon glyphicon glyphicon-user"></span>
											<input type="text" class="form-control" placeholder="Prenom">
										</div>
										<div class="form-group input-group input-group-lg">
											<span class="input-group-addon glyphicon glyphicon-user"></span>
											<input type="text" class="form-control" placeholder="Nom">
										</div>
										<textarea class="form-control form-group" rows="5"></textarea>
										<button type="submit" class="btn btn-success form-group" name="modal-submit">Submit</button>
									</form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

						</div>
					</div>				
				</section>
		</section>
		
		<div class="push"></div>
	</div>
	
	<footer id="slide-footer">	
		<p id="pcenter">Build with <img src="img/favicongrunt.png"><a href="http://gruntjs.com/">Grunt</a> - <img src="img/faviconbootstrap.png"> <a href="http://getbootstrap.com/">Bootstrap</a> - <img src="img/faviconicons.png"> <a href="http://glyphicons.com/">Glyphicons</a> - <img src="img/compass_icon.png"><a href="http://compass-style.org/">Compass</a> - Designed by Neko & coded by Skullmasher</p>	
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
