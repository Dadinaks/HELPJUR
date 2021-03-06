<?php

class Ticket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
    }

	/*
	 *-----------------------------------------------------------------------------------------
	 *											Reçu
	 *-----------------------------------------------------------------------------------------
	 */
    public function Recus()
    {
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Reçu"', 'ticket.dateReception', 1);

    	if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');
        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
        }

        $this->layout->set_titre('Ticket Reçus');
	    $this->layout->view('Ticket/recu', $data);
	}
	
	public function Accepter_ticket()
	{
		$this->TicketModel->insert('Reçu');

		$where = 'demande.idDemande = '. $this->input->post('demandeAccept');
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find($where);

		$config ['protocol']  = 'smtp';
		$config ['smtp_host'] = 'localhost';//"10.161.65.60";
		$config ['smtp_port'] = 1234;//25;
		$config ['charset']   = 'utf-8';
		$config ['mailtype']  = 'html';
		$config ['wordwrap']  = TRUE;
		
		$this->email->initialize($config);
		
		$this->email->set_newline("\r\n");
		$this->email->from("gestion.helpjur@bni.mg", "Gestion HELPJUR");
		
		foreach ($email_envoyeur['envoyeur'] as $row) : $this->email->to($row->email);
		endforeach;
		
		$this->email->subject("[HELPJUR]Demande Reçu");
		$this->email->message(
			"Bonjour, <br>
			Votre demande est reçu.
			<br><br>Cordialement."
		);
		$this->email->send();

		redirect(base_url('Ticket/recus'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *										Refusés
	 *-----------------------------------------------------------------------------------------
	 */
	public function Refuses()
    {
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Refusé"', 'ticket.dateRefus', 2);
		
        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');  
        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');  
        }

        $this->layout->set_titre('Ticket Refusés');
        $this->layout->view('Ticket/refuse', $data);
	}

	public function Refuser_ticket()
	{
		$this->TicketModel->insert('Refusé');

		$where = 'demande.idDemande = '. $this->input->post('demandeRefus');
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find($where);

		$config ['protocol']  = 'smtp';
		$config ['smtp_host'] = 'localhost';//"10.161.65.60";
		$config ['smtp_port'] = 1234;//25;
		$config ['charset']   = 'utf-8';
		$config ['mailtype']  = 'html';
		$config ['wordwrap']  = TRUE;
		
		$this->email->initialize($config);
		
		$this->email->set_newline("\r\n");
		$this->email->from("gestion.helpjur@bni.mg", "Gestion HELPJUR");
		
		foreach ($email_envoyeur['envoyeur'] as $row) : $this->email->to($row->email);
		endforeach;
		
		$this->email->subject("[HELPJUR]Demande Refusé");
		$this->email->message(
			"Bonjour, <br>
			Votre demande a été refusé.
			<br><br>Cordialement."
		);
		$this->email->send();

		redirect(base_url('ticket/Refuses'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *										Abandonnés
	 *-----------------------------------------------------------------------------------------
	 */
	public function Abandon()
	{
		$data['tickets'] = $this->TicketModel->findAbandon();

        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');
        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
        }

        $this->layout->set_titre('Ticket Abandonnés');
	    $this->layout->view('Ticket/adandon', $data);
	}

	public function Abandonner($params = NULL)
	{
		if ($params != NULL) {
			$idTicket 	 = $this->input->post('idTicket_abandonner');
			$utilisateur = $this->session->userdata('id_utilisateur');

			$this->TicketModel->update($idTicket, 'Abandonné', $utilisateur);
			
		} else {
			$idDemande = $this->input->post('idDemande_abandonner');
			$this->TicketModel->insert('Abandonné', $idDemande);
			$this->DemandeModel->update($idDemande, 'Abandonné');

			$where = 'demande.idDemande = '. $idDemande;
			$email_envoyeur['envoyeur'] = $this->DemandeModel->find($where);

			$config ['protocol']  = 'smtp';
			$config ['smtp_host'] = 'localhost';//"10.161.65.60";
			$config ['smtp_port'] = 1234;//25;
			$config ['charset']   = 'utf-8'; 
			$config ['mailtype']  = 'html';
			$config ['wordwrap']  = TRUE;

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from("gestion.helpjur@bni.mg", "Gestion HELPJUR");
			foreach ($email_envoyeur['envoyeur'] as $row) : $this->email->to($row->email);
			endforeach;

			$this->email->subject("[HELPJUR]Demande Abandonné");
			$this->email->message(
				"Bonjour, <br> Votre demande est abandonné.
				Vous pouvez la consulté dans la liste des dossiers abandonnés.
				<br><br>Cordialement."
			);

			$this->email->send();
		}

		redirect(base_url('ticket/Abandon'));
	}


	/*
	 *-----------------------------------------------------------------------------------------
	 *											FAQ
	 *-----------------------------------------------------------------------------------------
	 */
	public function Faq()
    {
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Faq"', 'ticket.dateFaq', 2);
		
        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');  
        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
        }

        $this->layout->set_titre('Ticket redirigé vers F.A.Q');
	    $this->layout->view('Ticket/faq', $data);
	}

    public function Rediriger_faq($idDemande)
	{
		$this->TicketModel->insert('Faq', $idDemande);

		$where = 'demande.idDemande = '. $idDemande;
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find($where);

		$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = 'localhost';//"10.161.65.60";
		$config ['smtp_port'] = 1234;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'html';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from("gestion.helpjur@bni.mg", "Gestion HELPJUR");
		foreach ($email_envoyeur['envoyeur'] as $row) : $this->email->to($row->email);
        endforeach;

	    $this->email->subject("[HELPJUR]Demande redirigé vers F.A.Q");
	    $this->email->message(
	    	"Bonjour, <br> Veuillez consulter la reponse de votre demande sur le  lien suivant : <br>
	    	<a href='http://sp-web-pr/Lists/FAQ/Flat.aspx?RootFolder=%2FLists%2FFAQ%2FFAQ%20JURIDIQUETHEME%20ch%C3%A8ques%2C%20soci%C3%A9t%C3%A9s%20commerciales%2C%20suret%C3%A9s%20et%20les%20incidents%20de%20compte&FolderCTID=0x0120020018B2C7DB8F82724E98C046A6F3EE0D7B'>http://sp-web-pr/Lists/FAQ/</a>

	    	<br><b style='color: #6c757d'>N.B : N'oubliez pas de renseigner votre matricule et mot de passe.</b>
	    	<br><br>Cordialement."
		);

		$this->email->send();

		redirect(base_url('ticket/Faq'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *										Terminé
	 *-----------------------------------------------------------------------------------------
	 */
	public function Termines()
	{
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Terminé"', 'ticket.dateTermine');
		
		if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');
        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
        }

        $this->layout->set_titre('Ticket terminés');
	    $this->layout->view('Ticket/termine', $data);
	}


	/*
	 *-----------------------------------------------------------------------------------------
	 *								En cours de traitement
	 *-----------------------------------------------------------------------------------------
	 */
	public function Encours()
	{
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Encours"', 'ticket.dateEncours');
		
        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');  
        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
        }

        $this->layout->set_titre('Ticket en cours de traitement');
	    $this->layout->view('Ticket/encours', $data);
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *								À valider
	 *-----------------------------------------------------------------------------------------
	 */
	public function Validation()
	{
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "A_Validé"', 'ticket.dateAvantValidation');
		
        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');  
        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
        }

        $this->layout->set_titre('Ticket à validers');
	    $this->layout->view('Ticket/a_valider', $data);
	}

	public function Valider($idTicket)
	{
		$this->TicketModel->update($idTicket);
		$this->TicketModel->update($idTicket, 'Terminé');

		$where = 'ticket.idTicket = '. $idTicket;
		$data['ticket'] = $this->TicketModel->find($where, NULL, 3);

		$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = 'localhost';//"10.161.65.60";
		$config ['smtp_port'] = 1234;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'html';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from("gestion.helpjur@bni.mg", "Gestion HELPJUR");
		foreach ($data['ticket'] as $row) : 
			$where = 'demande.idDemande = ' . $row->idDemande;
			$email_envoyeur['envoyeur'] = $this->DemandeModel->find($where);

			foreach ($email_envoyeur['envoyeur'] as $envoyeur) : 
				$this->email->to($envoyeur->email);
			endforeach;

		    $this->email->subject("[HELPJUR]Ticket terminé");
		    $this->email->message(
		    	"Bonjour, <br> 
		    	Votre demande est Terminé sous le numéro : <b>" . $row->numTicket . "</b>.
		    	<br><br>Cordialement."
			);
		endforeach;

		$this->email->send();	

		redirect(base_url('ticket/Termines'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *								À réviser
	 *-----------------------------------------------------------------------------------------
	 */
	public function Revision()
	{
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Révisé"', 'ticket.dateRevise');
		
        if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');  

        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');
        }

        $this->layout->set_titre('Ticket à réviser');
	    $this->layout->view('Ticket/revises', $data);
	}

	public function Reviser($idTicket)
	{
		$this->TicketModel->update($idTicket, 'Révisé');

		redirect(base_url('ticket/Validation'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *									Traitement
	 *-----------------------------------------------------------------------------------------
	 */
	public function  Traitement($idTicket, $visualiser = NULL)
	{
		$where = 'ticket.idTicket = '. $idTicket;
		$data['ticket'] = $this->TicketModel->find($where, NULL);

		if ($this->session->userdata('profile') == 'Administrateur') {
            $this->layout->set_theme('template_admin');
        } elseif ($this->session->userdata('profile') == 'Directeur Juridique' || $this->session->userdata('profile') == 'Senior' || $this->session->userdata('profile') == 'Junior') {
            $this->layout->set_theme('template_juriste');
        } elseif ($this->session->userdata('profile') == 'Demandeur') {
            $this->layout->set_theme('template_demandeur');
        } elseif ($this->session->userdata('profile') == 'Observateur') {
            $this->layout->set_theme('template_observateur');        }

        $this->layout->set_titre('Traitement du ticket');
	    $this->layout->view('Ticket/traitement', $data);
	}

	public function Traiter($idTicket)
	{
		$userActif = $this->session->userdata('id_utilisateur');
		$this->TicketModel->update($idTicket, 'Encours', $userActif);

		$where = 'ticket.idTicket = '. $idTicket;
		$data['ticket'] = $this->TicketModel->find($where, NULL);

		$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = 'localhost';//"10.161.65.60";
		$config ['smtp_port'] = 1234;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'html';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from("gestion.helpjur@bni.mg", "Gestion HELPJUR");
		foreach ($data['ticket'] as $row) : 
			$where = 'demande.idDemande = ' . $row->idDemande;
			$email_envoyeur['envoyeur'] = $this->DemandeModel->find($where);

			foreach ($email_envoyeur['envoyeur'] as $envoyeur) : 
				$this->email->to($envoyeur->email);
			endforeach;

		    $this->email->subject("Demande prise en charge[HELPJUR]");
		    $this->email->message(
		    	"Bonjour, <br> 
		    	Votre demande est prise en charge sous le numéro : " . $row->numTicket . ".<br>
		    	Nous vous tiendrons informé dans " . $row->delai . " jour(s).
		    	<br><br>Cordialement."
			);
		endforeach;

		$this->email->send();

        redirect(base_url('ticket/Traitement/' . $idTicket));
	}

	public function Assigner()
	{
		$userAssigned = $this->input->post('assigner');
		$idTicket 	  = $this->input->post('idTicket_assigner');

		$this->TicketModel->update($idTicket, 'Encours', $userAssigned);

		$where = 'ticket.idTicket = '. $idTicket;
		$data['ticket'] = $this->TicketModel->find($where, NULL, 3);

		$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = 'localhost';//"10.161.65.60";
		$config ['smtp_port'] = 1234;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'html';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from("gestion.helpjur@bni.mg", "Gestion HELPJUR");
		foreach ($data['ticket'] as $row) : 
			$where = 'demande.idDemande = ' . $row->idDemande;
			$email_envoyeur['envoyeur'] = $this->DemandeModel->find($where);

			foreach ($email_envoyeur['envoyeur'] as $envoyeur) : 
				$this->email->to($envoyeur->email);
			endforeach;

		    $this->email->subject("[HELPJUR]Demande prise en charge");
		    $this->email->message(
		    	"Bonjour, <br> 
		    	Votre demande est prise en charge sous le numéro : <b>" . $row->numTicket . "</b>.<br>
		    	Nous vous tiendrons informé dans " . $row->delai . " jour(s).
		    	<br><br>Cordialement."
			);
		endforeach;

		$this->email->send();

		redirect(base_url('ticket/Recus'));
	}

	public function Reassigner()
	{
		$userAssigned = $this->input->post('assigner');
		$idTicket 	  = $this->input->post('idTicket_assigner');

		$this->TicketModel->update($idTicket, 'Encours', $userAssigned);

		redirect(base_url('ticket/Encours'));
	}

	public function Enregistrer($idTicket, $save = NULL)
	{
		if ($save == 'Consulter'){
			$this->form_validation->set_rules('contenu_traitement', 'Contenu', 'required');

			if ($this->form_validation->run()) {
				$this->TicketModel->update($idTicket);
			}

			redirect(base_url('Ticket/Traitement/' . $idTicket . '/Consulter'));

		} elseif ($save == 'Reviser'){
			$this->form_validation->set_rules('contenu_traitement', 'Contenu', 'required');

			if ($this->form_validation->run()) {
				$this->TicketModel->update($idTicket);
			}

			redirect(base_url('Ticket/Traitement/' . $idTicket . '/Reviser'));

		} else {
			$this->form_validation->set_rules('contenu_traitement', 'Contenu', 'required');

			if ($this->form_validation->run()) {
				$this->TicketModel->update($idTicket);
			}

			redirect(base_url('Ticket/Traitement/' . $idTicket));
		}
		
	}

	public function Soumettre($idTicket)
	{
		$this->TicketModel->update($idTicket);
		$this->TicketModel->update($idTicket, 'A_Validé');

		redirect(base_url('Ticket/Validation'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *						Visualisation du ticket : F.A.Q, Refusés, Reçus, ...
	 *-----------------------------------------------------------------------------------------
	 */
	public function Visualiser($idTicket, $statut = NULL)
	{
		if ($statut == 'faq' || $statut == 'refuse') { //FAQ && Refuser	
			$data = $this->TicketModel->findOne($idTicket, FALSE);
		} elseif($statut == 'recu') { //Accepter
			$data = $this->TicketModel->findOne($idTicket, TRUE, 'utilisateur.idUtilisateur = demande.envoyeur');
		} elseif ($statut == 'Encours') {
			$where = 'ticket.idTicket = '. $idTicket;
			$data['ticket'] = $this->TicketModel->find($where, NULL, 3);
			redirect(base_url('Ticket/Traitement/' . $idTicket . '/Voir'));
		} elseif ($statut == 'Termine') {
			$where = 'ticket.idTicket = '. $idTicket;
			$data['ticket'] = $this->TicketModel->find($where, NULL, 3);
			redirect(base_url('Ticket/Traitement/' . $idTicket . '/Termine'));
		} elseif ($statut == 'Abandonne') {
			$where = 'ticket.idTicket = '. $idTicket;
			$data['ticket'] = $this->TicketModel->find($where, NULL, 3);
			redirect(base_url('Ticket/Traitement/' . $idTicket . '/Abandonne'));
		} elseif($statut == 'abandon') { //MODAL ABANDON
			$data = $this->TicketModel->findOne($idTicket);
		}

		echo json_encode($data);
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *											Notification
	 *-----------------------------------------------------------------------------------------
	 */
	public function Notification()
	{
		$data['recu'] 	  = $this->TicketModel->count('Reçu');
		$data['avalider'] = $this->TicketModel->count('A_Validé');
		$data['revision'] = $this->TicketModel->count('Révisé');
		$data['total'] 	  = $data['recu'] + $data['avalider'] + $data['revision'];

		echo json_encode($data);
	}

	public function jour_ouvre($date, $jourOuvre)
	{
		// Tableau contenant les jours fériés
		$data['ferie'] = $this->CalendrierModel->find('ferie');

		foreach($data['ferie'] as $row){
			$ferie 	 = array($row->start);
			$i 		 = 0;

			while($i < $jourOuvre){
				$date_tmp = date("Y-m-d", strtotime($i . ' weekdays' , $date));
				if(in_array($date_tmp , $ferie)) {
					$jourOuvre++;
				}
				$i++;
			}
		}
		
		return strtotime($jourOuvre . ' weekdays' , $date);
	}

	public function Notification_retard_recu()
	{
		date_default_timezone_set('Africa/Nairobi');

		$data['ticket'] = $this->TicketModel->find('ticket.statutTicket = "Reçu"', 'ticket.dateReception', 1);
		foreach ($data['ticket'] as $row) {
			$recu	    = $row->dateReception;
			$jour_ouvre = date("Y-m-d", self::jour_ouvre(strtotime($recu), 5)) .' '. date("H:i:s",strtotime($recu));
			$now 		= date("Y-m-d H:i:s");

			$dateRecu = new DateTime($recu);
			$date 	  = new DateTime($now);
			$differnce  = $date->diff($dateRecu);

			var_dump("Jour ouvre        : " . $jour_ouvre);
			var_dump("Date de Réception : " . $row->dateReception);
			var_dump("Aujourd'hui       : " . $now);
			var_dump($differnce);
			var_dump("-------------------");
		}
	}


	/*
	 *-----------------------------------------------------------------------------------------
	 *											Test
	 *-----------------------------------------------------------------------------------------
	 */
	public function test() 
	{
		// Tableau contenant les jours fériés
		/*$data['ferie'] = $this->CalendrierModel->find('ferie');

		foreach($data['ferie'] as $row){
			$ferie 	 = array($row->start);
			$i 		 = 0;
			$jourOuvre = 5;
			$date 	 = strtotime('today');

			while($i < $jourOuvre){
				$date_tmp = date("Y-m-d", strtotime($i . ' weekdays' , $date));
				if(in_array($date_tmp , $ferie)) {
					$jourOuvre++;
				}
				$i++;
			}
		}*/
		
		//return strtotime($jourOuvre . ' weekdays' , $date);

		$data['ferie'] = $this->CalendrierModel->find('ferie');
		$timestamp = strtotime ('2020-05-18');
		$days 	   = array();
		$i 		   = 0;
		$jourOuvre = 5;

		foreach($data['ferie'] as $row){
			$ferie = array($row->start);

			while($i < $jourOuvre){
				$ferie = array($row->start);
				$date_tmp = date("Y-m-d", strtotime($i . 'weekdays', $timestamp));
				
				if (in_array($date_tmp , $ferie)){
					$jourOuvre++;
				}
				$days[] = $date_tmp;
				$i++;
			}

		}

		//$date_fin   = date("Y-m-d", strtotime($jourOuvre . ' weekdays' , $timestamp));
		//$date_debut = date("Y-m-d", $timestamp);

		//$date_fin 	= new DateTime($date_fin);
		//$date_debut = new DateTime($date_debut);
		//$differnce  = $date_debut->diff($date_fin);


		//rendue
		//var_dump("Date du jour ouvré  : " . date("Y-m-d", $timestamp));
		//var_dump("Date fin jour ouvré : " . date("Y-m-d", strtotime($jourOuvre . ' weekdays' , $timestamp)));

		//var_dump($date_fin);
		//var_dump($date_debut);
		//var_dump($differnce->format("%d"));
		var_dump($days);

	}

}
