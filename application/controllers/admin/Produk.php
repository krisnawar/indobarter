<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
    $data['title']  = 'Katalog Produk | ';
    $data['produk'] = $this->admin->daftarproduk()->result();
    view('admin/v_header', $data);
    view('admin/v_produk', $data);
    view('admin/v_footer');
  }

  public function tambahproduk()
  {
    $data = $this->data;
    $data['title'] = 'Tambah Katalog | ';
    view('admin/v_header', $data);
    view('admin/v_tambahproduk');
    view('admin/v_footer');
  }

  public function simpanproduk()
  {
    set_rules('submit', 'Submit', 'required');
    if (validation_run() == false) {
      redirect('admin/produk');
    } else {
      $nama_produk      = input('nama_produk');
      $deskripsi_produk = nl2br(htmlspecialchars_decode(input('deskripsi_produk')), ENT_HTML5);
      $input  = array(
        'nama_produk'       => $nama_produk,
        'deskripsi_produk'  => $deskripsi_produk,
        'slug_produk'       => str_replace(' ', '-', strtolower($nama_produk))
      );
      $foto       = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto_produk']['name']);
      $config['upload_path']    = 'assets/img/produk/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto_produk')) {
        $input['foto_produk'] = $config['upload_path'] . $foto;
      }
      $this->admin->insertData('tb_produk', $input);
      set_flashdata('msg', '<div class="alert alert-success">Produk sukses ditambahkan.</div>');
      redirect('admin/produk');
    }
  }

  public function editproduk($id)
  {
    $data = $this->data;
    $data['title'] = 'Edit Katalog | ';
    $data['produk'] = $this->db->where('substring(sha1(id_produk), 10, 5) = "' . $id . '"')->get('tb_produk')->row();
    view('admin/v_header', $data);
    view('admin/v_editproduk', $data);
    view('admin/v_footer');
  }

  public function updateproduk($id)
  {
    set_rules('submit', 'Submit', 'required');
    if (validation_run() == false) {
      redirect('admin/produk');
    } else {
      $cek = $this->db->where('substring(sha1(id_produk), 10, 5) = "' . $id . '"')->get('tb_produk')->row();
      $nama_produk      = input('nama_produk');
      $deskripsi_produk = nl2br(htmlspecialchars_decode(input('deskripsi_produk')), ENT_HTML5);
      $input  = array(
        'nama_produk'       => $nama_produk,
        'deskripsi_produk'  => $deskripsi_produk,
        'slug_produk'       => str_replace(' ', '-', strtolower($nama_produk))
      );
      $foto       = rand(10, 99) . '-' . str_replace(' ', '_', $_FILES['foto_produk']['name']);
      $config['upload_path']    = 'assets/img/produk/';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['max_size']       = 1024 * 10;
      $config['file_name']      = $foto;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto_produk')) {
        $input['foto_produk'] = $config['upload_path'] . $foto;
        unlink($cek->foto_produk);
      }
      $this->db->where('substring(sha1(id_produk), 10, 5) = "' . $id . '"')->update('tb_produk', $input);
      set_flashdata('msg', '<div class="alert alert-success">Produk sukses diperbarui.</div>');
      redirect('admin/produk');
    }
  }

  public function hapusproduk($id)
  {
    $nama_file = $this->db->where('substring(sha1(id_produk), 10, 5) = "' . $id . '"')->get('tb_produk')->row();
    unlink($nama_file->foto_produk);
    $this->db->where('substring(sha1(id_produk), 10, 5) = "' . $id . '"')->delete('tb_produk');
    set_flashdata('msg', '<div class="alert alert-success">Produk sukses dihapus.</div>');
    redirect('admin/produk');
  }

  public function ajaxproduk()
  {
    $hasil  = '';
    $id     = input('id');
    $cek = $this->db->where('substring(sha1(id_produk), 10, 5) = "' . $id . '"')->get('tb_produk')->row();
    if ($cek == true) {
      $hasil = $cek->nama_produk;
    }
    echo $hasil;
  }
}
