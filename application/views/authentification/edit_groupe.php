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
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Type Utilisateur</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Utilisateurs</li>
              <li><i class="fa fa-file-text-o"></i>Type utilisateurs</li>
            </ol>
          </div>
        </div>
        <!-- Basic Forms & Horizontal Forms-->

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Type Utilisateur
              </header>
              <div class="panel-body">
				<?php  if (isset($success)){
					if (! $success) {
				  echo form_open('/authentification/Groupe/new_group', "role=form");
					?>
                <!--<form role="form">-->
                  <div class="form-group">
					<label for="groupe">Type Utilisateur</label>
                    <input type="text" name="groupe" class="form-control" id="groupe" placeholder="Entrer le type utilisateur">
                  </div>

                  <button type="submit" class="btn btn-primary">Enregistrer</button>
					<?php echo form_close();
					}
				  } ?>

				  <?php if (isset($result)){
				  echo form_open('/authentification/Groupe/update_group', "role=form");
					  foreach ($result as $row) {
						  $libelle = $row->libelle_type_utilisateur;
						  $id = $row->idtype_utilisateur;
					  }
					  ?>
				  <!--<form role="form">-->
				  <div class="form-group">
					  <label for="groupe">Type Utilisateur</label>
					  <input type="text" name="groupe" class="form-control" id="groupe" placeholder="Entrer le type utilisateur" value="<?php echo $libelle; ?>">
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




