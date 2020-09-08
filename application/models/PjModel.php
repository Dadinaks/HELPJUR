<?php

Class PjModel extends CI_MOdel
{
	public function find($idTicket)
	{   
        $query = $this->db->where('idTicket', $idTicket)
		->get('pj_traitement');
        
        return $query->result();
	}

	public function insert($pj)
	{
        $idTicket = $this->input->post('pj_idTicket');

		return $this->db->insert('pj_traitement', ["pj" => $pj, "idTicket" => $idTicket]);
	}
}