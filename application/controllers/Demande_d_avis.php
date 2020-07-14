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
        
        $this->layout->set_titre('Demande d\'avis');
        $this->layout->view('Demande/demande_view', $data);
    }

    public function consulter($id)
    {
        $data['demande'] = $this->DemandeModel->find('demande.idDemande ='. $id);
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
        
        $this->layout->set_titre('Demande d\'avis');
        $this->layout->view('Demande/consulter_demande', $data);
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
        
        $this->layout->set_titre('Demande envoyé');
        $this->layout->view('Demande/demandeur_view', $data);
    }

    public function demander()
    {
        $config['upload_path']   = './assets/Fichiers/';
        $config['allowed_types'] = '*';
        $config['max_size']      = 2048;
        
        $this->upload->initialize($config);

        $this->upload->do_upload('fichier_message');
        $data = array('upload_data' => $this->upload->data());
        $file = $this->upload->data('file_name');
        $this->DemandeModel->insert($file);

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