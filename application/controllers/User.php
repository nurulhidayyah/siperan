<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        redirect('setting');
    }

    public function mydevice()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Perangkat Saya';

        $this->load->model('Device_model', 'device');
        $data['device'] = $this->device->getDevice();

        $this->load->model('Condition_model', 'devices');
        $data['devices'] = $this->devices->getConditon();

        $this->form_validation->set_rules('token', 'Token', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/device', $data);
            $this->load->view('templates/footer');
        } else {
            $token = htmlspecialchars($this->input->post('token'), TRUE);

            $this->db->set('device_id', $token);
            $this->db->where('id', $data['user']['id']);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Perangkat</div>');
            redirect('user/mydevice');
        }
    }

    public function land()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $device = $data['user']['device_id'];
        $user = $data['user']['id'];

        $data['title'] = 'Kondisi Lahan';
        $this->load->model('Device_model', 'kondisi');
        $data['kondisi'] = $this->kondisi->getDevicebyid($device, $user);
        $this->load->view('user/condition', $data);
    }

    public function getDataFromLand()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $device = $data['user']['device_id'];
        $user = $data['user']['id'];

        $data['title'] = 'Land Conditions';

        $this->load->model('Device_model', 'kondisi');
        $data['kondisi'] = $this->kondisi->getDevicebyid($device, $user);
        
        echo json_encode($data);
    }

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

    public function penentuan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Penentuan';

        $this->db->select('ph');
        $query = $this->db->get('devices')->row();
        if (empty($query)) {
            redirect('user/mydevice'); 
        }
        $jumlah = $query->ph;

        $this->load->model('Penentuan_model', 'pengapuran');
        $data['pengapuran'] = $this->pengapuran->getRegression($jumlah);
        
        $query = $this->db->select('*')
            ->from('measurement_result')
            ->order_by('created_at', 'DESC') // Assuming there's a 'created_at' column
            ->limit(1) // You can adjust the number of records you want to fetch
            ->get();
        $data['rekomendasi'] = $query->row_array();

        $this->form_validation->set_rules('place_name', 'Nama Tempat', 'required|trim');
        $this->form_validation->set_rules('panjang', 'Panjang Lahan', 'required|trim|numeric');
        $this->form_validation->set_rules('lebar', 'Lebar Lahan', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengapuran', $data);
            $this->load->view('templates/footer');
            // $this->load->view('user/ujicoba', $data);
        } else {
            $place_name = htmlspecialchars($this->input->post('place_name', true));
            $panjang = htmlspecialchars($this->input->post('panjang', true));
            $lebar = htmlspecialchars($this->input->post('lebar', true));
            $surfac_area = $panjang * $lebar;

            $data = [
                'user_id' => $data['user']['id'],
                'surfac_area' => $surfac_area,
                'place_name' => $place_name,
                'created_at' => time()
            ];

            $measurement = $this->db->insert('measurement', $data);

            $query = $this->db->select('*')
                ->from('measurement')
                ->order_by('created_at', 'DESC') // Assuming there's a 'created_at' column
                ->limit(1) // You can adjust the number of records you want to fetch
                ->get();
            $latestData = $query->row();

            if ($measurement) {
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->model('Penentuan_model', 'pengapuran');
                $data['pengapuran'] = $this->pengapuran->getRegression($jumlah);

                // $this->load->model('Penentuan_model', 'pengapuran');
                // $data['result'] = $this->pengapuran->getResult();

                $params = [
                    'measurement_id' => $latestData->id,
                    'device_id' => $data['user']['device_id'],
                    'ph' => $jumlah,
                    'score' => $data['pengapuran'] * $latestData->surfac_area,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $this->db->insert('measurement_result', $params);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Berhasil Ditambahkan</div>');
            redirect('user/penentuan');
        }
    }

    public function history()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'History';

        $this->load->model('History_model', 'result');
        $data['result'] = $this->result->getResult();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/history', $data);
        $this->load->view('templates/footer');
    }
}
