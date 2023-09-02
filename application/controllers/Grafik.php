<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{
    public function getAverage()
    {
        $this->load->model('Average_model', 'average');

        $data = [
            'average_jan' => $this->average->getAverageForMonth(1),
            'average_feb' => $this->average->getAverageForMonth(2),
            'average_mar' => $this->average->getAverageForMonth(3),
            'average_apr' => $this->average->getAverageForMonth(4),
            'average_mei' => $this->average->getAverageForMonth(5),
            'average_june' => $this->average->getAverageForMonth(6),
            'average_july' => $this->average->getAverageForMonth(7),
            'average_august' => $this->average->getAverageForMonth(8),
            'average_sept' => $this->average->getAverageForMonth(9),
            'average_okt' => $this->average->getAverageForMonth(10),
            'average_nov' => $this->average->getAverageForMonth(11),
            'average_des' => $this->average->getAverageForMonth(12),
        ];

        echo json_encode($data);
    }
}