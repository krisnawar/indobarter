<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->data = array(
      'produk'      => $this->admin->daftarproduk()->result(),
      'perusahaan'  => $this->admin->dataperusahaan()->row()
    );
  }

  public function index()
  {
    $data = $this->data;
    $data['title']  = $data['perusahaan']->nama_perusahaan . ' - Profil Perusahaan';
    $data['banner'] = $this->admin->databanner()->result();
    $data['faq']    = $this->admin->datafaq()->result();
    view('front/v_header', $data);
    view('front/v_homepage', $data);
    view('front/v_footer', $data);
  }

  public function produk($slug_produk = null)
  {
    $data = $this->data;
    if ($slug_produk == null) {
      $data['title']  = 'Produk - ' . $data['perusahaan']->nama_perusahaan;
      view('front/v_header', $data);
      view('front/v_produk', $data);
    } else {
      $data['detail'] = $this->db->where('slug_produk', $slug_produk)->get('tb_produk')->row();
      $data['title']  = $data['detail']->nama_produk . ' - ' . $data['perusahaan']->nama_perusahaan;
      $id_produk = substr(sha1($data['detail']->id_produk), 16, 7);
      $data['harga']  = $this->admin->daftarharga($id_produk)->result();
      view('front/v_header', $data);
      view('front/v_detailproduk', $data);
    }
    view('front/v_footer', $data);
  }

  public function detailproduk($id)
  {
    $data = $this->data;
    $data['detail'] = $this->db->where('substring(sha1(id_produk), 17, 7) = "' . $id . '"')->get('tb_produk')->row();
    $data['title']  = $data['detail']->nama_produk . ' - ' . $data['perusahaan']->nama_perusahaan;
    $data['harga']  = $this->admin->daftarharga($id)->result();
    view('front/v_header', $data);
    view('front/v_detailproduk', $data);
    view('front/v_footer', $data);
  }

  public function harga()
  {
    $data = $this->data;
    $data['title']  = 'Harga - ' . $data['perusahaan']->nama_perusahaan;
    $data['produk'] = $this->admin->daftarproduk()->result();
    $data['harga']  = $this->admin->daftarharga()->result();
    view('front/v_header', $data);
    view('front/v_harga', $data);
    view('front/v_footer', $data);
  }

  public function testimoni()
  {
    $data = $this->data;
    $data['title']      = 'Testimoni - ' . $data['perusahaan']->nama_perusahaan;
    $data['testimoni']  = $this->admin->datatestimoni()->result();
    view('front/v_header', $data);
    view('front/v_testimoni', $data);
    view('front/v_footer', $data);
  }

  public function tentangkami()
  {
    $data = $this->data;
    $data['title']      = 'Tentang Kami - ' . $data['perusahaan']->nama_perusahaan;
    $data['tim'] = $this->admin->datatim()->result();
    view('front/v_header', $data);
    view('front/v_tentangkami', $data);
    view('front/v_footer', $data);
  }

  public function kontak()
  {
    $data = $this->data;
    $data['title']      = 'Kontak Kami - ' . $data['perusahaan']->nama_perusahaan;
    view('front/v_header', $data);
    view('front/v_kontak', $data);
    view('front/v_footer', $data);
  }

  public function tim()
  {
    $data['tim'] = $this->admin->datatim()->result();
    view('front/v_tim', $data);
  }
}
