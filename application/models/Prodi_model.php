<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
  public function get_all()
  {
    $this->db->order_by('nama_prodi', 'asc');
    return $this->db->get('prodi')->result_array();
  }

  public function get_prodi($id)
  {
    return $this->db->get_where('prodi', ['id' => $id])->row();
  }

  public function count_all()
  {
    return $this->db->get('prodi')->num_rows();
  }

  public function tambah()
  {
    $data = [
      'id' => $this->input->post('id'),
      'nama_prodi' => $this->input->post('nama_prodi'),
      'gelar_kelulusan' => $this->input->post('gelar_kelulusan'),
    ];

    $this->db->insert('prodi', $data);
  }

  public function edit()
  {
    $data = [
      'nama_prodi' => $this->input->post('nama_prodi'),
      'gelar_kelulusan' => $this->input->post('gelar_kelulusan')
    ];

    $this->db->update('prodi', $data, ['id' => $this->input->post('id')]);
  }

  public function hapus($id)
  {
    $this->db->delete('prodi', ['id' => $id]);
  }
}

/* End of file Prodi_model.php */
