<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
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
    $data['title'] = 'Daftar Paket | ';
    $data['produk'] = $this->admin->daftarproduk()->result();
    $data['paket'] = $this->admin->daftarharga()->result();
    view('admin/v_header', $data);
    view('admin/v_paket', $data);
    view('admin/v_footer');
  }

  public function simpanpaket()
  {
    set_rules('simpan', 'Simpan', 'required');
    if (validation_run() == false) {
      redirect('admin/paket');
    } else {
      $nama_paket   = input('nama_paket');
      $produk       = input('produk');
      $harga_paket  = preg_replace('/\D/', '', input('harga_paket'));;
      $terlaris     = input('terlaris');
      $deskripsi    = input('deskripsi');
      $input = array(
        'nama_paket'  => $nama_paket,
        'deskripsi'   => $deskripsi,
        'harga_paket' => $harga_paket,
        'terlaris'    => $terlaris,
        'id_produk'   => $produk
      );
      $this->admin->insertData('tb_paket', $input);
      set_flashdata('msg', '<div class="alert alert-success">Paket sukses ditambahkan.</div>');
      redirect('admin/paket');
    }
  }

  public function updatepaket($id)
  {
    set_rules('simpan', 'Simpan', 'required');
    if (validation_run() == false) {
      redirect('admin/paket');
    } else {
      $nama_paket   = input('nama_paket');
      $produk       = input('produk');
      $harga_paket  = preg_replace('/\D/', '', input('harga_paket'));;
      $terlaris     = input('terlaris');
      $deskripsi    = input('deskripsi');
      $input = array(
        'nama_paket'  => $nama_paket,
        'deskripsi'   => $deskripsi,
        'harga_paket' => $harga_paket,
        'terlaris'    => $terlaris,
        'id_produk'   => $produk
      );
      $this->db->where('substring(sha1(id_paket), 10, 5) = "' . $id . '"')->update('tb_paket', $input);
      set_flashdata('msg', '<div class="alert alert-success">Paket sukses diperbarui.</div>');
      redirect('admin/paket');
    }
  }

  public function hapuspaket($id)
  {
    $this->db->where('substring(sha1(id_paket), 10, 5) = "' . $id . '"')->delete('tb_paket');
    set_flashdata('msg', '<div class="alert alert-success">Paket sukses dihapus.</div>');
    redirect('admin/paket');
  }

  public function ajaxpaket()
  {
    $hasil  = '';
    $id     = input('id');
    $cek = $this->db->where('substring(sha1(id_paket), 10, 5) = "' . $id . '"')->get('tb_paket')->row();
    if ($cek == true) {
      $hasil = $cek->nama_paket;
    }
    echo $hasil;
  }
}
