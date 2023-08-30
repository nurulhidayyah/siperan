<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function getResult()
    {
        $query = "SELECT `measurement_result`.*, `measurement`.`surfac_area`,`place_name`, `devices`.`ph`
                  FROM `measurement_result` JOIN `measurement`
                  ON `measurement_result`.`measurement_id` = `measurement`.`id`
                  LEFT JOIN `devices`
                  ON `measurement_result`.`device_id` = `devices`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
}
