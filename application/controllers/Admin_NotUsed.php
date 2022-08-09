<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_ extends CI_Controller
{

  var $data;

  public function __construct()
  {
    parent::__construct();
    if (userdata('login') != true) {
      redirect('auth');
    }
    $this->data = array('perusahaan' => $this->admin->dataPerusahaan()->row());
  }

  public function dataperusahaan()
  {
    $data['perusahaan'] = $this->admin->dataPerusahaan()->row();
    view('admin/v_header');
    view('admin/v_dataperusahaan', $data);
    view('admin/v_footer');
  }

  public function harga()
  {
    $data = $this->data;
    $data['tim'] = $this->admin->datatim()->result();
    view('admin/v_header', $data);
    view('admin/v_harga', $data);
    view('admin/v_footer');
  }

  public function select2()
  {
    $test = input('test');
    print_r($test);
    echo implode(', ', $test);
  }

  public function akun()
  {
    //
  }
}
