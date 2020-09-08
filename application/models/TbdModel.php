<?php

class TbdModel extends CI_Model
{
    /* SELECT CONCAT(u.matricule, " - ", u.nom, " ", u.prenom) as juriste,COUNT(*) as nb FROM ticket t 
    * INNER JOIN utilisateur u ON (u.idUtilisateur = t.saisisseur) 
    * WHERE t.statutTicket = $statut GROUP BY t.saisisseur
    */
    public function nbTicket_par_juriste($statut = NULL){
        $user    = $this->session->userdata('id_utilisateur');
        $session = $this->session->userdata('role');

        $this->db->select("CONCAT(u.matricule, ' - ', u.nom, ' ', u.prenom) as juriste,COUNT(*) as nb")
            ->from("ticket t")
            ->join("utilisateur u", "u.idUtilisateur = t.saisisseur", "inner");

        
        if ($session == 4) {
            $this->db->where("utilisateur.idUtilisateur", $user);
        }

        if ($statut != NULL) {
            $this->db->where("t.statutTicket", $statut);
        }
                
        $this->db->group_by("t.saisisseur");
        $query = $this->db->get();

        return $query->result();
    }

    /* SELECT CONCAT(u.matricule, " - ", u.nom, " ", u.prenom) as juriste,COUNT(*) as nb, p.profile as profil FROM ticket t 
     * INNER JOIN utilisateur u ON (u.idUtilisateur = t.saisisseur)
     * LEFT JOIN profil p ON (p.idProfil = u.profil)
     * WHERE p.idProfil = $profil AND t.statutTicket = $statut
     * GROUP BY t.saisisseur
    */
    public function nbTicket_par_type_juriste($profil, $statut = NULL){
        $user    = $this->session->userdata('id_utilisateur');
        $session = $this->session->userdata('role');

        $this->db->select("CONCAT(u.matricule, ' - ', u.nom, ' ', u.prenom) as juriste,COUNT(*) as nb")
            ->from("ticket t")
            ->join("utilisateur u", "u.idUtilisateur = t.saisisseur", "inner")
            ->join("profil p", "p.idProfil = u.profil","left")
            ->where("p.idProfil", $profil);
        
        if ($session == 4) {
            $this->db->where("utilisateur.idUtilisateur", $user);
        }

        if ($statut != NULL) {
            $this->db->where("t.statutTicket", $statut);
        }
                
        $this->db->group_by("t.saisisseur");
        $query = $this->db->get();

        return $query->result();
    }

    /* SELECT ta.tache as tache, COUNT(*) as nb FROM ticket t
    * INNER JOIN tache ta ON (ta.idTache = t.idTache)
    * INNER JOIN categorie c ON (c.idCategorie = ta.idCategorie)
    * WHERE c.idCategorie = $idCategorie GROUP BY ta.tache
    */
    public function nbTicket_par_categorie($idCategorie = NULL){
        $user    = $this->session->userdata('id_utilisateur');
        $session = $this->session->userdata('role');

        $this->db->select("ta.tache as tache, COUNT(*) as nb")
            ->from("ticket t")
            ->join("tache ta", "ta.idTache = t.idTache", "inner")
            ->join("categorie c", "c.idCategorie = ta.idCategorie", "inner");

        if ($session == 4) {
            $this->db->where("utilisateur.idUtilisateur", $user);
        }

        if ($idCategorie != NULL) {
            $this->db->where("c.idCategorie", $idCategorie);
        }

        $this->db->group_by("ta.tache");
        $query = $this->db->get();

        return $query->result();
    }

    /* SELECT t.idTicket, demande.objet, tache.tache, CONCAT(s.matricule, ' - ', s.nom, ' ', s.prenom) as saisisseur, CONCAT(d.matricule, ' - ', d.nom, ' ', d.prenom) as demandeur, t.statutTicket, t.numTicket, DATE_FORMAT(t.dateReception, '%d/%m/%Y, à %H:%i') as dateReception, DATE_FORMAT(t.dateEncours, '%d/%m/%Y, à %H:%i') as dateEncours,  DATE_FORMAT(t.dateAvantValidation, '%d/%m/%Y, à %H:%i') as dateAvantValidation, DATE_FORMAT(t.dateRevise, '%d/%m/%Y, à %H:%i') as dateRevise, DATE_FORMAT(t.dateTermine, '%d/%m/%Y, à %H:%i') as dateTermine, DATE_FORMAT(t.dateRefus, '%d/%m/%Y, à %H:%i') as dateRefus, DATE_FORMAT(t.dateAbandon, '%d/%m/%Y, à %H:%i') as dateAbandon, DATE_FORMAT(t.dateFaq, '%d/%m/%Y, à %H:%i') as dateFaq FROM ticket t 
     * INNER JOIN demande ON (demande.idDemande = t.idDemande) 
     * INNER JOIN tache ON (tache.idTache = t.idTache) 
     * INNER JOIN utilisateur s ON (s.idUtilisateur = t.saisisseur) 
     * INNER JOIN utilisateur d ON (d.idUtilisateur = t.demandeur)
     * t.dateReception BETWEEN $dateDebut AND $dateFin
    */
    public function all_ticket($statut = NULL, $dateDebut=NULL, $dateFin=NULL){
        $user    = $this->session->userdata('id_utilisateur');
        $session = $this->session->userdata('role');

        $this->db->select("t.idTicket, demande.objet, tache.tache, CONCAT(s.matricule, ' - ', s.nom, ' ', s.prenom) as saisisseur, CONCAT(v.matricule, ' - ', v.nom, ' ', v.prenom) as valideur, CONCAT(r.matricule, ' - ', r.nom, ' ', r.prenom) as valideRemarque, CONCAT(d.matricule, ' - ', d.nom, ' ', d.prenom) as demandeur, t.statutTicket, t.numTicket, DATE_FORMAT(t.dateReception, '%d/%m/%Y, à %H:%i') as dateReception, DATE_FORMAT(t.dateEncours, '%d/%m/%Y, à %H:%i') as dateEncours,  DATE_FORMAT(t.dateAvantValidation, '%d/%m/%Y, à %H:%i') as dateAvantValidation, DATE_FORMAT(t.dateRevise, '%d/%m/%Y, à %H:%i') as dateRevise, DATE_FORMAT(t.dateTermine, '%d/%m/%Y, à %H:%i') as dateTermine, DATE_FORMAT(t.dateRefus, '%d/%m/%Y, à %H:%i') as dateRefus, DATE_FORMAT(t.dateAbandon, '%d/%m/%Y, à %H:%i') as dateAbandon, DATE_FORMAT(t.dateFaq, '%d/%m/%Y, à %H:%i') as dateFaq")
            ->from("ticket t")
            ->join('demande', 'demande.idDemande = t.idDemande', 'left')
            ->join('tache', 'tache.idTache = t.idTache', 'left')
            ->join('utilisateur s', 's.idUtilisateur = t.saisisseur', 'left')
            ->join('utilisateur v', 'v.idUtilisateur = t.valideur', 'left')
            ->join('utilisateur d', 'd.idUtilisateur = t.demandeur', 'left')
            ->join('utilisateur r', 'r.idUtilisateur = t.valideRemarque', 'left');
        
            if ($statut != NULL && $dateDebut != NULL && $dateFin !=NULL) {
            $this->db->where('t.' . $statut . ' BETWEEN "' . date("Y-m-d", strtotime($dateDebut)) . '" AND "' . date("Y-m-d", strtotime($dateFin)) . '"');
        }
        
        if ($session == 4) {
            $this->db->where("d.idUtilisateur", $user);
        }

        $query = $this->db->get();

        return $query->result();
    }


    /**
    * SELECT count($date_statuts) FROM ticket 
    * where DATE_FORMAT($date_statuts, "%m") = $mois AND DATE_FORMAT($date_statuts, "%Y") = $an 
    */
    public function data_chart_line($date_statuts, $mois, $an = NULL){
        /* $user    = $this->session->userdata('id_utilisateur');
        $session = $this->session->userdata('role'); */

        $this->db->select('count('. $date_statuts .') as '. $date_statuts)
            ->from('ticket')
            ->where('DATE_FORMAT('. $date_statuts .', "%m") = ' . $mois);
        
        /* if ($session == 4) {
            $this->db->where("d.idUtilisateur", $user);
        } */

        if ($an != NULL) {
            $this->db->where('DATE_FORMAT('. $date_statuts .', "%Y") = ' . $an);
        }
        
        $query = $this->db->get();

        return $query->result();
    }
}