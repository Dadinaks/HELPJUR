<?php

class Pj extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
	}
	
	public function ajouter_pj($idTicket)
	{
		$config['upload_path']   = './assets/Fichiers/';
        $config['allowed_types'] = '*';
        $config['max_size']      = 2048;
        
        $this->upload->initialize($config);

        $this->upload->do_upload('pj');
        $data = array('upload_data' => $this->upload->data());
        $pj   = $this->upload->data('file_name');
		$this->PjModel->insert($pj);

        redirect($_SERVER['HTTP_REFERER']);
	}
}