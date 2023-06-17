<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  public function login()
  {

    // $this->db->insert('user', ['nama_user' => 'Administrator', 'username' => 'admin', 'password' => md5('admin'), 'level' => 'Administrator',]);
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->db->where('username', $username);
    $user = $this->db->get('user')->row();

    if (!$user) return FALSE;
    if (md5($password) != $user->password) return FALSE;
    $this->session->set_userdata(['id' => $user->id]);

    if ($user->level == 'Administrator') {
      $this->session->set_userdata(['level' => 'Administrator']);
    } elseif ($user->level == 'Dekan') {
      $this->session->set_userdata(['level' => 'Dekan']);
      $this->session->set_userdata(['nidn_dekan' => $user->nidn_dekan]);
    } elseif ($user->level == 'Kaprodi') {
      $this->session->set_userdata(['level' => 'Kaprodi']);
      $this->session->set_userdata(['nidn_kaprodi' => $user->nidn_kaprodi]);
    } elseif ($user->level == 'Mahasiswa') {
      $this->session->set_userdata(['level' => 'Mahasiswa']);
      $this->session->set_userdata(['nim_mhs' => $user->nim_mhs]);
    }
    $this->session->set_userdata(['nama_user' => $user->nama_user]);

    if ($this->session->has_userdata('id')) return TRUE;
  }

  public function current_user()
  {
    if ($this->session->has_userdata('id')) return TRUE;
  }

  public function logout()
  {
    $this->session->sess_destroy();
    if (!$this->session->has_userdata('id')) return TRUE;
  }
}
