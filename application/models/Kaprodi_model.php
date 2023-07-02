<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_model extends CI_Model
{
  public function get_all()
  {
    $this->db->join('prodi', 'prodi.id = kaprodi.id_prodi', 'left');
    $this->db->order_by('nama_kaprodi', 'asc');
    return $this->db->get('kaprodi')->result_array();
  }

  public function get_kaprodi($nidn)
  {
    $this->db->join('prodi', 'prodi.id = kaprodi.id_prodi', 'left');
    return $this->db->get_where('kaprodi', ['nidn' => $nidn])->row();
  }

  public function count_all()
  {
    return $this->db->get('kaprodi')->num_rows();
  }

  public function tambah()
  {
    $data = [
      'nidn' => $this->input->post('nidn'),
      'nama_kaprodi' => $this->input->post('nama_kaprodi'),
      'id_prodi' => $this->input->post('id_prodi'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp')
    ];

    $this->db->insert('kaprodi', $data);
    $this->db->insert('user', ['nama_user' => $data['nama_kaprodi'], 'username' => $data['nidn'], 'password' => md5($data['nidn']), 'level' => 'Kaprodi', 'nidn_kaprodi' => $this->input->post('nidn')]);
  }

  public function edit()
  {
    $data = [
      'nama_kaprodi' => $this->input->post('nama_kaprodi'),
      'id_prodi' => $this->input->post('id_prodi'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp')
    ];

    $this->db->update('kaprodi', $data, ['nidn' => $this->input->post('nidn')]);
    $this->db->update('user', ['nama_user' => $data['nama_kaprodi']], ['username' => $this->input->post('nidn')]);
  }

  public function hapus($nidn)
  {
    $this->db->delete('kaprodi', ['nidn' => $nidn]);
		$this->db->delete(user, ['nidn_kaprodi' => $nidn]);
  }
}

/* End of file Kaprodi_model.php */
