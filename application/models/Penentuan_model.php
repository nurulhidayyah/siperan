<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penentuan_model extends CI_Model
{
    public function getRegression($ph)
    {
        $query = $this->db->query("SELECT SUM(ph_min) as total_ph_min FROM determination");
        $x = $query->row(); //sigma x

        $query = $this->db->query("SELECT SUM(total) as total FROM determination");
        $y = $query->row(); //sigma y

        $query = $this->db->query("SELECT SUM(x_kuadrat) as total_x_kuadrat FROM determination");
        $x_kuadrat = $query->row(); //sigma x_kuadrat

        $query = $this->db->query("SELECT SUM(y_kuadrat) as total_y_kuadrat FROM determination");
        $y_kuadrat = $query->row(); //sigma y_kuadrat

        $query = $this->db->query("SELECT SUM(xy) as total_xy FROM determination");
        $xy = $query->row(); //sigma xy

        $n =  $this->db->get('determination')->num_rows(); //total data

        $a = (($y->total * $x_kuadrat->total_x_kuadrat) - ($x->total_ph_min * $xy->total_xy)) / (($n * $x_kuadrat->total_x_kuadrat) - ($x->total_ph_min * $x->total_ph_min));

        $b = (($n * $xy->total_xy) - ($x->total_ph_min * $y->total)) / (($n * $x_kuadrat->total_x_kuadrat) - ($x->total_ph_min * $x->total_ph_min));
        $jumlah_pengapuran = $a + ($b * $ph);
        if ($jumlah_pengapuran < 0) {
            return 0;
        }
        return $jumlah_pengapuran;
    }

    public function getResult()
    {
        $query = "SELECT `measurement_result`.*, `measurement`.`surfac_area`
                  FROM `measurement_result` JOIN `measurement`
                  ON `measurement_result`.`measurement_id` = `measurement`.`id`
                ";
        return $this->db->query($query)->row_array();
    }

    public function updateData($kondisi)
    {
        return $this->db->update('devices', $kondisi);
    }
}
