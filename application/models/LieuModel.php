<?php

class LieuModel extends CI_Model
{
	public function find($where = NULL)
	{
        if ($where != NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get('lieu');
        
        return $query->result();
    }

    public function insert()
    {
        $data = array(
        	'codeAgence' => $this->input->post('code_ajout'),
            'agences' 	 => $this->input->post('agence_ajout')
        );

        return $this->db->insert('lieu', $data);
    }

    public function update()
    {
        $data = array(
            'agences' 	 => $this->input->post('agence')
        );
        $this->db->where('idLieu', $this->input->post('idlieu'));

        return $this->db->update('lieu', $data);
    }

    public function delete()
	{
		$this->db->where('idLieu', $this->input->post('idlieu'));

		return $this->db->delete('lieu');
    }
    
    public function count($where = NULL)
    {
        if ($where != NULL) {
            $this->db->where($where);
        }
        $nb = $this->db->count_all_results('lieu');

        return $nb;
    }
}