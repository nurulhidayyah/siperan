<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function getDataLuas()
    {

        $this->db->select_sum('surfac_area'); // Menghitung jumlah dari kolom 'surfac_area'
        $query = $this->db->get('measurement'); // 'measurement' adalah nama tabel

        if ($query->num_rows() > 0) {
            return $query->row()->surfac_area; // Mengembalikan hasil jumlah
        } else {
            return 0; // Mengembalikan 0 jika tidak ada data
        }
    }

    public function getDataPh()
    {

        $query = $this->db->select_avg('ph', 'average')->get('measurement_result');
        return $query->row()->average;
        
    }

    public function getDataPengapuran()
    {
        $this->db->select_sum('score'); // Menghitung jumlah dari kolom 'score'
        $query = $this->db->get('measurement_result'); // 'measurement_result' adalah nama tabel

        if ($query->num_rows() > 0) {
            return $query->row()->score; // Mengembalikan hasil jumlah
        } else {
            return 0; // Mengembalikan 0 jika tidak ada data
        }
    }
}
