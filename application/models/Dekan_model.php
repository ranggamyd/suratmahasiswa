<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekan_model extends CI_Model
{
  public function get_all()
  {
    $this->db->order_by('nama_dekan', 'asc');
    return $this->db->get('dekan')->result_array();
  }

  public function get_dekan($nidn)
  {
    return $this->db->get_where('dekan', ['nidn' => $nidn])->row();
  }

  public function count_all()
  {
    return $this->db->get('dekan')->num_rows();
  }

  public function tambah()
  {
    $data = [
      'nidn' => $this->input->post('nidn'),
      'nama_dekan' => $this->input->post('nama_dekan'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp'),
    ];

    $this->db->insert('dekan', $data);
    $this->db->insert('user', ['nama_user' => $data['nama_dekan'], 'username' => $data['nidn'], 'password' => md5($data['nidn']), 'level' => 'Dekan', 'nidn_dekan'=>$this->input->post('nidn')]);
  }

  public function edit()
  {
    $data = [
      'nama_dekan' => $this->input->post('nama_dekan'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp')
    ];

    $this->db->update('dekan', $data, ['nidn' => $this->input->post('nidn')]);
    $this->db->update('user', ['nama_user' => $data['nama_dekan']], ['username' => $this->input->post('nidn')]);
  }

  public function hapus($nidn)
  {
    $this->db->delete('dekan', ['nidn' => $nidn]);
  }
}

/* End of file Dekan_model.php */
