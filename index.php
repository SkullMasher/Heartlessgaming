<?php require_once 'core/init.php';?>
<!--
           ____           
 )__/_ //   /  / _ _ _  | Skullmasher
/  /(-((() (  /)(-/ (-  . 	was here.
-->
<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Heartless Gaming</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/tsstatus.css" />


		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		<link rel="icon" type="image/png" href="img/faviconheartless.png" />
	</head>
	<body>
		<!--[if lt IE 7]>
		    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	<!-- Main jumbotron for a primary marketing message or call to action -->
		<header>
			<div class="jumbotron">
				<div class="container">
					<a href="index.php"><h1>Heartless Gaming</h1><br>
					<small>Multigaming Community, Web services & Gaming server provider.</small></a>
						<nav>
							<?php if (Session::exists('home')) {echo '<div id="flash"><p>' . Session::flash('home') . '</p></div>';}
								$user = new User();
								if ($user->isLoggedIn()) { ?>
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
												<form id="form-register" action="register.php" method="post" class="form-horizontal" role="form">
													<div id="boforeelmnt"class="form-group input-group input-group-lg">
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
														<button type="submit" class="btn btn-default disabled">Register</button>
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
			<!-- <div id="location">
				<a class="tabblur" href="web.php" id="tabWeb"onmouseover="tabFocus(this.id)" onmouseout="tabBlur(this.id)"><p>WEB</p></a>
				<a class="tabactive"><p>HOME</p></a>
				<a class="tabblur" href="game.php" id="tabGame" onmouseover="tabFocus(this.id)" onmouseout="tabBlur(this.id)"><p>GAME</p></a>
			</div> -->
		</header>
			<div id="slidehome">
				<div id="menu-container">
					<div id="menu-web"><a href="web.php"><p>Web</p></a></div>
					<div id="menu-home"><a href="index.php"><p>Home</p></a></div>
					<div id="menu-game"><a href="http://blog.heartlessgaming.com"><p>Blog</p></a></div>
				</div>
					<!-- <div class="spacer"></div> -->
					<div class="home-web">
						<section>
							<div class="web-title">Web</div>
							<div class="web-text">
								<p><strong>Un projet web ?</strong> Actuellement cette plateforme vous propose de l'hébergement pour 5€ par mois.</p>
								<p>Une autre demande ? Cliquez pour me contacter et en discuter.</p>
								<button class="btn btn-info" data-toggle="modal" data-target="#modalWeb">Consultez les offres Web</button><!-- Modal -->
								<div class="modal fade" id="modalWeb" tabindex="-1" role="dialog" aria-labelledby="modalWebLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								        <h4 class="modal-title" id="modalWebLabel"><a href="web.php">Les offres web.</a></h4>
								      </div>
								      <div class="modal-body">
										<p>
											<strong>Héberger</strong> votre site pour <span class="red">5€/mois</span>
										</p>
										<p>
											<strong>Migrer</strong> votre site sur cette structure pour <span class="red">40€ (hors frais d'ébergement)</span>.
										</p>
										<p>
											<strong>La réalisation de votre site web</strong> sera disponible a partir de Juin 2014.
										</p>
										<p>
											<strong>Une autre demande ?</strong> Utilisé le formulaire pour me parler de votre projet.
										</p>
								      </div>
								      <div class="modal-footer">
										<form class="form-horizontal" role="form">
											<div class="form-group input-group-lg">
												<select class="form-control">
													<option>Hébergement</option>
													<option>Migration</option>
													<option>Autre demande</option>
												</select>
											</div>
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
											<textarea class="form-control form-group" rows="5" placeholder="Votre demande"></textarea>
											<button type="submit" class="btn btn-success form-group" name="modal-submit">Envoyer</button>
										</form>
								        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								      </div>
								    </div><!-- /.modal-content -->
								  </div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
							</div>
						</section>
					</div>
			</div>
							
			<div id="title-community">
				<div class="slide_inside">	
					<p>Communauté</p>				
				</div> <!--.slide_inside-->	 	
			</div> <!--#slide1-->

			<div id="slide-community">
				<div class="container-com">	
					<div id="description">
						<span class="com-title"><p>TS viewer</p></span>
						<!-- 
							change style of the TS viewer and adapt div width
						-->
						<?php
							require_once("tsstatus/tsstatus.php");
							$tsstatus = new TSStatus("www.heartlessgaming.com", 10011);
							$tsstatus->useServerPort(9987);
							$tsstatus->imagePath = "tsstatus/img/";
							$tsstatus->timeout = 2;
							$tsstatus->setLoginPassword("tsstatus", "topkek");
							$tsstatus->setCache(10);
							$tsstatus->hideEmptyChannels = true;
							$tsstatus->hideParentChannels = false;
							$tsstatus->showNicknameBox = false;
							$tsstatus->showPasswordBox = false;
							echo $tsstatus->render();
						?> 
					</div>

					<div id="com">
						<span class="com-title"><p>Qui sommes nous ?</p></span>
						<div class="membres">
							<!-- 
								Agrandir image et texte ? text shadow blanc pour démarquez le texte ?
							-->
							<div class="box-membre">
							<p><img src="img/logo.png" class="imageflottante" alt="Image flottante" /></p>
							<p>La communauté Heartless Gaming est composée de joueurs PC de tout horizon. Passant du FPS au MOBA, du jeu bac à sable au jeu de stratégie, chaque membre possède son style favori. Disposant en plus d’un TeamSpeak, cette communauté a permis de rassembler un groupe de personne assez différent autour d’une passion commune : le jeu vidéo.  </p>
							<p>Aux prémisses, la Heartless Gaming s’était fondée à partir de l’ouverture d’un serveur Minecraft, un TeamSpeak et une bonne dose d’amusement. Au fil du temps, elle s’est agrandie, a renforcé les liens d'amitié qui unissent cette communauté et même, a rendu possible les rencontres, peu probables à la base, de joueurs d’univers opposés. </p>
							<p>Avec son ambiance conviviale, ses multiples serveurs mis à disposition, ses possibilités de partage d’expérience et de conseils, ses membres toujours partant pour une petite partie, la Heartless Gaming est une communauté riche et en perpétuelle évolution. Amateurs de jeux vidéo en tout genre, bienvenue ! </p></div>
							
							<span class="com-title"><p>Rejoignez nous.</p></span>
							<!--
								Insertion du logo TS içi avec les même proportions que le logo heartless
							-->

							<div class="box-membre">
							<p><img src="img/ts.png" class="imageflottante" alt="Image flottante" /></p>
							
							<p>
								<a href="http://www.teamspeak.com/?page=downloads">Teamspeak</a> est un logiciel de voix sur IP qui sert aux membres de la communauté à discuter. C'est souvent ici que l'action se passe ! Les joueurs se rejoignent pour organiser leur session de jeu tous les soirs aux alentours de 21h généralement. Vous trouverez souvent ici un camarade pour vous accompagner ou tous simplement discuter.
							</p>
							<br>
							<p><strong>Téléchargez Teamspeak pour votre système d'exploitation <a href="http://www.teamspeak.com/?page=downloads">ici</a>, puis Rejoignez nous en cliquant <a href="ts3server://188.165.231.218">ici</a>.</strong> </p>
							</div>

							<span class="com-title"><p>Suivez nous.</p></span>
							<!--
								Insertion logo type blog ou type soçial whatever avec les même proportions que le logo heartless
							-->

							<div class="box-membre">
							<p><img src="img/pingouinrss.png" class="imageflottante" alt="Image flottante" /></p>
							<p>
								Notre <a href="http://blog.heartlessgaming.com">blog</a> est un endroit où les membres les plus actifs sont invités à poster ce qu'ils leur tiennent à coeur. De la dernière vidéo buzz à l'article le plus sérieux sur la balistique dans Arma III, vous trouverez ici tous un tas d'articles rangés par catégorie, des tutoriaux, des news geek, des histoires légendaires et l'organisation des rendez-vous du week end.
							</p>
							<br>
							<p><strong>Rendez-vous sur <a href="http://blog.heartlessgaming.com">le blog Heartless Gaming</a>.</strong> </p>
							</div>
						</div>
					</div>
				</div>	
			</div> 

			<div id="title-about">
				<div class="slide_inside">	
					<p>À propos</p>				
				</div> 	
			</div> 

			<div id="slide-about">
				<div class="container-about">	
					<div class="story">
						<p>
							<strong>Les services</strong> proposés sur ce site sont assurés au nom du jeune auto-entrepreneur Florian "SkullMasher" Ledru. Vous pouvez consulter toutes les informations concernant mon entreprise <a href="http://www.societe.com/societe/florian-ledru-793553488.html">ici</a>.

						</p>
						<p>
							<strong>La structure Heartless Gaming </strong> a été élaborée par Valentin "Yezarath" Barre et Florian "SkullMasher" Ledru durant leurs années de lycée. Elle est aujourd'hui essentiellement administrée par Florian "SkullMasher" Ledru grâce à l'aide de nombreux colaborateurs qui m'aident volontiers à résoudre les problèmes rencontrés dans un environement Linux. Je ne vous remercierai jamais assez messieurs !
						</p>
					</div>
					<div class="about-content">
<!-- 						<div class="contact">
							<div class="com-title"><p>Citations</p></div>
							
						</div> -->
						<div class="partenaire">
							<div class="com-title"><p>Partenaires</p></div>
							<div class="com-text">
								<p><a href="http://xtropik.net/">xTropik</a></p>
								<blockquote cite="http://xtropik.net/">
									<p>Le service d'hébergement d'image rapide, sans compte, approuvé par la communauté depuis de nombreuse années !</p>
								</blockquote>
								<p><a href="http://www.akaffou-eric.info/lettres/">L'e-Tératures</a></p>
								<blockquote cite="http://www.akaffou-eric.info/lettres/">
									<p>Eric Akaffou est blogger et professeur de lettres mais aussi programmeur a ces heures perdues !</p>
								</blockquote>
							</div>
						</div>
					</div>			
				</div>  	
			</div> 

		<div id="slide-footer">
				<footer>	
					<p>
						<strong>SIRET n° 79355348800016</strong>
						Build with <img src="img/favicongrunt.png"><a href="http://gruntjs.com/">Grunt</a> - <img src="img/faviconbootstrap.png"> <a href="http://getbootstrap.com/">Bootstrap</a> - <img src="img/faviconicons.png"> <a href="http://glyphicons.com/">Glyphicons</a> - <img src="img/compass_icon.png"><a href="http://compass-style.org/">Compass</a>
						<small>Designed by Neko & coded by Skullmasher</small>
					</p>
				</footer> 	
		</div> 

	

	<!-- Initializr script -->
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script type="text/javascript" src="js/jquery-parallax.js"></script>

		<script src="js/production.min.js"></script>
		<script type="text/javascript" src="js/parallax.js"></script>

	<!-- Tsstatus script -->
		<script type="text/javascript" src="tsstatus/tsstatus.js"></script>

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
