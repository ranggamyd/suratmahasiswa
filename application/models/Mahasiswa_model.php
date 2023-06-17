<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
  public function get_all()
  {
    if ($this->session->userdata('level') !== 'Kaprodi') {
      $this->db->join('prodi', 'prodi.id = mhs.id_prodi', 'left');
      $this->db->order_by('nim', 'desc');
      return $this->db->get('mhs')->result_array();
    } else {
      $kaprodi = $this->db->get_where('kaprodi', ['nidn' => $this->session->userdata('nidn_kaprodi')])->row();
      $this->db->join('prodi', 'prodi.id = mhs.id_prodi', 'left');
      $this->db->order_by('nim', 'desc');
      return $this->db->get_where('mhs', ['id_prodi' => $kaprodi->id_prodi])->result_array();
    }
  }

  public function get_active_mhs()
  {
    $this->db->join('prodi', 'prodi.id = mhs.id_prodi', 'left');
    $this->db->order_by('nim', 'desc');
    return $this->db->get_where('mhs', ['status' => 'Aktif'])->result_array();
  }

  public function get_mahasiswa($nim)
  {
    $this->db->join('prodi', 'prodi.id = mhs.id_prodi', 'left');
    return $this->db->get_where('mhs', ['nim' => $nim])->row();
  }

  public function count_all()
  {
    return $this->db->get('mhs')->num_rows();
  }

  public function count_by_prodi($id_prodi)
  {
    return $this->db->get_where('mhs', ['id_prodi' => $id_prodi])->num_rows();
  }

  public function tambah()
  {
    $data = [
      'nim' => $this->input->post('nim'),
      'nama_mhs' => $this->input->post('nama_mhs'),
      'id_prodi' => $this->input->post('id_prodi'),
      'tingkat' => $this->input->post('tingkat'),
      'semester' => $this->input->post('semester'),
      'thn_masuk' => $this->input->post('thn_masuk'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp'),
      'nama_ortu' => $this->input->post('nama_ortu'),
      'nip' => $this->input->post('nip'),
      'pangkat' => $this->input->post('pangkat'),
      'golongan' => $this->input->post('golongan'),
      'tempat_kerja' => $this->input->post('tempat_kerja'),
      'alamat_rumah' => $this->input->post('alamat_rumah'),
    ];

    $this->db->insert('mhs', $data);
    $this->db->insert('user', ['nama_user' => $data['nama_mhs'], 'username' => $data['nim'], 'password' => md5($data['nim']), 'level' => 'Mahasiswa', 'nim_mhs' => $this->input->post('nim')]);
  }

  public function edit()
  {
    $data = [
      'nama_mhs' => $this->input->post('nama_mhs'),
      'id_prodi' => $this->input->post('id_prodi'),
      'tingkat' => $this->input->post('tingkat'),
      'semester' => $this->input->post('semester'),
      'thn_masuk' => $this->input->post('thn_masuk'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp'),
      'nama_ortu' => $this->input->post('nama_ortu'),
      'nip' => $this->input->post('nip'),
      'pangkat' => $this->input->post('pangkat'),
      'golongan' => $this->input->post('golongan'),
      'tempat_kerja' => $this->input->post('tempat_kerja'),
      'alamat_rumah' => $this->input->post('alamat_rumah'),
    ];

    $this->db->update('mhs', $data, ['nim' => $this->input->post('nim')]);
    $this->db->update('user', ['nama_user' => $data['nama_mhs']], ['username' => $this->input->post('nim')]);
  }

  public function hapus($nim)
  {
    $this->db->delete('mhs', ['nim' => $nim]);
  }
}

/* End of file Mahasiswa_model.php */
