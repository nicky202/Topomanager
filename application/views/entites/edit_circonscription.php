<?php /*

if (! $success){
	echo form_open('/authentification/Groupe/new_group');

	echo form_label('Type utilisateur: ', 'groupe' );
	echo form_input('groupe');

	echo form_submit('submit', 'Enregistrer');

	echo form_close();
}else{
	echo "Type utilisateur enregistré avec succes";
} */ ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Circonscription</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Circonscription</li>
              <li><i class="fa fa-file-text-o"></i>Ajout ou modification circonscription</li>
            </ol>
          </div>
        </div>
        <!-- Basic Forms & Horizontal Forms-->

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Service
              </header>
              <div class="panel-body">
				<?php  if (isset($success)){
					if (! $success) {
				  echo form_open('/entites/circonscription/new_circonscription', "role=form");
					?>
                <!--<form role="form">-->
                  <div class="form-group">
					<label for="nom_circo">Nom</label>
                    <input type="text" name="nom_circo" class="form-control" id="nom_circo" placeholder="Nom Circonscription">
                  </div>
						<div class="form-group">
							<label for="acronyme">Acronyme</label>
							<input type="text" name="acronyme" class="form-control" id="acronyme" placeholder="Acronyme direction">
				</div>
						<?php if (isset($services)){
							if (!empty($services)) {?>
							<div class="form-group ">
								<label for="service" class="control-label col-lg-2">Service <span class="required">*</span></label>
								<div class="col-lg-10">
									<select class="form-control" id="service" name="service" >
										<?php foreach($services as $row) { ?>
											<option value=<?php echo $row->id_service; ?>><?php echo $row->libelle_service; ?></option>
										<?php }?>

									</select>
								</div>
				</div>
						<?php }
						}?>

                  <button type="submit" class="btn btn-primary">Enregistrer</button>
					<?php echo form_close();
					}
				  } ?>

				  <?php if (isset($result)){
				  echo form_open('/entites/circonscription/update_circonscription', "role=form");
					  foreach ($result as $row) {
						  $libelle = $row->libelle_circonscription;
						  $acronyme = $row->acronyme_circonscription;
						  $id = $row->id_circonscription;
						  $id_service = $row->id_service;
					  }
					  ?>
				  <!--<form role="form">-->
				  <div class="form-group">
					  <label for="nom_circo">Nom</label>
					  <input type="text" name="nom_circo" class="form-control" id="nom_circo" placeholder="Nom Circonscription" value="<?php echo $libelle; ?>">
					  <?php echo form_hidden('id', $id); ?>
				  </div>
					  <div class="form-group">
						  <label for="acronyme">Acronyme</label>
						  <input type="text" name="acronyme" class="form-control" id="acronyme" placeholder="Acronyme direction" value="<?php echo $acronyme; ?>">
						  <?php echo form_hidden('id', $id); ?>
					  </div>
					  <?php if (isset($services)){
						  if (!empty($services)) { ?>
						  <div class="form-group ">
							  <label for="service" class="control-label col-lg-2">Service <span class="required">*</span></label>
							  <div class="col-lg-12">
								  <select class="form-control" id="service" name="service" >
									  <?php foreach($services as $row) { ?>
										  <option value=<?php echo $row->id_service;
										  if($row->id_service == $id_service) { ?>
											selected = "selected"
												  <?php }?>> <?php echo $row->libelle_service; ?></option>
									  <?php }?>

								  </select>
							  </div>
						  </div>
					  <?php }
					  } ?>

					  <button type="submit" class="btn btn-primary">Enregistrer</button>
				  <?php echo form_close();
					} ?>



              </div>
            </section>
          </div>

        </div>
        <!-- Inline form-->


        <!-- page end-->
      </section>
    </section>
    <!--main content end-->




