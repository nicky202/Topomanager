
<body class="login-img3-body">
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--<h3 class="page-header"><i class="fa fa-files-o"></i> TopoManager</h3>-->
			</div>
		</div>
		<!-- Form validations -->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Inscription
					</header>
					<div class="panel-body">
						<div class="form">
							<?php
							$attributes = array("class"=>"form-validate form-horizontal", "id"=>"feedback_form", "methode"=>"post");
							echo form_open('/authentification/utilisateur/commit_inscription', $attributes);
							?>
							<!--<form class="form-validate form-horizontal" id="feedback_form" method="get" action="">-->
								<div class="form-group ">
									<label for="nom" class="control-label col-lg-2">Nom <span class="required">*</span></label>
									<div class="col-lg-10">
										<input class="form-control" id="nom" name="nom" minlength="5" type="text" required />
									</div>
								</div>
								<div class="form-group ">
									<label for="prenom" class="control-label col-lg-2">Prenom </label>
									<div class="col-lg-10">
										<input class="form-control" id="prenom" name="prenom" minlength="5" type="text" />
									</div>
								</div>
								<div class="form-group ">
									<label for="email" class="control-label col-lg-2">E-Mail </label>
									<div class="col-lg-10">
										<input class="form-control " id="email" type="email" name="email" />
									</div>
								</div>
								<div class="form-group ">
									<label for="login" class="control-label col-lg-2">Login <span class="required">*</span></label>
									<div class="col-lg-10">
										<input class="form-control" id="login" name="login" minlength="5" type="text" required/>
									</div>
								</div>
								<div class="form-group ">
									<label for="mdp" class="control-label col-lg-2">Mot de passe <span class="required">*</span></label>
									<div class="col-lg-10">
										<input class="form-control" id="mdp" name="mdp" minlength="5" type="password" required/>
									</div>
								</div>
								<div class="form-group ">
									<label for="mdp_confirm" class="control-label col-lg-2">Confirmer mot de passe <span class="required">*</span></label>
									<div class="col-lg-10">
										<input class="form-control" id="mdp_confirm" name="mdp_confirm" minlength="5" type="password" required/>
									</div>
								</div>
								<?php if (isset($result)){ ?>
									<div class="form-group ">
										<label for="groupe" class="control-label col-lg-2">Type utilisateur souhaité <span class="required">*</span></label>
										<div class="col-lg-10">
											<select class="form-control" id="groupe" name="groupe_select" >
												<?php foreach($result as $row) { ?>
													<option value=<?php echo $row->idtype_utilisateur; ?>><?php echo $row->libelle_type_utilisateur; ?></option>
												<?php }?>

											</select>
										</div>
									</div>
								<?php } ?>

								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button class="btn btn-primary" type="submit">S'inscrire</button>
										<button class="btn btn-default" type="button">Annuler</button>
									</div>
								</div>
							<?php echo form_close(); ?>
							<!--</form>-->
						</div>

					</div>
				</section>
			</div>
		</div>
		<
		<!-- page end-->
	</section>
</section>
<!--main content end-->
