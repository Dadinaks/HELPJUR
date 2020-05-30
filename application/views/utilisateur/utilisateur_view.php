<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img10.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">
                    Liste des utilisateurs 
                    <a href="" class="btn-floating btn-sm btn-info" data-toggle="modal" data-target="#modalUser" data-keyboard="false" data-backdrop="static" data-tooltip="tooltip" data-placement="bottom" title="Ajouter"><i class="fas fa-user-plus"></i></a>
                </h4>
                <hr>
                <div class="row text-center">
                    <div class="offset-6 col-6">
                        <div class="row">
                            <div class="offset-xl-5 offset-lg-5 offset-md-5 col-3 col-lg-3 col-md-3 col-sm-12">
                                <input list="lieu_user" id="filtre_lieu_user" name="lieu_user" class="browser-default custom-select custom-select-sm" placeholder="-- Filtre Agence --" required>
                                <datalist id="lieu_user">
                                    <?php $lieu = $this->LieuModel->find();
                                    foreach ($lieu as $row): ?>
                                        <option value="<?php echo $row->agences; ?>"><?php echo $row->agences; ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>

                            <div class="col-3 col-3 col-lg-3 col-md-3 col-sm-12">
                                <select class="browser-default custom-select custom-select-sm" id="filtre_profil_user" required>
                                    <option class="font-weight-bold" selected disabled>-- Filtre Profil --</option>
                                    <?php $data['profiles'] = $this->ProfilModel->find();
                                    foreach ($data['profiles'] as $row) { ?>
                                        <option value="<?php echo $row->idProfil; ?>"><?php echo $row->profile; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-rounded btn-default" data-tooltip="tooltip" data-placement="bottom" title="Retirer tous les filtres"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm table-striped" id="tb_utilisateur">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Matricule</th>
                                <th class="font-weight-bold">Nom et Prénom(s)</th>
                                <th class="font-weight-bold">E-mail</th>
                                <th class="font-weight-bold">Agence</th>
                                <th class="font-weight-bold">Direction</th>
                                <th class="font-weight-bold">Unité</th>
                                <th class="font-weight-bold">Poste</th>
                                <th class="font-weight-bold">Profil</th>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($utilisateurs as $row) : ?>
                                <tr>
                                    <?php if ($row->statutCompte == 'Désactivé') { ?>
                                        <td><span><?php echo $row->matricule; ?></span></td>
                                        <td><span><?php echo $row->nom . ' ' . $row->prenom; ?></span></td>
                                    <?php } else { ?>
                                        <td><span class="font-weight-bold"><?php echo $row->matricule; ?></span></td>
                                        <td><span class="font-weight-bold"><?php echo $row->nom . ' ' . $row->prenom; ?></span></td>
                                    <?php } ?>
                                    
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->agences; ?></td>
                                    <td><?php echo $row->direction; ?></td>
                                    <td><?php echo $row->unite; ?></td>
                                    <td><?php echo $row->poste; ?></td>
                                    <td><?php echo $row->profile; ?></td>
                                    <td>
                                        <?php if ($row->statutCompte == 'Désactivé') { ?>
                                            <a href="<?php echo base_url('Utilisateur/Activer/'. $row->idUtilisateur); ?>" class="btn-floating btn-sm btn-success" data-tooltip="tooltip" data-placement="bottom" title="Activé"><i class="fas fa-user-check"></i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url('Utilisateur/Desactiver/'. $row->idUtilisateur); ?>" class="btn-floating btn-sm btn-danger" data-tooltip="tooltip" data-placement="bottom" title="Désactivé"><i class="fas fa-user-times mr-2"></i></a>
                                        <?php } ?>
                                        <a class="btn-floating btn-sm btn-info" data-toggle="modal" data-target="#modalEditUser" data-id="<?php echo $row->idUtilisateur; ?>"  data-matricule="<?php echo $row->matricule; ?>" data-nom="<?php echo $row->nom; ?>" data-prenom="<?php echo $row->prenom; ?>" data-email="<?php echo $row->email; ?>" data-agence="<?php echo $row->agence; ?>" data-direction="<?php echo $row->direction; ?>" data-unite="<?php echo $row->unite; ?>" data-poste="<?php echo $row->poste; ?>" data-profile="<?php echo $row->idProfil; ?>" data-tooltip="tooltip" data-placement="bottom" title="Modifier les informations" data-keyboard="false" data-backdrop="static"><i class="fas fa-user-edit mr-2"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('utilisateur/modal_utilisateur'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        var tableau = $('#tb_utilisateur').DataTable({
            "order": [[1, "asc"]],
            "language" : {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "_START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Eléments à afficher _MENU_",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                 "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            },
            "pageLength" : 5,
            "lengthMenu" : [5, 10, 15, 100],
            "columns": [{
                    "title" : "Matricule",
                    "data"  : "matricule"
                }, {
                    "title" : "Nom et Prénom(s)",
                    "data"  : "prenom"
                }, {
                    "title" : "E-mail",
                    "data"  : "email"
                }, {
                    "title" : "Agence",
                    "data"  : "agences"
                }, {
                    "title" : "Direction",
                    "data"  : "direction"
                }, {
                    "title" : "Unité",
                    "data"  : "unite"
                }, {
                    "title" : "Poste",
                    "data"  : "poste"
                }, {
                    "title" : "Profil",
                    "data"  : "profile"
                }, {
                    "title" : "Action",
                    "data"  : "idUtilisateur"
                }
            ]
        });
        $('.dataTables_length').addClass('bs-select');

        var filtre_lieu   = document.getElementById("filtre_lieu_user");
        var filtre_profil = document.getElementById("filtre_profil_user");

        $("#filtre_lieu_user").on("change", function() {
            console.log(filtre_lieu.value);
            /*$.getJSON("<?php //echo base_url("Tableau_de_bord/nombre_ticket_categorie/") ?>" + categorieTicket.value, function(data){
                $("#nbTache").empty();
                $.each(data.nbs, function(key, nombre){
                    $("#nbTache").append("<tr><td>" + nombre.tache + "</td> <td class='text-center'>" + nombre.nb + "</td></tr>");
                });
            });*/
        });

        $("#filtre_profil_user").on("change", function() {
            $.getJSON("<?php echo base_url("Utilisateur/filtrer_par_profil/") ?>" + filtre_profil.value, function(data){
                tableau.clear();
                $.each(data.profils, function(key, profil){
                    tableau.row.add(profil);
                    tableau.draw();
                });
            });
        });
    });
</script>