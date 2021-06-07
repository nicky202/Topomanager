
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-table"></i> Types utilisateurs</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
					<li><i class="fa fa-table"></i>Utilisateur</li>
					<li><i class="fa fa-th-list"></i>Types utilisateurs</li>
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
						echo form_open('list_group', $attr);
						?>
						<!--<form class="form-inline" role="form" action="./authentification/Groupe/list_group">-->
							<div class="form-group">
								<label class="sr-only" for="groupe">Type Utilisateur</label>
								<input type="text" class="form-control" id="groupe" placeholder="Type utilisateur" name="groupe">
							</div>

							<button type="submit" class="btn btn-primary">Rechercher</button>
							<button type="button" class="btn btn-success"><a href="<?php echo site_url('new_group');?>"><i>Nouveau</i></a></button>
						</form>

					</div>
				</section>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Types Utilisateur
					</header>

					<table class="table table-striped table-advance table-hover">
						<tbody>
						<tr>
							<th><i class="icon_profile"></i> Nom Type utilisateur</th>
							<th><i class="icon_cogs"></i> Action</th>
						</tr>
						<?php foreach ($result as $row) { ?>
							<tr>
								<td><?php echo $row->libelle_type_utilisateur; ?></td>
								<td>
									<div class="btn-group">
                                                                                <a class="btn btn-success" href="<?php echo site_url('edit_group/'.$row->idtype_utilisateur);?>"><i class="icon_pencil"></i></a>
										<a class="btn btn-danger" href="<?php echo site_url('delete_group/'.$row->idtype_utilisateur);?>"><i class="icon_close_alt2"></i></a>
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
