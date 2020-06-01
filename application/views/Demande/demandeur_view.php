<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img16.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">Liste des demandes envoyées</h4>
                <hr>

                <div class="table-responsive text-nowrap">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Objet</th>
                                <th class="font-weight-bold">Date d'envoie</th>
                                <th class="font-weight-bold">Fichier attaché(s)</th>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($demandes as $row) : ?>
                            <tr>
                                <td class="text-left"><?php echo $row->objet; ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateDemande)); ?></td>
                                <td><?php echo $row->fichier; ?></td>
                                <td>
                                    <a href="<?php echo base_url('demande_d_avis/consulter/'. $row->idDemande); ?>" class="btn-floating btn-sm btn-success" data-tooltip="tooltip" data-placement="bottom" title="Consulter"><i class="fas fa-eye"></i></a>

                                    <a class="btn-floating btn-sm btn-danger" data-toggle="modal" data-target="#modalAbandonner" data-keyboard="false" data-backdrop="static" data-id="<?php echo $row->idDemande; ?>" data-objet="<?php echo $row->objet; ?>" data-tooltip="tooltip" data-placement="bottom" title="Abandonner"><i class="fas fa-times"></i></a>
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

<!-- Modal Abandonner -->
<div class="modal fade" id="modalAbandonner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo base_url('assets/Images/img5.png') ?>" alt="icon" class="rounded-circle img-responsive">
            </div>

            <div class="modal-body text-center mb-1">
                <h5 class="mt-1 mb-2">Abandonner la demande : <span class="font-weight-bold text-danger objet"></span>
                </h5>
                <hr>

                <?php echo form_open('Ticket/Abandonner'); ?>
                    <input type="hidden" id="idDemande_abandonner" name="idDemande_abandonner">
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
    $('#modalAbandonner').on('show.bs.modal', function (e) {
        var idDemande = $(e.relatedTarget).attr('data-id');
        var objet     = $(e.relatedTarget).attr('data-objet');

        $(this).find('.modal-body #idDemande_abandonner').val(idDemande);
        $(this).find('.objet').text(objet);
    });
</script>