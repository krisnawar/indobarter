<?php

class M_Admin extends CI_Model
{

  public function insertData($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  public function updateData($tabel, $data, $where, $nilai)
  {
    $this->db->where($where, $nilai);
    $this->db->update($tabel, $data);
  }

  public function daftarproduk()
  {
    return $this->db->get('tb_produk');
  }

  public function daftarharga($id_produk = false)
  {
    $this->db->select('id_paket, nama_paket, deskripsi, harga_paket, terlaris, nama_produk, tb_paket.id_produk');
    $this->db->from('tb_paket');
    $this->db->join('tb_produk', 'tb_paket.id_produk = tb_produk.id_produk');
    if ($id_produk == false) {
      return $this->db->get();
    } else {
      $this->db->where('substring(sha1(tb_paket.id_produk), 17, 7) = "' . $id_produk . '"');
      return $this->db->get();
    }
    //return $this->db->get('tb_paket');
  }

  public function datafaq()
  {
    return $this->db->get('tb_faq');
  }

  public function datatestimoni()
  {
    return $this->db->get('tb_testimoni');
  }

  public function databanner()
  {
    return $this->db->get('tb_banner');
  }

  public function datatim()
  {
    return $this->db->get('tb_tim');
  }

  public function dataPerusahaan()
  {
    return $this->db->get_where('tb_data_perusahaan', array('id_data' => 1));
  }
}
