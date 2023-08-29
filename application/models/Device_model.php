<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device_model extends CI_Model
{
    public function getDevice()
    {
        // $query = "SELECT `devices`.*
        //         FROM `devices`
        // ";
        // return $this->db->query($query)->result_array();
        $query = "SELECT `user`.*, `devices`.`token`,`date`
                  FROM `user` JOIN `devices`
                  ON `user`.`device_id` = `devices`.`id`
                ";
        return $this->db->query($query)->row_array();
    }
    public function getDevicebyid($id)
    {
        $query = "SELECT `user`.*, `devices`.`token`,`ph`,`date`
                  FROM `user` JOIN `devices`
                  ON `user`.`device_id` = `devices`.`id`
                  WHERE `user`.`device_id` = $id
                ";
        return $this->db->query($query)->result_array();
    }
}
