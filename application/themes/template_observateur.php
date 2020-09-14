<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion HELPJUR - <?php echo $titre; ?></title>
        <link rel="icon" type="image/jpg" href="<?php echo base_url('assets/Images/BNI_icon.png'); ?>">
        
        <!-- FontAwesome (icon) -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Fontawesome5.11.2/css/all.css'); ?>">
        <!-- /.FontAwesome (icon) -->

        <!-- MDBootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/mdb.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/mdb.lite.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/compiled-4.8.10.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/style.css'); ?>">

        <!-- addons dataTable -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/addons/datatables.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/addons/datatables-select.min.css'); ?>">

        <!-- module annimation -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/modules/animations-extended.min.css'); ?>">

        <!-- Jquery-ui -->
        <link rel="stylesheet" href="<?php echo base_url('assets/MDB4.8.10/css/jquery-ui.css'); ?>">
        <!-- /.MDBootstrap -->
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }
        </style>
    </head>

    <body class="teal lighten-5">
        <!-- Script Jquery -->
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/jquery-3.4.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/jquery-ui.js'); ?>"></script>
        <!-- /.Script Jquery -->

        <!-- CKEditor -->
        <script src="<?php echo base_url('assets/ckeditor/build-config.js'); ?>"></script>
        <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        <!-- /.CKEditor -->

        <!-- JavaScript MDBootstrap -->
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/popper.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/mdb.min.js'); ?>"></script>
        
        <!-- moment -->
        <script src="<?php echo base_url('assets/FullCalendar3.10.0/lib/moment.min.js') ?>"></script>
        <!-- /.moment -->
        
        <!-- addons dataTable -->
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/datatables.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/datatables-select.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/dataTables.buttons.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/buttons.flash.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/jszip.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/pdfmake.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/vfs_fonts.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/buttons.html5.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/buttons.print.min.js'); ?>"></script>
        
        <!-- module WOW, Chart -->
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/modules/wow.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/modules/chart.js'); ?>"></script>
        <!-- /.JavaScript MDBootstrap -->
        
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
                <div class="container-fluid">
                    <img src="<?php echo base_url('assets/Images/logo.png'); ?>" height="40px" alt="logo BNI Madagascar">

                    <!-- Collapse -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- /.Collapse -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item <?php if ($this->uri->segment(1) == "Tableau_de_bord") { echo "active"; } ?>">
                                <a class="nav-link waves-effect" href="<?php echo base_url('Tableau_de_bord'); ?>">Tableau de bord</a>
                            </li>
                        </ul>

                        <!-- Right -->
				        <ul class="navbar-nav nav-flex-icons">
                            <li class="nav-item" data-tooltip="tooltip" data-placement="bottom" title="Calendrier">
                                <a href="<?php echo base_url('Calendrier'); ?>" class="nav-link"><i class="far fa-calendar-alt"></i></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="dropdown_utilisateur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-tooltip="tooltip" data-placement="bottom" title="Parametre"><i class="fas fa-user-cog"></i></a>
                                
                                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="dropdown_utilisateur">
                                    <a href="">
                                        <small>
                                            <?php echo $this->session->userdata('nom_utilisateur') . ' ' . $this->session->userdata('prenom_utilisateur'); ?> 
                                            (<span class="grey-text"><?php echo $this->session->userdata('profile'); ?></span>)
                                        </small>
                                    </a>
                                    <hr>

                                    <a class="dropdown-item" href="<?php echo base_url('login/deconnexion'); ?>"><i class="fas fa-power-off mr-2"></i>Se déconnecter</a>
                                </div>
                            </li>
				        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="pt-5 mx-lg-5">
            <section class="container-fluid mt-5 mb-2">
                <?php 
                    if (isset($theme_commande)) { 
                        echo $output;
                    } else { 
                        echo $output;
                    } 
                ?>
            </section>
        </main>

        <!-- Pieds de la page -->
        <footer class="fixe-bottom page-footer font-small rgba-cyan-slight">
            <div class="footer-copyright text-center py-3">© 2019 Copyright: <span  class="font-weight-bold">Gestion HELPJUR</span></div>
        </footer>
        <!-- /.Pieds de la page -->

        <script type="text/javascript">
            //Animations initialization
            new WOW().init();

            $(function () {
                $("[data-tooltip='tooltip']").tooltip()
            });
            
            $(document).ready(function () {
                setInterval(function () {
                    $.ajax({
                        url     : "<?php echo base_url('demande_d_avis/notification') ?>",
                        type    : "post",
                        dataType: "json",

                        success: function (data) {
                            $('#nouvelle_demande').html(data.nombre);
                        }
                    });
                }, 100);

                setInterval(function () {
                    $.ajax({
                        url: "<?php echo base_url('ticket/notification') ?>",
                        type: "post",
                        dataType: "json",

                        success: function (data) {
                            $('#new_recu').html(data.recu);
                            $('#new_avalider').html(data.avalider);
                            $('#new_revise').html(data.revision);
                            $('#new_ticket').html(data.total);
                        }
                    });
                }, 100);
            });
        </script>
    </body>
</html>
