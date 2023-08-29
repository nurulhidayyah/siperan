<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kirimdata extends CI_Controller
{
    public function data()
    {
        $kondisi = [
            'token' => $this->uri->segment(3),
            'ph' => $this->uri->segment(4),
            'date' => time()
        ];

        $this->db->set($kondisi);
        $this->db->where('token', $kondisi['token']);
        $this->db->update('devices');
        echo json_encode($kondisi);
    }
}
