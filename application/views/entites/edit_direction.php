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
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Direction</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Direction</li>
              <li><i class="fa fa-file-text-o"></i>Ajout ou modification Direction</li>
            </ol>
          </div>
        </div>
        <!-- Basic Forms & Horizontal Forms-->

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Direction
              </header>
              <div class="panel-body">
				<?php  if (isset($success)){
					if (! $success) {
				  echo form_open('/entites/direction/new_direction', "role=form");
					?>
                <!--<form role="form">-->
                  <div class="form-group">
					<label for="nom_direction">Nom</label>
                    <input type="text" name="nom_direction" class="form-control" id="nom_direction" placeholder="Nom Direction">
                  </div>
						<div class="form-group">
							<label for="acronyme">Acronyme</label>
							<input type="text" name="acronyme" class="form-control" id="acronyme" placeholder="Acronyme direction">
						</div>

                  <button type="submit" class="btn btn-primary">Enregistrer</button>
					<?php echo form_close();
					}
				  } ?>

				  <?php if (isset($result)){
				  echo form_open('/entites/direction/update_direction', "role=form");
					  foreach ($result as $row) {
						  $libelle = $row->libelle_direction;
						  $acronyme = $row->acronyme_direction;
						  $id = $row->id_direction;
					  }
					  ?>
				  <!--<form role="form">-->
				  <div class="form-group">
					  <label for="nom_direction">Nom</label>
					  <input type="text" name="nom_direction" class="form-control" id="nom_direction" placeholder="Nom Direction" value="<?php echo $libelle; ?>">
					  <?php echo form_hidden('id', $id); ?>
				  </div>
					  <div class="form-group">
						  <label for="acronyme">Acronyme</label>
						  <input type="text" name="acronyme" class="form-control" id="acronyme" placeholder="Acronyme direction" value="<?php echo $acronyme; ?>">
						  <?php echo form_hidden('id', $id); ?>
					  </div>


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




