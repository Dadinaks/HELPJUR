<?php

class TbdModel extends CI_Model
{
    /* SELECT CONCAT(u.matricule, " - ", u.nom, " ", u.prenom) as juriste,COUNT(*) as nb FROM ticket t 
    * INNER JOIN utilisateur u ON (u.idUtilisateur = t.saisisseur) 
    * WHERE t.statutTicket = $statut GROUP BY t.saisisseur
    */
    public function nbTicket_par_juriste($statut = NULL){
        $this->db->select("CONCAT(u.matricule, ' - ', u.nom, ' ', u.prenom) as juriste,COUNT(*) as nb")
            ->from("ticket t")
            ->join("utilisateur u", "u.idUtilisateur = t.saisisseur", "inner");

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
        $this->db->select("ta.tache as tache, COUNT(*) as nb")
            ->from("ticket t")
            ->join("tache ta", "ta.idTache = t.idTache", "inner")
            ->join("categorie c", "c.idCategorie = ta.idCategorie", "inner");

        if ($idCategorie != NULL) {
            $this->db->where("c.idCategorie", $idCategorie);
        }

        $this->db->group_by("ta.tache");
        $query = $this->db->get();

        return $query->result();
    }

    /* SELECT (SELECT objet FROM demande WHERE idDemande = ticket.idDemande) as objet,
    * (SELECT tache FROM tache WHERE idTache = ticket.idTache) as tache,
    * (SELECT CONCAT(matricule, ' - ', nom, ' ', prenom) FROM utilisateur WHERE idUtilisateur = ticket.saisisseur) as saisisseur,
    * (SELECT CONCAT(matricule, ' - ', nom, ' ', prenom) FROM utilisateur WHERE idUtilisateur = ticket.demandeur) as demandeur,
    * statutTicket, numTicket, dateReception, dateEncours,  dateAvantValidation, dateRevise, dateTermine, dateRefus, dateAbandon, dateFaq FROM ticket
    */
    public function all_ticket(){
        $query = $this->db->select("(SELECT objet FROM demande WHERE idDemande = ticket.idDemande) as objet, (SELECT tache FROM tache WHERE idTache = ticket.idTache) as tache, (SELECT CONCAT(matricule, ' - ', nom, ' ', prenom) FROM utilisateur WHERE idUtilisateur = ticket.saisisseur) as saisisseur, (SELECT CONCAT(matricule, ' - ', nom, ' ', prenom) FROM utilisateur WHERE idUtilisateur = ticket.demandeur) as demandeur, statutTicket, numTicket, dateReception, dateEncours, dateAvantValidation, dateRevise, dateTermine, dateRefus, dateAbandon, dateFaq")
                 ->from("ticket")
                 ->get();

        return $query->result();
    }


    /* SELECT count($date_statuts) FROM ticket where DATE_FORMAT($date_statuts, "%m") = $mois AND DATE_FORMAT($date_statuts, "%Y") = $an */
    public function data_chart_line($date_statuts, $mois, $an = NULL){
        $this->db->select('count('. $date_statuts .') as '. $date_statuts)
            ->from('ticket')
            ->where('DATE_FORMAT('. $date_statuts .', "%m") = ' . $mois);

        if ($an != NULL) {
            $this->db->where('DATE_FORMAT('. $date_statuts .', "%Y") = ' . $an);
        }
        
        $query = $this->db->get();

        return $query->result();
    }
}