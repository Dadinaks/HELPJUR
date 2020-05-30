<?php

class Demande_d_avis extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
    }
    
    public function index()
    {
        $data['demandes'] = $this->DemandeModel->find('demande.statutDemande = "Envoyé"');

        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');
            $this->layout->set_titre('Demande d\'avis');
            $this->layout->view('Demande/demande_view', $data);

        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
            $this->layout->set_titre('Demande d\'avis');
            $this->layout->view('Demande/demande_view', $data);

        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
            $this->layout->set_titre('Demande d\'avis');
            $this->layout->view('Demande/demande_view', $data);

        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
            $this->layout->set_titre('Demande d\'avis');
            $this->layout->view('Demande/demande_view', $data);
        }
    }

    public function consulter($id)
    {
        $data['demande'] = $this->DemandeModel->find('demande.idDemande ='. $id);

        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');
            $this->layout->set_titre('Demande d\'avis');
            $this->layout->view('Demande/consulter_demande', $data);

        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
            $this->layout->set_titre('Demande d\'avis');
            $this->layout->view('Demande/consulter_demande', $data);

        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
            $this->layout->set_titre('Demande d\'avis');
            $this->layout->view('Demande/consulter_demande', $data);

        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
            $this->layout->set_titre('Demande d\'avis');
            $this->layout->view('Demande/consulter_demande', $data);
        }
    }

    public function statut_demande($idDemande)
	{
		$data = $this->DemandeModel->update($idDemande, 'Reçu');
		echo json_encode($data);
	}

    /*
     *-----------------------------------------------------------------------------------------
     *                                          Demandeur
     *-----------------------------------------------------------------------------------------
     */
    public function Demande()
    {
        $data['demandes'] = $this->DemandeModel->find('demande.statutDemande = "Envoyé"');

        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');
            $this->layout->set_titre('Demande envoyé');
            $this->layout->view('Demande/demandeur_view', $data);

        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
            $this->layout->set_titre('Demande envoyé');
            $this->layout->view('Demande/demandeur_view', $data);

        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
            $this->layout->set_titre('Demande envoyé');
            $this->layout->view('Demande/demandeur_view', $data);

        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
            $this->layout->set_titre('Demande envoyé');
            $this->layout->view('Demande/demandeur_view', $data);
        }
    }

    public function demander()
    {
        $config['upload_path']   = './assets/Fichiers/';
        $config['allowed_types'] = 'docx|doc|xlsx|xls|ppt|word|xl|eml|txt|text|jpg|jpe|png|shtml|html|htm';
        $config['max_size']      = 2048;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        
        $this->upload->initialize($config);

        if ($this->upload->do_upload('fichier_message')) {
            $data = array('upload_data' => $this->upload->data());

            $file = $this->upload->data('file_name');
            if (!empty($file)) {
                $this->DemandeModel->insert($file);
            }
        } else {
            $this->DemandeModel->insert();
        }

        redirect(base_url('Demande_d_avis/demande'));
    }

    /* 
     * ------------------------------------------------------------------
     *                        Notification Badge
     * ------------------------------------------------------------------
     */
    public function notification()
    {
        $data['nombre'] = $this->DemandeModel->count('statutDemande = "Envoyé"');
        
		echo json_encode($data);
    }

}