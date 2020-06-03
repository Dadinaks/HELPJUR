<!-- Modal Ajout Utilisateur -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img6.jpg') ?>" alt="icon" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Création d'un utilisateur</h5>
				<hr>

				<?php echo validation_errors(); ?>
				<?php echo form_open('Utilisateur/inserer_Utilisateur', ['id' => 'addUser']); ?>
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="md-form form-sm">
								<input type="number" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" name="matricule_utilisateur" id="matricule_utilisateur_ajout" min="1" max="99999" required="" oninvalid="this.setCustomValidity('Veuillez insérer le matricule de l\'utilisateur')" oninput="setCustomValidity('')" class="form-control">
								<label for="matricule_utilisateur">Matricule</label>
								<small><span id="validationMatricule" class="red-text"></span></small>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control" required="" oninvalid="this.setCustomValidity('Veuillez renseigner le nom de l\'utilisateur')" oninput="setCustomValidity('')">
								<label for="nom_utilisateur">Nom</label>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="form-control" required="" oninvalid="this.setCustomValidity('Veuillez renseigner le prénom de l\'utilisateur')" oninput="setCustomValidity('')">
								<label for="prenom_utilisateur">Prénoms</label>
							</div>

							<div class="md-form form-sm">
								<input type="email" name="email_utilisateur" id="email_utilisateur" class="form-control" required="" oninvalid="this.setCustomValidity('Veuillez insérer un e-mail correct')" oninput="setCustomValidity('')">
								<label for="email_utilisateur">Email</label>
							</div>
						</div>

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="pb-3">
								<input list="lieu_utilisateur" id="input_lieu_utilisateur" name="lieu_utilisateur" placeholder="-- Agence --" class="browser-default custom-select custom-select-sm" required>
								<datalist id="lieu_utilisateur">
									<option class="font-weight-bold" selected disabled>-- Agence --</option>
									<?php $lieu = $this->LieuModel->find();
									foreach ($lieu as $row): ?>
									<option value="<?php echo $row->agences; ?>"><?php echo $row->agences; ?></option>
									<?php endforeach; ?>
								</datalist>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="direction_utilisateur" id="direction_utilisateur" class="form-control" required="" oninvalid="this.setCustomValidity('Veuillez renseigner la direction de l\'utilisateur')" oninput="setCustomValidity('')">
								<label for="direction_utilisateur">Direction</label>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="unite_utilisateur" id="unite_utilisateur" class="form-control" required="" oninvalid="this.setCustomValidity('Veuillez renseigner l\'unité ou se trouve l\'utilisateur')" oninput="setCustomValidity('')">
								<label for="unite_utilisateur">Unité</label>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="poste_utilisateur" id="poste_utilisateur" class="form-control" required="" oninvalid="this.setCustomValidity('Veuillez renseigner le poste de l\'utilisateur')" oninput="setCustomValidity('')">
								<label for="poste_utilisateur">Poste</label>
							</div>

							<select class="browser-default custom-select custom-select-sm mb-4" name="profile_utilisateur" required>
								<option class="font-weight-bold" selected disabled>-- Profil --</option>
								<?php 
								$data['profiles'] = $this->ProfilModel->find();
								foreach ($data['profiles'] as $row) { ?>
								<option value="<?php echo $row->idProfil; ?>"><?php echo $row->profile; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<button type="submit" class="btn btn-sm btn-rounded btn-success" id="save" disabled><i class="fas fa-check mr-2"></i>Enregistrer </button>
					<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal Ajout Utilisateur -->


<!-- Modal Edit Utilisateur -->
<div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">

		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img11.png') ?>" alt="icon" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Modification d’un utilisateur</h5>
				<hr>

				<?php echo form_open('Utilisateur/modifier_Utilisateur'); ?>
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<input type="hidden" name="idUtilisateur_utilisateur" id="idUtilisateur_utilisateurEdit">

							<div class="md-form form-sm">
								<input type="number" name="matricule_utilisateur" id="matricule_utilisateurEdit" class="form-control" required disabled>
								<label for="matricule_utilisateur">Matricule</label>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="nom_utilisateur" id="nom_utilisateurEdit" class="form-control" required>
								<label for="nom_utilisateur">Nom</label>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="prenom_utilisateur" id="prenom_utilisateurEdit" class="form-control" required>
								<label for="prenom_utilisateur">Prénoms</label>
							</div>

							<div class="md-form form-sm">
								<input type="email" name="email_utilisateur" id="email_utilisateurEdit" class="form-control" required>
								<label for="email_utilisateur">Email</label>
							</div>
						</div>

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<select class="browser-default custom-select custom-select-sm mb-4" name="lieu_utilisateur" id="lieu_utilisateurEdit" required>
								<option class="font-weight-bold" selected>-- Agence --</option>
								<?php
								$data['lieu'] = $this->LieuModel->find();
								foreach ($data['lieu'] as $lieu) : ?>
								<option value="<?php echo $lieu->idLieu; ?>"><?php echo $lieu->agences; ?></option>
								<?php endforeach; ?>
							</select>

							<div class="md-form form-sm">
								<input type="text" name="direction_utilisateur" id="direction_utilisateurEdit" class="form-control" required>
								<label for="direction_utilisateur">Direction</label>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="unite_utilisateur" id="unite_utilisateurEdit" class="form-control" required>
								<label for="unite_utilisateur">Unité</label>
							</div>

							<div class="md-form form-sm">
								<input type="text" name="poste_utilisateur" id="poste_utilisateurEdit" class="form-control" required>
								<label for="poste_utilisateur">Poste</label>
							</div>

							<select class="browser-default custom-select custom-select-sm mb-4" name="profile_utilisateur" id="profile_utilisateurEdit" required>
								<option class="font-weight-bold" selected>-- Profil --</option>
								<?php 
								$data['profiles'] = $this->ProfilModel->find();
								foreach ($data['profiles'] as $row) : ?>
								<option value="<?php echo $row->idProfil; ?>"><?php echo $row->profile; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Enregistrer </button>
					<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal Edit Utilisateur -->

<script type="text/javascript">
	function maxLengthCheck(object) {
		if (object.value.length > object.max.length)
		object.value = object.value.slice(0, object.max.length)
	}
	
	function isNumeric (evt) {
		var theEvent = evt || window.event;
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode (key);
		var regex = /[0-9]|\./;
		if ( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
		}
	}

	$('#modalUser').on('shown.bs.modal', function () {
		$('#matricule_utilisateur_ajout').focus();
	});

	$("#matricule_utilisateur_ajout").keyup(function(){
		var m = $(this).val();

		$.getJSON("<?php echo base_url("Utilisateur/verif_matricul/") ?>" + m, function(data){
			$("#validationMatricule").empty();
			if(data.verifie === 1){
				$("#validationMatricule").append("Le matricule " + m +" existe deja.");
				$("#save").attr("disabled", true);
			} else {
				$("#save").attr("disabled", false);
			}
		});		
	});

    $('#modalEditUser').on('show.bs.modal', function (e) {
        var idUtilisateur = $(e.relatedTarget).attr('data-id');
        var Matricule = $(e.relatedTarget).attr('data-matricule');
        var Nom = $(e.relatedTarget).attr('data-nom');
        var Prenom = $(e.relatedTarget).attr('data-prenom');
        var Email = $(e.relatedTarget).attr('data-email');
        var Lieu = $(e.relatedTarget).attr('data-agence');
        var Direction = $(e.relatedTarget).attr('data-direction');
        var Departement = $(e.relatedTarget).attr('data-departement');
        var Unite = $(e.relatedTarget).attr('data-unite');
        var Poste = $(e.relatedTarget).attr('data-poste');
        var Profile = $(e.relatedTarget).attr('data-profile');

        $(this).find('.modal-body #idUtilisateur_utilisateurEdit').val(idUtilisateur).trigger("change");
        $(this).find('.modal-body #matricule_utilisateurEdit').val(Matricule).trigger("change");
        $(this).find('.modal-body #nom_utilisateurEdit').val(Nom).trigger("change");
        $(this).find('.modal-body #prenom_utilisateurEdit').val(Prenom).trigger("change");
        $(this).find('.modal-body #email_utilisateurEdit').val(Email).trigger("change");
        $(this).find('.modal-body #lieu_utilisateurEdit').val(Lieu).trigger("change");
        $(this).find('.modal-body #departement_utilisateurEdit').val(Departement).trigger("change");
        $(this).find('.modal-body #direction_utilisateurEdit').val(Direction).trigger("change");
        $(this).find('.modal-body #unite_utilisateurEdit').val(Unite).trigger("change");
        $(this).find('.modal-body #poste_utilisateurEdit').val(Poste).trigger("change");
        $(this).find('.modal-body #profile_utilisateurEdit').val(Profile).trigger("change");
    });
</script>