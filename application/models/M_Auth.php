<?php

class M_Auth extends CI_Model
{

  public function cekUser($username)
  {
    return $this->db->get_where('tb_users', array('user_username' => $username));
  }
}
