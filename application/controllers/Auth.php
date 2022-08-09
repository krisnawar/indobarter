<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if (userdata('login') == true) {
      redirect('admin/dashboard');
    } else {
      set_rules('user_username', 'Username', 'required|trim');
      set_rules('user_password', 'Password', 'required|trim');
      if (validation_run() == false) {
        view('auth/login');
      } else {
        $user_username = input('user_username');
        $user_password = input('user_password');
        $cek_data = $this->a->cekUser($user_username)->row();
        if (password_verify($user_password, $cek_data->user_password)) {
          if ($cek_data->user_status == 1) {
            $session = array(
              'login' => true,
              'user_id' => $cek_data->user_id
            );
            set_userdata($session);
            redirect('admin/dashboard');
          } elseif ($cek_data->user_status == 0) {
            set_flashdata('msg', '<div class="alert alert-danger"><i class="icon fa fa-ban"></i>Akun tidak aktif, silahkan hubungi admin.</div>');
            redirect('auth');
          }
        } else {
          set_flashdata('msg', '<div class="alert alert-danger"><i class="icon fa fa-ban"></i>Username atau Password salah</div>');
          redirect('auth');
        }
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect();
  }
}
