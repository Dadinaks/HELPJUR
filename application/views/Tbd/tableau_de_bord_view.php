<style type="text/css">
	.shadow-textarea textarea.form-control::placeholder {
		font-weight: 300;
	}

	.shadow-textarea textarea.form-control {
		padding-left: 0.8rem;
	}

	.bg-grena{
		background-color: #BF2C36;
	}

	.bg-orange{
		background-color: #F77E04;
	}

	.bg-vert{
		background-color: #117D09;
	}
</style>


<ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Tableau de bord</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false">Tous les Tickets</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md" aria-selected="false">Graphe</a>
	</li>
</ul>

<div class="tab-content card pt-4 grey lighten-3" id="myTabContentMD">
	<!-- Tab 1 -->
	<div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
		<div class="mt-3">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<!-- card count -->
					<div class="row">
						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo site_url('ticket/Termines'); ?>">
							<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<p class="card-text text-white">
												<i class="fas fa-file-archive fa-4x"></i>
											</p>
										</div>
										<div class="col">
											<h5 class="card-title font-weight-bold text-right">Terminé</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Terminé'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo site_url('ticket/Recus'); ?>">
							<div class="card text-white bg-default mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<p class="card-text text-white">
												<i class="fas fa-file-alt fa-4x"></i>
											</p>
										</div>
										<div class="col">
											<h5 class="card-title text-right">Reçu</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Reçu'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo site_url('ticket/Encours'); ?>">
							<div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<p class="card-text text-white">
												<i class="fas fa-file-signature fa-4x"></i>
											</p>
										</div>
										<div class="col">
											<h5 class="card-title text-right">Encours</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Encours'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo site_url('ticket/Revision'); ?>">
							<div class="card text-white bg-orange mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-contract fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">A réviser</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Révisé'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo site_url('ticket/Validation'); ?>">
							<div class="card text-white bg-vert mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-import fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">A valider</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('A_Validé'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo site_url('ticket/Refuses'); ?>">
							<div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<p class="card-text text-white">
												<i class="fas fa-file-excel fa-4x"></i>
											</p>
										</div>
										<div class="col">
											<h5 class="card-title text-right">Refusé</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Refusé'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo site_url('ticket/Abandon'); ?>">
							<div class="card text-white bg-grena mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-excel fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">Abandonné</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Abandonné'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo site_url('ticket/Faq'); ?>">
							<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<p class="card-text text-white">
												<i class="fas fa-file fa-4x"></i>
											</p>
										</div>
										<div class="col">
											<h5 class="card-title text-right">F.A.Q</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('faq'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="card mb-3">
								<div class="card-header font-weight-bold">Nombre de ticket traiter par juriste</div>

								<div class="card-body">
									<div class="row">
										<div class="col"><span class="font-weight-bold">Statut du ticket :</span></div>

										<div class="col">
											<select class="browser-default custom-select custom-select-sm mb-4" name="" id="statutTicket">
												<option class="font-weight-bold" selected disabled>-- Filtrer par statut --</option>
												<option value="Termine">Terminé</option>
												<option value="Encours">En cours de traitement</option>
												<option value="Revise">Révisé</option>
												<option value="A_Valide">A Validé</option>
												<option value="Refuse">Refusé</option>
												<option value="Abandonne">Abandonné</option>
												<option value="faq">F.A.Q</option>
											</select>
										</div>
									</div>

									<table id="dtnbTicket" class="table table-sm table-striped" cellspacing="0" width="100%">
										<thead class="">
										<tr>
											<th class="font-weight-bold">Juriste</th>
											<th class="font-weight-bold">Nombre de Ticket(s)</th>
										</tr>
										</thead>

										<tbody id="nbTicket" class="rgba-white-light">
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="card mb-3">
								<div class="card-header font-weight-bold">Nombre de Ticket par categorie de demande</div>

								<div class="card-body">
									<div class="row">
										<div class="col-3"><span class="font-weight-bold">Catégorie :</span></div>

										<div class="col-9">
											<select class="browser-default custom-select custom-select-sm mb-4" name="" id="categorieTicket">
												<option class="font-weight-bold" selected disabled>-- Filtrer par Catégorie --</option>
												<?php 
												$data["categories"] = $this->TachecategorieModel->find("categorie");
												foreach ($data["categories"] as $row) :
												?>
												<option value="<?php echo $row->idCategorie; ?>"><?php echo $row->categorie; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>

									<table id="dtnbTache" class="table table-sm table-striped" cellspacing="0" width="100%">
										<thead class="">
										<tr>
											<th class="font-weight-bold">Nature de tâche</th>
											<th class="font-weight-bold">Nombre(s)</th>
										</tr>
										</thead>

										<tbody id="nbTache" class="rgba-white-light">

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card count -->
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="card mb-3">
								<div class="card-header font-weight-bold">Nombre de Ticket traiter par les types de Juristes</div>
								<div class="card-body">
									<canvas id="jur"></canvas>
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="card mb-3">
								<div class="card-header font-weight-bold">Pourcentage de ticket par statut</div>
								<div class="card-body">
									<canvas id="tic"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</div>

  	<!-- Tab 2 -->
  	<div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
  		<h4 class="text-center mt-4 font-weight-bold">Liste de tous les tickets</h4>

  		<div class="text-right">
  			Entre
  			<input type="text" name="date1" id="date1">
  			et
  			<input type="text" name="date2" id="date2">
  			<button class="btn sm-btn btn-floating btn-default"><i class="fas fa-search"></i></button>
  		</div>

  		<div class="table-responsive text-nowrap">
  			<table id="dtall" class="table table-sm table-striped" id="tb_avalide">
  				<thead>
  					<tr>
  						<th class="font-weight-bold">Statut</th>
  						<th class="font-weight-bold">Numéro</th>
  						<th class="font-weight-bold">Saisisseur</th>
  						<th class="font-weight-bold">Demandeur</th>
  						<th class="font-weight-bold">Objet</th>
  						<th class="font-weight-bold">Nature de tâche</th>
  						<th class="font-weight-bold">Date de réception</th>
  						<th class="font-weight-bold">Date de traitement</th>
  						<th class="font-weight-bold">Date d'avant validation</th>
  						<th class="font-weight-bold">Date de revision</th>
  						<th class="font-weight-bold">Date de refus</th>
  						<th class="font-weight-bold">Date d'abandon</th>
  						<th class="font-weight-bold">Date de redirection vers F.A.Q</th>
  					</tr>
  				</thead>

  				<tbody id="tball"></tbody>
  			</table>
  		</div>
  	</div>

  	<!-- Tab 3 -->
  	<div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md"> 
  		<div class="row mt-4">
  			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
  				<div class="card mb-3">
  					<div class="card-header font-weight-bold">Nombre de ticket(s) par mois</div>

  					<div class="card-body">
  						<div class="row">
  							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
  								<label>Filtrer par année : </label><input class="form-control" type="number" name="filtreAnnee" min="2019">
  							</div>
  						</div>
  						<canvas id="lineChart"></canvas>
  					</div>
  				</div>
  			</div>

  			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"></div>
  		</div>
  	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
	    var ctxP = document.getElementById("jur").getContext('2d');
	    var myPieChart = new Chart(ctxP, {
	        type: 'pie',
	        data: {
	            labels: ["Directeur Juridique", "Juriste Senior", "Juriste Junior"],

	            datasets: [{
	                data: [
						<?php echo $this->TicketModel->countby('Directeur Juridique'); ?>,
						<?php echo $this->TicketModel->countby('Senior'); ?>,
						<?php echo $this->TicketModel->countby('Junior'); ?>
	                ],

	                backgroundColor: ["#04C932", "#FFCD00", "#0AA9DA"],
	                hoverBackgroundColor: ["#04C932", "#FFCD00", "#0AA9DA"]
	            }]
	        },
	        options: {
	            responsive: true
	        }
	    });

	    // Calcul pourcentage
	    var termine 	= (parseInt(<?php echo $this->TicketModel->count('Terminé'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(2);
	    var recu 		= (parseInt(<?php echo $this->TicketModel->count('Reçu'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(2);
	    var encours 	= (parseInt(<?php echo $this->TicketModel->count('Encours'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(2);
	    var refuse 		= (parseInt(<?php echo $this->TicketModel->count('Refusé'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(2);
	    var abandonne 	= (parseInt(<?php echo $this->TicketModel->count('Abandonné'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(2);
	    var revise	 	= (parseInt(<?php echo $this->TicketModel->count('Revise'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(2);
	    var a_valide 	= (parseInt(<?php echo $this->TicketModel->count('A_Valide'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(2);
	    var faq 		= (parseInt(<?php echo $this->TicketModel->count('faq'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(2);

	    var ctxP = document.getElementById("tic").getContext('2d');
	    var myPieChart = new Chart(ctxP, {
	        type: 'pie',
	        data: {
	            labels: [ "Terminée", "Reçu", "Encours", "Refusée", "Abandonnée", "A reviser", "A valider", "F.A.Q"],

	            datasets: [{
	                data: [termine, recu, encours, refuse, abandonne, revise, a_valide, faq],
	                backgroundColor: ["#04C932", "#2BBBAD", "#FFBB33", "#FF3547", "#BF2C36", "#F77E04", "#117D09", "#4285F4"],
	                hoverBackgroundColor: ["#04C932", "#2BBBAD", "#FFBB33", "#FF3547", "#BF2C36", "#F77E04", "#117D09", "#4285F4"]
	            }]
	        },
	        options: {
	            responsive: true
	        }
	    });

	    $.getJSON("<?php echo base_url("Tableau_de_bord/nombre_ticket_juriste") ?>", function(data){
			$.each(data.nombres, function(key, nombre){
				$("#nbTicket").append("<tr><td>" + nombre.juriste + "</td> <td class='text-center'>" + nombre.nb + "</td></tr>");
			});
		});

		$.getJSON("<?php echo base_url("Tableau_de_bord/nombre_ticket_categorie") ?>", function(data){
			$("#nbTache").empty();
			$.each(data.nbs, function(key, nombre){
				$("#nbTache").append("<tr><td>" + nombre.tache + "</td> <td class='text-center'>" + nombre.nb + "</td></tr>");
			});
		});

		var statutTicket = document.getElementById("statutTicket");
		$("#statutTicket").on("change", function() {
			$.getJSON("<?php echo base_url("Tableau_de_bord/nombre_ticket_juriste/") ?>" + statutTicket.value, function(data){
				$("#nbTicket").empty();
				$.each(data.nombres, function(key, nombre){
					$("#nbTicket").append("<tr><td>" + nombre.juriste + "</td> <td class='text-center'>" + nombre.nb + "</td></tr>");
				});
			});
		});

		var categorieTicket = document.getElementById("categorieTicket");
		$("#categorieTicket").on("change", function() {
			$.getJSON("<?php echo base_url("Tableau_de_bord/nombre_ticket_categorie/") ?>" + categorieTicket.value, function(data){
				$("#nbTache").empty();
				$.each(data.nbs, function(key, nombre){
					$("#nbTache").append("<tr><td>" + nombre.tache + "</td> <td class='text-center'>" + nombre.nb + "</td></tr>");
				});
			});
		});

        var tableau = $('#dtall').DataTable({
            "order": [[0, "desc"]],
		    "columns": [{
			    	"title": "Numéro",
			        "data": "numTicket",
			        "class" : "font-weight-bold"
			    }, {
			        "title": "Saisisseur",
			        "data": "saisisseur"
			    }, {
			        "title": "Demandeur",
			        "data": "demandeur"
			    }, {
			        "title": "Objet",
			        "data": "objet"
			    }, {
			        "title": "Nature de tâche",
			        "data": "tache"
			    }, {
			        "title": "Date de réception",
			        "data": "dateReception"
			    }, {
			        "title": "Date de traitement",
			        "data": "dateEncours"
			    }, {
			        "title": "Date d'avant validation",
			        "data": "dateAvantValidation"
			    }, {
			        "title": "Date de revision",
			        "data": "dateRevise"
			    }, {
			        "title": "Date de refus",
			        "data": "dateRefus"
			    }, {
			        "title": "Date d'abandon",
			        "data": "dateAbandon"
			    }, {
			        "title": "Date de redirection vers F.A.Q",
			        "data": "dateFaq"
			    }, {
			        "title": "Date de terminaison",
			        "data": "dateTermine"
			    }
			],
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
            "pageLength" : 20,
            "lengthMenu" : [5, 10, 15, 20, 25, 50, 100]
        });
        $('.dataTables_length').addClass('bs-select');

        $.getJSON("<?php echo base_url("Tableau_de_bord/recuperer_tous_ticket") ?>", function(data){
        	tableau.clear();
			$.each(data.tickets, function(key, ticket){
				tableau.row.add(ticket);
				tableau.draw();
			});
		});

		$(function() {
			$("#date1").datepicker({ dateFormat: 'dd/mm/yy' });
			$("#date2").datepicker({ dateFormat: 'dd/mm/yy' });
		});


		//line
		$.getJSON("<?php echo base_url("Tableau_de_bord/graphe_line") ?>", function(data){

			var ctxL = document.getElementById("lineChart").getContext('2d');
			var myLineChart = new Chart(ctxL, {
				type: 'line',
				data: {
					labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
					datasets: [{
						label: "Terminée",
						data: data.Termine,
						backgroundColor: ['rgba(4, 200, 50, .2)',],
						borderColor: ['rgba(4, 200, 40, .7)',],
						borderWidth: 2
					},
					{
						label: "Reçu",
						data: data.Recu,
						backgroundColor: [ 'rgba(43, 187, 173, .2)',],
						borderColor: ['rgba(43, 187, 163, .7)',],
						borderWidth: 2
					},
					{
						label: "Encours",
						data: data.Encours,
						backgroundColor: [ 'rgba(255, 187, 51, .2)',],
						borderColor: ['rgba(255, 187, 40, .7)',],
						borderWidth: 2
					},
					{
						label: "Refusée",
						data: data.Refuse,
						backgroundColor: [ 'rgba(255, 53, 71, .2)',],
						borderColor: ['rgba(255, 53, 61, .7)',],
						borderWidth: 2
					},
					{
						label: "Abandonnée",
						data: data.Abandon,
						backgroundColor: [ 'rgba(191, 54, 44, .2)',],
						borderColor: ['rgba(191, 54, 34, .7)',],
						borderWidth: 2
					},
					{
						label: "A reviser",
						data: data.Revise,
						backgroundColor: [ 'rgba(247, 126, 4, .2)',],
						borderColor: ['rgba(247, 126, 0, .7)',],
						borderWidth: 2
					},
					{
						label: "A valider",
						data: data.A_valide,
						backgroundColor: [ 'rgba(17, 125, 9, .2)',],
						borderColor: ['rgba(17, 125, 0, .7)',],
						borderWidth: 2
					},
					{
						label: "F.A.Q",
						data: data.Faq,
						backgroundColor: [ 'rgba(66, 133, 244, .2)',],
						borderColor: ['rgba(66, 133, 234, .7)',],
						borderWidth: 2
					}		
					]
				},
				options: {
					responsive: true
				}
			});
		});
    });
</script>