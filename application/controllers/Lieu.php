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

		if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');  
            $this->layout->set_titre('Agence');
	        $this->layout->view('Lieu/lieu_view', $data);

        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
            $this->layout->set_titre('Agence');
	        $this->layout->view('Lieu/lieu_view', $data);

        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
            $this->layout->set_titre('Agence');
	        $this->layout->view('Lieu/lieu_view', $data);

        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
            $this->layout->set_titre('Agence');
	        $this->layout->view('Lieu/lieu_view', $data);
        }
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

}