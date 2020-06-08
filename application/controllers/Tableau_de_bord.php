<?php

class Tableau_de_bord extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
    }
    
    public function index()
    {
        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');  
            $this->layout->set_titre('Tableau de bord');
            $this->layout->view('Tbd/tableau_de_bord_view');

        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
            $this->layout->set_titre('Tableau de bord');
            $this->layout->view('Tbd/tableau_de_bord_view');

        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
            $this->layout->set_titre('Tableau de bord');
            $this->layout->view('Tbd/tableau_de_bord_view');

        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
            $this->layout->set_titre('Tableau de bord');
            $this->layout->view('Tbd/tableau_de_bord_view');
        }
    }

    public function nombre_ticket_juriste($statut = NULL){
        if ($statut !=  NULL){
            $data["nombres"] = $this->TbdModel->nbTicket_par_juriste($statut);
        } else {
            $data["nombres"] = $this->TbdModel->nbTicket_par_juriste();
        }

        echo json_encode($data);
    }

    public function nombre_ticket_categorie($idCategorie = NULL){
        if ($idCategorie !=  NULL){
            $data["nbs"] = $this->TbdModel->nbTicket_par_categorie($idCategorie);
        } else {
            $data["nbs"] = $this->TbdModel->nbTicket_par_categorie();
        }

        echo json_encode($data);
    }

    public function recuperer_tous_ticket(){
        $data["tickets"] = $this->TbdModel->all_ticket();

        echo json_encode($data);
    }

    public function graphe_line(){
        $mois = 01;
        $tableau        = array();
        $tableauRecu    = array();
        $tableauEncours = array();
        $tableauAvalide = array();
        $tableauRevise  = array();
        $tableauTermine = array();
        $tableauRefuse  = array();
        $tableauAbandon = array();
        $tableauFaq     = array();

        while ( $mois <= 12) {
            $data['recu'] = $this->TbdModel->data_chart_line('dateReception', $mois);
            array_push($tableauRecu, $data["recu"][0]->dateReception);

            $data['encours'] = $this->TbdModel->data_chart_line('dateEncours', $mois);
            array_push($tableauEncours, $data["encours"][0]->dateEncours);

            $data['a_valide'] = $this->TbdModel->data_chart_line('dateAvantValidation', $mois);
            array_push($tableauAvalide, $data["a_valide"][0]->dateAvantValidation);

            $data['revise'] = $this->TbdModel->data_chart_line('dateRevise', $mois);
            array_push($tableauRevise, $data["revise"][0]->dateRevise);

            $data['termine'] = $this->TbdModel->data_chart_line('dateTermine', $mois);
            array_push($tableauTermine, $data["termine"][0]->dateTermine);

            $data['refuse'] = $this->TbdModel->data_chart_line('dateRefus', $mois);
            array_push($tableauRefuse, $data["refuse"][0]->dateRefus);

            $data['abandon'] = $this->TbdModel->data_chart_line('dateAbandon', $mois);
            array_push($tableauAbandon, $data["abandon"][0]->dateAbandon);

            $data['faq'] = $this->TbdModel->data_chart_line('dateFaq', $mois);
            array_push($tableauFaq, $data["faq"][0]->dateFaq);

            $mois++;
        }

        $tableau = [
            "Recu"     => $tableauRecu,
            "Encours"  => $tableauEncours,
            "A_valide" => $tableauAvalide,
            "Revise"   => $tableauRevise,
            "Termine"  => $tableauTermine,
            "Refuse"   => $tableauRefuse,
            "Abandon"  => $tableauAbandon,
            "Faq"      => $tableauFaq
        ];

        echo json_encode($tableau);
    }

    public function entre_2_date($statut, $dateDebut, $dateFin){
        $data["tickets"] = $this->TbdModel->all_ticket($statut, $dateDebut, $dateFin);
        echo json_encode($data);
    }
}