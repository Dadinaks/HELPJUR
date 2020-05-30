<?php

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function connexion()
	{
		$this->form_validation->set_rules('pseudo', 'Identifiant', 'trim|required', array('required' => 'Matricule de passe obligatoire.'));
		$this->form_validation->set_rules('mdp', 'Mot de passe', 'trim|required', array('required' => 'Mot de passe obligatoire.'));

		if ($this->form_validation->run() !== false) {
			$matricule = $this->input->post('pseudo');

			// Vérification de l'authentification
			//$res = $this->UtilisateurModel->findby($matricule);
			$res = $this->UtilisateurModel->find("utilisateur.matricule =" . $matricule . " AND utilisateur.statutCompte ='Activé'");

			if ($res != false) {
				//user existe dans bdd
				$this->session->set_userdata('login_state', TRUE);
				$data = $res[0];
				$this->session->set_userdata('id_utilisateur', $data->idUtilisateur);
				$this->session->set_userdata('matricule', $data->matricule);
				$this->session->set_userdata('nom_utilisateur', $data->nom);
				$this->session->set_userdata('prenom_utilisateur', $data->prenom);
				$this->session->set_userdata('profile', $data->profile);
				$this->session->set_userdata('role', $data->profil);

				//On redirige vers la page d'accueil
				redirect('Tableau_de_bord');
			} else {
				//Si User n'existe pas dans la bdd
				$this->session->set_flashdata('noconnect', "Vous n'êtes pas autorisé à accéder à cette application");
				redirect('Login');
			}

		}    //Fin if validation formulaire
		$this->load->view('login');
	}

	//Fonction déconnexion
	public function deconnexion()
	{
		//Détruit la session et redirige vers la page de connexion
		$this->session->sess_destroy();
		redirect('Login');
	}
}
