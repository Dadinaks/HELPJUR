<?php

class TicketModel extends CI_Model
{
    /*
     * Récupération des Ticket : 
     *   - La condition WHERE de la requête existe si la fonction find()
     *     reçoit un parametre dans le Controlleur [find( $where )].
     *     reçoit deux parametre dans le Controlleur [find( $where, $orderby)].
     */
    public function find($where = NULL, $orderby = NULL)
    {
        $user    = $this->session->userdata('id_utilisateur');
		$session = $this->session->userdata('role');
		
		$this->db->select('*, concat(s.matricule, " - ", s.nom, " ", s.prenom) as info_saisisseur, concat(v.matricule, " - ", v.nom, " ", v.prenom) as info_valideur, concat(d.matricule, " - ", d.nom, " ", d.prenom) as info_demandeur, concat(r.matricule, " - ", r.nom, " ", r.prenom) as info_valideRemarque')
			->from('ticket')
			->join('demande', 'demande.idDemande = ticket.idDemande', 'left')
			->join('tache', 'tache.idTache = ticket.idTache', 'left')
			->join('categorie', 'categorie.idCategorie = tache.idCategorie', 'left')
			->join('utilisateur s', 's.idUtilisateur = ticket.saisisseur', 'left')
			->join('utilisateur v', 'v.idUtilisateur = ticket.valideur', 'left')
			->join('utilisateur d', 'd.idUtilisateur = ticket.demandeur', 'left')
			->join('utilisateur r', 'r.idUtilisateur = ticket.valideRemarque', 'left');

		
		//condition where
		if ($where != NULL) {
			$this->db->where($where);
		}

		//condition orderby
		if ($orderby != NULL) {
			$this->db->order_by($orderby, 'DESC');
		}
        $query = $this->db->get();
        
        return $query->result();
	}

	/**
	 * Récupération des Ticket Abandonné. Requete :
	 * SELECT *, CONCAT(s.matricule, ' - ', s.nom, ' ', s.prenom) AS saisisseur, CONCAT(de.matricule, ' - ', de.nom, ' ', de.prenom) AS demandeur
	 * FROM ticket t 
	 * INNER JOIN demande d ON ( d.idDemande = t.idDemande )
	 * INNER JOIN utilisateur s ON ( s.idUtilisateur = t.saisisseur )
	 * INNER JOIN utilisateur de ON ( de.idUtilisateur = t.demandeur )
	 */
	public function findAbandon()
	{
		$query = $this->db->select('*, CONCAT(s.matricule, " - ", s.nom, " ", s.prenom) AS saisisseur, CONCAT(de.matricule, " - ", de.nom, " ", de.prenom) AS demandeur')
			->from('ticket t')
			->join('demande d', 'd.idDemande = t.idDemande', 'inner')
			->join('utilisateur s', 's.idUtilisateur = t.saisisseur', 'inner')
			->join('utilisateur de', 'de.idUtilisateur = t.demandeur', 'inner')
			->where('t.statutTicket', 'Abandonné')
			->get();

		return $query->result(); 
	}
	
	/*
     * Récupération d'un Ticket par son Identifiant.
     */
	public function findOne($idTicket, $join = NULL, $jointure = NULL)
	{
		$this->db->select('*')
			->from('ticket');
		//condition jointure
		if ($join == TRUE) {
			$this->db->join('demande', 'demande.idDemande = ticket.idDemande', 'inner')
				->join('utilisateur', $jointure , 'inner')
				->join('tache', 'tache.idTache = ticket.idTache', 'inner')
				->join('categorie', 'categorie.idCategorie = tache.idCategorie', 'inner');
		} else {
			$this->db->join('demande', 'demande.idDemande = ticket.idDemande', 'inner')
				->join('utilisateur', 'utilisateur.idUtilisateur = demande.envoyeur', 'inner');				
		}
		$this->db->where('ticket.idTicket', $idTicket);
		$query = $this->db->get();
        
        return $query->result();
	}

    /**
	 * Insertion dans la table ticket.
	 */
	public function insert($statut = NULL, $idDemande = NULL, $idUtilisateur = NULL)
	{
		date_default_timezone_set('Africa/Nairobi');
		$userActifs = $this->session->userdata('id_utilisateur');

		//incrementer le numero du ticket.
		$count = $this->db->count_all_results('ticket');
		if ($count == 0){
			$numTicket = 'TIK-JUR-00000000001';
		} else {
			$count = $count + 1;

			for ($i = 0; $i < $count; $i++) {
				$i++;
			}
			$numTicket = 'TIK-JUR-' . str_pad($count, 11, '0', STR_PAD_LEFT);
		}
		
		switch($statut){
			case 'Reçu' :
				$data = array(
					'numTicket' 	=> $numTicket,
					'dateReception' => date("Y-m-d H:i:s"),
					'statutTicket' 	=> $statut,
					'idDemande' 	=> $idDemande,
					'demandeur'		=> $idUtilisateur,
					'idTache' 		=> $this->input->post('tache_confirm')
				);
				break;
			case 'Refusé' :
				$data = array(
					'numTicket' 	=> $numTicket,
					'dateRefus' 	=> date("Y-m-d H:i:s"),
					'statutTicket' 	=> $statut,
					'motif' 		=> $this->input->post('motif_confirm'),
					'saisisseur' 	=> $userActifs,
					'demandeur' 	=> $this->input->post('demandeur_confirm'),
					'idDemande' 	=> $this->input->post('demandeRefus_confirm')
				);
				break;
			case 'Abandonné' :
				$data = array(
					'numTicket' 	=> $numTicket,
					'dateAbandon' 	=> date("Y-m-d H:i:s"),
					'statutTicket' 	=> $statut,
					'motif' 		=> $this->input->post('motif_abandon'),
					'demandeur' 	=> $userActifs,
					'idDemande' 	=> $this->input->post('idDemande_abandonner')
				);
				break;
			default :
				$data = array(
					'numTicket' 	=> $numTicket,
					'dateFaq' 		=> date("Y-m-d H:i:s"),
					'statutTicket' 	=> $statut,
					'saisisseur' 	=> $userActifs,
					'demandeur' 	=> $idUtilisateur,
					'idDemande' 	=> $idDemande
				);	
		}
		
		return $this->db->insert('ticket', $data);
	}

	public function update($idTicket, $statut = NULL, $utilisateur = NULL)
	{
		date_default_timezone_set('Africa/Nairobi');

		switch ($statut){
			case 'Encours' :
				$data = array(
					'dateEncours'  => date("Y-m-d H:i:s"),
					'statutTicket' => $statut,
					'saisisseur'   => $utilisateur
				);
				break;
			case 'A_Validé' :
				$data = array(
					'dateAvantValidation' => date("Y-m-d H:i:s"),
					'statutTicket' 		  => $statut
				);
				break;
			case 'Révisé' :
				$data = array(
					'dateRevise'   => date("Y-m-d H:i:s"),
					'statutTicket' => $statut,
					'revision'	   => $this->input->post('remarque'),
					'valideur'	   => $utilisateur
				);
				break;
			case 'Terminé' :
				$data = array(
					'dateTermine'    => date("Y-m-d H:i:s"),
					'statutTicket'   => $statut,
					'valideRemarque' => $utilisateur
				);
				break;
			case 'Abandonné' :
				$data = array(
					'dateAbandon' 	=> date("Y-m-d H:i:s"),
					'statutTicket' 	=> $statut,
					'motif' 		=> $this->input->post('motif_abandon'),
					'saisisseur' 	=> $utilisateur
				);
				break;
			default :
				$data = array(
					'traitement' => $this->input->post('contenu_traitement'),
				);
		}
		$this->db->where('idTicket', $idTicket);
	
		return $this->db->update('ticket', $data);
	}

	public function count($statut = NULL)
	{
		if ($statut != NULL){
			$this->db->where('statutTicket', $statut);
			$nb = $this->db->count_all_results('ticket');
		} else {
			$nb = $this->db->count_all_results('ticket');
		}

		return $nb;
	}

	public function countby($profile)
	{
		$this->db->select('*');
		$this->db->from('ticket t');
		$this->db->join('utilisateur u', 'u.idUtilisateur = t.saisisseur', 'inner');
		$this->db->join('profil p', 'p.idProfil = u.profil', 'inner');
		$this->db->where('p.profile', $profile);
		$nb = $this->db->count_all_results();

		return $nb;
	}
}