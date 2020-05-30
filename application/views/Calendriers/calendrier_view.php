<script src="<?php echo base_url('assets/FullCalendar3.10.0/lib/moment.min.js') ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('assets/FullCalendar3.10.0/fullcalendar.css') ?>">

<script src="<?php echo base_url('assets/FullCalendar3.10.0/fullcalendar.js') ?>"></script>

<script src="<?php echo base_url('assets/FullCalendar3.10.0/locale/fr.js') ?>"></script>


<div class="row">
	<div class="col-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-2">
		<div class="card testimonial-card">
			<div class="card-up default-color"></div>

			<div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img8.jpg'); ?>" class="rounded-circle" alt="icon">
			</div>

			<div class="card-body">
				<h4 align="left">Jours fériés</h4>
				<hr>

				<p class="note note-danger">
					<small class="red-text font-weight-bold"><i class="fas fa-exclamation mr-2"></i>Note :</small>

					<small>
						Vous devez juste inserer <span class="font-weight-bold">les autres dates fériés.</span>
						Les <span class="font-weight-bold red-text">jours fériés</span> seront en 
						<span class="font-weight-bold red-text">Rouge</span> dans le calendrier.
					</small>
				</p>

				<?php echo form_open('Calendrier/Inserer/ferie'); ?>
					<div class="row justify-content-center">
						<div class="col-8">
							<div class="md-form">
								<input type="text" id="title_ferie" name="title_ferie" class="form-control" required>
								<label for="title_ferie">Titre</label>
							</div>
						</div>

						<div class="col-8">
							<div class="md-form">
								<input type="text" id="start_ferie" name="start_ferie" class="form-control" required>
								<label for="start_ferie">Jour férié</label>
							</div>
						</div>

						<div class="md-form">
							<div class="col-8">
								<button class="btn btn-rounded btn-success btn-sm">Enregistrer</button>
							</div>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

	<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2">
		<div class="card">
			<div class="card-body">
				<div id="agenda"></div>
			</div>
		</div>
	</div>

	<div class="col-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-2">
		<div class="card testimonial-card">
			<div class="card-up default-color"></div>

			<div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img7.jpg'); ?>" class="rounded-circle" alt="icon">
			</div>

			<div class="card-body">
				<h4 align="left">Congés</h4>
				<hr>

				<p class="note note-info" align="left">
					<small class="cyan-text font-weight-bold">Note :</small>
					<small>
						Le congé du <span class="font-weight-bold green-text">Directeur</span> en <span class="font-weight-bold green-text">Vert</span>.<br>
						Le congé des <span class="font-weight-bold text-warning">Juristes Sénior</span> en <span class="font-weight-bold text-warning">Jaune</span>.<br>
						Le congé des <span class="font-weight-bold text-info">Juristes Junior</span> en <span class="font-weight-bold text-info">Bleu</span>.
					</small>
				</p>

				<?php echo form_open('Calendrier/Inserer/conge'); ?>
					<div class="row justify-content-center">
						<div class="col-8 mb-4">
							<select id="profil" name="profil" class="browser-default custom-select" required>
								<option class="font-weight-bold" selected disabled>-- Profile --</option>
								<?php $donnee['profils'] = $this->ProfilModel->find('idProfil BETWEEN 1 AND 3');
								foreach ($donnee['profils'] as $row) : ?>
								<option value="<?php echo $row->idProfil; ?>"><?php echo $row->profile; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-8 ">
							<select class="browser-default custom-select" name="juristes" required></select>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-8 ">
							<div class="md-form">
								<input type="text" id="date_debut_conge" name="date_debut_conge" class="form-control">
								<label for="date_debut_conge">Début du congé</label>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-8 ">
							<div class="md-form">
								<input type="text" id="date_fin_conge" name="date_fin_conge" class="form-control">
								<label for="date_fin_conge">Fin du congé</label>
							</div>
						</div>
					</div>

					<div>
						<button class="btn btn-rounded btn-success btn-sm">Enregistrer</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
        $("#start_ferie").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: 'yy-mm-dd'
        }).val();

        $("#date_debut_conge").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: 'yy-mm-dd'
        }).val();

        $("#date_fin_conge").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: 'yy-mm-dd'
        }).val();
    });

    var evenement = <?php echo json_encode($data) ?>;

    var date = new Date();
    var d 	 = date.getDate();
    var m 	 = date.getMonth();
    var y 	 = date.getFullYear();

    $('#agenda').fullCalendar({
        header: {
            left   : 'prev,next today',
            center : 'title',
            right  : 'month,agendaWeek,agendaDay,listWeek'
        },

        defaultDate : date,
        navLinks    : true,// can click day/week names to navigate views
        editable    : true,
        eventLimit  : true,// allow "more" link when too many events
		events 		: evenement
    })

    $('#profil').on('change', function () {
        var idProfil = $(this).val();

        if (idProfil) {
            $.ajax({
                url      : '<?php echo base_url('Calendrier/Utilisateur/'); ?>' + idProfil,
                type     : 'GET',
                dataType : 'json',

                success: function (data) {
                    $('select[name="juristes"]').empty();
                    $('select[name="juristes"]').append('<option class="font-weight-bold" selected disabled> -- Séléction Juristes -- </option>');
                    $.each(data, function (key, value) {
                        $('select[name="juristes"]').append('<option value="' + value.idUtilisateur + '">' + value.nom + ' ' + value.prenom + '</option>');
                    });
                },
                error: function (xhr, ajaxOptions, thrownError, error) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        } else {
            $('select[name="juristes"]').empty();
        }
    });
</script>