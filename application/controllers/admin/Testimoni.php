<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
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
    $data['title'] = 'Testimoni | ';
    $data['testimoni'] = $this->admin->datatestimoni()->result();
    view('admin/v_header', $data);
    view('admin/v_testimoni', $data);
    view('admin/v_footer');
  }

  public function simpantestimoni()
  {
    set_rules('simpan', 'Simpan', 'required');
    if (validation_run() == false) {
      redirect('admin/testimoni');
    } else {
      $nama_testimoni       = input('nama_testimoni');
      $asal_testimoni       = input('asal_testimoni');
      $deskripsi_testimoni  = input('deskripsi_testimoni');
      $input  = array(
        'nama_testimoni'      => $nama_testimoni,
        'asal_testimoni'      => $asal_testimoni,
        'deskripsi_testimoni' => $deskripsi_testimoni,
        'tanggal_testimoni'   => date('Y-m-d H:i:s'),
        'user_id'             => userdata('user_id')
      );
      $foto       = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto']['name']);
      $config['upload_path']    = 'assets/img/testimoni/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $input['foto_testimoni'] = $config['upload_path'] . $foto;
      }
      $this->admin->insertData('tb_testimoni', $input);
      set_flashdata('msg', '<div class="alert alert-success">Testimoni sukses ditambahkan.</div>');
      redirect('admin/testimoni');
    }
  }

  public function updatetestimoni($id)
  {
    set_rules('simpan', 'Simpan', 'required');
    if (validation_run() == false) {
      redirect('admin/testimoni');
    } else {
      $cek = $this->db->where('substring(sha1(id_testimoni), 10, 5) = "' . $id . '"')->get('tb_testimoni')->row();
      $nama_testimoni       = input('nama_testimoni');
      $asal_testimoni       = input('asal_testimoni');
      $deskripsi_testimoni  = input('deskripsi_testimoni');
      $input  = array(
        'nama_testimoni'      => $nama_testimoni,
        'asal_testimoni'      => $asal_testimoni,
        'deskripsi_testimoni' => $deskripsi_testimoni,
        'tanggal_testimoni'   => date('Y-m-d H:i:s'),
        'user_id'             => userdata('user_id')
      );
      $foto       = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto']['name']);
      $config['upload_path']    = 'assets/img/testimoni/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $input['foto_testimoni'] = $config['upload_path'] . $foto;
        unlink($cek->foto_testimoni);
      }
      $this->db->where('substring(sha1(id_testimoni), 10, 5) = "' . $id . '"')->update('tb_testimoni', $input);
      set_flashdata('msg', '<div class="alert alert-success">Testimoni sukses diperbarui.</div>');
      redirect('admin/testimoni');
    }
  }

  public function hapustestimoni($id)
  {
    $nama_file = $this->db->where('substring(sha1(id_testimoni), 10, 5) = "' . $id . '"')->get('tb_testimoni')->row();
    unlink($nama_file->foto_testimoni);
    $this->db->where('substring(sha1(id_testimoni), 10, 5) = "' . $id . '"')->delete('tb_testimoni');
    set_flashdata('msg', '<div class="alert alert-success">Testimoni sukses dihapus.</div>');
    redirect('admin/testimoni');
  }

  public function ajaxtestimoni()
  {
    $hasil  = '';
    $id     = input('id');
    $cek = $this->db->where('substring(sha1(id_testimoni), 10, 5) = "' . $id . '"')->get('tb_testimoni')->row();
    if ($cek == true) {
      $hasil = $cek->nama_testimoni;
    }
    echo $hasil;
  }
}
