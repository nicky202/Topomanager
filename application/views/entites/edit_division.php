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
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Division</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Division</li>
              <li><i class="fa fa-file-text-o"></i>Ajout ou modification Division</li>
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
				  echo form_open('/entites/division/new_division', "role=form");
					?>
                <!--<form role="form">-->
                  <div class="form-group">
					<label for="nom_division">Nom</label>
                    <input type="text" name="nom_division" class="form-control" id="nom_division" placeholder="Nom Direction">
                  </div>
						<div class="form-group">
							<label for="acronyme">Acronyme</label>
							<input type="text" name="acronyme" class="form-control" id="acronyme" placeholder="Acronyme direction">
				</div>
						<div class="form-group">
							<label for="service" class="radio-inline" >Service
							<input type="radio" name="rattachement"  id="service" value="service" checked="checked" >
							</label>
							<label for="direction" class="radio-inline">Direction
							<input type="radio" name="rattachement" id="direction" value="direction" >
							</label>
						</div>
						<?php if (isset($services)){
							if (!empty($services)) {?>
							<div class="form-group ">
								<label for="service" class="control-label col-lg-2">Service <span class="required">*</span></label>
								<div class="col-lg-12">
									<select class="form-control" id="service" name="service" >
										<?php foreach($services as $row) { ?>
											<option value=<?php echo $row->id_service; ?>><?php echo $row->libelle_service; ?></option>
										<?php }?>

									</select>
								</div>
				</div>
						<?php }
						}?>

						<?php if (isset($directions)){
							if (!empty($directions)) {?>
								<div class="form-group ">
									<label for="direction" class="control-label col-lg-2">Direction <span class="required">*</span></label>
									<div class="col-lg-12">
										<select class="form-control" id="direction" name="direction" >
											<?php foreach($directions as $row) { ?>
												<option value=<?php echo $row->id_direction; ?>><?php echo $row->libelle_direction; ?></option>
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
				  echo form_open('/entites/division/update_division', "role=form");
					  foreach ($result as $row) {
						  $libelle = $row->libelle_division;
						  $acronyme = $row->acronyme_division;
						  $id = $row->id_division;
						  $id_service = $row->id_service;
						  $id_direction = $row->id_direction;
						  $rattachement = $row->rattachement;
					  }
					  ?>
				  <!--<form role="form">-->
				  <div class="form-group">
					  <label for="nom_division">Nom</label>
					  <input type="text" name="nom_division" class="form-control" id="nom_division" placeholder="Nom Division" value="<?php echo $libelle; ?>">
					  <?php echo form_hidden('id', $id); ?>
				  </div>
					  <div class="form-group">
						  <label for="acronyme">Acronyme</label>
						  <input type="text" name="acronyme" class="form-control" id="acronyme" placeholder="Acronyme division" value="<?php echo $acronyme; ?>">

					  </div>

					  <div class="form-group">
						  <label for="service" class="radio-inline">Service
						  <input type="radio" name="rattachement" id="service" value="service"
								 <?php if(isset($rattachement)) {
								 	if($rattachement == "service"){ ?>
								 		checked="checked" >
								 <?php	}
								 } ?>
						  </label>
						  <label for="direction" class="radio-inline">Direction
						  <input type="radio" name="rattachement" id="direction" value="direction"
								  <?php if(isset($rattachement)) {
								  if($rattachement == "direction"){ ?>
								 checked="checked" >
					  <?php	}
					  } ?>
						  </label>
					  </div>

					  <?php
					  if (isset($services)){
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
					  }?>

						  <?php

							  if (isset($directions)){
								  if (!empty($directions)) { ?>
									  <div class="form-group ">
										  <label for="direction" class="control-label col-lg-2">Direction <span class="required">*</span></label>
										  <div class="col-lg-12">
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
							  }?>

					  <button type="submit" class="btn btn-primary">Enregistrer</button>
				  <?php echo form_close();
					}
				  ?>



              </div>
            </section>
          </div>

        </div>
        <!-- Inline form-->


        <!-- page end-->
      </section>
    </section>
    <!--main content end-->


