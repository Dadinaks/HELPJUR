<?php

class Categorie_Tache extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
    }

    public function index()
    {
        $data['categories'] = $this->TachecategorieModel->find('categorie');
        $data['taches']     = $this->TachecategorieModel->find('tache');

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

        $this->layout->set_titre('Categorie et tâche');
        $this->layout->view('CtgTache/ctgtache', $data);
    }

    public function tache_par_categorie($idCategorie)
	{
        $data = $this->TachecategorieModel->find('tache', 'tache.idCategorie =' . $idCategorie);
        
		echo json_encode($data);
	}

    public function Inserer($table)
    {
        $this->TachecategorieModel->insert($table);

        redirect(base_url('Categorie_Tache'));
    }

    public function Modifier($table)
    {
        $this->TachecategorieModel->update($table);

        redirect(base_url('Categorie_Tache'));
    }

    public function Supprimer($table)
    {
        $this->TachecategorieModel->delete($table);

        redirect(base_url('Categorie_Tache'));
    }
}