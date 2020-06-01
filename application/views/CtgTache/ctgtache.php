<div class="row wow">
	<!-- Catégories -->
	<div class="col-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 mb-3">
		<div class="card testimonial-card">
			<div class="card-up default-color"></div>

			<div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img13.png'); ?>" class="rounded-circle" alt="icon">
			</div>

			<div class="card-body">
				<h4 class="card-title">
					Liste des catégories
					<a href="" class="btn-floating btn-sm btn-info" data-toggle="modal" data-keyboard="false"
					   data-backdrop="static" data-target="#modalCategorie" data-tooltip="tooltip"
					   data-placement="bottom" title="Ajouter"><i class="fas fa-plus"></i></a>
				</h4>
				<hr>

				<table class="table table-sm table-striped" id="tb_categorie">
					<thead>
					<tr>
						<th class="font-weight-bold">Categorie</th>
						<th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
					</tr>
					</thead>

					<tbody id="categorie" class="rgba-white-light">
					<?php foreach ($categories as $row) { ?>
					<tr>
						<td><?php echo $row->categorie; ?></td>
						<td>
							<a href='' class='btn-floating btn-sm btn-success' data-toggle='modal'
								data-target='#modaleditCategorie' data-keyboard='false' data-backdrop='static'
								data-id='<?php echo $row->idCategorie; ?>'
								data-categorie='<?php echo $row->categorie; ?>' data-tooltip='tooltip'
								data-placement='bottom' title='Modifier'><i class='fas fa-pencil-alt'></i></a>

							<a href='' class='btn-floating btn-sm btn-danger' data-toggle='modal'
								data-target='#modaldeleteCategorie' data-keyboard='false' data-backdrop='static'
								data-count='<?php echo $this->TachecategorieModel->count('tache', 'idCategorie = ' . $row->idCategorie) ?>'
								data-id='<?php echo $row->idCategorie; ?>'
								data-categorie='<?php echo $row->categorie; ?>' data-tooltip='tooltip'
								data-placement='bottom' title='Supprimer'><i class='fas fa-trash-alt'></i></a>
						</td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php $this->load->view('CtgTache/categorieModal'); ?>
	<!-- /.Catégories -->

	<!-- Tâches -->
	<div class="col-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 mb-2">
		<div class="card testimonial-card">
			<div class="card-up default-color"></div>

			<div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img14.png'); ?>" class="rounded-circle" alt="icon">
			</div>

			<div class="card-body">
				<h4 class="card-title">
					Liste des tâches
					<a href="" class="btn-floating btn-sm btn-info" data-toggle="modal" data-target="#modalTache"
					   data-keyboard="false" data-backdrop="static" data-tooltip="tooltip" data-placement="bottom"
					   title="Ajouter"><i class="fas fa-plus"></i></a>
				</h4>
				<hr>

				<table class="table table-sm table-striped" id="tb_tache">
					<thead>
					<tr>
						<th class="font-weight-bold">Catégorie</th>
						<th class="font-weight-bold">Tâche</th>
						<th class="font-weight-bold">Délai de traitement</th>
						<th class="font-weight-bold">Cotation</th>
						<th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
					</tr>
					</thead>

					<tbody id="tache" class="rgba-white-light">
					<?php foreach ($taches as $row) { ?>
					<tr>
						<td><?php echo $row->categorie; ?></td>
						<td><?php echo $row->tache; ?></td>
						<td><?php echo $row->delai; ?> jour(s)</td>
						<td><?php echo $row->cotation; ?></td>
						<td>
							<a href='' class='btn-floating btn-sm btn-success' data-toggle='modal'
								data-keyboard='false' data-backdrop='static' data-target='#modalEditTache'
								data-id='<?php echo $row->idTache; ?>'
								data-categorie='<?php echo $row->idCategorie; ?>'
								data-tache='<?php echo $row->tache; ?>' data-delai='<?php echo $row->delai; ?>'
								data-cotation='<?php echo $row->cotation; ?>' data-tooltip='tooltip'
								data-placement='bottom' title='Modifier'><i class='fas fa-pencil-alt'></i></a>

							<a href='' class='btn-floating btn-sm btn-danger' data-toggle='modal'
								data-keyboard='false' data-backdrop='static' data-target='#modaldeleteTache'
								data-id='<?php echo $row->idTache; ?>' data-check='<?php echo $this->TachecategorieModel->check($row->idTache); ?>' 
								data-tache='<?php echo $row->tache; ?>' data-tooltip='tooltip' data-placement='bottom' title='Supprimer'><i class='fas fa-trash-alt'></i></a>
						</td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php $this->load->view('CtgTache/tacheModal'); ?>
	<!-- /.Tâches -->
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#tb_categorie').DataTable({
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

        $('#tb_tache').DataTable({
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
</script>