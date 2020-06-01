<!-- Modal ajout tache -->
<div class="modal fade" id="modalTache" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img14.png'); ?>" alt="avatar" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Création d’une tâche</h5>
				<hr>

				<?php echo form_open('Categorie_Tache/inserer/tache'); ?>
				<select id="categorie_tache" name="categorie_tache" class="browser-default custom-select custom-select-sm mb-4" required>
					<option class="font-weight-bold" selected disabled>-- Séléction Catégorie --</option>
					<?php $data['categorie'] = $this->TachecategorieModel->find('categorie');
					foreach ($data['categorie'] as $row) { ?>
					<option value="<?php echo $row->idCategorie; ?>"><?php echo $row->categorie; ?></option>
					<?php } ?>
				</select>

				<div class="md-form form-sm">
					<input type="text" name="tache_tache" min="0" id="tache_tache" class="form-control" required>
					<label for="tache_tache">Tâche</label>
				</div>

				<div class="md-form form-sm">
					<input type="number" name="delai_tache" min="0" id="delai_tache" min="1" class="form-control" required>
					<label for="delai_tache">Délai de traitement</label>
				</div>

				<select id="cotation_tache" name="cotation_tache" class="browser-default custom-select custom-select-sm mb-4" required>
					<option class="font-weight-bold" selected disabled>-- Séléction Cotation --</option>
					<option value="Bas">Bas</option>
					<option value="Moyen">Moyen</option>
					<option value="Difficile">Difficile</option>
					<option value="Complexe">Complexe</option>
					<option value="Assistance externe">Assistance externe</option>
				</select>

				<button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Enregistrer</button>
				<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal ajout tache -->

<!-- Modal edit tache -->
<div class="modal fade" id="modalEditTache" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img14.png'); ?>" alt="avatar" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Modification d'une tâche</h5>
				<hr>

				<?php echo form_open('Categorie_Tache/modifier/tache'); ?>
				<input type="hidden" name="idTache" id="idTache">
				
				<select id="categorie_tache" name="categorie_tache" class="browser-default custom-select custom-select-sm mb-4" required>
					<option class="font-weight-bold" selected>-- Séléction Catégorie --</option>
					<?php $data['categorie'] = $this->TachecategorieModel->find('categorie');
					foreach ($data['categorie'] as $row) { ?>
					<option value="<?php echo $row->idCategorie; ?>"><?php echo $row->categorie; ?></option>
					<?php } ?>
				</select>

				<div class="md-form form-sm">
					<input type="text" name="tache_tache" id="tache_tache" class="form-control" required>
					<label for="tache_tache">Tâche</label>
				</div>

				<div class="md-form form-sm">
					<input type="number" name="delai_tache" min="1" id="delai_tache" class="form-control" required>
					<label for="delai_tache">Délai de traitement</label>
				</div>

				<select id="cotation_tache" name="cotation_tache" class="browser-default custom-select custom-select-sm mb-4" required>
					<option class="font-weight-bold" selected>-- Séléction Cotation --</option>
					<option value="Bas">Bas</option>
					<option value="Moyen">Moyen</option>
					<option value="Difficile">Difficile</option>
					<option value="Complexe">Complexe</option>
					<option value="Assistance externe">Assistance externe</option>
				</select>

				<button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Enregistrer</button>
				<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal edit tache -->

<!-- Modal delete tache -->
<div class="modal fade" id="modaldeleteTache" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img14.png') ?>" alt="avatar" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Suppression de : <span class="tache text-danger font-weight-bold"></span></h5>
				<hr>

				<?php echo form_open('Categorie_Tache/supprimer/tache'); ?>
				<input type='hidden' name='idTache' id='idTache'>
				
				<div class="deleteTacheform mb-3"></div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal delete tache -->


<script type="text/javascript">
    $('#modalEditTache').on('show.bs.modal', function (e) {
        var idTache = $(e.relatedTarget).attr('data-id');
        var tache = $(e.relatedTarget).attr('data-tache');
        var delai = $(e.relatedTarget).attr('data-delai');
        var cotation = $(e.relatedTarget).attr('data-cotation');
        var idCategorie = $(e.relatedTarget).attr('data-categorie');

        $(this).find('.modal-body #idTache').val(idTache).trigger("change");
        $(this).find('.modal-body #categorie_tache').val(idCategorie).trigger("change");
        $(this).find('.modal-body #tache_tache').val(tache).trigger("change");
        $(this).find('.modal-body #delai_tache').val(delai).trigger("change");
        $(this).find('.modal-body #cotation_tache').val(cotation).trigger("change");
    });

    $('#modaldeleteTache').on('show.bs.modal', function (e) {
        var idTache = $(e.relatedTarget).attr('data-id');
        var tache = $(e.relatedTarget).attr('data-tache');
		var check = $(e.relatedTarget).attr('data-check');

        $(this).find('.modal-body #idTache').val(idTache);
        $(this).find('.modal-body .tache').text(tache);

		$(this).find('.deleteTacheform').empty();
        if (check > 0) {
            $(this).find('.deleteTacheform').append(
                "<div>" +
                "<p class='note note-danger'>" +
                "<small class='font-weight-bold text-danger'>Note : </small>" +
                "<small>Vous ne pouvez pas supprimer cette Tâche parce qu'elle est liée avec des tickets.</small>" +
                "</p>" +
                "</div>" +

                "<button data-dismiss='modal' class='btn btn-sm btn-rounded btn-light'><i class='fas fa-times mr-2'></i>Annuler</button>"
            )
        } else {
            $(this).find('.deleteTacheform').append(
                '<div class="mb-3">' +
                'Voulez-vous vraiment supprimer cette tâche?' +
                '</div>' +

                '<button type="submit" class="btn btn-sm btn-rounded btn-danger"><i class="fas fa-trash-alt mr-2"></i>Supprimer</button>' +
                '<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>'
            )
        }
    });
</script>
