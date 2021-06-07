<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-table"></i> Utilisateurs</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
					<li><i class="fa fa-table"></i>Utilisateur</li>
					<li><i class="fa fa-th-list"></i>Utilisateurs</li>
				</ol>
			</div>
		</div>
		<!-- page start-->
		<!-- Inline form-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Filtre
					</header>
					<div class="panel-body">
						<?php
						$attr = array('class'=>'form-inline',
							'role'=>'form');
						echo form_open('list_user', $attr);
						?>
						<!--<form class="form-inline" role="form" action="./authentification/Groupe/list_group">-->
						<div class="form-group">
							<label class="sr-only" for="nom">Utilisateur</label>
							<input type="text" class="form-control" id="nom" placeholder="Nom utilisateur" name="nom">
						</div>

						<button type="submit" class="btn btn-primary"><i class="icon_search"></i></button>
						</form>

					</div>
				</section>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Utilisateurs
					</header>

					<table class="table table-striped table-advance table-hover">
						<tbody>

						<tr>
							<th><i class="icon_profile"></i> Nom</th>
							<th><i class="icon_profile"></i> Prenom</th>
							<th><i class="icon_mail_alt"></i> e-mail</th>
							<th><i class="icon_group"></i> Groupe</th>
							<th><i class="icon_pencil"></i> Etat Inscription</th>
							<th><i class="icon_cogs"></i> Action</th>
						</tr>
						<?php //var_dump($res);
						foreach ($res as $row) { ?>
							<tr>
								<td><?php echo $row->nom; ?></td>
								<td><?php echo $row->prenom; ?></td>
								<td><?php echo $row->e_mail; ?></td>
								<td><?php echo $row->libelle_type_utilisateur; ?></td>
								<td><?php if(!$row->valide){ ?>
										<i class="btn btn-danger">Non Validée</i>
								<?php }else{ ?>
								<i class="btn btn-success">Validée</i> <?php } ?>
								</td>
								<td>
									<div class="btn-group">
										<a class="btn btn-success" href="<?php echo base_url();?>authentification/utilisateur/change_state_signup/1/<?php echo $row->id_utilisateur; ?>"><i class="icon_box-checked"></i></a>
										<a class="btn btn-danger" href="<?php echo base_url();?>authentification/utilisateur/change_state_signup/0/<?php echo $row->id_utilisateur; ?>"><i class="icon_blocked"></i></a>
										<!--<a class="btn btn-danger" href="<?php echo base_url();?>authentification/groupe/delete_group/<?//php echo $row->idtype_utilisateur; ?>"><i class="icon_close_alt2"></i></a>-->
									</div>
								</td>
							</tr>
						<?php } ?>

						</tbody>
					</table>
				</section>
			</div>
		</div>

		<!-- page end-->
	</section>
</section>
<!--main content end-->

