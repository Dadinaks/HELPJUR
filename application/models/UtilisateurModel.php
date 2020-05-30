<?php

class UtilisateurModel extends CI_Model
{
    /**
	 * Récuperer les utilisateurs :
     *      - La condition WHERE de la requête existe si la fonction find()
     *        reçoit un parametre dans le Controlleur [find( $where )].
	 */
	public function find($where = NULL)
	{
        $this->db->select('*')
            ->from('utilisateur')
            ->join('profil', 'profil.idProfil = utilisateur.profil', 'inner')
            ->join('lieu', 'lieu.idLieu = utilisateur.agence', 'inner');
        if ($where != NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get();
    
        return $query->result();
	}

    public function insert()
    {
        $this->db->select('idLieu');
        $this->db->from('lieu');
        $this->db->where('agences', $this->input->post('lieu_utilisateur'));
        $query = $this->db->get();
        $lieu['lieu'] = $query->result();

        foreach ($lieu['lieu'] as $row) {
            $data = array(
                'matricule'     => $this->input->post('matricule_utilisateur'),
                'nom'           => $this->input->post('nom_utilisateur'),
                'prenom'        => $this->input->post('prenom_utilisateur'),
                'email'         => $this->input->post('email_utilisateur'),
                'agence'        => $row->idLieu,
                'direction'     => $this->input->post('direction_utilisateur'),
                'unite'         => $this->input->post('unite_utilisateur'),
                'poste'         => $this->input->post('poste_utilisateur'),
                'profil'        => $this->input->post('profile_utilisateur'),
                'statutCompte'  => 'Activé'
            );
        }
        return $this->db->insert('utilisateur', $data);
    }

    public function update($idUtilisateur = NULL, $statut = NULL)
    {
        if ($statut != NULL) {
            $data = array(
                'statutCompte' => $statut
            );
        } else {
            $idUtilisateur = $this->input->post('idUtilisateur_utilisateur');

            $data = array(
                'matricule' => $this->input->post('matricule_utilisateur'),
                'nom'       => $this->input->post('nom_utilisateur'),
                'prenom'    => $this->input->post('prenom_utilisateur'),
                'email'     => $this->input->post('email_utilisateur'),
                'agence'    => $this->input->post('lieu_utilisateur'),
                'direction' => $this->input->post('direction_utilisateur'),
                'unite'     => $this->input->post('unite_utilisateur'),
                'poste'     => $this->input->post('poste_utilisateur'),
                'profil'    => $this->input->post('profile_utilisateur')
            );
        }
        
        $this->db->where('idUtilisateur', $idUtilisateur);

        return $this->db->update('utilisateur', $data);
    }

    public function count($where = NULL)
    {
        if ($where != NULL) {
            $this->db->where($where);
        }
        $nb = $this->db->count_all_results('utilisateur');

        return $nb;
    }

}