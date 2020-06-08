<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up pink darken-2"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img3.jpg'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">Liste des tickets reçus</h4>
                <hr>

                <div class="table-responsive text-nowrap">
                    <table class="table table-sm table-striped" id="tb_recu">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Numéro</th>
                                <th class="font-weight-bold">Nature de Tâche</th>
                                <th class="font-weight-bold">Tâche</th>
                                <th class="font-weight-bold">Objet</th>
                                <th class="font-weight-bold">Date de réception HELPJUR</th>
                                <th class="font-weight-bold">Date de réception de la demande</th>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($tickets as $row) : ?>
                            <tr>
                                <td><span class="font-weight-bold"><?php echo $row->numTicket; ?></span></td>
                                <td><?php echo $row->categorie; ?></td>
                                <td><?php echo $row->tache; ?></td>
                                <td><?php echo $row->objet; ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateReception)); ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateDemande)); ?></td>
                                <td>
                                    <a class="btn-floating btn-sm btn-info" data-toggle="modal" data-target="#modalAfficher" data-keyboard="false" data-backdrop="static" data-id="<?php echo $row->idTicket; ?>" data-numTicket="<?php echo $row->numTicket; ?>" data-tooltip="tooltip" data-placement="bottom" title="Visualiser"><i class="fas fa-eye"></i></a>

                                    <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2) { ?>
                                    <a class="btn-floating btn-sm btn-amber" data-toggle="modal" data-target="#modalAssigner" data-keyboard="false" data-backdrop="static" data-id="<?php echo $row->idTicket; ?>" data-numTicket="<?php echo $row->numTicket; ?>" data-tooltip="tooltip" data-placement="bottom" title="Assigner à un juriste"><i class="fas fa-user-tag"></i></a>
                                    <?php } ?>

                                    <a class="btn-floating btn-sm btn-danger" data-toggle="modal" data-target="#modalAbandonner" data-keyboard="false" data-backdrop="static" data-id="<?php echo $row->idTicket; ?>" data-numTicket="<?php echo $row->numTicket; ?>" data-tooltip="tooltip" data-placement="bottom" title="Abandonner le ticket"><i class="fas fa-times"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Afficher -->
<div class="modal fade" id="modalAfficher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img4.png') ?>" alt="icon" class="rounded-circle img-responsive">
            </div>
            
			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Contenu du ticket numéro: <span class="font-weight-bold text-danger numTicket"></span></h5>
				<hr>

				<div class="text-left" id="contenu">

                </div>
			</div>
		</div>
	</div>
</div>
<!-- /Modal Afficher -->

<!-- Modal Assigner Utilisateur -->
<div class="modal fade" id="modalAssigner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img6.png') ?>" alt="avatar" class="rounded-circle img-responsive">
            </div>
            
			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Assigner le ticket numéro :<br><span class="font-weight-bold numTicket"></span> à un Juriste</h5>
				<hr>

				<?php echo form_open('Ticket/Assigner'); ?>
                    <input type="hidden" id="idTicket_assigner" name="idTicket_assigner">

                    <div class="pb-3">
                        <select id="assigner" name="assigner" class="browser-default custom-select custom-select-sm" required>
                            <option class="font-weight-bold" selected disabled>-- Séléction Juriste --</option>
                            <?php
                            $data['utilisateur'] = $this->UtilisateurModel->find('utilisateur.profil BETWEEN 1 AND 3');

                            foreach ($data['utilisateur'] as $utilisateur): ?>
                                <option value="<?php echo $utilisateur->idUtilisateur; ?>">
                                    <?php echo $utilisateur->matricule; ?> - <?php echo $utilisateur->nom; ?> <?php echo $utilisateur->prenom; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Valider</button>
                    <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal Assigner Utilisateur -->

<!-- Modal Abandonner -->
<div class="modal fade" id="modalAbandonner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo base_url('assets/Images/img5.png') ?>" alt="icon" class="rounded-circle img-responsive">
            </div>

            <div class="modal-body text-center mb-1">
                <h5 class="mt-1 mb-2">Abandonner le ticket numéro : <span class="font-weight-bold text-danger objet"></span>
                </h5>
                <hr>

                <?php echo form_open('Ticket/Abandonner/recu'); ?>
                    <input type="hidden" id="idTicket_abandonner" name="idTicket_abandonner">
                    <div class="md-form">
                        <textarea id="motif_abandon" name="motif_abandon" class="md-textarea form-control" rows="4" required></textarea>
                        <label for="motif_abandon">Motifs d'abandon</label>
                    </div>

                    <button type="submit" class="btn btn-sm btn-rounded btn-danger"><i class="fas fa-times mr-2"></i>Abandonner</button>
                    <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Abandonner -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#modalAfficher').on('show.bs.modal', function (e) {
            var idTicket = $(e.relatedTarget).attr('data-id');
            var numTicket = $(e.relatedTarget).attr('data-numTicket');

            $(this).find('.numTicket').text(numTicket);

            $.ajax({
                url: '<?php echo base_url('ticket/Visualiser/') ?>' + idTicket + '/recu',
                type: 'GET',
                dataType: 'json',

                success: function (data) {
                    $.each(data, function (key, value) {
                        $('#contenu').empty();
                        $('#contenu').append(
                            '<div class="row">' +
                            '<div class="col-4">' +
                            '<small><i class="fas fa-file mr-2"></i>Objet</small>' +
                            '<hr>' +
                            value.objet +
                            '</div>' +

                            '<div class="col-4">' +
                            '<small><i class="fas fa-tasks mr-2"></i>Type</small>' +
                            '<hr>' +

                            '<dl class="row">' +
                            '<dt class="col-sm-3">Catégorie</dt>' +
                            '<dd class="col-sm-9">: ' + value.categorie + '</dd>' +

                            '<dt class="col-sm-3">Tâche</dt>' +
                            '<dd class="col-sm-9">: ' + value.tache + '</dd>' +
                            '</dl>' +
                            '</div>' +

                            '<div class="col-4">' +
                            '<small><i class="fas fa-user mr-2"></i>Demandeur</small>' +
                            '<hr>' +
                            '<span class="font-weight-bold">' + value.matricule + '</span> - ' + value.nom + ' ' + value.prenom + '<br>' +
                            //'<small>' + value.agence + ' / ' + value.direction + ' / ' + value.departement + ' / ' + value.unite + ' / ' + value.poste + '</small>' +
                            '</div>' +
                            '</div>' +

                            '<small><i class="fas fa-file mr-2"></i>Contenue</small>' +
                            '<hr>' +
                            value.contenu +
                            '<hr>' +

                            '<div class="text-center">' +
                            '<a href="<?php echo base_url('ticket/traiter/') ?>' + idTicket + '" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-tasks mr-2"></i>Traiter</a>' +
                            '<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>' +
                            '</div>'
                        );

                    });
                },
                error: function (xhr, ajaxOptions, thrownError, error) {
                }
            });
        });

        $('#modalAssigner').on('show.bs.modal', function (e) {
            var idTicket = $(e.relatedTarget).attr('data-id');
            var numTicket = $(e.relatedTarget).attr('data-numTicket');

            $(this).find('.modal-body #idTicket_assigner').val(idTicket);
            $(this).find('.numTicket').text(numTicket);
        });

        $('#modalAbandonner').on('show.bs.modal', function (e) {
            var idTicket = $(e.relatedTarget).attr('data-id');
            var objet    = $(e.relatedTarget).attr('data-numTicket');

            $(this).find('.modal-body #idTicket_abandonner').val(idTicket);
            $(this).find('.objet').text(objet);
        });

        $('#tb_recu').DataTable({
            "order": [[4, "desc"]],
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
            "lengthMenu" : [5, 10, 15, 100]
        });
        $('.dataTables_length').addClass('bs-select');
    });

    $('#modalAbandonner').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
	});
</script>