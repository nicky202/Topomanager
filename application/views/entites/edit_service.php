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
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Service</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Service</li>
              <li><i class="fa fa-file-text-o"></i>Ajout ou modification service</li>
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
				  echo form_open('/entites/service/new_service', "role=form");
					?>
                <!--<form role="form">-->
                  <div class="form-group">
					<label for="nom_service">Nom</label>
                    <input type="text" name="nom_service" class="form-control" id="nom_service" placeholder="Nom Service">
                  </div>
						<div class="form-group">
							<label for="acronyme">Acronyme</label>
							<input type="text" name="acronyme" class="form-control" id="acronyme" placeholder="Acronyme direction">
				</div>
						<?php if (isset($directions)){
							if (!empty($directions)) {?>
							<div class="form-group ">
								<label for="direction" class="control-label col-lg-2">Direction <span class="required">*</span></label>
								<div class="col-lg-10">
									<select class="form-control" id="direction" name="direction" >
										<?php foreach($directions as $row) {
											$i = 0; ?>
											<option value=<?php echo $row->id_direction;
													if ($i == 0) { ?>
												selected="selected"
												<?php } $i++;
												?>><?php echo $row->libelle_direction; ?>
											</option>
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
				  echo form_open('/entites/service/update_service', "role=form");
					  foreach ($result as $row) {
						  $libelle = $row->libelle_service;
						  $acronyme = $row->acronyme_service;
						  $id = $row->id_service;
						  $id_direction = $row->id_direction;
					  }
					  ?>
				  <!--<form role="form">-->
				  <div class="form-group">
					  <label for="nom_service">Nom</label>
					  <input type="text" name="nom_service" class="form-control" id="nom_service" placeholder="Nom Service" value="<?php echo $libelle; ?>">
					  <?php echo form_hidden('id', $id); ?>
				  </div>
					  <div class="form-group">
						  <label for="acronyme">Acronyme</label>
						  <input type="text" name="acronyme" class="form-control" id="acronyme" placeholder="Acronyme direction" value="<?php echo $acronyme; ?>">
						  <?php echo form_hidden('id', $id); ?>
					  </div>
					  <?php if (isset($directions)){
						  if (!empty($directions)) { ?>
						  <div class="form-group ">
							  <label for="direction" class="control-label col-lg-2">Direction <span class="required">*</span></label>
							  <div class="col-lg-10">
								  <select class="form-control" id="direction" name="direction" >
									  <?php foreach($directions as $row) { ?>
										  <option value=<?php echo $row->id_direction;
										  if($row->id_direction == $id_direction) { ?>
											selected = "selected"
												  <?php }?>> <?php echo $row->libelle_direction; ?></option>
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




