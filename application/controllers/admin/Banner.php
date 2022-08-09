<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
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
    $data['title'] = 'Banner Foto | ';
    $data['banner'] = $this->admin->databanner()->result();
    view('admin/v_header', $data);
    view('admin/v_banner', $data);
    view('admin/v_footer');
  }

  public function simpanbanner()
  {
    set_rules('simpan', 'Simpan', 'required');
    if (validation_run() == false) {
      redirect('admin/banner');
    } else {
      $judul_banner     = input('judul_banner');
      $deskripsi_banner = input('deskripsi_banner');
      $input = array(
        'judul_banner'      => $judul_banner,
        'deskripsi_banner'  => $deskripsi_banner
      );
      $foto = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto']['name']);
      $config['upload_path']    = 'assets/img/banner/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $input['foto_banner'] = $config['upload_path'] . $foto;
      }
      $this->admin->insertData('tb_banner', $input);
      set_flashdata('msg', '<div class="alert alert-success">Banner sukses ditambahkan.</div>');
      redirect('admin/banner');
    }
  }

  public function updatebanner($id)
  {
    set_rules('update', 'Simpan', 'required');
    if (validation_run() == false) {
      redirect('admin/banner');
    } else {
      $cek = $this->db->where('substring(sha1(id_banner), 10, 5) = "' . $id . '"')->get('tb_banner')->row();
      $judul_banner     = input('judul_banner');
      $deskripsi_banner = input('deskripsi_banner');
      $input = array(
        'judul_banner'      => $judul_banner,
        'deskripsi_banner'  => $deskripsi_banner
      );
      $foto = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto']['name']);
      $config['upload_path']    = 'assets/img/banner/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $input['foto_banner'] = $config['upload_path'] . $foto;
        unlink($cek->foto_banner);
      }
      $this->db->where('substring(sha1(id_banner), 10, 5) = "' . $id . '"')->update('tb_banner', $input);
      set_flashdata('msg', '<div class="alert alert-success">Banner sukses diperbarui.</div>');
      redirect('admin/banner');
    }
  }

  public function hapusbanner($id)
  {
    $nama_file = $this->db->where('substring(sha1(id_banner), 10, 5) = "' . $id . '"')->get('tb_banner')->row();
    unlink($nama_file->foto_testimoni);
    $this->db->where('substring(sha1(id_banner), 10, 5) = "' . $id . '"')->delete('tb_banner');
    set_flashdata('msg', '<div class="alert alert-success">Banner sukses dihapus.</div>');
    redirect('admin/banner');
  }

  public function ajaxbanner()
  {
    $hasil  = '';
    $id     = input('id');
    $cek = $this->db->where('substring(sha1(id_banner), 10, 5) = "' . $id . '"')->get('tb_banner')->row();
    if ($cek == true) {
      $hasil = $cek->judul_banner;
    }
    echo $hasil;
  }
}
