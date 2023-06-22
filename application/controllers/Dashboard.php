<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->auth_model->current_user()) {
      $this->session->set_flashdata('gagal', 'Gagal mengakses, Silahkan login kembali !');
      redirect('auth');
    }
  }

  function loadView($file, $data)
  {
    $this->load->view('parts/header', $data);
    $this->load->view($file, $data);
    $this->load->view('parts/footer', $data);
  }

  public function index()
  {
    $user = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row();

    $data = [
      'title' => 'Dashboard',
      'total_prodi' => $this->prodi_model->count_all(),
      'nama_prodi' => $user->level == 'Kaprodi' ? $this->db->get_where('prodi', ['id' => $this->db->get_where('kaprodi', ['nidn' => $user->nidn_kaprodi])->row('id_prodi')])->row('nama_prodi') : null,
      'total_mahasiswa' => $this->mahasiswa_model->count_active_mhs(),
      'total_mahasiswa_per_prodi' => $user->level == 'Kaprodi' ? $this->mahasiswa_model->count_by_prodi($this->db->get_where('kaprodi', ['nidn' => $user->nidn_kaprodi])->row('id_prodi')) : null,
      // 'total_dekan' => $this->dekan_model->count_all(),
      'total_kaprodi' => $this->kaprodi_model->count_all(),
      'total_user' => $this->user_model->count_all(),
      'total_skl' => $this->skl_model->count_all(),
      'total_sps' => $this->sps_model->count_all(),
      'total_sokp' => $this->sokp_model->count_all(),
      'total_sak' => $this->sak_model->count_all(),
      'total_spkl' => $this->spkl_model->count_all(),
      'total_sc' => $this->sc_model->count_all(),
      'total_spk' => $this->spk_model->count_all(),
      'total_spp' => $this->spp_model->count_all(),
      'total_skl_mhs' => $user->level == 'Mahasiswa' ? $this->skl_model->count_by_mhs($user->nim_mhs) : null,
      'total_sps_mhs' => $user->level == 'Mahasiswa' ? $this->sps_model->count_by_mhs($user->nim_mhs) : null,
      'total_sokp_mhs' => $user->level == 'Mahasiswa' ? $this->sokp_model->count_by_mhs($user->nim_mhs) : null,
      'total_sak_mhs' => $user->level == 'Mahasiswa' ? $this->sak_model->count_by_mhs($user->nim_mhs) : null,
      'total_spkl_mhs' => $user->level == 'Mahasiswa' ? $this->spkl_model->count_by_mhs($user->nim_mhs) : null,
      'total_sc_mhs' => $user->level == 'Mahasiswa' ? $this->sc_model->count_by_mhs($user->nim_mhs) : null,
      'total_spk_mhs' => $user->level == 'Mahasiswa' ? $this->spk_model->count_by_mhs($user->nim_mhs) : null,
      'total_spp_mhs' => $user->level == 'Mahasiswa' ? $this->spp_model->count_by_mhs($user->nim_mhs) : null,
      'user' => $this->user_model->get_user($user->id),
    ];

    if ($this->session->userdata('level') == 'Administrator') {
      $this->loadView('dashboard_admin', $data);
    } elseif ($this->session->userdata('level') == 'Dekan') {
      $this->loadView('dashboard_dekan', $data);
    } elseif ($this->session->userdata('level') == 'Kaprodi') {
      $this->loadView('dashboard_kaprodi', $data);
    } elseif ($this->session->userdata('level') == 'Mahasiswa') {
      $this->loadView('dashboard_mhs', $data);
    }
  }
}

/* End of file Dashboard.php */
