<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link href="<?php echo base_url()?>/assets/css/profile.css" rel="stylesheet">
</head>
<?php if ($this->session->has_userdata('login')) { ?>
<body>
  <section id="container" class="">
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="body-panel">
            <div class="col-lg-4 col-sm-4 pdp">
              <div class="photo">
                <img src="../profile_img/<?php echo $this->session->userdata('photo');  ?>">
              </div>
              <h4><?php echo $this->session->userdata('login');  ?></h4>
              <button><input type="file" value="Modifier Photo de Profil"></button>
            </div>
            <div class="col-lg-8 col-sm-8 ">
              <div class="biographie">
                <h1>Biographie</h1>
                <div class="bio">
                  <p>Login:</p><p><?php echo $this->session->userdata('login');  ?></p>
                </div>
                <div class="bio">
                  <p>Nom:</p><p><?php echo $this->session->userdata('nom');  ?></p>
                </div>
                <div class="bio">
                  <p>Prénom(s):</p><p><?php echo $this->session->userdata('prenoms');  ?></p>
                </div>
                <div class="bio">
                  <p>Email:</p><p><?php echo $this->session->userdata('mail');  ?></p>
                </div>
                <div class="bio">
                  <p>Téléphone:</p><p><?php echo $this->session->userdata('tel');  ?></p>
                </div>
                <div class="bio">
                  <p>CIN:</p><p><?php echo $this->session->userdata('cin');  ?></p>
                </div>
                <div class="button">
                  <button class="btn btn-primary">Modifier Profil</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
  </section>
</body>
<?php } ?>
</html>