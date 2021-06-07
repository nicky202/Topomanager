<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
	<meta name="author" content="GeeksLabs">
	<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
	<link rel="shortcut icon" href="img/favicon.png">

	<title>Connexion à topomanager</title>

	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- bootstrap theme -->
	<link href="<?php echo base_url()?>/assets/css/bootstrap-theme.css" rel="stylesheet">
	<!--external css-->
	<!-- font icon -->
	<link href="<?php echo base_url()?>/assets/css/elegant-icons-style.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>/assets/css/font-awesome.css" rel="stylesheet" />
	<!-- Custom styles -->
	<link href="<?php echo base_url()?>/assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url()?>/assets/css/style-responsive.css" rel="stylesheet" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url()?>/assets/js/html5shiv.js"></script>
	<script src="<?php echo base_url()?>/assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- =======================================================
	  Theme Name: NiceAdmin
	  Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
	  Author: BootstrapMade
	  Author URL: https://bootstrapmade.com
	======================================================= -->
</head>

<body class="login-img3-body">

<div class="container">


	<form class="login-form" action="<?php echo site_url('check_login');?>" method="post">
		<div class="login-wrap">
			<?php
                        if (isset($success)){
				if($success)
					echo "<h3 class=\"btn-success\"><i>Votre inscription est en cours de traitement, Vous pourriez vous connecter quand votre incription aura été validée par l'Administrateur.</i></h3>";
			}
			if (isset($info))
				echo "<h3 class=\"btn-danger\"><i>".$info."</i></h3>";

			?>

			<p class="login-img"><i class="icon_lock_alt"></i></p>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon_profile"></i></span>
				<input type="text" class="form-control" placeholder="Username" name="login" autofocus>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon_key_alt"></i></span>
				<input type="password" class="form-control" placeholder="Password" name="password">
			</div>
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Remember me
				<span class="pull-right"> <a href="#"> Forgot Password?</a></span>
			</label>
			<button class="btn btn-primary btn-lg btn-block" type="submit">Connexion</button>
			<button class="btn btn-info btn-lg btn-block" type="button" ><a href="<?php echo site_url('inscription');?>">Inscription</a></button>
		</div>
	</form>
	<div class="text-right">
		<div class="credits">
			<!--
			  All the links in the footer should remain intact.
			  You can delete the links only if you purchased the pro version.
			  Licensing information: https://bootstrapmade.com/license/
			  Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
			-->
			<!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
		</div>
	</div>
</div>


</body>

</html>
