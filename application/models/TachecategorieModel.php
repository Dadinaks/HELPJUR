<?php

class TachecategorieModel extends CI_Model
{
    /*
     * Récupération des Tâches ou Catégorie :
     *   - La condition WHERE de la requête existe si la fonction find()
     *     reçoit un parametre $where dans le Controlleur [find( $where )].
     */
    public function find($table, $where = NULL)
    {
        if ($table == 'categorie'){
            $query = $this->db->get($table);
        } else {
            $this->db->select('*')
            ->from($table)
            ->join('categorie', 'categorie.idCategorie = tache.idCategorie', 'inner');
            if ($where != NULL) {
                $this->db->where($where);
            }
            $query = $this->db->get();
        }
        
        return $query->result();
    }

    public function insert($table)
    {
        if ($table == 'categorie'){
            $data = array(
                'categorie'   => $this->input->post('categorie')
            );
        } else {
            $data = array(
                'tache'       => $this->input->post('tache_tache'),
                'delai'       => $this->input->post('delai_tache'),
                'cotation'    => $this->input->post('cotation_tache'),
                'idCategorie' => $this->input->post('categorie_tache')
            );
        }

        return $this->db->insert($table, $data);
    }

    public function update($table)
    {
        if ($table == 'categorie'){
            $idCategorie = $this->input->post('idCategorie');
            $data = array(
                'categorie' => $this->input->post('categorie')
            );
            $this->db->where('idCategorie', $idCategorie);
        } else {
            $idTache = $this->input->post('idTache');
            $data = array(
                'tache' => $this->input->post('tache_tache'),
                'delai' => $this->input->post('delai_tache'),
                'cotation' => $this->input->post('cotation_tache'),
                'idCategorie' => $this->input->post('categorie_tache')
            );
            $this->db->where('idTache', $idTache);
        }

        return $this->db->update($table, $data);
    }

    public function delete($table)
    {
        if ($table == 'categorie'){
            $idCategorie = $this->input->post('idCategorie');
            $this->db->where('idCategorie', $idCategorie);

            $this->db->delete($table);
        } else {
            $idTache = $this->input->post('idTache');
            $this->db->where('idTache', $idTache);

            $this->db->delete($table);
        }
    }

    public function count($table, $where = NULL)
    {
        if ($where != NULL) {
            $this->db->where($where);
        }
        $nb = $this->db->count_all_results($table);

        return $nb;
    }
}