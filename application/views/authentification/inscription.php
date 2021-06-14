<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/css/inscription.css");?>">
<body class="login-img3-body">
	<section class="wrapper">
		<section class="panel">
			<header class="panel-heading">
				Inscription
			</header>
			<div class="panel-body">
				<div class="form">
					<?php
					$attributes = array("class"=>"form-validate form-horizontal", "id"=>"feedback_form", "methode"=>"post" , "enctype"=>"multipart/form-data");
					echo form_open('/authentification/utilisateur/commit_inscription', $attributes);
					?>
					
					<div class="form-group ">
						<label for="nom" class="control-label col-lg-2">Nom <span class="required">*</span></label>
						<div class="col-lg-10">
							<input class="form-control" id="nom" name="nom" minlength="5" type="text" required />
						</div>
					</div>
					<div class="form-group ">
						<label for="prenom" class="control-label col-lg-2">Prenoms </label>
						<div class="col-lg-10">
							<input class="form-control" id="prenom" name="prenoms" minlength="5" type="text" />
						</div>
					</div>
					<div class="form-group ">
						<label for="email" class="control-label col-lg-2">E-Mail </label>
						<div class="col-lg-10">
							<input class="form-control " id="email" type="email" name="mail" />
						</div>
					</div>
					<div class="form-group ">
						<label for="cin" class="control-label col-lg-2">CIN <span class="required">*</span></label>
						<div class="col-lg-10">
							<input class="form-control" id="cin" name="cin" minlength="5" type="text" required/>
						</div>
					</div>
					<div class="form-group ">
						<label for="tel" class="control-label col-lg-2">Téléphone <span class="required">*</span></label>
						<div class="col-lg-10">
							<input class="form-control" id="tel" name="tel" minlength="5" type="text" required/>
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
							<input class="form-control" id="mdp" name="password" minlength="5" type="password" required/>
						</div>
					</div>
					<div class="form-group ">
						<label for="mdp_confirm" class="control-label col-lg-2">Confirmer mot de passe <span class="required">*</span></label>
						<div class="col-lg-10">
							<input class="form-control" id="mdp_confirm" name="password_confirm" minlength="5" type="password" required/>
						</div>
					</div>
					<div class="form-group">
						<label for="photo" class="control-label col-lg-2">Télécharger une photo</label>
						<div class="col-lg-10">
							<input class="form-control-file" id="photo" name="photo" type="file"/>
						</div>
					</div>
					<?php if (isset($result)){ ?>
					<div class="form-group ">
						<label for="groupe" class="control-label col-lg-2">Type utilisateur souhaité <span class="required">*</span></label>
						<div class="col-lg-10">
							<select class="form-control" id="groupe" name="groupe_select" >
								<?php foreach($result as $row) { ?>
								<option value=<?php echo $row->idtypeuser; ?>><?php echo $row->labeltype; ?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<?php } ?>

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary" type="submit" onclick="return Valider()">S'inscrire</button>
							<a  href="<?php echo site_url('login'); ?>"><button class="btn btn-default" type="button">Annuler</button></a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</section>
	</section>
</body>
<script>
	var password = document.querySelector("password").value;
	var confirm_password = document.querySelector("password_confirm").value;

	function Valider(){
		if(password != confirm_password){
			alert("Les Mots de Passe ne sont pas identiques.")
			return false
		}else{
			return true
		}
	}
</script>
