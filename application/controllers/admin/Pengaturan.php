<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
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
    $data['title']  = 'Pengaturan Data Perusahaan | ';
    view('admin/v_header', $data);
    view('admin/v_pengaturan', $data);
    view('admin/v_footer');
  }

  public function updatedataperusahaan()
  {
    set_rules('submit', 'Submit', 'required');
    if (validation_run() == false) {
      redirect('admin/pengaturan');
    } else {
      $nama_perusahaan              = input('nama_perusahaan');
      $email_perusahaan             = input('email_perusahaan');
      $nomor_telepon                = input('nomor_telepon');
      $facebook_perusahaan          = input('facebook_perusahaan');
      $instagram_perusahaan         = input('instagram_perusahaan');
      $maps_perusahaan              = input('maps_perusahaan');
      $website_perusahaan           = input('website_perusahaan');
      $alamat_perusahaan            = input('alamat_perusahaan');
      $email_perusahaan_alternatif  = input('email_perusahaan_alternatif');
      $nomor_hp                     = input('nomor_hp');
      $twitter_perusahaan           = input('twitter_perusahaan');
      $whatsapp_perusahaan          = input('whatsapp_perusahaan');
      $input  = array(
        'nama_perusahaan'       => $nama_perusahaan,
        'website_perusahaan'    => $website_perusahaan,
        'email_perusahaan'      => $email_perusahaan,
        'email_alternatif'      => $email_perusahaan_alternatif,
        'alamat_perusahaan'     => $alamat_perusahaan,
        'no_telp'               => $nomor_telepon,
        'no_hp'                 => $nomor_hp,
        'facebook_perusahaan'   => $facebook_perusahaan,
        'twitter_perusahaan'    => $twitter_perusahaan,
        'instagram_perusahaan'  => $instagram_perusahaan,
        'whatsapp_perusahaan'   => $whatsapp_perusahaan,
        'maps_perusahaan'       => $maps_perusahaan
      );
      $this->admin->updateData('tb_data_perusahaan', $input, 'id_data', 1);
      set_flashdata('msg', '<div class="alert alert-success">Data perusahaan sukses diperbarui.</div>');
      redirect('admin/pengaturan#tab_1');
    }
  }

  public function updatetentangperusahaan()
  {
    set_rules('submit_tentang', 'Submit', 'required');
    if (validation_run() == false) {
      redirect('admin/pengaturan');
    } else {
      $tentang_perusahaan = nl2br(htmlspecialchars_decode(input('tentang_perusahaan')), ENT_HTML5);
      $input  = array('tentang_perusahaan' => $tentang_perusahaan);
      $foto   = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto_tentang']['name']);
      $config['upload_path']    = 'assets/img/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto_tentang')) {
        $input['foto_tentang'] = $config['upload_path'] . $foto;
      }
      $this->admin->updateData('tb_data_perusahaan', $input, 'id_data', 1);
      set_flashdata('msg', '<div class="alert alert-success">Tentang perusahaan sukses diperbarui.</div>');
      redirect('admin/pengaturan#tab_2');
    }
  }

  public function updatelogo()
  {
    set_rules('submit_logo', 'Submit', 'required');
    if (validation_run() == false) {
      redirect('admin/pengaturan#tab_3');
    } else {
      $cek = $this->db->get_where('tb_data_perusahaan', array('id_data' => 1))->row();
      $logo_perusahaan  = $_FILES['logo_perusahaan']['name'];
      $logo_website     = $_FILES['logo_website']['name'];
      $config['upload_path']    = 'assets/img/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('logo_perusahaan')) {
        unlink($cek->logo_perusahaan);
        $input['logo_perusahaan'] = $config['upload_path'] . $logo_perusahaan;
      }
      if ($this->upload->do_upload('logo_website')) {
        unlink($cek->icon_website);
        $input['icon_website']  = $config['upload_path'] . $logo_website;
      }
      $this->admin->updateData('tb_data_perusahaan', $input, 'id_data', 1);
      set_flashdata('msg', '<div class="alert alert-success">Logo sukses diperbarui.</div>');
      redirect('admin/pengaturan#tab_3');
    }
  }

  public function akun()
  {
    $data = $this->data;
    $data['title']  = 'Pengaturan Akun | ';
    $data['data']   = $this->db->where('user_id', $_SESSION["user_id"])->get('tb_users')->row();
    view('admin/v_header', $data);
    view('admin/v_pengaturanakun', $data);
    view('admin/v_footer');
  }

  public function updateakun()
  {
    set_rules('submit', 'Submit', 'required');
    if (validation_run() == false) {
      redirect('admin/pengaturan/akun');
    } else {
      $cek_data       = $this->db->where('user_id', $_SESSION["user_id"])->get('tb_users')->row();
      $user_username  = input('user_username');
      $user_name      = input('user_name');
      $password_baru  = input('password_baru');
      $password_lama  = input('password_lama');
      if ($password_baru == '') {
        $input  = array(
          'user_username' => $user_username,
          'user_name'     => $user_name
        );
        $this->db->where('user_id', $_SESSION["user_id"])->update('tb_users', $input);
        set_flashdata('msg', '<div class="alert alert-success">Data akun sukses diperbarui.</div>');
        redirect('admin/pengaturan/akun');
      } else {
        if (password_verify($password_lama, $cek_data->user_password)) {
          $input['user_password'] = password_hash(input('password_baru'), PASSWORD_DEFAULT);
          $this->db->where('user_id', $_SESSION["user_id"])->update('tb_users', $input);
          set_flashdata('msg', '<div class="alert alert-success">Data akun sukses diperbarui.</div>');
          redirect('admin/pengaturan/akun');
        } else {
          set_flashdata('msg', '<div class="alert alert-danger">Password lama tidak cocok dengan password sekarang.</div>');
          redirect('admin/pengaturan/akun');
        }
      }
    }
  }
}
