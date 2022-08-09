<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tim extends CI_Controller
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
    $data['title'] = 'Tim | ';
    $data['tim'] = $this->admin->datatim()->result();
    view('admin/v_header', $data);
    view('admin/v_tim', $data);
    view('admin/v_footer');
  }

  public function simpantim()
  {
    set_rules('simpan', 'Simpan', 'required');
    if (validation_run() == false) {
      redirect('admin/tim');
    } else {
      $nama       = input('nama');
      $posisi     = input('posisi');
      $input  = array(
        'nama'      => $nama,
        'posisi'    => $posisi
      );
      $foto       = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto']['name']);
      $config['upload_path']    = 'assets/img/tim/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $input['foto'] = $config['upload_path'] . $foto;
      }
      $this->admin->insertData('tb_tim', $input);
      set_flashdata('msg', '<div class="alert alert-success">Tim sukses ditambahkan.</div>');
      redirect('admin/tim');
    }
  }

  public function updatetim($id)
  {
    set_rules('perbarui', 'Perbarui', 'required');
    if (validation_run() == false) {
      redirect('admin/tim');
    } else {
      $nama       = input('nama');
      $posisi     = input('posisi');
      $input  = array(
        'nama'      => $nama,
        'posisi'    => $posisi
      );
      $foto       = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto']['name']);
      $config['upload_path']    = 'assets/img/tim/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $input['foto'] = $config['upload_path'] . $foto;
      }
      $this->db->where('substring(sha1(id_tim), 10, 5) = "' . $id . '"')->update('tb_tim', $input);
      set_flashdata('msg', '<div class="alert alert-success">Tim sukses diperbarui.</div>');
      redirect('admin/tim');
    }
  }

  public function hapustim($id)
  {
    $nama_file = $this->db->where('substring(sha1(id_tim), 10, 5) = "' . $id . '"')->get('tb_tim')->row();
    unlink($nama_file->foto);
    $this->db->where('substring(sha1(id_tim), 10, 5) = "' . $id . '"')->delete('tb_tim');
    set_flashdata('msg', '<div class="alert alert-success">Tim sukses dihapus.</div>');
    redirect('admin/tim');
  }

  public function ajaxtim()
  {
    $hasil  = '';
    $id     = input('id');
    $cek = $this->db->where('substring(sha1(id_tim), 10, 5) = "' . $id . '"')->get('tb_tim')->row();
    if ($cek == true) {
      $hasil = $cek->nama;
    }
    echo $hasil;
  }
}
