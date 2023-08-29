<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Condition_model extends CI_Model
{
    public function getConditon()
    {
        $query = "SELECT `devices`.*
                FROM `devices`
        ";
        return $this->db->query($query)->result_array();
    }

    public function updateData($kondisi)
    {
        return $this->db->update('devices', $kondisi);
    }
}