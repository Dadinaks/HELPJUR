<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion HELPJUR - Authentification</title>

        <!-- MDB -->
        <link rel="stylesheet" href="<?php echo base_url('assets/MDB4.8.10/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/MDB4.8.10/css/mdb.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/MDB4.8.10/css/mdb.lite.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/MDB4.8.10/css/compiled-4.8.10.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/MDB4.8.10/css/style.css'); ?>">
        <!-- /.MDB -->

        <!-- icons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/Fontawesome5.11.2/css/all.min.css'); ?>">
        <link rel="icon" href="<?php echo base_url('assets/Images/BNI_icon.png'); ?>">
        <!-- /.icons -->
    </head>

    <body class="login_bg">
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
                <img src="<?php echo base_url('assets/Images/logo.png'); ?>" height="40px" alt="Logo BNI Madagascar">
            </nav>
        </header>

        <main class="container mt-5">
            <div class="row mt-5">
                <div class="offset-lg-7 offset-md-6 col-lg-4 col-md-6 col-sm-6">
                    <!-- Card -->
                    <div class="card testimonial-card rgba-white-strong">
                        <div class="card-up default-color"></div>

                        <div class="avatar mx-auto white">
                            <img src="<?php echo base_url('assets/Images/img1.jpg'); ?>" class="rounded-circle" alt="woman avatar">
                        </div>

                        <!-- Content -->
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">Gestion HELPJUR</h4>
                            <small class="text-muted">
                                <i class="fas fa-quote-left mr-2"></i>Outil de gestion de ticket de la departement Juridique<i class="fas fa-quote-right ml-2"></i>
                            </small>
                            <hr>

                            <?php if ($this->session->flashdata('habilite')) { ?>
                                <div class="alert alert-error text-center">
                                    <?php echo $this->session->flashdata('habilite'); ?>
                                </div>
                            <?php } ?>
                            
                            <?php echo form_open('login/connexion'); ?>
                                <div class="md-form form-sm">
                                    <input type="text" name="matricule" value="<?php echo set_value('matricule'); ?>" id="matricule" required=""
                                        oninvalid="this.setCustomValidity('Veuillez insérer votre matricule')"
                                        oninput="setCustomValidity('')" class="form-control">
                                    <label for="matricule">Matricule</label>
                                    <span id="validationMatricule"></span>
                                    <small><?php echo form_error('matricule'); ?></small>
                                </div>

                                <div class="md-form form-sm">
                                    <input type="password" name="mot_de_passe" value="<?php echo set_value('mot_de_passe'); ?>" id="mot_de_passe" required=""
                                        oninvalid="this.setCustomValidity('Veuillez insérer votre Mot de passe')"
                                        oninput="setCustomValidity('')" class="form-control">
                                    <label for="mot_de_passe">Mot de passe</label>
                                    <span id="validationMot_de_passe"></span>
                                </div>
                                <button class="btn btn-sm btn-rounded btn-default">Connection</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
            </div>
        </main>

        <footer></footer>

        <!-- JavaScript -->
        <script src="<?php echo base_url('assets/MDB4.8.10/js/jquery-3.4.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/MDB4.8.10/js/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/MDB4.8.10/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/MDB4.8.10/js/mdb.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/Fontawesome5.11.2/js/all.min.js'); ?>"></script>
        <!-- /.JavaScript -->
    </body>
</html>