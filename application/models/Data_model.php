<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
  function ambilMax()
  {
    $this->db->select_max('total');
    $this->db->from('counter');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return false;
    }
  }

  function sisaHari()
  {
    $this->db->select_max('time');
    $this->db->from('counter');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return false;
    }
  }

  function hariMin()
  {
    $this->db->select_min('time');
    $this->db->from('counter');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return false;
    }
  }

  function DWarning()
  {
    $this->db->select_max('warning');
    $this->db->from('data');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return false;
    }
  }

  function DLimit()
  {
    $this->db->select_max('Dlimit');
    $this->db->from('data');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return false;
    }
  }

  function time()
  {
    $this->db->select_max('time');
    $this->db->from('data');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return false;
    }
  }

  function update()
  {
    $this->db->select_max('Dupdate');
    $this->db->from('data');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return false;
    }
  }
}
