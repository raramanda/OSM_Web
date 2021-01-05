<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{

  public function index()
  {
    $data['obs'] = $this->db->get('counter')->result_array();
    $this->load->view('chart/index', $data);
  }

  public function sumary()
  {
    $data['title'] = 'Laporan Jarak Tempuh';
    $data['obs'] = $this->db->get('counter')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('chart/recap', $data);
    $this->load->view('templates/footer');
  }

  public function input()
  {
    $data['obs'] = $this->db->get('counter')->result_array();
    $this->load->view('chart/data', $data);
  }

  public function cek()
  {
    $this->load->model('Data_model', 'ambil');
    $cek = $this->ambil->ambilMax();
    echo $cek['total'];
  }

  public function warning()
  {
    $this->load->model('Data_model', 'DWarning');
    $cek = $this->DWarning->DWarning();
    echo $cek['warning'];
  }

  public function limit()
  {
    $this->load->model('Data_model', 'DLimit');
    $cek = $this->DLimit->DLimit();
    echo $cek['Dlimit'];
  }

  public function update()
  {
    $this->load->model('Data_model', 'update');
    $cek = $this->update->update();
    echo $cek['Dupdate'];
  }

  public function time()
  {
    $this->load->model('Data_model', 'ambil');
    $hari = $this->ambil->sisaHari();
    $harimin = $this->ambil->hariMin();
    echo round((($harimin['time'] + 5184000) - $hari['time']) / 86400);
  }
}
