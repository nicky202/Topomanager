<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
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
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <div class="follow-ava">
                    <img src="../profile_img/<?php  echo $this->session->userdata('photo');  ?>">
                  </div>
                  <h6></h6>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <h4><?php echo $this->session->userdata('login');  ?></h4>
                  <p><?php echo $this->session->userdata('mail');  ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li>
                    <a data-toggle="tab" href="#profile">
                        <i class="icon-user"></i>
                        Profile
                    </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                        <i class="icon-envelope"></i>
                        Modifier Profile
                    </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <div id="profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1>Biographie</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>Nom </span>: Jenifer </p>
                          </div>
                          <div class="bio-row">
                            <p><span>prénom(s) </span>: Smith</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>: United</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Téléphone </span>: UI Designer</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Login </span>:jenifer@mailname.com</p>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>

                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1>Information Profile</h1>
                        <form class="form-horizontal" role="form">
                          <div class="form-group ">
                            <label for="nom" class="control-label col-lg-2">Nom <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control" id="nom" name="nom" minlength="5" type="text" required />
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="prenom" class="control-label col-lg-2">Prenoms </label>
                            <div class="col-lg-10">
                              <input class="form-control" id="prenom" name="prenoms" minlength="5" type="text" />
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">E-Mail </label>
                            <div class="col-lg-10">
                              <input class="form-control " id="email" type="email" name="mail" />
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="cin" class="control-label col-lg-2">CIN <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control" id="cin" name="cin" minlength="5" type="text" required/>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="tel" class="control-label col-lg-2">Téléphone <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control" id="tel" name="tel" minlength="5" type="text" required/>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="login" class="control-label col-lg-2">Login <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control" id="login" name="login" minlength="5" type="text" required/>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="mdp" class="control-label col-lg-2">Mot de passe <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control" id="mdp" name="password" minlength="5" type="password" required/>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="mdp_confirm" class="control-label col-lg-2">Confirmer mot de passe <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control" id="mdp_confirm" name="password_confirm" minlength="5" type="password" required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="photo" class="control-label col-lg-2">Télécharger une photo</label>
                            <div class="col-lg-10">
                              <input class="form-control-file" id="photo" name="photo" type="file"/>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

      </section>
    </section>
  </section>
</body>
<?php } ?>
</html>