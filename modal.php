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

		<p>Vous souhaiter éloborer un projet web ? cliquez içi pour le décrire.</p>

		<!-- Button trigger modal -->
		<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
		  Decrire Mon Projet
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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