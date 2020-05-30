<!DOCTYPE html>
<html>
<head>
	<title>Gestion HelpJUR - Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login/css/bootstrap.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login/css/style.css'); ?>"/>
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/Images/BNI_icon.png'); ?>"/>
	<script type="text/javascript" src="<?php echo base_url('assets/Login/js/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/Login/js/bootstrap.js'); ?>"></script>
</head>

<body>
<div class='container'>
	<form class="form-horizontal" method="post" action="<?php echo site_url('login/connexion'); ?>">
		<fieldset>
			<div class="card">
				<!--<h2 class='login-title'>Login</h2>-->
				<div class='login-title'><img src="<?php echo base_url('assets/Images/logo.png') ?>"
											  style="width:300px"/></div>
				<span id="instru">Entrez vos identifiants</span>
				<div class="form-group-perso">
					<input type="text" id='pseudo' name='pseudo' autofocus required="" class="form-control"
						   placeholder="Matricule">
					<?php echo form_error('pseudo'); ?>
				</div>
				<div class="form-group-perso">
					<input type="password" id='mdp' name='mdp' class="form-control" required=""
						   placeholder="Mot de passe">
					<?php echo form_error('mdp'); ?>
				</div>
				<div class="form-group-perso">
					<button class="btn btn-primary btn-block" type='submit'>SE CONNECTER</button>
				</div>
			</div>
		</fieldset>
	</form>
	<?php if ($this->session->flashdata('noconnect')) { ?>

		<div class="alert alert-error text-center">
			<strong> <?php echo $this->session->flashdata('noconnect'); ?> <strong>
		</div>

	<?php } ?>

</div>
</body>
</html>
