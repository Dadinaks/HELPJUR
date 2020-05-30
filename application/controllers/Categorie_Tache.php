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

        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');  
            $this->layout->set_titre('Categorie et tâche');
            $this->layout->view('CtgTache/ctgtache', $data);

        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
            $this->layout->set_titre('Categorie et tâche');
            $this->layout->view('CtgTache/ctgtache', $data);

        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
            $this->layout->set_titre('Categorie et tâche');
            $this->layout->view('CtgTache/ctgtache', $data);

        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
            $this->layout->set_titre('Categorie et tâche');
            $this->layout->view('CtgTache/ctgtache', $data);
        }
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