
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-table"></i> Divisions</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
					<li><i class="fa fa-table"></i>Entités</li>
					<li><i class="fa fa-th-list"></i>Divisions</li>
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
						echo form_open('/entites/division/list_division', $attr);
						?>
						<!--<form class="form-inline" role="form" action="./authentification/Groupe/list_group">-->
							<div class="form-group">
								<label class="sr-only" for="nom_division">Nom Division</label>
								<input type="text" class="form-control" id="nom_division" placeholder="Nom division" name="nom_division">
							</div>

							<button type="submit" class="btn btn-primary">Rechercher</button>
							<button type="button" class="btn btn-success"><a href="<?php echo base_url();?>entites/division/new_division"><i>Nouveau</i></a></button>
						</form>

					</div>
				</section>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Direction
					</header>

					<table class="table table-striped table-advance table-hover">
						<tbody>
						<tr>
							<th><i class="icon_profile"></i> Nom </th>
							<th><i class="icon_profile"></i> Acronyme</th>
							<th><i class="icon_profile"></i> Rattachement</th>
							<th><i class="icon_cogs"></i> Action</th>
						</tr>
						<?php
						if (isset($result)){
						foreach ($result as $row) { ?>
							<tr>
								<td><?php echo $row->libelle_division; ?></td>
								<td><?php echo $row->acronyme_division; ?></td>
								<td><?php echo $row->entite_rattachee; ?></td>
								<td>
									<div class="btn-group">
										<!--<a class="btn btn-primary" href="<?php echo base_url();?>authentification/groupe/new_group"><i class="icon_plus_alt2"></i></a>-->
										<a class="btn btn-success" href="<?php echo base_url();?>entites/division/edit_division/<?php echo $row->id_division; ?>"><i class="icon_pencil"></i></a>
										<a class="btn btn-danger" href="<?php echo base_url();?>entites/division/delete_division/<?php echo $row->id_division; ?>"><i class="icon_close_alt2"></i></a>
									</div>
								</td>
							</tr>
						<?php }
						} ?>

						</tbody>
					</table>
				</section>
			</div>
		</div>

		<!-- page end-->
	</section>
</section>
<!--main content end-->
