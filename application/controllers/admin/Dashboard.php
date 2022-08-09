<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

  public function index()
  {
    $data = $this->data;
    $data['title'] = 'Dashboard | ';
    view('admin/v_header', $data);
    view('admin/v_dashboard');
    view('admin/v_footer');
  }
}
