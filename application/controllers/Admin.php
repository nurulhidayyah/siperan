<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Dashboard_model', 'dashboard');
        $data['totalPengapuran'] = $this->dashboard->getDataPengapuran();
        $data['totalLuasLahan'] = $this->dashboard->getDataLuas();
        $data['kadarKeasaman'] = $this->dashboard->getDataPh();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }


    public function users()
    {
        $data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('User_model', 'user');
        $data['users'] = $this->user->getRole();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengguna Baru berhasil ditambahkan</div>');
            redirect('admin/users');
        }
    }


    public function usersEdit($id)
    {
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->model('User_model', 'user');
        $data['users'] = $this->user->getRole();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $role = $this->input->post('role_id');

            $this->db->set('name', $name);
            $this->db->set('email', $email);
            $this->db->set('password', $password);
            $this->db->set('role_id', $role);
            $this->db->where('id', $id);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data users has been updated!</div>');
            redirect('admin/users');
        }
    }


    public function users_delete($id)
    {
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $this->db->where('id', $id);
        $this->db->delete('user');
        $old_image = $data['user']['image'];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data users has been deleted!</div>');
        redirect('admin/users');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }


    public function laporan()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'laporan');
        $data['laporan'] = $this->laporan->laporan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function generate_laporan()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'laporan');
        $data['laporan'] = $this->laporan->laporan();

        $html = $this->load->view('admin/generate_laporan', $data, true);

        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'orientation' => 'landscape',
            'margin' => 0
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function learning()
    {
        $data['title'] = 'Data Latih';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['latih'] = $this->db->get('determination')->result_array();

        $this->form_validation->set_rules('ph_min', 'pH Min', 'required|trim|numeric');
        $this->form_validation->set_rules('ph_max', 'pH Max', 'required|trim|numeric');
        $this->form_validation->set_rules('calcification', 'Pengapuran', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/learning', $data);
            $this->load->view('templates/footer');
        } else {
            $ph_min = htmlspecialchars($this->input->post('ph_min', true));
            $ph_max = htmlspecialchars($this->input->post('ph_max', true));
            $calcification = htmlspecialchars($this->input->post('calcification', true));
            $total = (($ph_max - $ph_min) * $calcification) / 10000;
            $x_kuadrat = $ph_min * $ph_min;
            $y_kuadrat = $total * $total;
            $xy = $ph_min * $total;

            $data = [
                'ph_min' => $ph_min,
                'ph_max' => $ph_max,
                'calcification' => $calcification,
                'total' => $total,
                'x_kuadrat' => $x_kuadrat,
                'y_kuadrat' => $y_kuadrat,
                'xy' => $xy
            ];

            $this->db->insert('determination', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Berhasil Ditambahkan</div>');
            redirect('admin/learning');
        }
    }

    public function learnEdit($id)
    {
        $data['title'] = 'Data Latih';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['latih'] = $this->db->get('determination')->result_array();

        $this->form_validation->set_rules('ph_min', 'pH Min', 'required|trim');
        $this->form_validation->set_rules('ph_max', 'pH Max', 'required|trim');
        $this->form_validation->set_rules('calcification', 'Pengapuran', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/learning', $data);
            $this->load->view('templates/footer');
        } else {
            $ph_min = htmlspecialchars($this->input->post('ph_min', true));
            $ph_max = htmlspecialchars($this->input->post('ph_max', true));
            $calcification = htmlspecialchars($this->input->post('calcification', true));
            $total = (($ph_max - $ph_min) * $calcification) / 10000;
            $x_kuadrat = $ph_min * $ph_min;
            $y_kuadrat = $total * $total;
            $xy = $ph_min * $total;

            $this->db->set('ph_min', $ph_min);
            $this->db->set('ph_max', $ph_max);
            $this->db->set('calcification', $calcification);
            $this->db->set('total', $total);
            $this->db->set('x_kuadrat', $x_kuadrat);
            $this->db->set('y_kuadrat', $y_kuadrat);
            $this->db->set('xy', $xy);
            $this->db->where('id', $id);
            $this->db->update('determination');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diedit</div>');
            redirect('admin/learning');
        }
    }

    public function learnDelete($id)
    {
        $data['determination'] = $this->db->get_where('determination', ['id' => $id])->row_array();
        $this->db->where('id', $id);
        $this->db->delete('determination');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('admin/learning');
    }

    public function devices()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Kelola Perangkat';
        
        $this->load->model('Condition_model', 'devices');
        $data['devices'] = $this->devices->getConditon();

        $this->form_validation->set_rules('token', 'Token', 'required|trim|min_length[16]|max_length[16]|is_unique[devices.token]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/devices', $data);
            $this->load->view('templates/footer');
        } else {
            $token = htmlspecialchars($this->input->post('token'), TRUE);
            
            $data = [
                'token' => $token,
                'date' => time()
            ];

            $this->db->insert('devices', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perangkat Baru Berhasil Ditambahkan</div>');
            redirect('admin/devices');
        }
    }

    public function devicesEdit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Perangkat Saya';
        
        $this->load->model('Condition_model', 'devices');
        $data['devices'] = $this->devices->getConditon();

        $this->form_validation->set_rules('token', 'Token', 'required|trim|min_length[16]|max_length[16]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/devices', $data);
            $this->load->view('templates/footer');
        } else {
            $token = htmlspecialchars($this->input->post('token'), TRUE);
            
            $this->db->set('token', $token);
            $this->db->set('date_created', time());
            $this->db->where('id', $id);
            $this->db->update('devices');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perangkat Berhasil Diedit</div>');
            redirect('admin/devices');
        }
    }

    public function devicesDelete($id)
    {
        $data['devices'] = $this->db->get_where('devices', ['id' => $id])->row_array();
        $this->db->where('id', $id);
        $this->db->delete('devices');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Perangkat Berhasil Dihapus</div>');
        redirect('admin/devices');
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
}
