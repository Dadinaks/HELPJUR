<?php

class Lieu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
	}

	public function index()
	{
		$data['lieux'] = $this->LieuModel->find();
		$session = $this->session->userdata('profile');

		Switch ($session){
			case 'Administrateur' :
				$this->layout->set_theme('template_admin');
				break;
			case 'Demandeur' :
				$this->layout->set_theme('template_demandeur');
				break;
			case 'Observateur' :
				$this->layout->set_theme('template_observateur');
				break;
			case 'Directeur Juridique' :
			case 'Senior' :
			case 'Junior' :
				$this->layout->set_theme('template_juriste');
				break;
		}
		
        $this->layout->set_titre('Agence');
	    $this->layout->view('Lieu/lieu_view', $data);
	}

	public function Ajout()
	{
		$params = array(
			array(
                'field' => 'code_ajout',
                'label' => 'Code Agence',
				'rules' => 'trim|required|is_unique[lieu.codeAgence]|min_length[1]|max_length[99999]'
			),
			array(
                'field' => 'agence_ajout',
                'label' => 'Agence',
                'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($params);
		$this->form_validation->set_message('is_unique[lieu.codeAgence]', '<small class="red-text">Ce Code exist deja dans la Base de données.</small>');

		if ($this->form_validation->run()) {
			$this->LieuModel->insert();

			redirect(base_url('Lieu'));
		} else {
			redirect(base_url('Lieu'));
		}
	}

	public function Modifier()
	{
		$this->LieuModel->update();

		redirect(base_url('Lieu'));
	}

	public function Supprimer()
	{
		$this->LieuModel->delete();

		redirect(base_url('Lieu'));
	}

	public function verifier($code_agence){
		$data['check'] = $this->LieuModel->count("codeAgence =" . $code_agence);

		echo json_encode($data);
	}

}