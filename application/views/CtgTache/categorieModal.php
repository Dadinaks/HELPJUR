<!-- Modal ajout catégorie -->
<div class="modal fade" id="modalCategorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img13.png'); ?>" alt="avatar" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Création d’une catégorie</h5>
				<hr>

				<?php echo form_open('Categorie_Tache/Inserer/categorie'); ?>
				<div class="md-form form-sm">
					<input type="text" name="categorie" min="0" id="categorie" class="form-control" required>
					<label for="categorie">Catégorie</label>
				</div>

				<button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Enregistrer</button>
				<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal ajout catégorie -->


<!-- Modal edit catégorie -->
<div class="modal fade" id="modaleditCategorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<!-- Content -->
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img13.png'); ?>" alt="avatar" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Modification de la catégorie</h5>
				<hr>

				<?php echo form_open('Categorie_Tache/Modifier/categorie'); ?>
				<input type="hidden" name="idCategorie" id="idCategorie">
				<div class="md-form form-sm">
					<input type="text" name="categorie" min="0" id="categorie" class="form-control" required>
					<label for="categorie">Catégorie</label>
				</div>

				<button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Enregistrer</button>
				<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal edit catégorie -->


<!-- Modal delete catégorie -->
<div class="modal fade" id="modaldeleteCategorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img13.png'); ?>" alt="avatar" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Suppression de : <span class="categorie text-danger font-weight-bold"></span></h5>
				<hr>

				<?php echo form_open('Categorie_Tache/Supprimer/categorie'); ?>
				<input type='hidden' name='idCategorie' id='idCategorie'>
				<div class="deleteCategorieform"></div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal delete catégorie -->

<script type="text/javascript">
    $('#modaleditCategorie').on('show.bs.modal', function (e) {
        var idCategorie = $(e.relatedTarget).attr('data-id');
        var categorie = $(e.relatedTarget).attr('data-categorie');

        $(this).find('.modal-body #idCategorie').val(idCategorie).trigger("change");
        $(this).find('.modal-body #categorie').val(categorie).trigger("change");
    });

    $('#modaldeleteCategorie').on('show.bs.modal', function (e) {
        var idCategorie = $(e.relatedTarget).attr('data-id');
        var categorie = $(e.relatedTarget).attr('data-categorie');
        var count = $(e.relatedTarget).attr('data-count');

        $(this).find('.modal-body #idCategorie').val(idCategorie);
        $(this).find('.modal-body .categorie').text(categorie);

        $(this).find('.deleteCategorieform').empty();
        if (count > 0) {
            $(this).find('.deleteCategorieform').append(
                "<div>" +
                "<p class='note note-danger'>" +
                "<small class='font-weight-bold text-danger'>Note : </small>" +
                "<small>Vous ne pouvez pas supprimer cette catégorie. Vous devriez d'abord supprimer les tâches de cette catégorie.</small>" +
                "</p>" +
                "</div>" +

                "<button data-dismiss='modal' class='btn btn-sm btn-rounded btn-light'><i class='fas fa-times mr-2'></i>Annuler</button>"
            )
        } else {
            $(this).find('.deleteCategorieform').append(
                '<div class="mb-3">' +
                'Voulez-vous vraiment supprimer la catégorie?' +
                '</div>' +

                '<button type="submit" class="btn btn-sm btn-rounded btn-danger"><i class="fas fa-trash-alt mr-2"></i>Supprimer</button>' +
                '<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>'
            )
        }
    });

	$('#modalCategorie').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
	});
</script>
