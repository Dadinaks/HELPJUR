<?php foreach ($ticket as $row) : ?>
	<!-- Visualiser Traitement -->
	<?php if ($this->uri->segment(4) == 'Voir') { ?>
	<!-- Jumbotron -->
		<div class="jumbotron grey lighten-4">
			<h4 class="card-title h4 pb-2 text-center">
				<strong>Visualisation du traitement du ticket numéro : <span id="numeroTicket" class="teal-text"><?php echo $row->numTicket ?></span></strong>
			</h4>

			<small>
				<dl class="row">
					<dt class="col-sm-3 col-md-4 col-lg-2">Demandeur</dt>
					<dd class="col-sm-9"><?php echo $row->info_demandeur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Saisisseur</dt>
					<dd class="col-sm-9"><?php echo $row->info_saisisseur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Catégorie</dt>
					<dd class="col-sm-9"><?php echo $row->categorie; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Tâche</dt>
					<dd class="col-sm-9"><?php echo $row->tache; ?></dd>
				</dl>
			</small>

			<div class="row">
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="jumbotron">
						<h5 class="font-weight-bold text-monospace" id="objet_ticket"><?php echo $row->objet; ?></h5><br>
						<?php if($row->fichier != NULL) :?>
						<a href="<?php echo base_url('/assets/Fichiers/'. $row->fichier); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $row->fichier; ?></a>
						<?php endif; ?>
						<hr class="my-4">
						<div style="max-height: 500px; overflow-y: scroll;"><p class="text-monospace" ><?php echo $row->contenu; ?></p></div>
					</div>
				</div>

				<!-- CKEditor traitement -->
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<?php 
					$pjs['pj'] = $this->PjModel->find($this->uri->segment(3));
				
					foreach ($pjs['pj'] as $col) :
						if($col->pj != NULL) : ?>
						<small>
							<dl class="row">	
								<dt class="col-sm-5 col-md-4 col-lg-2">Pièce Jointe <small>(traitement)</small></dt>
								<dd class="col-sm-7 col-md-8 col-lg-10"><a href="<?php echo base_url('/assets/Fichiers/'. $col->pj); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $col->pj; ?></a></dd>	
							</dl>
						</small>
						<?php 
						endif;
					endforeach;
					?>
					<?php echo form_open('Ticket/Enregistrer/' . $this->uri->segment(3)); ?>
						<input type="hidden" name="idTicket" value="<?php echo $this->uri->segment(3); ?>">
						<textarea name="contenu_traitement" id="contenu_traitement" rows="10" cols="80"><?php echo $row->traitement; ?></textarea>
							
						<script type="text/javascript">
							CKEDITOR.replace('contenu_traitement', {
								readOnly: true,
								language: 'fr',
								uiColor: '#e0f2f1'
							});
						</script>
						
						<div class="text-right">
							<a href="<?php echo base_url('Ticket/Encours'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
						</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.CKEditor traitement -->
			</div>
		</div>
	<!-- /.Visualiser Traitement -->


	<!-- Visualiser Terminé -->
	<?php } elseif ($this->uri->segment(4) == 'Termine') { ?>
	<!-- Jumbotron -->
		<div class="jumbotron grey lighten-4">
			<h4 class="card-title h4 pb-2 text-center">
				<strong>Visualisation du ticket numéro : <span id="numeroTicket" class="teal-text"><?php echo $row->numTicket ?></span></strong>
			</h4>

			<small>
				<dl class="row">
					<dt class="col-sm-3 col-md-4 col-lg-2">Demandeur</dt>
					<dd class="col-sm-9"><?php echo $row->info_demandeur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Saisisseur</dt>
					<dd class="col-sm-9"><?php echo $row->info_saisisseur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Catégorie</dt>
					<dd class="col-sm-9"><?php echo $row->categorie; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Tâche</dt>
					<dd class="col-sm-9"><?php echo $row->tache; ?></dd>
				</dl>
			</small>

			<div class="row">
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="jumbotron">
						<h5 class="font-weight-bold text-monospace" id="objet_ticket"><?php echo $row->objet; ?></h5><br>
						<?php if($row->fichier != NULL) :?>
						<a href="<?php echo base_url('/assets/Fichiers/'. $row->fichier); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $row->fichier; ?></a>
						<?php endif; ?>
						<hr class="my-4">

						<div style="max-height: 500px; overflow-y: scroll;"><p class="text-monospace" ><?php echo $row->contenu; ?></p></div>
					</div>
				</div>

				<!-- CKEditor traitement -->
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<?php 
					$pjs['pj'] = $this->PjModel->find($this->uri->segment(3));
				
					foreach ($pjs['pj'] as $col) :
						if($col->pj != NULL) : ?>
						<small>
							<dl class="row">	
								<dt class="col-sm-5 col-md-4 col-lg-2">Pièce Jointe <small>(traitement)</small></dt>
								<dd class="col-sm-7 col-md-8 col-lg-10"><a href="<?php echo base_url('/assets/Fichiers/'. $col->pj); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $col->pj; ?></a></dd>	
							</dl>
						</small>
						<?php 
						endif;
					endforeach;
					?>

					<?php echo form_open('Ticket/Enregistrer/' . $this->uri->segment(3)); ?>
						<input type="hidden" name="idTicket" value="<?php echo $this->uri->segment(3); ?>">
						<textarea name="contenu_traitement" id="contenu_traitement" rows="10" cols="80"><?php echo $row->traitement; ?></textarea>
							
						<script type="text/javascript">
							CKEDITOR.replace('contenu_traitement', {
								readOnly: true,
								language: 'fr',
								uiColor: '#e0f2f1'
							});
						</script>
						
						<div class="text-right">
							<a href="<?php echo base_url('Ticket/Termines'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
						</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.CKEditor traitement -->
			</div>
		</div>
	<!-- /.Visualiser Terminé -->


	<?php } elseif ($this->uri->segment(4) == 'Consulter') { ?>
	<!-- Visualiser A VALIDER -->
		<!-- Jumbotron -->
		<div class="jumbotron grey lighten-4">
			<h4 class="card-title h4 pb-2 text-center">
				<strong>Consultation du traitement du ticket numéro : <span id="numeroTicket" class="teal-text"><?php echo $row->numTicket ?></span></strong>
			</h4>

			<small>
				<dl class="row">
					<dt class="col-sm-3 col-md-4 col-lg-2">Demandeur</dt>
					<dd class="col-sm-9"><?php echo $row->info_demandeur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Saisisseur</dt>
					<dd class="col-sm-9"><?php echo $row->info_saisisseur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Catégorie</dt>
					<dd class="col-sm-9"><?php echo $row->categorie; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Tâche</dt>
					<dd class="col-sm-9"><?php echo $row->tache; ?></dd>
				</dl>
			</small>

			<div class="row">
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="jumbotron">
						<h5 class="font-weight-bold text-monospace" id="objet_ticket"><?php echo $row->objet; ?></h5><br>
						<?php if($row->fichier != NULL) :?>
						<a href="<?php echo base_url('/assets/Fichiers/'. $row->fichier); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $row->fichier; ?></a>
						<?php endif; ?>
						<hr class="my-4">

						<div style="max-height: 500px; overflow-y: scroll;"><p class="text-monospace" ><?php echo $row->contenu; ?></p></div>
					</div>
				</div>

				<!-- CKEditor traitement -->
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<?php 
					$pjs['pj'] = $this->PjModel->find($this->uri->segment(3));
				
					foreach ($pjs['pj'] as $col) :
						if($col->pj != NULL) : ?>
						<small>
							<dl class="row">	
								<dt class="col-sm-5 col-md-4 col-lg-2">Pièce Jointe <small>(traitement)</small></dt>
								<dd class="col-sm-7 col-md-8 col-lg-10"><a href="<?php echo base_url('/assets/Fichiers/'. $col->pj); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $col->pj; ?></a></dd>	
							</dl>
						</small>
						<?php 
						endif;
					endforeach;
					?>

					<?php echo form_open('Ticket/Enregistrer/' . $this->uri->segment(3) . '/Consulter'); ?>
						<input type="hidden" name="idTicket" value="<?php echo $this->uri->segment(3); ?>">
						<textarea name="contenu_traitement" id="contenu_traitement" rows="10" cols="80"><?php echo $row->traitement; ?></textarea>
						
						<?php if($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior'){ ?>	
						<script type="text/javascript">
							CKEDITOR.replace('contenu_traitement', {
								language: 'fr',
								uiColor: '#e0f2f1'
							});
						</script>
						<?php } else { ?>
						<script type="text/javascript">
							CKEDITOR.replace('contenu_traitement', {
								readOnly: true,
								language: 'fr',
								uiColor: '#e0f2f1'
							});
						</script>
						<?php } ?>

						<div class="text-right">
							<?php if($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior'){ ?>
							<button class="btn btn-sm btn-dark-green btn-rounded" type="submit" href="" data-tooltip="tooltip" data-placement="bottom" title="Enregistrer les modifications"><i class="fas fa-save mr-2"></i>Enregistrer</button>

							<button class="btn btn-sm btn-default btn-rounded" type="submit" formaction="<?php echo base_url('Ticket/Valider/' . $row->idTicket . '/' . $this->session->userdata('id_utilisateur')); ?>" data-tooltip="tooltip" data-placement="bottom" title="Valider le Ticket"><i class="fas fa-check mr-2"></i>Valider</button>

							<a href="" class="btn btn-sm btn-amber btn-rounded" data-toggle="modal" data-target="#modalRemarque" data-keyboard="false" data-backdrop="static"><i class="fas fa-comments mr-2"></i>Réviser</a>
							<?php } ?>

							<a href="<?php echo base_url('Ticket/Validation'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
						</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.CKEditor traitement -->
			</div>
		</div>
	<!-- /.Visualiser A VALIDER -->


	<!-- Visualiser Abandonné -->
	<?php } elseif ($this->uri->segment(4) == 'Abandonne') { ?>
	<!-- Jumbotron -->
		<div class="jumbotron grey lighten-4">
			<h4 class="card-title h4 pb-2 text-center">
				<strong>Visualisation du ticket numéro : <span id="numeroTicket" class="teal-text"><?php echo $row->numTicket ?></span></strong>
			</h4>

			<small>
				<dl class="row">
					<dt class="col-sm-3 col-md-4 col-lg-2">Demandeur</dt>
					<dd class="col-sm-9"><?php echo $row->info_demandeur; ?> <small class="text-muted">< <?php echo $row->email; ?> ></small></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Saisisseur</dt>
					<dd class="col-sm-9"><?php echo $row->info_saisisseur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Catégorie</dt>
					<dd class="col-sm-9"><?php echo $row->categorie; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Tâche</dt>
					<dd class="col-sm-9"><?php echo $row->tache; ?></dd>
				</dl>
			</small>

			<div class="row">
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="jumbotron">
						<div class="mb-5">
							<h5 class="font-weight-bold text-monospace" id="objet_ticket">Motif d'abandon</h5>
							<hr class="my-4">

							<p class="text-monospace" style="max-height: 500px; overflow-y: scroll;"><?php echo $row->motif; ?></p>
						</div>

						<div>
							<h5 class="font-weight-bold text-monospace" id="objet_ticket">Objet : <?php echo $row->objet; ?></h5><br>
							<?php if($row->fichier != NULL) :?>
							<a href="<?php echo base_url('/assets/Fichiers/'. $row->fichier); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $row->fichier; ?></a>
							<?php endif; ?>
							<hr class="my-4">

							<div style="max-height: 500px; overflow-y: scroll;"><p class="text-monospace" ><?php echo $row->contenu; ?></p></div>
						</div>
					</div>
				</div>

				<!-- CKEditor traitement -->
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<?php 
					$pjs['pj'] = $this->PjModel->find($this->uri->segment(3));
				
					foreach ($pjs['pj'] as $col) :
						if($col->pj != NULL) : ?>
						<small>
							<dl class="row">	
								<dt class="col-sm-5 col-md-4 col-lg-2">Pièce Jointe <small>(traitement)</small></dt>
								<dd class="col-sm-7 col-md-8 col-lg-10"><a href="<?php echo base_url('/assets/Fichiers/'. $col->pj); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $col->pj; ?></a></dd>	
							</dl>
						</small>
						<?php 
						endif;
					endforeach;
					?>

					<?php echo form_open('Ticket/Enregistrer/' . $this->uri->segment(3)); ?>
						<input type="hidden" name="idTicket" value="<?php echo $this->uri->segment(3); ?>">
						<textarea name="contenu_traitement" id="contenu_traitement" rows="10" cols="80"><?php echo $row->traitement; ?></textarea>
							
						<script type="text/javascript">
							CKEDITOR.replace('contenu_traitement', {
								readOnly: true,
								language: 'fr',
								uiColor: '#e0f2f1'
							});
						</script>
						
						<div class="text-right">
							<a href="<?php echo base_url('Ticket/Abandon'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
						</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.CKEditor traitement -->
			</div>
		</div>
	<!-- /.Visualiser Abandonné -->


	<?php } elseif ($this->uri->segment(4) == 'Reviser') { ?>
	<!-- /.Traitement à Réviser -->
		<!-- Jumbotron -->
		<div class="jumbotron grey lighten-4">
			<h4 class="card-title h4 pb-2 text-center">
				<strong>Révision du traitement du ticket numéro : <span id="numeroTicket" class="teal-text"><?php echo $row->numTicket ?></span></strong>
			</h4>

			<small>
				<dl class="row">
					<dt class="col-sm-3 col-md-4 col-lg-2">Demandeur</dt>
					<dd class="col-sm-9"><?php echo $row->info_demandeur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Saisisseur</dt>
					<dd class="col-sm-9"><?php echo $row->info_saisisseur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Catégorie</dt>
					<dd class="col-sm-9"><?php echo $row->categorie; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Tâche</dt>
					<dd class="col-sm-9"><?php echo $row->tache; ?></dd>
				</dl>
			</small>

			<div class="row">
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="jumbotron">
						<div class="mb-5">
							<h5 class="font-weight-bold text-monospace" id="objet_ticket">Remarque à faire</h5>
							<hr class="my-4">

							<p class="text-monospace" style="max-height: 500px; overflow-y: scroll;"><?php echo $row->revision; ?></p>
						</div>

						<div>
							<h5 class="font-weight-bold text-monospace" id="objet_ticket">Objet : <?php echo $row->objet; ?></h5><br>
							<?php if($row->fichier != NULL) :?>
							<a href="<?php echo base_url('/assets/Fichiers/'. $row->fichier); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $row->fichier; ?></a>
							<?php endif; ?>
							<hr class="my-4">

							<div style="max-height: 500px; overflow-y: scroll;"><p class="text-monospace" ><?php echo $row->contenu; ?></p></div>
						</div>
					</div>
				</div>

				<!-- CKEditor traitement -->
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<?php 
					$pjs['pj'] = $this->PjModel->find($this->uri->segment(3));
				
					foreach ($pjs['pj'] as $col) :
						if($col->pj != NULL) : ?>
						<small>
							<dl class="row">	
								<dt class="col-sm-5 col-md-4 col-lg-2">Pièce Jointe <small>(traitement)</small></dt>
								<dd class="col-sm-7 col-md-8 col-lg-10"><a href="<?php echo base_url('/assets/Fichiers/'. $col->pj); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $col->pj; ?></a></dd>	
							</dl>
						</small>
						<?php 
						endif;
					endforeach;
					?>

					<?php $matricul_verif = strpos($row->info_saisisseur, $this->session->userdata('matricule'));
                    if ($matricul_verif === false) { 
						echo form_open('Ticket/Enregistrer/' . $this->uri->segment(3) . '/Reviser'); ?>
						<input type="hidden" name="idTicket" value="<?php echo $this->uri->segment(3); ?>">
						<textarea name="contenu_traitement" id="contenu_traitement" rows="10" cols="80"><?php echo $row->traitement; ?></textarea>
							
						<script type="text/javascript">
							CKEDITOR.replace('contenu_traitement', {
								readOnly: true,
								language: 'fr',
								uiColor: '#e0f2f1'
							});
						</script>
						
						<div class="text-right">
							<a href="<?php echo base_url('Ticket/Revision'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
						</div>
					<?php echo form_close();
					} else { 
						echo form_open('Ticket/Enregistrer/' . $this->uri->segment(3) . '/Reviser'); ?>
						<input type="hidden" name="idTicket" value="<?php echo $this->uri->segment(3); ?>">
						<textarea name="contenu_traitement" id="contenu_traitement" rows="10" cols="80"><?php echo $row->traitement; ?></textarea>
							
						<script type="text/javascript">
							CKEDITOR.replace('contenu_traitement', {
								language: 'fr',
								uiColor: '#e0f2f1'
							});
						</script>
						
						<div class="text-right">
							<button class="btn btn-sm btn-dark-green btn-rounded" type="submit" href="" data-tooltip="tooltip" data-placement="bottom" title="Enregistrer les modifications"><i class="fas fa-save mr-2"></i>Enregistrer</button>

							<button class="btn btn-sm btn-default btn-rounded" type="submit" formaction="<?php echo base_url('Ticket/Valider/' . $row->idTicket. '/' . $this->session->userdata('id_utilisateur')); ?>" data-tooltip="tooltip" data-placement="bottom" title="Valider le Ticket"><i class="fas fa-check mr-2"></i>Valider</button>

							<a href="<?php echo base_url('Ticket/Revision'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
						</div>
					<?php echo form_close();
					 } ?>
				</div>
				<!-- /.CKEditor traitement -->
			</div>
		</div>
	<!-- /.Traitement à Réviser -->


	<?php } else { ?>
	<!-- Traiter -->
		<!-- Jumbotron -->
		<div class="jumbotron grey lighten-4">
			<h4 class="card-title h4 pb-2 text-center">
				<strong>Traitement du ticket numéro : <span id="numeroTicket" class="teal-text"><?php echo $row->numTicket ?></span></strong>
			</h4>

			<small>
				<dl class="row">
					<dt class="col-sm-3 col-md-4 col-lg-2">Demandeur</dt>
					<dd class="col-sm-9"><?php echo $row->info_demandeur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Saisisseur</dt>
					<dd class="col-sm-9"><?php echo $row->info_saisisseur; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Catégorie</dt>
					<dd class="col-sm-9"><?php echo $row->categorie; ?></dd>

					<dt class="col-sm-3 col-md-4 col-lg-2">Tâche</dt>
					<dd class="col-sm-9"><?php echo $row->tache; ?></dd>
				</dl>
			</small>

			<div class="row">
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="jumbotron">
						<h5 class="font-weight-bold text-monospace" id="objet_ticket"><?php echo $row->objet; ?></h5><br>
						<?php if($row->fichier != NULL) :?>
						<a href="<?php echo base_url('/assets/Fichiers/'. $row->fichier); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $row->fichier; ?></a>
						<?php endif; ?>
						<hr class="my-4">

						<div style="max-height: 500px; overflow-y: scroll;"><p class="text-monospace" ><?php echo $row->contenu; ?></p></div>
					</div>
				</div>

				<!-- CKEditor traitement -->
				<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<?php 
					$pjs['pj'] = $this->PjModel->find($this->uri->segment(3));
				
					foreach ($pjs['pj'] as $col) :
						if($col->pj != NULL) : ?>
						<small>
							<dl class="row">	
								<dt class="col-sm-5 col-md-4 col-lg-2">Pièce Jointe <small>(traitement)</small></dt>
								<dd class="col-sm-7"><a href="<?php echo base_url('/assets/Fichiers/'. $col->pj); ?>"><i class="fas fa-paperclip mr-2"></i><?php echo $col->pj; ?></a></dd>	
							</dl>
						</small>
						<?php 
						endif;
					endforeach;
					?>

					<?php echo form_open_multipart('pj/ajouter_pj/' . $this->uri->segment(3)); ?>
						<input type="hidden" name="pj_idTicket" value="<?php echo $this->uri->segment(3); ?>">
						<div class="row clearfix">
							<div class="col-9">
								<div class="input-group mb-2">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="pj" name="pj" aria-describedby="pj">
										<label class="custom-file-label text-left" for="pj1">Choisir un fichier inferieur à 2Mo</label>
									</div>
								</div>
							</div>

							<div class="col-1">
								<button type="submit" id="save" class="btn btn-sm btn-rounded btn-success" data-tooltip="tooltip" data-placement="bottom" title="Ajouter le piece jointe dans le traitement">Ajouter</button>
							</div>
						</div>

						<small id="error_uploadFile" class="red-text font-weight-bold"></small>
					<?php echo form_close(); ?>
					
					<?php echo form_open('Ticket/Enregistrer/' . $this->uri->segment(3)); ?>
						<input type="hidden" name="idTicket" value="<?php echo $this->uri->segment(3); ?>">
						<textarea name="contenu_traitement" id="contenu_traitement" rows="10" cols="80"><?php echo $row->traitement; ?></textarea>
							
						<script type="text/javascript">
							CKEDITOR.replace('contenu_traitement', {
								language: 'fr',
								uiColor: '#e0f2f1'
							});
						</script>
						
						<div class="text-right">
							<a class="btn btn-sm btn-amber btn-rounded" onclick="exportHTML();" href="" data-tooltip="tooltip" data-placement="bottom" title="Exporter le traitement en fichier Word (.doc)"><i class="fas fa-file-word mr-2"></i>Exporter</a>

							<button class="btn btn-sm btn-dark-green btn-rounded" type="submit" href="" data-tooltip="tooltip" data-placement="bottom" title="Enregistrer le traitement"><i class="fas fa-save mr-2"></i>Enregistrer</button>

							<?php if ($this->session->userdata('role') == 2 || $this->session->userdata('role') == 3) { ?>
								<button class="btn btn-sm btn-teal btn-rounded" type="submit" formaction="<?php echo base_url('Ticket/Soumettre/' . $row->idTicket); ?>" data-tooltip="tooltip" data-placement="bottom" title="Soumettre le traitement pour validation"><i class="fas fa-check mr-2"></i>Soumettre</button>

							<?php } elseif ($this->session->userdata('role') == 1) { ?>
								<button class="btn btn-sm btn-success btn-rounded" type="submit" formaction="<?php echo base_url('Ticket/Valider/' . $row->idTicket . '/' . $this->session->userdata('id_utilisateur')); ?>" data-tooltip="tooltip" data-placement="bottom" title="Valider le traitement"><i class="fas fa-check mr-2"></i>Valider</button>
							<?php } ?>

							<a href="<?php echo base_url('Ticket/Encours'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
						</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.CKEditor traitement -->
			</div>
		</div>
	<?php } ?>
	<!-- /.Traiter -->


	<!-- Modal Remarque -->
	<div class="modal fade" id="modalRemarque" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<img src="<?php echo base_url('assets/Images/img4.jpg') ?>" alt="avatar"
						 class="rounded-circle img-responsive">
				</div>

				<div class="modal-body text-center mb-1">
					<h5 class="mt-1 mb-2">Remarque</h5>
					<hr>
					<?php echo form_open('Ticket/Reviser/'. $row->idTicket . '/' . $this->session->userdata('id_utilisateur')); ?>
						<div class="md-form">
							<textarea id="remarque" name="remarque" class="md-textarea form-control" rows="4" required></textarea>
							<label for="remarque">Remaques</label>
						</div>

						<div>
							<button type="submit" class="btn btn-sm btn-rounded btn-success" data-tooltip="tooltip" data-placement="bottom" title="Envoyer pour révision"><i class="fas fa-check mr-2"></i>Envoyer</button>
							<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /Modal Remarque -->
<?php endforeach; ?>

<script type="text/javascript">
	function bytesToSize(bytes) {
		var sizes = ['Bytes', 'Ko', 'Mo', 'Go', 'To'];
		if (bytes == 0) return '0 Byte';
			var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
                                    
    $('#pj').bind('change', function() {
        $("#error_uploadFile").empty();
        if (this.files[0].size > 2000000){
            $("#error_uploadFile").append(
                "La pièce jointe ne doit pas dépasser de 2Mo. La taille de votre fichier est " + bytesToSize(this.files[0].size)
            );
            $("#save").attr("disabled", true);
        } else {
            $("#save").attr("disabled", false);
        }
    });

    function exportHTML() {
        var num = $('#numeroTicket').html();
        var objet = $('#objet_ticket').html();
        var filename = num + '_' + objet;

        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' " +
            "xmlns:w='urn:schemas-microsoft-com:office:word' " +
            "xmlns='http://www.w3.org/TR/REC-html40'>" +
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
        var footer = "</body></html>";
        var sourceHTML = header + CKEDITOR.instances['contenu_traitement'].getData() + footer;
        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");

        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = filename + '.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }
</script>
