<?php 

class Lowongan_model extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('lowongan')->result();
    }

    public function getWhereData($id_lowongan)
    {
        return $this->db->get_where('lowongan', ['id_lowongan' => $id_lowongan])->row_array();
    }
}


?>