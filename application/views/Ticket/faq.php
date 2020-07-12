<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up pink darken-2"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img3.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">Liste des tickets redirigés vers F.A.Q</h4>
                <hr>

                <div class="table-responsive text-nowrap">
                    <table class="table table-sm table-striped" id="tb_faq">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Numéro</th>
                                <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3) {  ?>
                                <th class="font-weight-bold">Saisisseur</th>
                                <?php } ?>
                                <th class="font-weight-bold">Objet</th>
                                <th class="font-weight-bold">Date de redirection F.A.Q</th>
                                <th class="font-weight-bold">Date de réception</th>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($tickets as $row) : ?>
                            <tr>
                                <td><span class="font-weight-bold"><?php echo $row->numTicket; ?></span></td>
                                <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3) {  ?>
                                <td><span class="font-weight-bold"><?php echo $row->info_saisisseur; ?></span></td>
                                <?php } ?>  
                                <td><?php echo $row->objet; ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateFaq)); ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateDemande)); ?></td>
                                <td>
                                    <a href="" class="btn-floating btn-sm btn-info" data-toggle="modal" data-target="#modalAfficher" data-keyboard="false" data-backdrop="static" data-id="<?php echo $row->idTicket; ?>" data-numTicket="<?php echo $row->numTicket; ?>" data-tooltip="tooltip" data-placement="bottom" title="Visualiser"><i class="fas fa-eye"></i></a>
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
	<div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
		<div class="modal-content">
            <div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img4.png') ?>" alt="icon" class="rounded-circle img-responsive">
            </div>
            
            <div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Contenu du ticket numéro : <span class="font-weight-bold text-danger numTicket"></span>
				</h5>
				<hr>

				<div class="text-left" id="contenu">

                </div>
                <div class="text-center">
                    <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Retour</button>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- /Modal Afficher -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#modalAfficher').on('show.bs.modal', function (e) {
            var idTicket = $(e.relatedTarget).attr('data-id');
            var numTicket = $(e.relatedTarget).attr('data-numTicket');

            $(this).find('.numTicket').text(numTicket);

            $.ajax({
                url: '<?php echo base_url('ticket/Visualiser/') ?>' + idTicket + '/faq',
                type: 'GET',
                dataType: 'json',

                success: function (data) {
                    $.each(data, function (key, value) {
                        var pj = '';
                        if(value.fichier){
                            pj ='<a href="<?php echo base_url("/assets/Fichiers/"); ?>'+ value.fichier +'"><i class="fas fa-paperclip mr-2"></i>'+ value.fichier +'</a>'
                        }
                        $('#contenu').empty();
                        $('#contenu').append(
                            '<div class="row mb-3">' +
                            '<div class="col-6">' +
                            '<small><i class="fas fa-file mr-2"></i>Objet</small>' +
                            '<hr>' +
                            value.objet + '<br>' + 
                            pj +
                            '</div>' +

                            '<div class="col-6">' +
                            '<small><i class="fas fa-user mr-2"></i>Demandeur</small>' +
                            '<hr>' +
                            '<span class="font-weight-bold">' + value.info_demandeur + '<br>' +
                            //'<small>' + value.agence + ' / ' + value.direction + ' / ' + value.departement + ' / ' + value.unite + ' / ' + value.poste + '</small>' +
                            '</div>' +
                            '</div>' +

                            '<small><i class="fas fa-file mr-2"></i>Contenu</small>' +
                            '<hr>' +
                            '<div style="max-height: 250px; overflow-y: scroll;">' + value.contenu + '</div>'
                        );

                    });
                },
                error: function (xhr, ajaxOptions, thrownError, error) {
                }
            });
        });

        $('#tb_faq').DataTable({
            "order": [[0, "desc"]],
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
                "sSearch":         "<i class='fas fa-search'></i>",
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
</script>