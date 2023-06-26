<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function get_all()
  {
    $this->db->order_by('nama_user', 'asc');
    return $this->db->get('user')->result_array();
  }

  public function get_user($id)
  {
    return $this->db->get_where('user', ['id' => $id])->row();
  }

  public function count_all()
  {
    return $this->db->get('user')->num_rows();
  }

  public function tambah()
  {
    $data = [
      'id' => $this->input->post('id'),
      'nama_user' => $this->input->post('nama_user'),
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('username')),
    ];

    $this->db->insert('user', $data);
  }

  public function edit()
  {
    $data = [
      'nama_user' => $this->input->post('nama_user')
    ];

    $this->db->update('user', $data, ['id' => $this->input->post('id')]);
  }

  public function hapus($id)
  {
    $this->db->delete('user', ['id' => $id]);
  }
}

/* End of file User_model.php */
