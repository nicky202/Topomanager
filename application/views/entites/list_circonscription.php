
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-table"></i> Circonscriptions</h3>
				<ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
					<li><i class="fa fa-table"></i>Entités</li>
					<li><i class="fa fa-th-list"></i>Circonscriptions</li>
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
						echo form_open('/entites/circonscription/list_circonscription', $attr);
						?>
						<!--<form class="form-inline" role="form" action="./authentification/Groupe/list_group">-->
							<div class="form-group">
								<label class="sr-only" for="nom_circo">Nom Service</label>
								<input type="text" class="form-control" id="nom_circo" placeholder="Nom circonscription" name="nom_circo">
							</div>

							<button type="submit" class="btn btn-primary">Rechercher</button>
							<button type="button" class="btn btn-success"><a href="<?php echo base_url();?>entites/circonscription/new_circonscription"><i>Nouveau</i></a></button>
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
							<th><i class="icon_profile"></i> Service</th>
							<th><i class="icon_cogs"></i> Action</th>
						</tr>
						<?php
						if (isset($result)){
						foreach ($result as $row) { ?>
							<tr>
								<td><?php echo $row->libelle_circonscription; ?></td>
								<td><?php echo $row->acronyme_circonscription; ?></td>
								<td><?php echo $row->libelle_service; ?></td>
								<td>
									<div class="btn-group">
										<!--<a class="btn btn-primary" href="<?php echo base_url();?>authentification/groupe/new_group"><i class="icon_plus_alt2"></i></a>-->
										<a class="btn btn-success" href="<?php echo base_url();?>entites/circonscription/edit_circonscription/<?php echo $row->id_circonscription; ?>"><i class="icon_pencil"></i></a>
										<a class="btn btn-danger" href="<?php echo base_url();?>entites/circonscription/delete_circonscription/<?php echo $row->id_circonscription; ?>"><i class="icon_close_alt2"></i></a>
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
