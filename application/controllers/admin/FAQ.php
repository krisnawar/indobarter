<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FAQ extends CI_Controller
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
    $data['title'] = 'FAQ | ';
    $data['faq'] = $this->admin->datafaq()->result();
    view('admin/v_header', $data);
    view('admin/v_faq', $data);
    view('admin/v_footer');
  }

  public function simpanfaq()
  {
    set_rules('submit', 'Submit', 'required');
    if (validation_run() == false) {
      redirect('admin/FAQ');
    } else {
      $pertanyaan = input('pertanyaan');
      $jawaban    = nl2br(htmlspecialchars_decode(input('jawaban')), ENT_HTML5);
      $input      = array(
        'pertanyaan'  => $pertanyaan,
        'jawaban'     => $jawaban
      );
      $this->admin->insertData('tb_faq', $input);
      set_flashdata('msg', '<div class="alert alert-success">FAQ sukses disimpan.</div>');
      redirect('admin/FAQ');
    }
  }

  public function updatefaq($id)
  {
    set_rules('submit', 'Submit', 'required');
    if (validation_run() == false) {
      redirect('admin/FAQ');
    } else {
      $pertanyaan = input('pertanyaan');
      $jawaban    = nl2br(htmlspecialchars_decode(input('jawaban')), ENT_HTML5);
      $input      = array(
        'pertanyaan'  => $pertanyaan,
        'jawaban'     => $jawaban
      );
      $this->db->where('substring(sha1(id_faq), 10, 5) = "' . $id . '"')->update('tb_faq', $input);
      set_flashdata('msg', '<div class="alert alert-success">FAQ sukses diperbarui.</div>');
      redirect('admin/FAQ');
    }
  }

  public function hapusfaq($id)
  {
    $this->db->where('substring(sha1(id_faq), 10, 5) = "' . $id . '"')->delete('tb_faq');
    set_flashdata('msg', '<div class="alert alert-success">FAQ sukses dihapus.</div>');
    redirect('admin/FAQ');
  }

  public function ajaxfaq()
  {
    $hasil  = '';
    $id     = input('id');
    $cek = $this->db->where('substring(sha1(id_faq), 10, 5) = "' . $id . '"')->get('tb_faq')->row();
    if ($cek == true) {
      $hasil = $cek->pertanyaan;
    }
    echo $hasil;
  }
}
