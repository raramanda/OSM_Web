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
    $data['obs'] = $this->db->get('counter')->result_array();
    $data['ban'] = $this->db->get_where('data', ['id' => '1'])->row_array();
    $data['tobs'] = $this->db->order_by('id', 'DESC')->get('counter')->result_array();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Data_model', 'ambil');

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer', $data);

    $hari = $this->ambil->sisaHari();
    $harimin = $this->ambil->hariMin();
    $jarak = $this->ambil->ambilMax();

    $sisahari = (round((($harimin["time"] + 5184000) - $hari["time"]) / 86400));
    $total = round($jarak["total"] * (31 / 100000), 1);


    if ((round((($harimin["time"] + 5184000) - $hari["time"]) / 86400)) < 2) {
      $this->session->set_flashdata('message3', '<div class="alert alert-danger" role="alert">' . 'Penggunaan Oli Telah Mencapai ' . $sisahari . ' Hari </div>');
    } elseif ((round((($harimin["time"] + 5184000) - $hari["time"]) / 86400)) < 6) {
      $this->session->set_flashdata('message3', '<div class="alert alert-warning" role="alert">' . 'Penggunaan Oli Tersisa ' . $sisahari . ' Hari </div>');
    } elseif ((round((($harimin["time"] + 5184000) - $hari["time"]) / 86400)) < 11) {
      $this->session->set_flashdata('message3', '<div class="alert alert-success" role="alert">' . 'Penggunaan Oli Tersisa ' . $sisahari . ' Hari </div>');
    }

    if ((round($jarak["total"] * (31 / 100000))) >= 2050) {
      $this->session->set_flashdata('message3', '<div class="alert alert-danger" role="alert">' . 'Penggunaan Jarak Telah Mencapai ' . $total . ' KM </div>');
    } elseif ((round($jarak["total"] * (31 / 100000))) >= 2000) {
      $this->session->set_flashdata('message3', '<div class="alert alert-warning" role="alert">' . 'Penggunaan Jarak Telah Mencapai ' . $total . ' KM </div>');
    } elseif ((round($jarak["total"] * (31 / 100000))) == 2000) {
      $this->session->set_flashdata('message3', '');
    }
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

  public function config()
  {
    $data['title'] = 'Configuration';
    $data['ddata'] = $this->db->get_where('data', ['id' => '1'])->row_array();
    $data['ban'] = $this->db->get_where('ban', ['id' => '1'])->row_array();
    $ban = $this->db->get_where('data', ['id' => '1'])->row_array();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('warning', 'Warning', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/config', $data);
      $this->load->view('templates/footer');
    } else {
      $warning = $this->input->post('warning');
      $dlimit = $this->input->post('dlimit');
      $dupdate = $this->input->post('dupdate');

      $ddata = array(
        'Dlimit' => $dlimit * $ban['counter'],
        'Dupdate' => round(($dupdate * $ban['counter']) / 1000), //Konversi Ke Meter [/1000]
        'warning' => $warning * $ban['counter']
      );
      $this->db->where('id', 1);
      $this->db->update('data', $ddata);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Config Updated!</div>');
      redirect('admin/config');
    }
  }

  public function tire()
  {
    $tinggi = $this->input->post('tinggi');
    $velg = $this->input->post('velg');
    $lebar = $this->input->post('lebar');
    $spoke = $this->input->post('spoke');

    $ddata = array(
      'tinggi' => $tinggi,
      'lebar' => $lebar,
      'velg' => $velg,
      'spoke' => $spoke
    );

    $diameter = ($tinggi * 0.2) + ($velg * 2.54);
    $keliling = round($diameter * 3.14);
    $counter = round(100000 / ($keliling / $spoke));
    $dcounter = array(
      'counter' => $counter
    );
    $this->db->where('id', 1);
    $this->db->update('ban', $ddata);
    $this->db->update('data', $dcounter);
    $this->session->set_flashdata('message1', '<div class="alert alert-warning" role="alert">Ukuran Ban Telah Disimpan!</div>');
    redirect('admin/config');
  }

  public function reset()
  {
    $data['title'] = 'Configuration';
    $this->load->model('Data_model', 'ambil');
    $data['sisa'] = $this->ambil->ambilMax();
    $data['hari'] = $this->ambil->sisaHari();
    $data['harimin'] = $this->ambil->hariMin();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('warning', 'Warning', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/reset', $data);
      $this->load->view('templates/footer');
    } else {
      $data = array(
        'data' => 0,
        'total' => 0,
        'time' => time()
      );
      $this->db->empty_table('counter');
      $this->db->insert('counter', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data has been Reset!</div>');
      redirect('admin/reset');
    }
  }
}
