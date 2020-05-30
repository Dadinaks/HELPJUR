<?php

class TicketModel extends CI_Model
{
    /*
     * Récupération des Ticket : 
     *   - La condition WHERE de la requête existe si la fonction find()
     *     reçoit un parametre dans le Controlleur [find( $where )].
	 * 	 - La condition INNER JOIN de la requête existe si la fonction find()
     *     reçoit trois parametre dans le Controlleur [find( $where, $orderby, $join = TRUE||FALSE )].
     */
    public function find($where = NULL, $orderby = NULL, $join = NULL)
    {
		$this->db->select('*')
			->from('ticket');
		//condition jointure
		if ($join == 1) {
			$this->db->join('demande', 'demande.idDemande = ticket.idDemande', 'inner')
				->join('tache', 'tache.idTache = ticket.idTache', 'inner')
				->join('categorie', 'categorie.idCategorie = tache.idCategorie', 'inner');
		} elseif ($join == 2) {
			$this->db->join('utilisateur', 'utilisateur.idUtilisateur = ticket.saisisseur', 'inner')
				->join('demande', 'demande.idDemande = ticket.idDemande', 'inner');
		} elseif ($join == 3) {
			$this->db->join('utilisateur', 'utilisateur.idUtilisateur = ticket.demandeur', 'inner')
				->join('demande', 'demande.idDemande = ticket.idDemande', 'inner');
		} else {
			$this->db->join('utilisateur', 'utilisateur.idUtilisateur = ticket.saisisseur', 'inner')
				->join('demande', 'demande.idDemande = ticket.idDemande', 'inner')
				->join('tache', 'tache.idTache = ticket.idTache', 'inner')
				->join('categorie', 'categorie.idCategorie = tache.idCategorie', 'inner');
		}

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
	 * SELECT *, (SELECT CONCAT(matricule, ' - ', nom, ' ', prenom) FROM utilisateur WHERE idUtilisateur = t.saisisseur) AS saisisseur, (SELECT CONCAT(matricule, ' - ', nom, ' ', prenom) FROM utilisateur WHERE idUtilisateur = t.demandeur) AS demandeur
	 * FROM ticket t INNER JOIN demande d ON ( d.idDemande = t.idDemande )
	 */
	public function findAbandon()
	{
		$saisisseur = '(SELECT CONCAT(matricule, " - ", nom, " ", prenom) FROM utilisateur WHERE idUtilisateur = t.saisisseur) AS saisisseur';
		$demandeur  = '(SELECT CONCAT(matricule, " - ", nom, " ", prenom) FROM utilisateur WHERE idUtilisateur = t.demandeur) AS demandeur';

		$query = $this->db->select('*, ' . $saisisseur . ', ' . $demandeur )
			->from('ticket t')
			->join('demande d', 'd.idDemande = t.idDemande', 'inner')
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
	public function insert($statut = NULL, $idDemande = NULL)
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
		
		if ($statut == 'Reçu') {
			//Reçu
			$data = array(
				'numTicket' 	=> $numTicket,
				'dateReception' => date("Y-m-d H:i:s"),
				'statutTicket' 	=> $statut,
				'idDemande' 	=> $this->input->post('demandeAccept'),
				'demandeur'		=> $this->input->post('demandeur'),
				'idTache' 		=> $this->input->post('tache')
			);
		} elseif ($statut == 'Refusé') {
			//Refusé
			$data = array(
				'numTicket' 	=> $numTicket,
				'dateRefus' 	=> date("Y-m-d H:i:s"),
				'statutTicket' 	=> $statut,
				'motif' 		=> $this->input->post('motif'),
				'saisisseur' 	=> $userActifs,
				'idDemande' 	=> $this->input->post('demandeRefus')
			);
		} elseif ($statut == 'Abandonné') {
			//Abandonné
			$data = array(
				'numTicket' 	=> $numTicket,
				'dateAbandon' 	=> date("Y-m-d H:i:s"),
				'statutTicket' 	=> $statut,
				'motif' 		=> $this->input->post('motif_abandon'),
				'demandeur' 	=> $userActifs,
				'idDemande' 	=> $this->input->post('idDemande_abandonner')
			);
		} else {
			//FAQ
			$data = array(
				'numTicket' 	=> $numTicket,
				'dateFaq' 		=> date("Y-m-d H:i:s"),
				'statutTicket' 	=> $statut,
				'saisisseur' 	=> $userActifs,
				'idDemande' 	=> $idDemande
			);	
		}
		
		return $this->db->insert('ticket', $data);
	}

	public function update($idTicket, $statut = NULL, $utilisateur = NULL)
	{
		date_default_timezone_set('Africa/Nairobi');

		if ($statut == 'Encours') {
			$data = array(
				'dateEncours'  => date("Y-m-d H:i:s"),
				'statutTicket' => $statut,
				'saisisseur'   => $utilisateur
			);
		} elseif ($statut == 'A_Validé') {
			$data = array(
				'dateAvantValidation' => date("Y-m-d H:i:s"),
				'statutTicket' 		  => $statut
			);
		} elseif ($statut == 'Révisé') {
			$data = array(
				'dateRevise'   => date("Y-m-d H:i:s"),
				'statutTicket' => $statut,
				'revision'	   => $this->input->post('remarque')
			);
		} elseif ($statut == 'Terminé') {
			$data = array(
				'dateTermine'  => date("Y-m-d H:i:s"),
				'statutTicket' => $statut,
			);
		} elseif ($statut == 'Abandonné') {
			$data = array(
				'dateAbandon' 	=> date("Y-m-d H:i:s"),
				'statutTicket' 	=> $statut,
				'motif' 		=> $this->input->post('motif_abandon'),
				'saisisseur' 	=> $utilisateur
			);
		} else {
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