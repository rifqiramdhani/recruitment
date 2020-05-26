<?php 


class Main_model extends CI_Model
{
    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getWhereData($table, $primary)
    {
        return $this->db->get_where($table, $primary);
    }
}

?>